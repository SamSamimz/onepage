<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //__Public function Register
    public function index() {
        return view('auth.register');
    }

    public function store(RegisterPost $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if(Auth::attempt($request->only(['email','password']))) {
            return redirect()->route('home');
        }else {
            return redirect()->back()->with('invalid', 'Invalid username or password');
        }
    }
}
