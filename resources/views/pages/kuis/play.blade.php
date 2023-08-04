@extends('layouts.layout-3')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="fw-bold text-center">
                {{ $data_kuis->judul_kuis }}
            </h3>
            <h5 class="fw-bold text-center">
                <i>~ Selamat Mengerjakan ~</i>
            </h5>
            <hr>
            <form action="/kuis/play/submit" method="POST">
            @csrf
            <div class="row">
                @foreach ($data_soal as $soal)
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <span class="bg-info text-light fw-bold px-3 rounded-2">
                                    Soal ke-{{ $loop->iteration }}
                                </span>
                                <div class="fw-bold mt-2">
                                    {{ $soal->soal }}
                                </div>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id_soal_ke_{{ $loop->iteration }}" value="{{ $soal->id }}">
                                <input type="hidden" name="judul_kuis" value="{{ $data_kuis->judul_kuis }}">
                                <input type="hidden" name="siswa_id" value="{{ $_SESSION['account_id'] }}">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban_soal_ke_{{ $loop->iteration }}" value="jawaban_1">
                                    <label class="form-check-label">
                                        {{ $soal->jawaban_1 }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban_soal_ke_{{ $loop->iteration }}" value="jawaban_2">
                                    <label class="form-check-label">
                                        {{ $soal->jawaban_2 }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban_soal_ke_{{ $loop->iteration }}" value="jawaban_3">
                                    <label class="form-check-label">
                                        {{ $soal->jawaban_3 }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban_soal_ke_{{ $loop->iteration }}" value="jawaban_4">
                                    <label class="form-check-label">
                                        {{ $soal->jawaban_4 }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jawaban_soal_ke_{{ $loop->iteration }}" value="jawaban_5">
                                    <label class="form-check-label">
                                        {{ $soal->jawaban_5 }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success">Kirim Jawaban</button>
            </div>
        </form>
        </div>
    </div>

@endsection
