<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Karyawan;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function dosen()
    {
        $data['dosens'] = Dosen::all();
        return view('admin.dosen')->with($data);
    }
    public function karyawan()
    {
        $data['karyawans'] = Karyawan::all();
        return view('admin.karyawan')->with($data);
    }
}
