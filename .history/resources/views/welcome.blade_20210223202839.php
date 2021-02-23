@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid bg-warning py-5">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6 py-5">
                    <h4 class="mt-4">Punya Masalah Di Sekitar Lingkunganmu ?</h4>
                    <p>Aduin aja masalahmu di Adu.co</p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('img/illust/illust2.svg') }}" class="w-50" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
