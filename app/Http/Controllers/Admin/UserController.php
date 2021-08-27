<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlayerContract;
use App\Models\PlayerHistory;
use App\Models\User;
use App\Notifications\UserDeletionNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{

    public function all()
    {
        $users = User::query()->paginate(15);
        return view('admin.user.view', [
            'users' => $users
        ]);
    }

    public function single()
    {

    }

    /**
     * Delete User and send email
     * @param User $user
     * @return RedirectResponse
     */
    public function delete(User $user): RedirectResponse
    {
        if (isset($user->player)) {
            PlayerContract::query()->where('player_id', $user->player->id)->delete();
            PlayerHistory::query()->where('player_id', $user->player->id)->delete();
            $user->player->delete();
        }

        if (isset($user->staff)) {
            $user->staff->delete();
        }
        //Delete Email
        Notification::route('mail', $user->email)->notify(new UserDeletionNotification($user));

        $user->forceDelete();

        return redirect()->back()->with('success', 'User has been deleted');
    }
}
