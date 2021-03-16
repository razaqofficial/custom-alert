<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     */
    public function doLogin(LoginRequest $request)
    {
        if ($this->guard()->attempt($request->only('email', 'password'))) {
            return redirect()->intended(route('alert.index'))->with('success', 'Welcome');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        $this->guard()->logout();

        return back()->with('success', 'Logout successfully');
    }


    private function guard()
    {
        return Auth::guard('web');
    }
}
