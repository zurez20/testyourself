<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Player;
use App\Models\Agerange;
use App\Models\Question;
use App\Models\Answer;

class Webcontroller extends Controller
{
    public function home()
    {
        return view('web.home');
    }
    public function about()
    {
        return view('web.about');
    }
    public function category()
    {
        return view('web.category');
    }
    public function agegroup()
    {
        return view('web.agegroup');
    }
    public function howtoplay()
    {
        return view('web.howtoplay');
    }
    public function subject()
    {
        return view('web.subject');
    }
    public function registerGet()
    {
        return view('web.register');
    }
    public function loginGet()
    {
        return view('web.login');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:players,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $player = Player::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('player')->login($player);

        return redirect('/agegroup')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
       logger($request->all()); 
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('player')->attempt($credentials)) {
            logger($request);
            logger("logged in");
            $request->session()->regenerate();
            return redirect('/agegroup')->with('success', 'Welcome back!');
        }

        logger($request);
        logger("bhak");
        return back()->withErrors([
            'email' => 'Invalid credentials. Please try again.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('player')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}