<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user(){
        $users = Users::where('role','mahasiswa')->get();
        return view('home.admin.index', ['users'=>$users]);
    }
    public function users(){
        $users = Users::where('role','mahasiswa')->get();
        return view('home.admin.users', ['users'=>$users]);
    }
    
}
