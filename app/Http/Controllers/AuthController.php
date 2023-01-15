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
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) || Auth::attempt(['username' => $request->email, 'password' => $request->password] )){
            $notification = array(
                'message' => 'Berhasil Login',
                'alert-type' => 'success'
            );
            if(Auth::user()->role_id != 3){
                $request->session()->regenerate();
                return redirect('/home')->with($notification);
            }else{
                $request->session()->regenerate();
                return redirect('/dashboard')->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Password Atau Username Atau Email Salah',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
