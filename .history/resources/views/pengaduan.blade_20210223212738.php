@extends('layout.app')

@section('title', 'Pengaduan')

@section('content')
    <div class="container-fluid image-footer-home py-5">
        <div class="overlay"></div>
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card bg-white rounded-3 shadow py-5 px-4">
                        <h2>Pengaduan</h2>
                        <form action="{{ route('pengaduan.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-2">
                                <input type="text" class="form-control" aria-describedby="nik-feedback" name="nik" id="nik" placeholder="Isi NIK di sini">
                                <small id="nik-feedback">Required</small>
                            </div>
                            <div class="form-group my-2">
                                <input type="text" class="form-control" aria-describedby="nik-feedback" name="nik" id="nik" placeholder="Isi NIK di sini">
                                <small id="nik-feedback">Required</small>
                            </div>
                            <div class="form-group my-2">
                                <textarea type="text" rows="5" required aria-describedby="text-feedback" name="text" class="form-control" placeholder="Isi Laporan dis sini"></textarea>
                                <small id="text-feedback">Required</small>
                            </div>
                            <button class="btn btn-warning px-5 py-2">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
