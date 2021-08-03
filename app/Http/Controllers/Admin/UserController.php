<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

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
}
