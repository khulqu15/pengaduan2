@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>
                    Selamat datang {{ Auth::user()->name }}
                </h1>
                <p>Anda terdaftar sebagai {{ Auth::user()->level }}</p>
            </div>
        </div>
    </div>
@endsection
