@extends('layouts.layout-2')

@section('content')

    <div class="card">
        <div class="card-body">
            <div>
                <div class="d-flex justify-content-center mb-4">
                    <img src="assets/img/logo.png" width="100">
                </div>
                <h3 class="fw-bold p-0 m-0 text-center">~ AL-AZZAM ENGLISH COURSE ~</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 p-5">
                    <div class="card bg-success text-light">
                        <div class="card-body">
                            <h3 class="fw-bold text-center">Jumlah Siswa</h3>
                            <h1 class="text-center fw-bold">{{ $jumlah_siswa }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-5">
                    <div class="card bg-danger text-light">
                        <div class="card-body">
                            <h3 class="fw-bold text-center">Jumlah Kuis</h3>
                            <h1 class="text-center fw-bold">{{ $jumlah_kuis }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
