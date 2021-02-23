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
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 text-center py-2">
                <img src="{{ asset('img/illust/illust1.svg') }}" class="w-50" alt="">
            </div>
            <div class="col-md-6 py-5">
                <h4>Kenapa kok memilih Adu.co ?</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos dignissimos sed, atque vitae esse similique aut consequuntur accusamus odio corporis?</p>
                <button class="btn btn-warning px-5">Selengkapnya</button>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4 py-4">
                <h4>Kelebihan Adu.co</h4>
                <p>Berikut adalah kelebihan Adu.co sebagai website pengaduan online</p>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="d-inline-block shadow-sm rounded-3 p-5">
                            <i class="fas fa-check"></i>
                            <h4>Mudah</h4>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="d-inline-block shadow-sm rounded-3 p-5">
                            <i class="fas fa-lock"></i>
                            <h4>Aman</h4>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="d-inline-block shadow-sm rounded-3 p-5">
                            <i class="fas fa-users"></i>
                            <h4>Fleksibel</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Tata cara pengaduan</h4>
                    <ul class="list-style-type: decimal">
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, neque!</li>
                        <li>Lorem ipsum dolor, sit amet consectetur adipisicing.</li>
                        <li>Lorem ipsum dolor, sit amet consectetur</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga id numquam ipsam in.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
