<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index()
    {
        $data['absen'] = Absensi::where('user_id', Auth::user()->id)->first();
        return view('home.index')->with($data);
    }

    public function absensi(Request $request)
    {
        $this->validate($request, [
            'status'=>'required',
        ]);
        $notification = array(
            'message' => 'Absen Berhasil',
            'alert-type' => 'success'
        );
        Absensi::create($request->all());
        return redirect()->back()->with($notification);
    }
}