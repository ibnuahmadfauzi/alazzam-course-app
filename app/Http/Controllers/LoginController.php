<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Orangtua;
use App\Models\Pengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function index()
    {
        // Start Session
        session_start();

        // Check if the user is logged in
        if(isset($_SESSION['login'])) {
            if($_SESSION['login']) {
                return redirect('/dashboard');
            }
        }

        return view('pages.login.index');
    }

    public function loginProcess(Request $request)
    {
        // Start Session
        session_start();

        // get administrator table value
        $user = Administrator::get();

        // loop administrator table value and check login account
        foreach($user as $val) {
            if($request->username === $val->username) {
                if($request->password === Crypt::decrypt($val->password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['account_role'] = 'administrator';
                    $_SESSION['account_id'] = $val->administrator_id;
                    return redirect('/dashboard');
                }
            }
        }

        // get siswa table value
        $user = Siswa::get();

        // loop siswa table value and check login account
        foreach($user as $val) {
            if($request->username === $val->username) {
                if($request->password === Crypt::decrypt($val->password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['account_role'] = 'siswa';
                    $_SESSION['account_id'] = $val->siswa_id;
                    return redirect('/dashboard');
                }
            }
        }

        // get pengajar table
        $user = Pengajar::get();

        // loop pengajar table value and check login account
        foreach($user as $val) {
            if($request->username === $val->username) {
                if($request->password === Crypt::decrypt($val->password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['account_role'] = 'pengajar';
                    $_SESSION['account_id'] = $val->pengajar_id;
                    return redirect('/dashboard');
                }
            }
        }

        // get orang tua table
        $user = Orangtua::get();

        // loop orangtua table value and check login account
        foreach($user as $val) {
            if($request->username === $val->username) {
                if($request->password === Crypt::decrypt($val->password)) {
                    $_SESSION['login'] = true;
                    $_SESSION['account_role'] = 'orangtua';
                    $_SESSION['account_id'] = $val->orangtua_id;
                    return redirect('/dashboard');
                }
            }
        }

        $user = "";

        return Redirect::back()->withErrors(['msg' => '<div class="alert alert-danger"><strong>Login Gagal!</strong> Username atau Password tidak sesuai</div>']);
    }

    public function logoutProcess()
    {
        // Start Session
        session_start();

        // Delete All Session
        session_destroy();

        return redirect('/login')->withErrors(['msg' => '<div class="alert alert-info"><strong>Logout Berhasil!</strong> Silahkan isi Username dan Password untuk masuk kembali</div>']);
    }

}
