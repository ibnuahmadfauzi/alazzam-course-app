@extends('layouts.layout-2')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-start align-items-center">
                <h3 class="fw-bold p-0 m-0">Data Kuis</h3>
            </div>
            <hr>
            @if($errors->any())
            {!! $errors->first() !!}
            @endif
            <table class="display myTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">#</th>
                        <th class="text-center">Judul Kuis</th>
                        <th class="text-center" style="width: 150px;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_kuis as $kuis)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td>{{ $kuis->judul_kuis }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailKuis{{ $kuis->id }}Modal"><i class="fa fa-eye" aria-hidden="true"></i> Detail Kuis</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Detail Kuis --}}
    @foreach ($data_kuis as $kuis)
        <div class="modal fade" id="detailKuis{{ $kuis->id }}Modal" tabindex="-1" aria-labelledby="detailKuis{{ $kuis->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="/kuis/play" method="POST">
                            @csrf
                            <table class="table table-botdered">
                                <tr>
                                    <td><b>Judul Kuis</b></td>
                                    <td>{{ $kuis->judul_kuis }}</td>
                                </tr>
                                <tr>
                                    <td><b>Durasi</b></td>
                                    <td>{{ $kuis->durasi }} menit</td>
                                </tr>
                                <tr>
                                    <td><b>Password</b></td>
                                    <td>
                                        <input type="password" class="form-control" name="password" placeholder="Masukkan password kuis ..." required>
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="id" value="{{ $kuis->id }}">
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Batal</button>
                                &nbsp;
                                <button type="submit" class="btn btn-outline-info"><i class="fa fa-play" aria-hidden="true"></i> Mulai Mengerjakan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
