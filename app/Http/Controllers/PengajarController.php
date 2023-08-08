<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PengajarController extends Controller
{

    public function index()
    {
        session_start();
        $data_pengajar = Pengajar::orderBy('id', 'asc')->get();
        return view('pages.pengajar.index', [
            'data_pengajar' => $data_pengajar,
        ]);
    }

    public function store(Request $request)
    {
        // Start session
        session_start();

        $pass = $request->password;
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);
        $regex = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass);

        if(!$uppercase || !$lowercase || !$number || !$regex || strlen($pass) <= 7){
            return redirect('/pengajar')->withErrors(['msg' => '<div class="alert alert-danger">Data pengajar <strong>gagal ditambahkan! </strong>"password harus minimal 8 karakter, mengandung huruf BESAR, huruf kecil, angka, dan karakter kusus"</div>']);
        }

        // Store kuis data from request
        Pengajar::create([
            'pengajar_id'    => 'P' . rand(00000, 99999),
            'nama_pengajar' => $request->nama_pengajar,
            'username'      => $request->username,
            'password'      => Crypt::encrypt($request->password),
        ]);

        // return to kuis page
        return redirect('/pengajar')->withErrors(['msg' => '<div class="alert alert-info">Data pengajar <strong>berhasil ditambahkan!</strong></div>']);
    }

    public function destroy(Request $request)
    {
        Pengajar::where('id', $request->id)->delete();

        return redirect('/pengajar')->withErrors(['msg' => '<div class="alert alert-info">Data pengajar <strong>berhasil dihapus!</strong></div>']);
    }

    public function update(Request $request)
    {

        $pass = $request->password;
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);
        $regex = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass);

        if(!$uppercase || !$lowercase || !$number || !$regex || strlen($pass) <= 7){
            return redirect('/pengajar')->withErrors(['msg' => '<div class="alert alert-danger">Data pengajar <strong>gagal diperbarui! </strong>"password harus minimal 8 karakter, mengandung huruf BESAR, huruf kecil, angka, dan karakter kusus"</div>']);
        }

        Pengajar::where('pengajar_id', $request->pengajar_id)
        ->update([
            'nama_pengajar' => $request->nama_pengajar,
            'username'      => $request->username,
            'password'      => Crypt::encrypt($request->password),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect("/pengajar")->withErrors(['msg' => '<div class="alert alert-info">Data pengajar <strong>berhasil diperbarui!</strong></div>']);
    }

}
