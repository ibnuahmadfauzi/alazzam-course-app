@extends('layouts.layout-2')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold p-0 m-0">Data Siswa</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahSiswaModal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Siswa</button>
            </div>
            <hr>
            @if($errors->any())
            {!! $errors->first() !!}
            @endif
            <table class="display myTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">#</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center" style="width: 100px;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_siswa as $siswa)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $siswa->nama_siswa }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editSiswa{{ $siswa->id }}Modal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteSiswa{{ $siswa->id }}Modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Kuis Modal -->
    <div class="modal fade" id="tambahSiswaModal" tabindex="-1" aria-labelledby="tambahSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahSiswaModalLabel">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/siswa" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa:</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama siswa ..." required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username ..." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password ..." required>
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

    {{-- Edit Siswa Modal --}}
    @foreach ($data_siswa as $siswa)
    <div class="modal fade" id="editSiswa{{ $siswa->id }}Modal" tabindex="-1" aria-labelledby="editSiswa{{ $siswa->id }}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="editSiswa{{ $siswa->id }}ModalLabel">Edit Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/siswa/update" method="POST">
                        @csrf
                        <input type="hidden" name="siswa_id" value="{{ $siswa->siswa_id }}">
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa:</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $siswa->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{ Crypt::decrypt($siswa->password) }}" required>
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
    @endforeach

    {{-- Delete Siswa Modal --}}
    @foreach ($data_siswa as $siswa)
    <div class="modal fade" id="deleteSiswa{{ $siswa->id }}Modal" tabindex="-1" aria-labelledby="deleteSiswa{{ $siswa->id }}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="my-5 fw-bold text-center">
                        Data siswa yang dipilih akan dihapus
                    </h3>
                    <form action="/siswa/drop" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $siswa->id }}">
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
