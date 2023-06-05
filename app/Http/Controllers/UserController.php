<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $userData = $request->validate([
            'name' => ['required', 'max:40'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required','min:8', 'max:25', 'confirmed'],
            'password_confirmation' => ['required']
        ]);
        

        $userData['password'] = bcrypt($userData['password']);
        $user = User::create($userData);
        return redirect('/')->with('success', 'Registration Success');
    }

    public function login(Request $request){
        $userData = $request->validate([
            'loginemail' => ['required', 'email'],
            'loginpassword' => ['required','min:8','max:25']
        ]);

        if(auth()->attempt([
            'email' => $userData['loginemail'],
            'password' => $userData['loginpassword']
        ])){
            return redirect('/')->with('success', 'Login Success');
        }
        return redirect('/')->with('error', 'Login Failed');
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'Logout Success');
    }
}
