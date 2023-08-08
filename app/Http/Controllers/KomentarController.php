<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KomentarController extends Controller
{

    public function update(Request $request)
    {
        $data_komentar = Komentar::all();
        $data_status = false;
        foreach($data_komentar as $val) {
            if($val->siswa_id == $request->siswa_id) {
                $data_status = true;
            }
        }
        if($data_status) {
            Komentar::where('siswa_id', $request->siswa_id)
                ->update([
                    'siswa_id'      => $request->siswa_id,
                    'komentar'      => $request->catata_orangtua,
                    'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                ]);

        } else {
            Komentar::create([
                'komentar_id'   => 'K' . rand(00000, 99999),
                'siswa_id'      => $request->siswa_id,
                'komentar'      => $request->catata_orangtua,
            ]);
        }

        return redirect("/nilai")->withErrors(['msg' => '<div class="alert alert-info">Data nilai <strong>berhasil diperbarui!</strong></div>']);
    }

}
