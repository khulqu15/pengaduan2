@extends('layout.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid bg-warning py-5">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6 py-5">
                    <h4 class="mt-4">Punya Masalah Di Sekitar Lingkunganmu ?</h4>
                    <p>Aduin aja masalahmu di Adu.co</p>
                    <button class="btn btn-light px-5 py-2">Aduin Sekarang</button>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('img/illust/illust2.svg') }}" class="w-50" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6 py-5">
                <h4>Kenapa kok memilih Adu.co ?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos dignissimos sed, atque vitae esse similique aut consequuntur accusamus odio corporis?</p>
                <button class="btn btn-warning px-5">Selengkapnya</button>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/illust/illust1.svg') }}" class="w-50" alt="">
            </div>
        </div>
    </div>
@endsection
