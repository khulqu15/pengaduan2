@extends('layout.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-md-8 offset-md-2 pb-4">
                <h1>
                    Selamat datang {{ Auth::user()->name }}
                </h1>
                <p>Anda terdaftar sebagai {{ Auth::user()->level }}</p>
            </div>
        </div>
    </div>
@endsection
