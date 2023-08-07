<?php

namespace Database\Seeders;

use App\Models\Pengajar;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengajar::truncate();
        DB::table('pengajar')->insert([
            'pengajar_id'       => 'P' . rand(00000, 99999),
            'nama_pengajar'     => 'Zelaya Hartati',
            'username'          => 'hartati',
            'password'          => Crypt::encrypt('pengajar123'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
