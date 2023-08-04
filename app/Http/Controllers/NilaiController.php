<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{

    public function index()
    {
        session_start();

        if($_SESSION["account_role"] == "siswa") {
            $data_nilai = Nilai::where('siswa_id', $_SESSION["account_id"])->get();
            $nama_siswa = Siswa::firstWhere('siswa_id', $_SESSION["account_id"]);
            $jumlah_data = 0;
            foreach($data_nilai as $nilai) {
                $jumlah_data += $nilai->nilai;
            }
            $rata_rata = floatval(number_format((float)$jumlah_data / count($data_nilai), 2, '.', ''));
            return view('pages.nilai.index', [
                'data_nilai'    => $data_nilai,
                'nama_siswa'    => $nama_siswa,
                'rata_rata'     => $rata_rata,
                'jumlah_nilai'  => $jumlah_data,
            ]);
        }


    }

}
