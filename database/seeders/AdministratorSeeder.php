<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::truncate();
        DB::table('administrator')->insert([
            'administrator_id'  => 'A' . rand(00000, 99999),
            'username'          => 'administrator',
            'password'          => Crypt::encrypt('administrator'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
