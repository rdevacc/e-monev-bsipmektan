<?php

namespace App\Http\Controllers;

use App\Mail\EmonevMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/app/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/app/login');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function forgot_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => "Email field is required, cannot be blank value!",
        ]);

        $user_data = User::where('email', $request->email)->first();

        if (!$user_data) {
            return back()->with('error', 'Email Address Not Found!');
        }

        $token = hash('sha256', time());

        $user_data->reset_token = $token;
        $user_data->update();

        $reset_link = url('/app/reset-password/' . $token);
        $subject = "Reset Password";
        $message = "Please Click on the Following Link to reset password: <br>";
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        Mail::to($request->email)->send(new EmonevMail($subject, $message));

        return redirect()->route('login')->with('success', 'Check your email address!');
    }

    public function reset_password($token)
    {
        $data = User::where('reset_token', $token)->first();

        if (!$data) {
            return redirect()->route('login');
        }

        return view('auth.reset_password', [
            'reset_token' => $token,
        ]);
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ], [
            'password.required' => "Password field is required, cannot be blank value!",
            'retype_password.required' => "Retype Password field is required, cannot be blank value!",
            'retype_password.same' => "Password not match!",
        ]);

        $user_data = User::where('reset_token', $request->reset_token)->first();
        $user_data->password = Hash::make($request->password);
        $user_data->reset_token = '';
        $user_data->update();

        return redirect()->route('login')->with('success', 'Password reset is successfully!');
    }
}
