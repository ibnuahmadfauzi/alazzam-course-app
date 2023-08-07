<?php

namespace App\Http\Controllers;

use App\Models\Orangtua;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class OrangtuaController extends Controller
{

    public function index()
    {
        session_start();
        $data_orangtua = DB::table('orangtua')
        ->join('siswa', 'orangtua.siswa_id', '=', 'siswa.id')
        ->select('orangtua.*', 'siswa.nama_siswa', 'siswa.id')
        ->get();
        $data_siswa = Siswa::all();
        return view('pages.orangtua.index',[
            'data_orangtua' => $data_orangtua,
            'data_siswa'    => $data_siswa,
        ]);
    }

    public function store(Request $request)
    {
        // Start session
        session_start();

        // Store kuis data from request
        Orangtua::create([
            'orangtua_id'   => 'O' . rand(00000, 99999),
            'siswa_id'      => $request->siswa_id,
            'username'      => $request->username,
            'password'      => Crypt::encrypt($request->password),
        ]);

        // return to kuis page
        return redirect('/orangtua')->withErrors(['msg' => '<div class="alert alert-info">Data orangtua <strong>berhasil ditambahkan!</strong></div>']);
    }

    public function destroy(Request $request)
    {
        Orangtua::where('orangtua_id', $request->id)->delete();

        // return to kuis page
        return redirect('/orangtua')->withErrors(['msg' => '<div class="alert alert-info">Data orang tua <strong>berhasil dihapus!</strong></div>']);
    }

    public function update(Request $request)
    {
        Orangtua::where('orangtua_id', $request->orangtua_id)
        ->update([
            'siswa_id'      => $request->siswa_id,
            'username'      => $request->username,
            'password'      => Crypt::encrypt($request->password),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect("/orangtua")->withErrors(['msg' => '<div class="alert alert-info">Data orangtua <strong>berhasil diperbarui!</strong></div>']);
    }

}
