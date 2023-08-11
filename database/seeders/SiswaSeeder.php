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
            'nama_siswa'        => 'Mohammad Deo Lorensa',
            'username'          => 'deolorensa',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Aga Krisnawan',
            'username'          => 'agakrisnawan',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Ari Cahyo Khamartya',
            'username'          => 'aricahyo',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Farhan Faisal',
            'username'          => 'farhanfaisal',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Mariatul Hasana',
            'username'          => 'mariatulhasana',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Bella Oktavia',
            'username'          => 'bellaoktavia',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Reja Bagus Saputra',
            'username'          => 'rejabagus',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Vinda Dwi Azhari',
            'username'          => 'vindadwi',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Indra Lestari',
            'username'          => 'indralestari',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Dewi Candra',
            'username'          => 'dewicandra',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Rizky Eidia Pratama',
            'username'          => 'rizkyediapratama',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('siswa')->insert([
            'siswa_id'          => 'S' . rand(00000, 99999),
            'nama_siswa'        => 'Diana Yunita Sari',
            'username'          => 'dianayunita',
            'password'          => Crypt::encrypt('Siswa@12345678'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
