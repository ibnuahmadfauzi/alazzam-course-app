@extends('layouts.layout-2')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold p-0 m-0">Data Pengajar</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPengajarModal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pengajar</button>
            </div>
            <hr>
            @if($errors->any())
            {!! $errors->first() !!}
            @endif
            <table class="display myTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">#</th>
                        <th class="text-center">Nama Pengajar</th>
                        <th class="text-center" style="width: 100px;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_pengajar as $pengajar)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $pengajar->nama_pengajar }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editPengajar{{ $pengajar->id }}Modal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deletePengajar{{ $pengajar->id }}Modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Kuis Modal -->
    <div class="modal fade" id="tambahPengajarModal" tabindex="-1" aria-labelledby="tambahPengajarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahPengajarModalLabel">Tambah Data Pengajar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/pengajar" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_pengajar" class="form-label">Nama Pengajar:</label>
                            <input type="text" class="form-control" id="nama_pengajar" name="nama_pengajar" placeholder="Masukkan nama pengajar ..." required>
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
    @foreach ($data_pengajar as $pengajar)
    <div class="modal fade" id="editPengajar{{ $pengajar->id }}Modal" tabindex="-1" aria-labelledby="editPengajar{{ $pengajar->id }}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="editPengajar{{ $pengajar->id }}ModalLabel">Edit Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/pengajar/update" method="POST">
                        @csrf
                        <input type="hidden" name="pengajar_id" value="{{ $pengajar->pengajar_id }}">
                        <div class="mb-3">
                            <label for="nama_pengajar" class="form-label">Nama Pengajar:</label>
                            <input type="text" class="form-control" id="nama_pengajar" name="nama_pengajar" value="{{ $pengajar->nama_pengajar }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $pengajar->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{ Crypt::decrypt($pengajar->password) }}" required>
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

    {{-- Delete Pengajar Modal --}}
    @foreach ($data_pengajar as $pengajar)
    <div class="modal fade" id="deletePengajar{{ $pengajar->id }}Modal" tabindex="-1" aria-labelledby="deletePengajar{{ $pengajar->id }}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="my-5 fw-bold text-center">
                        Data pengajar yang dipilih akan dihapus
                    </h3>
                    <form action="/pengajar/drop" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $pengajar->id }}">
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
