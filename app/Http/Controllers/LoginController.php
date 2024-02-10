<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
{
    $data = [ 'email' => $request->input('email'),
               'password' => $request->input('password'),
    ];

    if (Auth::Attempt($data)) {
        return redirect('home');
    }else{
        // Use withErrors() method to flash the error message
        return redirect('/')->withErrors(['error' => 'Email atau Password Salah']);
    }
}


public function actionlogout()
{
    Auth::logout();
    return redirect('/');
}
}