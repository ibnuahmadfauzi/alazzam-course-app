<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::truncate();
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Amalia Mulyani',
            'username'          => 'amaliamulyani',
            'password'          => Crypt::encrypt('siswa@semangats'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Emin Firmansyah',
            'username'          => 'eminfirmansyah',
            'password'          => Crypt::encrypt('siswa@semangats'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Juli Pratiwi',
            'username'          => 'julipratiwi',
            'password'          => Crypt::encrypt('siswa@semangats'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Wahyu Waskita',
            'username'          => 'wahyuwaskita',
            'password'          => Crypt::encrypt('siswa@semangats'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Asman Prakasa',
            'username'          => 'asmanprakasa',
            'password'          => Crypt::encrypt('siswa@semangats'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
