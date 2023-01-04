<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\User;
class AdminController extends Controller
{
    public function user(){
        $users = Users::where('role','dosen')->get();
        return view('home.admin.index', ['users'=>$users]);
    }
    public function users(){
        $users = Users::where('role','dosen')->get();
        return view('home.admin.users', ['users'=>$users]);
    }
    public function prodi(){
        $prodi=Prodi::all();
        return view('home.admin.prodi', ['prodi'=>$prodi]);
    }
    
}
