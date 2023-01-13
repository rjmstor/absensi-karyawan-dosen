<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use Faker\Factory as faker;
use App\Models\Prodi;
class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $users = User::all();
        foreach($users as $user){
            $prodi = Prodi::inRandomOrder()->first();
            if($user->role_id == 1){
                $data = [
                    'nama' => $faker->name,
                    'user_id' => $user->id,
                    'prodi_id' => $prodi->id
                ];
                DB::table('dosens')->insert($data);
            }else{
                $data = [
                    'nama' => $faker->name,
                    'user_id' => $user->id,
                ];
                DB::table('karyawans')->insert($data);
            }

        }
    }
}
