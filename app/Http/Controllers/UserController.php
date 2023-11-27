<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view('auth.reg');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'

        ]);

        $formFields['password'] = Hash::make($formFields['password']);


        $user = User::create($formFields);

        auth()->login($user);

        return redirect()->route('dashboard')->with('message', 'Your account has been created');
    }


    public function loginUser(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {


            if (auth()->user()->role_id == 0) {
                return redirect()->route('admin-dashboard');
            } else {
                return redirect('dashboard');
            }
        } else {
            return back()->with('fail', 'Password or email is wrong');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }
}
