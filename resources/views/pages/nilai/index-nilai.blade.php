@extends('layouts.layout-2')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold p-0 m-0">Data Nilai</h3>
                <div></div>
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
                        <th class="text-center" style="width: 150px;"><i class="fa fa-cog" aria-hidden="true"></i></th>
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
                            <td class="text-center">
                                <form action="/nilai/detail" method="POST">
                                    @csrf
                                    <input type="hidden" name="siswa_id" value="{{ $siswa->siswa_id }}">
                                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-external-link" aria-hidden="true"></i> Detail Nilai</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
