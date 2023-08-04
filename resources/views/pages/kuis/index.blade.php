@extends('layouts.layout-2')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold p-0 m-0">Data Kuis</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKuisModal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Kuis</button>
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
                        <th class="text-center" style="width: 100px;"><i class="fa fa-cog" aria-hidden="true"></i></th>
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
                                <a href="/kuis/{{ $kuis->kuis_id }}/edit" class="btn btn-outline-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteKuis{{ $kuis->id }}Modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Kuis Modal -->
    <div class="modal fade" id="tambahKuisModal" tabindex="-1" aria-labelledby="tambahKuisModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahKuisModalLabel">Tambah Data Kuis</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/kuis" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="judul_kuis" class="form-label">Judul Kuis:</label>
                            <input type="text" class="form-control" id="judul_kuis" name="judul_kuis" placeholder="Masukkan judul kuis ..." required>
                        </div>
                        <div class="mb-3">
                            <label for="durasi" class="form-label">Judul Kuis:</label>
                            <select class="form-select" name="durasi" aria-label="Default select example" required>
                                <option selected value="">Pilih durasi ...</option>
                                <option value="10">10 Menit</option>
                                <option value="30">30 Menit</option>
                                <option value="60">60 Menit</option>
                                <option value="120">120 Menit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Kuis:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password kuis ..." required>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Batal</button>
                            &nbsp;
                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Kuis Modal --}}
    @foreach ($data_kuis as $kuis)
        <div class="modal fade" id="deleteKuis{{ $kuis->id }}Modal" tabindex="-1" aria-labelledby="deleteKuis{{ $kuis->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="my-5 fw-bold text-center">
                            Data kuis yang dipilih akan dihapus
                        </h3>
                        <form action="/kuis/drop" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $kuis->id }}">
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Batal</button>
                                &nbsp;
                                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Lanjutkan Menghapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
