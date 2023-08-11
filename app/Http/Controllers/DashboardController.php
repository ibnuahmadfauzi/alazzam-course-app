<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        // Start Session
        session_start();

        // Check if the user is logged in
        if(isset($_SESSION['login'])) {
            if($_SESSION['login']) {
                $data_siswa = Siswa::all();
                $data_kuis = Kuis::all();
                return view('pages.dashboard.index', [
                    'jumlah_siswa'  => count($data_siswa),
                    'jumlah_kuis'   => count($data_kuis),
                ]);
            }
        }

        // Check if the user is not logged in
        return redirect('/login')->withErrors(['msg' => '<div class="alert alert-danger"><strong>Akses Gagal!</strong> silahkan login terlebih dahulu</div>']);
    }

}
