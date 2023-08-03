<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->string('soal_id', 6)->unique();
            $table->string('kuis_id', 6);
            $table->string('soal');
            $table->string('jawaban_1');
            $table->string('jawaban_2');
            $table->string('jawaban_3');
            $table->string('jawaban_4');
            $table->string('jawaban_5');
            $table->string('jawaban_benar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal');
    }
}
