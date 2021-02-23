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
                        <div class="form-group">
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Isi NIK di sini">
                        </div>
                        <div class="form-group">
                            <textarea type="text" rows="5" name="text"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
