@extends('layouts.layout-2')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold p-0 m-0">Data Orang Tua</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahOrangtuaModal"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Orang Tua</button>
            </div>
            <hr>
            @if($errors->any())
            {!! $errors->first() !!}
            @endif
            <table class="display myTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">#</th>
                        <th class="text-center">ID Orang Tua</th>
                        <th class="text-center">Nama Anak</th>
                        <th class="text-center" style="width: 100px;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_orangtua as $orangtua)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $orangtua->orangtua_id }}
                            </td>
                            <td>
                                {{ $orangtua->nama_siswa }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editOrangtua{{ $orangtua->orangtua_id }}Modal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteOrangtua{{ $orangtua->orangtua_id }}Modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Kuis Modal -->
    <div class="modal fade" id="tambahOrangtuaModal" tabindex="-1" aria-labelledby="tambahOrangtuaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahOrangtuaModalLabel">Tambah Data Pengajar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/orangtua" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="siswa_id" class="form-label">Pilih Nama Anak:</label>
                            <select class="form-select" name="siswa_id">
                                <option value="" selected>Pilih nama siswa ...</option>
                                @foreach ($data_siswa as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                                @endforeach
                            </select>
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

    {{-- Edit Orangtua Modal --}}
    @foreach($data_orangtua as $orangtua)
    <div class="modal fade" id="editOrangtua{{ $orangtua->orangtua_id }}Modal" tabindex="-1" aria-labelledby="editOrangtua{{ $orangtua->orangtua_id }}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="editOrangtua{{ $orangtua->orangtua_id }}ModalLabel">Edit Data Orang Tua</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/orangtua/update" method="POST">
                        @csrf
                        <input type="hidden" name="orangtua_id" value="{{ $orangtua->orangtua_id }}">
                        <div class="mb-3">
                            <label for="siswa_id" class="form-label">Pilih Nama Anak:</label>
                            <select class="form-select" name="siswa_id">
                                @foreach ($data_siswa as $siswa)
                                    <option value="{{ $siswa->id }}" {{ $siswa->id == $orangtua->siswa_id ? 'selected' : '' }}>{{ $siswa->nama_siswa }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $orangtua->username }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ Crypt::decrypt($orangtua->password) }}" required>
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

    {{-- Delete Orangtua Modal --}}
    @foreach ($data_orangtua as $orangtua)
    <div class="modal fade" id="deleteOrangtua{{ $orangtua->orangtua_id }}Modal" tabindex="-1" aria-labelledby="deleteOrangtua{{ $orangtua->orangtua_id }}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <h3 class="my-5 fw-bold text-center">
                        Data orangtua yang dipilih akan dihapus
                    </h3>
                    <form action="/orangtua/drop" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $orangtua->orangtua_id }}">
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
