@extends('layouts.layout-1')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="d-flex justify-content-center my-2">
                        <img src="/assets/img/logo.png" height="100" alt="Logo">
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold">
                            Sistem Akademik
                            <br>
                            Kursus Bahasa Inggris Al-Azzam
                        </h3>
                    </div>
                    <hr>
                    <div>

                        {{-- Login Form --}}
                        <form action="/login" method="POST">
                            @csrf
                            @if($errors->any())
                                    {!! $errors->first() !!}
                            @endif
                            <div class="mb-3">
                                <label for="username" class="form-label">Username :</label>
                                <input type="text" id="username" name="username" placeholder="Masukkan username ..." class="form-control" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" id="password" name="password" placeholder="Masukkan password ..." class="form-control" required>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary fw-bold col-lg-4"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk Akun</button>
                            </div>
                        </form>
                        {{-- end Login Form --}}

                    </div>
                </div>
                <div class="card-footer text-center text-secondary fw-bold">
                    @include('partials.footer-text')
                </div>
            </div>
        </div>
    </div>

@endsection
