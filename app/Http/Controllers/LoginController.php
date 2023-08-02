<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function index()
    {
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
                    dd('Login Berhasil | ' . $_SESSION['account_role'] . ' | ' . $_SESSION['account_id']);
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

        return Redirect::back()->withErrors(['msg' => '<div class="alert alert-info"><strong>Logout Berhasil!</strong> Silahkan isi Username dan Password untuk masuk kembali</div>']);
    }

}
