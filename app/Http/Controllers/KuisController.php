<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KuisController extends Controller
{

    public function index()
    {
        // Start Session
        session_start();

        // Check if the user is logged in
        if(isset($_SESSION['login'])) {
            if($_SESSION['login']) {
                $data_kuis = Kuis::orderBy('id', 'desc')->get();
                return view('pages.kuis.index', [
                    'data_kuis' => $data_kuis,
                ]);
            }
        }

        // Check if the user is not logged in
        return redirect('/login')->withErrors(['msg' => '<div class="alert alert-danger"><strong>Akses Gagal!</strong> silahkan login terlebih dahulu</div>']);
    }

    public function store(Request $request)
    {

        // Store kuis data from request
        Kuis::create([
            'kuis_id'       => 'K' . rand(00000, 99999),
            'judul_kuis'    => $request->judul_kuis,
            'durasi'        => $request->durasi,
            'status'        => 'tidak aktif',
            'password'      => Crypt::encrypt($request->password),
        ]);

        // return to kuis page
        return redirect('/kuis')->withErrors(['msg' => '<div class="alert alert-info">Data kuis <strong>berhasil ditambahkan!</strong></div>']);
    }

    public function destroy(Request $request)
    {
        Kuis::where('id', $request->id)->delete();

        // return to kuis page
        return redirect('/kuis')->withErrors(['msg' => '<div class="alert alert-info">Data kuis <strong>berhasil dihapus!</strong></div>']);
    }

}
