<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signin()
    {
        return view('auth.login');
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email_regex',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/');
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Invalid login or password.');
    }

    public function signup()
    {
        return view('auth.register');
    }

    /**
     * Register
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email_regex|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user, $request->has('remember'));

        return redirect('/');
    }

    /**
     * Logout
     */
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function resetPassword()
    {
        return view('auth.reset_password');
    }

    /**
     * Send email with reset password link
     * 
     * (you must change smtp porperties in .env file to send the reset email)
     */
    public function sendResetLinkEmail(Request $request)
    {
        /*
        $validator = Validator::make($request->all(), [
            'email' => 'required|email_regex',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $response = Password::sendResetLink($request->only('email'));

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));
            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }*/

        return redirect()->back()->with('error', 'this feature is not yet implemented');
    }
}
