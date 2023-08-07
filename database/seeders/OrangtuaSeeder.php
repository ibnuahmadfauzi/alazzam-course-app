<?php

namespace Database\Seeders;

use App\Models\Orangtua;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class OrangtuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orangtua::truncate();
        DB::table('orangtua')->insert([
            'orangtua_id'       => 'O' . rand(00000, 99999),
            'siswa_id'          => 1,
            'username'          => 'orangtua1',
            'password'          => Crypt::encrypt('orangtua'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('orangtua')->insert([
            'orangtua_id'       => 'O' . rand(00000, 99999),
            'siswa_id'          => 2,
            'username'          => 'orangtua2',
            'password'          => Crypt::encrypt('orangtua'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
