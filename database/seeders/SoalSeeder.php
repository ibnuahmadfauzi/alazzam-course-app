<?php

namespace Database\Seeders;

use App\Models\Soal;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Soal::truncate();
        DB::table('soal')->insert([
            'soal_id'       => 'S' . rand(00000, 99999),
            'kuis_id'       => '1',
            'soal'          => 'I and my friends … in library. We read some books',
            'jawaban_1'     => 'am',
            'jawaban_2'     => 'is',
            'jawaban_3'     => 'have',
            'jawaban_4'     => 'are',
            'jawaban_5'     => 'here',
            'jawaban_benar' => 'jawaban_4',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('soal')->insert([
            'soal_id'       => 'S' . rand(00000, 99999),
            'kuis_id'       => '1',
            'soal'          => 'She … not work because she has flu.',
            'jawaban_1'     => 'is',
            'jawaban_2'     => 'he',
            'jawaban_3'     => 'does',
            'jawaban_4'     => 'do',
            'jawaban_5'     => 'be',
            'jawaban_benar' => 'jawaban_3',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('soal')->insert([
            'soal_id'       => 'S' . rand(00000, 99999),
            'kuis_id'       => '1',
            'soal'          => 'Alina … song every night.',
            'jawaban_1'     => 'sings',
            'jawaban_2'     => 'song',
            'jawaban_3'     => 'sing',
            'jawaban_4'     => 'is',
            'jawaban_5'     => 'does',
            'jawaban_benar' => 'jawaban_1',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('soal')->insert([
            'soal_id'       => 'S' . rand(00000, 99999),
            'kuis_id'       => '2',
            'soal'          => 'My father … tea every morning.',
            'jawaban_1'     => 'drinks',
            'jawaban_2'     => 'drink',
            'jawaban_3'     => 'drinking',
            'jawaban_4'     => 'is',
            'jawaban_5'     => 'does',
            'jawaban_benar' => 'jawaban_1',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('soal')->insert([
            'soal_id'       => 'S' . rand(00000, 99999),
            'kuis_id'       => '2',
            'soal'          => 'She is a student. She … at school.',
            'jawaban_1'     => 'is',
            'jawaban_2'     => 'studying',
            'jawaban_3'     => 'study',
            'jawaban_4'     => 'does',
            'jawaban_5'     => 'studies',
            'jawaban_benar' => 'jawaban_5',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
