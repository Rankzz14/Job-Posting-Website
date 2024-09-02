<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Show Register/Create Form
    public function  create()
    {
        return view('users.register');
    }

    //Store New User
    public function store(Request $request)
    {
        $formFields =  $request->validate([
            'name' =>  ['required', 'min:3'],
            'email' =>  'required|email|unique:users',
            'password' =>  'required|min:8',
            'confirm_password' =>  'required|same:password',
        ], [
            'email.unique' => 'Email address already in use.'
        ]);

        //Hash Password
        $formFields['password'] = Hash::make($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('success', 'User created and logged in Successfully!');
    }

    public function logout(Request $request)
    {
        if (auth()->check()) {
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'User has logged  out successfully!');
        } else {
            // Handle unauthorized logout attempt
        }
    }

    public function login()
    {
        return view('users.login');
    }
    //authenticates user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' =>  'required|email|exists:users',
            'password' =>  'required|min:8',
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'User logged in successfully!');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing
