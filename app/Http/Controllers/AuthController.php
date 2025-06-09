<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // This will look for resources/views/auth/login.blade.php
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        // 1. Validate the login credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt to authenticate the user
        // Auth::attempt() will try to find a user by 'email' and verify 'password'
        // The second argument `remember()` will store a persistent cookie if checkbox was present
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regeneration of the session ID helps prevent session fixation attacks.
            $request->session()->regenerate();

            // 3. Redirect to the intended page or dashboard on success
            // return redirect()->intended('/dashboard'); // If you have a dashboard route
            return redirect()->intended('/posts')->with('success', 'Logged in successfully!'); // Redirect to posts index

        }

        // 4. If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email'); // Only flash the 'email' input back
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Log out the current user

        // Invalidate the user's session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the homepage or login page
        return redirect('/')->with('success', 'You have been logged out.');
    }
}
