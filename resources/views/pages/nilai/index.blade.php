@extends('layouts.layout-2')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold p-0 m-0">Data Nilai</h3>
                <div></div>
            </div>
            <hr>
            <h5 class="text-center mt-5">~ Data nilai dari siswa dengan nama <b>{{ $nama_siswa->nama_siswa }}</b> ~</h5>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th class="text-center bg-secondary text-light">Nama Kuis</th>
                        <th class="text-center bg-secondary text-light">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_nilai as $nilai)
                        <tr>
                            <td>{{ $nilai->judul_kuis }}</td>
                            <td class="text-center">
                                <div>{{ $nilai->nilai }}</div>
                                <div style="font-size: 10px;"><span class="bg-secondary text-light px-2 rounded-1">benar {{ $nilai->jumlah_benar }} dari {{ $nilai->jumlah_soal }} soal</span></div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="bg-secondary"></td>
                    </tr>
                    <tr>
                        <td>Jumlah Nilai</td>
                        <td class="text-center">{{ $jumlah_nilai }}</td>
                    </tr>
                    <tr>
                        <td>Rata-Rata Nilai</td>
                        <td class="text-center">{{ $rata_rata }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="card mt-5 mb-5">
                <div class="card-body">
                    <form action="">
                        <div class="text-secondary">
                            <label for="catatan_orangtua" class="form-label text-center d-block">~ Catatan Wali Siswa ~</label>
                            <textarea name="catata_orangtua" id="catata_orangtua" rows="5" class="form-control" placeholder="Catatan wali siswa ..." {{ $_SESSION["account_role"] == "orangtua" ? "" : "disabled" }}></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
