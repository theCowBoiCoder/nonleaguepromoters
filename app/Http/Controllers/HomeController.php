<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerContract;
use App\Models\Position;
use App\Models\Region;
use App\Models\Staff;
use App\Models\User;
use App\Notifications\UserDeletionNotification;
use App\Notifications\UserHasRegisteredNotification;
use App\Notifications\UserPasswordResetNotification;
use App\Notifications\UserRegisterNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function landing()
    {
        return view('pages.landing');
    }

    public function index()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function register()
    {
        $positions = Position::query()->get();
        $regions = Region::query()->orderBy('county', 'ASC')->get();
        return view('pages.register', [
            'positions' => $positions,
            'regions' => $regions
        ]);
    }

    public function deleteUser(Request $request)
    {
        $user = User::query()->find($request->id);

        Notification::route('mail', $user->email)->notify(new UserDeletionNotification($user));
        User::query()->where('id', $request->id)->delete();
        \request()->session()->flush();
        return redirect()->route('home');
    }

    public function reset()
    {
        return view('pages.reset');
    }

    public function resetStore(Request $request): \Illuminate\Http\RedirectResponse
    {
        //Find Email
        $user = User::query()->where('email', $request->email)->first();

        if ($user != null) {
            //Send password Reset Email
            $message = "Your new password has been sent to $user->email";
            $password = Str::random(8);
            Notification::route('mail', $user->email)->notify(new UserPasswordResetNotification($user, $password));
            $user->password_been_changed = 0;
            $user->save();
        } else {
            $message = "Sorry we couldn't find any details with the email $request->email";
        }


        return redirect()->back()->with('success', $message);
    }

    public function registerUser(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email_address' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Sorry the email address is already in use']);
        }

        if (isset($request->file)) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images/user'), $imageName);
        }

        $profile_types = is_array($request->profile_type) ? explode(',', $request->profile_type) : $request->profile_type;
        $region = Region::query()->where('county', $request->county)->first();
        $password = Str::random(8);
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email_address,
            'password' => Hash::make($password),
            'gender' => $request->gender,
            'dob' => Carbon::parse($request->dob)->toDateString(),
            'county' => $region->county,
            'region' => $region->region,
            'profile_image' => $imageName ?? NULL,
            'bio' => $request->bio
        ]);

        if ((is_array($profile_types) && $profile_types[0] == 1) || (!is_array($profile_types) && $profile_types == 1)) {
            $player = Player::query()->create([
                'user_id' => $user->id,
                'address', $request->address,
                'step_level' => $request->step_free,
                'height' => $request->height ?? 0,
                'preferred_position' => $request->preferred_position ?? '',
                'looking_for_a_club' => $request->looking_for_a_club ?? 0,
                'preferred_foot' => $request->preferred_foot ?? '',

            ]);

            if (isset($request->club)) {
                PlayerContract::query()->create([
                    'player_id' => $player->id,
                    'contracted_club' => $request->club,
                    'contact_expiry_date' => Carbon::parse($request->contract_end_date)->toDateString()
                ]);
            }
        }

        if ((is_array($profile_types) && $profile_types[1] == 2) || (!is_array($profile_types) && $profile_types == 2)) {
            $staff = Staff::query()->create([
                'user_id' => $user->id,
                'looking_for_a_club' => $request->looking_for_a_club ?? 0,
                'role' => $request->role,
                'qualification' => $request->qualification,
            ]);

            if (isset($request->club)) {
                PlayerContract::query()->create([
                    'player_id' => $staff->id,
                    'contracted_club' => $request->club,
                    'contact_expiry_date' => Carbon::parse($request->contract_end_date)->toDateString()
                ]);
            }
        }


        Auth::attempt(['email' => $request->email, 'password' => $password]);
        if (env('APP_ENV') != 'local') {
            //Send the Notifications
            Notification::route('mail', 'nonleagueguys@gmail.com')->notify(new UserHasRegisteredNotification($user));
            Notification::route('mail', $user->email)->notify(new UserRegisterNotification($user, $password));
        }

        return response()->json(['message' => 'Thanks You Have Now Registered']);

    }

    public function login()
    {
        return view('pages.login');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::query()->where('email', $request->email)->first();
            if ($user->password_been_changed == 0) {
                //Send to change password
                return redirect()->route('password.change', $user);
            }

            return redirect('/')->with('logged_in', 'Welcome back');
        }
        return redirect()->back()->with('logged_in','Sorry Either Username or Password does not match');
    }

    public function passwordChange(User $user)
    {
        return view('pages.auth.passwordchange', [
            'user' => $user
        ]);
    }

    public function passwordConfirm(User $user, Request $request)
    {
        $this->validate($request, [
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);

        $user->password = Hash::make($request->password);
        $user->password_been_changed = 1;
        $user->save();

        return redirect('/')->with('logged_in', 'Password Has Been Changed');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        \request()->session()->flush();
        return redirect()->route('home');
    }

    public function profile()
    {
        $me = User::query()->with(['staff', 'player.contracts'])->find(Auth::id());
        $positions = Position::query()->get();
        $regions = Region::query()->orderBy('county', 'ASC')->get();
        return view('pages.profile', [
            'positions' => $positions,
            'me' => $me,
            'regions' => $regions
        ]);
    }

    public function profileUpdate(Request $request): \Illuminate\Http\JsonResponse
    {

        if (isset($request->file)) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images/user'), $imageName);
        }

        $county = Region::query()->where('county', $request->county)->first();
        $user = User::query()->find($request->id);
        $user->name = $request->name;
        $user->bio = $request->bio;
        $user->gender = $request->gender;
        $user->dob = Carbon::parse($request->dob)->toDateString();
        $user->county = $county->county;
        $user->region = $county->region;
        $user->profile_image = $imageName ?? NULL;
        $user->facebook_url = $request->facebook_url ?? NULL;
        $user->twitter_url = $request->twitter_url ?? NULL;
        $user->instagram_url = $request->instagram_url ?? NULL;
        $user->youtube_url = $request->youtube_url ?? NULL;
        $user->save();

        if ($request->is_player == 1) {
            $user->player->step_level = $request->step_free;
            $user->player->height = $request->height ?? 0;
            $user->player->preferred_position = $request->preferred_position ?? NULL;
            $user->player->looking_for_a_club = $request->looking_for_a_club ?? 0;
            $user->player->preferred_foot = $request->preferred_foot ?? '';
            $user->player->save();
        }

        if ($request->is_staff == 1) {
            $user->staff->role = $request->role;
            $user->staff->qualification = $request->qualifications;
            $user->staff->save();
        }


        return response()->json(['message' => 'Thanks You Have Now Updated Your Profile']);
    }
}
