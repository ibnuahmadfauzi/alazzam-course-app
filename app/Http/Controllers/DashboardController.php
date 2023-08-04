<?php

namespace App\Http\Controllers;

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
                return view('pages.dashboard.index');
            }
        }

        // Check if the user is not logged in
        return redirect('/login')->withErrors(['msg' => '<div class="alert alert-danger"><strong>Akses Gagal!</strong> silahkan login terlebih dahulu</div>']);
    }

}
