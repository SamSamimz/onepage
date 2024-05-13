<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //__Index
    public function index() {
        return view('auth.login');
    }

    //__Store 
    public function store(LoginPost $request) {
        if(Auth::attempt($request->validated())) {
            return Redirect::route('home');
        }else {
            return back()->with('invalid','Invalid Credentials');
        }
    }

}
