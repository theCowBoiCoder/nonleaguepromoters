<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with(['danger' => 'Sorry these creds dont work try again']);
    }

    public function logout()
    {

    }
}
