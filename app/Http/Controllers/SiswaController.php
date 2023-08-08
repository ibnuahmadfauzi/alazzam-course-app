<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    public function index()
    {
        // Start session
        session_start();

        // get all siswa data
        $data_siswa = Siswa::all();

        return view('pages.siswa.index', [
            'data_siswa'    => $data_siswa,
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
            return redirect('/siswa')->withErrors(['msg' => '<div class="alert alert-danger">Data siswa <strong>gagal ditambahkan! </strong>"password harus minimal 8 karakter, mengandung huruf BESAR, huruf kecil, angka, dan karakter kusus"</div>']);
        }

        // Store kuis data from request
        Siswa::create([
            'siswa_id'      => 'S' . rand(00000, 99999),
            'nama_siswa'    => $request->nama_siswa,
            'username'      => $request->username,
            'password'      => Crypt::encrypt($request->password),
        ]);

        // return to kuis page
        return redirect('/siswa')->withErrors(['msg' => '<div class="alert alert-info">Data siswa <strong>berhasil ditambahkan!</strong></div>']);
    }

    public function destroy(Request $request)
    {
        Siswa::where('id', $request->id)->delete();

        // return to kuis page
        return redirect('/siswa')->withErrors(['msg' => '<div class="alert alert-info">Data siswa <strong>berhasil dihapus!</strong></div>']);
    }

    public function update(Request $request)
    {

        $pass = $request->password;
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);
        $regex = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass);

        if(!$uppercase || !$lowercase || !$number || !$regex || strlen($pass) <= 7){
            return redirect('/siswa')->withErrors(['msg' => '<div class="alert alert-danger">Data siswa <strong>gagal diperbarui! </strong>"password harus minimal 8 karakter, mengandung huruf BESAR, huruf kecil, angka, dan karakter kusus"</div>']);
        }


        Siswa::where('siswa_id', $request->siswa_id)
        ->update([
            'nama_siswa'    => $request->nama_siswa,
            'username'      => $request->username,
            'password'      => Crypt::encrypt($request->password),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect("/siswa")->withErrors(['msg' => '<div class="alert alert-info">Data siswa <strong>berhasil diperbarui!</strong></div>']);
    }
}
