<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $this->validate($request, [
            'sss' => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('sss'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        if (Auth::attempt([
            $login_type => $request->input('sss'),
            'password' =>$request->input('password')
        ])) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $validateData = $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        User::create($validateData);
        return redirect(route('login'))->with("success", "Registration success, Login to access the app");
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
