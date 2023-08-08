<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Nilai;
use App\Models\Orangtua;
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
            $komentar = Komentar::where('siswa_id', $_SESSION["account_id"])->pluck('komentar')->first();
            foreach($data_nilai as $nilai) {
                $jumlah_data += $nilai->nilai;
            }
            $rata_rata = floatval(number_format((float)$jumlah_data / count($data_nilai), 2, '.', ''));
            return view('pages.nilai.index', [
                'data_nilai'    => $data_nilai,
                'nama_siswa'    => $nama_siswa,
                'rata_rata'     => $rata_rata,
                'jumlah_nilai'  => $jumlah_data,
                'komentar'      => $komentar,
            ]);
        }

        if($_SESSION["account_role"] == "orangtua") {
            $data_orangtua = Orangtua::firstWhere('orangtua_id', $_SESSION['account_id']);
            $siswa_id = Siswa::firstWhere('id', $data_orangtua->siswa_id);
            $data_nilai = Nilai::where('siswa_id', $siswa_id->siswa_id)->get();
            $nama_siswa = Siswa::firstWhere('siswa_id', $siswa_id->siswa_id);
            $jumlah_data = 0;
            $komentar = Komentar::where('siswa_id', $siswa_id->siswa_id)->pluck('komentar')->first();
            foreach($data_nilai as $nilai) {
                $jumlah_data += $nilai->nilai;
            }
            $rata_rata = floatval(number_format((float)$jumlah_data / count($data_nilai), 2, '.', ''));
            return view('pages.nilai.index', [
                'data_nilai'    => $data_nilai,
                'nama_siswa'    => $nama_siswa,
                'rata_rata'     => $rata_rata,
                'jumlah_nilai'  => $jumlah_data,
                'komentar'      => $komentar
            ]);
        }

        if($_SESSION["account_role"] == "administrator" || $_SESSION["account_role"] == "pengajar") {
            $data_siswa = Siswa::all();
            return view('pages.nilai.index-nilai',[
                'data_siswa'    => $data_siswa,
            ]);
        }


    }

    public function nilaiDetail(Request $request)
    {
        session_start();
        $data_nilai = Nilai::where('siswa_id', $request->siswa_id)->get();
        $nama_siswa = Siswa::firstWhere('siswa_id', $request->siswa_id);
        $jumlah_data = 0;
        foreach($data_nilai as $nilai) {
            $jumlah_data += $nilai->nilai;
        }
        $rata_rata = $jumlah_data == 0 ? 0 : floatval(number_format((float)$jumlah_data / count($data_nilai), 2, '.', ''));
        $komentar = Komentar::where('siswa_id', $request->siswa_id)->pluck('komentar')->first();
        return view('pages.nilai.index', [
            'data_nilai'    => $data_nilai,
            'nama_siswa'    => $nama_siswa,
            'rata_rata'     => $rata_rata,
            'jumlah_nilai'  => $jumlah_data,
            'komentar'      => $komentar
        ]);
    }

}
