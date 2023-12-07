<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        session()->flash(
            'link',
            session()->has('link') ? session('link') : url()->previous()
        );
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }
        session()->flash('link', session('link'));
        return redirect()->back()->with('error', 'Email or password is incorrect');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        $request->merge([
            'password' => bcrypt($request->password),
        ]);
        $user = User::create($request->all());
        // dd($user);
        session()->flash(
            'link',
            route('index')
        );
        return redirect()->route('auth.login')->with('success', 'User created successfully');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
