<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifEmail;
use App\Models\RekapAbsen;
use PDF;
use Excel;
use App\Exports\RekapAbsenExport;

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
    public function absensi()
    {
        $data['users'] = User::where('role_id', 1)->orWhere('role_id', 2)->get();
        return view('admin.absensi')->with($data);
    }
    public function sentMail()
    {
        $users = User::where('role_id', 1)->orWhere('role_id', 2)->get();
        foreach ($users as $key => $user) {
            if(!$user->absensi){
                Mail::to($user->email)->queue(new NotifEmail($user));
            }
        }
        return redirect()->back();
    }
    public function simpanAbsen(Request $request)
    {
        $users = User::where('role_id', 1)->orWhere('role_id', 2)->get();
        foreach($users as $user){
            if(!$user->absensi){
                RekapAbsen::create([
                    'status' => 'Alfa',
                    'keterangan' => null,
                    'tanggal' => date("Y-m-d"),
                    'user_id' => $user->id
                ]);
            }else{
                RekapAbsen::create([
                    'status' => $user->absensi->status,
                    'keterangan' => $user->absensi->keterangan,
                    'tanggal' => date("Y-m-d"),
                    'user_id' => $user->id
                ]);
            }
        }
        return redirect()->back();
    }
    public function rekapAbsen()
    {
        $data['rekaps'] = RekapAbsen::all();
        return view('admin.rekap')->with($data);
    }
    public function printRekapAbsen()
    {
        $rekaps = RekapAbsen::all();
        $pdf = PDF::loadview('admin.print_rekap_absen', ['rekaps' => $rekaps]);
        return $pdf->download('data_absensi.pdf');
    }
    public function exportRekapAbsen()
    {
        return Excel::download(new RekapAbsenExport, 'rekap_absen.xlsx');
    }
    
}
