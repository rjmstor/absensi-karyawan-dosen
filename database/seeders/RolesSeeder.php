<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama_role' => 'Dosen'],
            ['nama_role' => 'Karyawan'],
            ['nama_role' => 'Admin']
        ];
        DB::table('roles')->insert($data);
    }
}
