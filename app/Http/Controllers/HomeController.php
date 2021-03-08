<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerContract;
use App\Models\Position;
use App\Models\User;
use App\Notifications\UserHasRegisteredNotification;
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
        return view('pages.register', [
            'positions' => $positions
        ]);
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
            $request->file->move(public_path('images'), $imageName);
        }

        $password = Str::random(8);
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email_address,
            'password' => Hash::make($password)
        ]);


        $player = Player::query()->create([
            'user_id' => $user->id,
            'name' => $request->name,
            'gender' => $request->gender,
            'address', $request->address,
            'dob' => Carbon::parse($request->dob)->toDateString(),
            'step_level' => $request->step_free,
            'height' => $request->height ?? 0,
            'preferred_position' => $request->preferred_position ?? '',
            'preferred_foot' => $request->preferred_foot ?? '',
            'profile_image' => $imageName ?? NULL
        ]);

        if (isset($request->club)) {
            PlayerContract::query()->create([
                'player_id' => $player->id,
                'contracted_club' => $request->club,
                'contact_expiry_date' => Carbon::parse($request->contract_end_date)->toDateString()
            ]);
        }

        Auth::attempt(['email' => $request->email, 'password' => $password]);
        if (env('APP_ENV') != 'local') {
            //Send the Notifications
            Notification::route('mail', 'nonleagueguys@gmail.com')->notify(new UserHasRegisteredNotification($user, $player));
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
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect('/')->with('logged_in', 'Welcome back');
    }
}
