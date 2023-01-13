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
            $request->session()->regenerate();
            return redirect('/home');
        }
    }

    public function register(){
        return view('auth.register');
    }

    public function postregister(Request $request){
    $this->validate($request, [
        'name'=>'required',
        'email'=>'required|email:dns',
        'password'=>'required'
        
    ]);

    $user=new \App\Models\User;
    $user->role='admin';
    $user->name= $request->name;
    $user->email= $request->email;
    $user->password= bcrypt($request->password);
    $user->save();
    return redirect('/');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
