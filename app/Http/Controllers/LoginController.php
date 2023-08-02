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
        // get administrator table value
        $user = Administrator::get();

        // loop administrator table value and check login account
        foreach($user as $val) {
            if($request->username === $val->username) {
                if($request->password === Crypt::decrypt($val->password)) {
                    dd('Login Berhasil');
                }
            }
        }

        $user = "";

        return Redirect::back()->withErrors(['msg' => '<strong>Login Gagal!</strong> Username atau Password tidak sesuai']);
    }

}
