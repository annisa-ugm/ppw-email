<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:250',
        'email' => 'required|email|max:250|unique:users',
        'password' => 'required|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Berikut adalah data yang akan dikirimkan ke email
    $data = [
        'name' => $user->name,
        'email' => $user->email,
        'subject' => 'Welcome to Our Website',
        'body' => 'Terima kasih telah mendaftar, ' . $user->name . '!',
    ];

    dispatch(new \App\Jobs\SendMailJob($data));

    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
}


    public function login()
    {
        return view('auth.login');
    }


    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('buku.index')
            ->with('success', 'You have been logged in!');
    }

    return back()->withErrors([
        'email' => 'Your provided credentials do not match our records.',
    ])->onlyInput('email');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
        ->withSuccess('You have logged out successfully!');
    }
}
