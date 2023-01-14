<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapAbsen extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function export($tanggal)
    {
        if($tanggal != null) {
            $rekaps = RekapAbsen::whereDate('created_at', $tanggal)->get();
        }else{
            $rekaps = RekapAbsen::all();
        }
        $rekaps_filter = [];
        foreach($rekaps as $no => $rekap){
            if ($rekap->user->role_id == 1){
                $nama = $rekap->user->dosen->nama;
            }elseif($rekap->user->role_id == 2){
                $nama = $rekap->user->karyawan->nama;
            }
            $rekaps_filter[$no]['No'] = $no+1;
            $rekaps_filter[$no]['Nama'] = $nama;
            $rekaps_filter[$no]['Status'] = $rekap->status;
            $rekaps_filter[$no]['Keterangan'] = $rekap->keterangan;
            $rekaps_filter[$no]['Tanggal'] = $rekap->tanggal;
        }
        return $rekaps_filter;
    }
}
