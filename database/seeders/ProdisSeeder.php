<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class ProdisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodis = ['Teknik Informatika' , 'Teknik Sipil', 'Teknik Industri',
        'Agri Bisnis' , 'Agro Teknologi' , 'Administrasi Bisnis Internasional',
        'Ekonomi Syariah' , 'Perbankan Syariah' , 'Akuntansi Syariah',
        'Pendidikan Sastra dan Bahasa Indonesia',
                 'Pendidikan Pancasila dan Kewarganegaraan',
                 'Pendidikan Matematika',
                 'Pendidikan Jasmani Kesehatan dan Rekreasi',
                 'Pendidikan Bahasa Inggris'];
        foreach($prodis as $prodi){
            DB::table('prodis')->insert([
                'nama_prodi' => $prodi
            ]);
        }

    }
}