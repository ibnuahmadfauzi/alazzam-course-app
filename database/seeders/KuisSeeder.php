<?php

namespace Database\Seeders;

use App\Models\Kuis;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KuisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kuis::truncate();
        DB::table('kuis')->insert([
            'kuis_id'       => 'K' . rand(00000, 99999),
            'judul_kuis'    => 'Quiz simple present tense - 1',
            'durasi'        => 60,
            'status'        => 'tidak aktif',
            'password'      => Crypt::encrypt('administrator'),
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('kuis')->insert([
            'kuis_id'       => 'K' . rand(00000, 99999),
            'judul_kuis'    => 'Quiz simple present tense - 2',
            'durasi'        => 60,
            'status'        => 'tidak aktif',
            'password'      => Crypt::encrypt('administrator'),
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('kuis')->insert([
            'kuis_id'       => 'K' . rand(00000, 99999),
            'judul_kuis'    => 'Quiz simple present tense - 3',
            'durasi'        => 60,
            'status'        => 'tidak aktif',
            'password'      => Crypt::encrypt('administrator'),
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('kuis')->insert([
            'kuis_id'       => 'K' . rand(00000, 99999),
            'judul_kuis'    => 'Quiz simple present tense - 4',
            'durasi'        => 60,
            'status'        => 'tidak aktif',
            'password'      => Crypt::encrypt('administrator'),
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
