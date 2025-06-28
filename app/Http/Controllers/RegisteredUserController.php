<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'userName'   => 'required|string|max:80|unique:users,username',
            'firstName'  => 'required|string|max:255',
            'lastName'   => 'required|string|max:255',
            'dob'        => 'required|date',
            'email'      => 'required|email|max:255|unique:users,email',
            'password1'  => 'required|string|min:7|max:20',
            'password2'  => 'required|string|same:password1',
            'userType'   => 'required|in:swimmer,coach',
            'phone'      => 'required|string|max:40',
            'address'    => 'required|string|max:255',
            'postcode'   => 'required|string|max:20',
        ]);

        try {
            $user = User::create([
                'username'  => $validated['userName'],
                'forename'  => $validated['firstName'],
                'surname'   => $validated['lastName'],
                'dob'       => $validated['dob'],
                'email'     => $validated['email'],
                'password'  => Hash::make($validated['password1']),
                'phone'     => $validated['phone'],
                'address'   => $validated['address'],
                'postcode'  => $validated['postcode'],
                'role'      => $validated['userType'],
            ]);

            Auth::login($user);

            return redirect('/')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
