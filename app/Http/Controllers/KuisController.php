<?php

namespace App\Http\Controllers;

use App\Models\Kuis;
use App\Models\Soal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Whoops\Run;

class KuisController extends Controller
{

    public function index()
    {
        // Start Session
        session_start();

        // Check if the user is logged in
        if(isset($_SESSION['login'])) {
            if($_SESSION['login']) {
                if($_SESSION['account_role'] === 'administrator') {
                    $data_kuis = Kuis::orderBy('id', 'desc')->get();
                    return view('pages.kuis.index', [
                        'data_kuis' => $data_kuis,
                    ]);
                } else {
                    $data_kuis = Kuis::orderBy('id', 'desc')->where('status', 'aktif')->get();
                    return view('pages.kuis.index-siswa', [
                        'data_kuis' => $data_kuis,
                    ]);
                }
            }
        }

        // Check if the user is not logged in
        return redirect('/login')->withErrors(['msg' => '<div class="alert alert-danger"><strong>Akses Gagal!</strong> silahkan login terlebih dahulu</div>']);
    }

    public function edit($kuisId)
    {
        // Start Session
        session_start();

        // Check if the user is logged in
        if(isset($_SESSION['login'])) {
            if($_SESSION['login']) {
                $data_kuis = Kuis::firstWhere('kuis_id', $kuisId);
                $semua_soal = DB::table('soal')
                    ->join('kuis', 'kuis.id', '=', 'soal.kuis_id')
                    ->select('soal.*')
                    ->get();
                $data_soal = $semua_soal->where('kuis_id', $data_kuis->id);
                return view('pages.kuis.edit', [
                    'data_kuis' => $data_kuis,
                    'data_soal' => $data_soal,
                ]);
            }
        }
    }

    public function update(Request $request)
    {
        Kuis::where('id', $request->id)
            ->update([
                'judul_kuis'    => $request->judul_kuis,
                'durasi'        => $request->durasi,
                'status'        => $request->status,
                'password'      => Crypt::encrypt($request->password),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

        return redirect("/kuis/$request->kuisId/edit")->withErrors(['msg' => '<div class="alert alert-info">Data kuis <strong>berhasil diperbarui!</strong></div>']);
    }

    public function soalUpdate(Request $request)
    {
        Soal::where('id', $request->soal_id)
        ->update([
            'kuis_id'       => $request->id,
            'soal'          => $request->soal,
            'jawaban_1'     => $request->jawaban_1,
            'jawaban_2'     => $request->jawaban_2,
            'jawaban_3'     => $request->jawaban_3,
            'jawaban_4'     => $request->jawaban_4,
            'jawaban_5'     => $request->jawaban_5,
            'jawaban_benar' => $request->jawaban_benar,
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect("/kuis/$request->kuis_id/edit")->withErrors(['msg' => '<div class="alert alert-info">Data soal <strong>berhasil diperbarui!</strong></div>']);
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

    public function soalStore(Request $request)
    {
        // Store soal data from request
        Soal::create([
            'soal_id'       => 'S' . rand(00000, 99999),
            'kuis_id'       => $request->id,
            'soal'          => $request->soal,
            'jawaban_1'     => $request->jawaban_1,
            'jawaban_2'     => $request->jawaban_2,
            'jawaban_3'     => $request->jawaban_3,
            'jawaban_4'     => $request->jawaban_4,
            'jawaban_5'     => $request->jawaban_5,
            'jawaban_benar' => $request->jawaban_benar,
        ]);

        return redirect("/kuis/$request->kuis_id/edit")->withErrors(['msg' => '<div class="alert alert-info">Soal baru <strong>berhasil ditambahkan!</strong></div>']);
    }

    public function destroy(Request $request)
    {
        Kuis::where('id', $request->id)->delete();

        // return to kuis page
        return redirect('/kuis')->withErrors(['msg' => '<div class="alert alert-info">Data kuis <strong>berhasil dihapus!</strong></div>']);
    }

    public function soalDestroy(Request $request)
    {
        Soal::where('id', $request->id)->delete();

        // return to kuis page
        return redirect("/kuis/$request->kuis_id/edit")->withErrors(['msg' => '<div class="alert alert-info">Data soal <strong>berhasil dihapus!</strong></div>']);
    }

    public function playKuis(Request $request)
    {
        session_start();

        $kuis = Kuis::where('id', $request->id)->get();
        foreach ($kuis as $val) {
            if(Crypt::decrypt($val->password) === $request->password) {
                $data_kuis = Kuis::firstWhere('id', $request->id);
                $semua_soal = DB::table('soal')
                    ->join('kuis', 'kuis.id', '=', 'soal.kuis_id')
                    ->select('soal.*')
                    ->get();
                $data_soal = $semua_soal->where('kuis_id', $data_kuis->id);
                return view('pages.kuis.play', [
                    'data_kuis' => $data_kuis,
                    'data_soal' => $data_soal,
                ]);
            }
        }

        // return to kuis page
        return redirect("/kuis")->withErrors(['msg' => '<div class="alert alert-danger"><strong>Gagal akses!</strong> password yang kamu gunakan tidak sesuai</div>']);
    }

    public function playKuisSubmit(Request $request)
    {
        $semua_soal = Soal::get();
        $count = 1;
        $trueAnswer = 0;
        $my_looping = true;
        while($my_looping) {
            if(isset($request["id_soal_ke_$count"])) {
                foreach($semua_soal as $soal) {
                    if($soal->id == $request["id_soal_ke_$count"]) {
                        if($soal->jawaban_benar == $request["jawaban_soal_ke_$count"]) {
                            $trueAnswer++;
                        }
                    }
                }
            } else {
                $my_looping = false;
            }
            $count++;
        }
        $soalCount = $count;
        $score = (100 / $soalCount) * $trueAnswer;
        dump($soalCount);
        dump($trueAnswer);
        dump($score);
        dump($request->judul_kuis);
        dump($request->siswa_id);
    }

}
