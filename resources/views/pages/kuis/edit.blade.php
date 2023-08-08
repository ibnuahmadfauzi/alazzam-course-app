@extends('layouts.layout-2')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold p-0 m-0 mb-2">{{ $data_kuis->kuis_id }} | Edit Data Kuis</h3>
                    @if ($data_kuis->status === 'aktif')
                        <span class="bg-success px-3 text-light rounded-2">{{ $data_kuis->status }}</span>
                    @else
                        <span class="bg-secondary px-3 text-light rounded-2">{{ $data_kuis->status }}</span>
                    @endif
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDetailKuisModal"><i class="fa fa-pencil" aria-hidden="true"></i> Ubah Detail Kuis</button>
            </div>
            <hr>
            @if($errors->any())
                    {!! $errors->first() !!}
            @endif
            <br>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSoalModal"><i class="fa fa-plus" aria-hidden="true"></i> Buat Soal Baru</button>
            </div>
            <br>
            <table class="display myTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 30px;">#</th>
                        <th class="text-center">Soal</th>
                        <th class="text-center" style="width: 100px;"><i class="fa fa-cog" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_soal as $soal)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $soal->soal }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editSoal{{ $soal->id }}Modal"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteSoal{{ $soal->id }}Modal"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Detail Kuis Modal -->
    <div class="modal fade" id="editDetailKuisModal" tabindex="-1" aria-labelledby="editDetailKuisModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="editDetailKuisModalLabel">Tambah Data Kuis</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/kuis/{{ $data_kuis->kuis_id }}/update" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $data_kuis->id }}" name="id">
                        <input type="hidden" value="{{ $data_kuis->kuis_id }}" name="kuisId">
                        <div class="mb-3">
                            <label class="form-label">ID Kuis</label>
                            <input type="text" class="form-control" value="{{ $data_kuis->kuis_id }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="judul_kuis" class="form-label">Judul Kuis:</label>
                            <input type="text" class="form-control" id="judul_kuis" name="judul_kuis" value="{{ $data_kuis->judul_kuis }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="durasi" class="form-label">Judul Kuis:</label>
                            <select class="form-select" name="durasi" aria-label="Default select example" required>
                                <option value="1" {{ $data_kuis->durasi === 1 ? 'selected' : '' }}>1 Menit</option>
                                <option value="10" {{ $data_kuis->durasi === 10 ? 'selected' : '' }}>10 Menit</option>
                                <option value="30" {{ $data_kuis->durasi === 30 ? 'selected' : '' }}>30 Menit</option>
                                <option value="60" {{ $data_kuis->durasi === 60 ? 'selected' : '' }}>60 Menit</option>
                                <option value="120" {{ $data_kuis->durasi === 120 ? 'selected' : '' }}>120 Menit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-select" name="status" aria-label="Default select example" required>
                                <option value="aktif" {{ $data_kuis->status === 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak aktif" {{ $data_kuis->status === 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Kuis:</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{ Crypt::decrypt($data_kuis->password) }}" required>
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

    <!-- Create Soal Modal -->
    <div class="modal fade" id="createSoalModal" tabindex="-1" aria-labelledby="createSoalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="createSoalModalLabel">Tambah Soal Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/kuis/soal/store" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data_kuis->id }}">
                        <input type="hidden" name="kuis_id" value="{{ $data_kuis->kuis_id }}">
                        <div class="mb-3">
                            <label for="soal" class="form-label">Soal:</label>
                            <textarea name="soal" id="soal" rows="5" class="form-control" placeholder="Masukkan soal ..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilihan Jawaban:</label>
                            <input type="jawaban_1" class="form-control mb-1" id="jawaban_1" name="jawaban_1" placeholder="Masukkan jawaban ke-1 ..." required>
                            <input type="jawaban_1" class="form-control mb-1" id="jawaban_2" name="jawaban_2" placeholder="Masukkan jawaban ke-2 ..." required>
                            <input type="jawaban_1" class="form-control mb-1" id="jawaban_3" name="jawaban_3" placeholder="Masukkan jawaban ke-3 ..." required>
                            <input type="jawaban_1" class="form-control mb-1" id="jawaban_4" name="jawaban_4" placeholder="Masukkan jawaban ke-4 ..." required>
                            <input type="jawaban_1" class="form-control" id="jawaban_5" name="jawaban_5" placeholder="Masukkan jawaban ke-5 ..." required>
                        </div>
                        <div class="mb-3">
                            <label for="jawaban_benar" class="form-label">Pilih Jawaban Benar:</label>
                            <select class="form-select" name="jawaban_benar" aria-label="Default select example" required>
                                <option selected value="">Pilih jawaban benar ...</option>
                                <option value="jawaban_1">Jawaban ke-1</option>
                                <option value="jawaban_2">Jawaban ke-2</option>
                                <option value="jawaban_3">Jawaban ke-3</option>
                                <option value="jawaban_4">Jawaban ke-4</option>
                                <option value="jawaban_5">Jawaban ke-5</option>
                            </select>
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

    {{-- Delete Soal Modal --}}
    @foreach ($data_soal as $soal)
        <div class="modal fade" id="deleteSoal{{ $soal->id }}Modal" tabindex="-1" aria-labelledby="deleteSoal{{ $soal->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="my-5 fw-bold text-center">
                            Data soal yang dipilih akan dihapus
                        </h3>
                        <form action="/kuis/soal/drop" method="POST">
                            @csrf
                            <input type="hidden" name="kuis_id" value="{{ $data_kuis->kuis_id }}">
                            <input type="hidden" name="id" value="{{ $soal->id }}">
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

    @foreach ($data_soal as $soal)
        <!-- Edit Soal Modal -->
        <div class="modal fade" id="editSoal{{ $soal->id }}Modal" tabindex="-1" aria-labelledby="editSoal{{ $soal->id }}ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editSoal{{ $soal->id }}ModalLabel">Edit Data Soal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/kuis/soal/update-process" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data_kuis->id }}">
                            <input type="hidden" name="kuis_id" value="{{ $data_kuis->kuis_id }}">
                            <input type="hidden" name="soal_id" value="{{ $soal->id }}">
                            <div class="mb-3">
                                <label class="form-label">ID Soal:</label>
                                <input type="text" class="form-control" value="{{ $soal->soal_id }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="soal" class="form-label">Soal:</label>
                                <textarea name="soal" id="soal" rows="5" class="form-control" required>{{ $soal->soal }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pilihan Jawaban:</label>
                                <input type="jawaban_1" class="form-control mb-1" id="jawaban_1" name="jawaban_1" value="{{ $soal->jawaban_1 }}" required>
                                <input type="jawaban_1" class="form-control mb-1" id="jawaban_2" name="jawaban_2" value="{{ $soal->jawaban_2 }}" required>
                                <input type="jawaban_1" class="form-control mb-1" id="jawaban_3" name="jawaban_3" value="{{ $soal->jawaban_3 }}" required>
                                <input type="jawaban_1" class="form-control mb-1" id="jawaban_4" name="jawaban_4" value="{{ $soal->jawaban_4 }}" required>
                                <input type="jawaban_1" class="form-control" id="jawaban_5" name="jawaban_5" value="{{ $soal->jawaban_5 }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="jawaban_benar" class="form-label">Pilih Jawaban Benar:</label>
                                <select class="form-select" name="jawaban_benar" aria-label="Default select example" required>
                                    <option value="jawaban_1" {{ $soal->jawaban_benar === 'jawaban_1' ? 'selected' : '' }} >Jawaban ke-1</option>
                                    <option value="jawaban_2" {{ $soal->jawaban_benar === 'jawaban_2' ? 'selected' : '' }}>Jawaban ke-2</option>
                                    <option value="jawaban_3" {{ $soal->jawaban_benar === 'jawaban_3' ? 'selected' : '' }}>Jawaban ke-3</option>
                                    <option value="jawaban_4" {{ $soal->jawaban_benar === 'jawaban_4' ? 'selected' : '' }}>Jawaban ke-4</option>
                                    <option value="jawaban_5" {{ $soal->jawaban_benar === 'jawaban_5' ? 'selected' : '' }}>Jawaban ke-5</option>
                                </select>
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

@endsection
