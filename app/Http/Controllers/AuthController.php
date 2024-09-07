<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    public function login_admin()
    {
        if(!empty(Auth::check()) && Auth::user()->is_admin == 'admin')
        {
            return redirect('admin/dashboard');
        }
        if(!empty(Auth::check()) && Auth::user()->is_admin == 'user1')
        {
            return redirect('user/dashboard');;
        }
        if(!empty(Auth::check()) && Auth::user()->is_admin == 'user2')
        {
            return redirect('user/dashboard');;
        }
        if(!empty(Auth::check()) && Auth::user()->is_admin == 'user3')
        {
            return redirect('user/dashboard');;
        }
        return View::make('admin.auth.login');
    }

    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 'admin', 'status' => 0, 'is_delete' => 0], $remember))
        {
            return redirect('admin/dashboard')->with('preloaderPage', true);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 'user1', 'status' => 0, 'is_delete' => 0], $remember))
        {
            return redirect('user/dashboard')->with('preloaderPage', true);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 'user2', 'status' => 0, 'is_delete' => 0], $remember))
        {
            return redirect('user/dashboard')->with('preloaderPage', true);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 'user3', 'status' => 0, 'is_delete' => 0], $remember))
        {
            return redirect('user/dashboard')->with('preloaderPage', true);
        }
        return redirect()->back()->with('error', "Please enter correct email and password");
    }

    public function logout_admin()
    {
        Auth::logout();
        return redirect('/');
    }
}
