<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) || Auth::attempt(['username' => $request->email, 'password' => $request->password] )){
            if(Auth::user()->role_id != 3){
                $request->session()->regenerate();
                return redirect('/home');
            }else{
                $request->session()->regenerate();
                return redirect('/dashboard');
            }
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
