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
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6 text-center py-3">
                    <img src="{{ asset('img/illust/illust3.svg') }}" class="w-50" alt="">
                </div>
                <div class="col-md-6">
                    <h4>Tata cara pengaduan</h4>
                    <ul style="list-style-type: decimal">
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, neque!</li>
                        <li>Lorem ipsum dolor, sit amet consectetur adipisicing.</li>
                        <li>Lorem ipsum dolor, sit amet consectetur</li>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga id numquam ipsam in.</li>
                    </ul>
                    <button class="btn btn-warning px-5">Aduin sekarang</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid image-footer-home">
        <div class="overlay"></div>
        <div class="container position-relative py-5">
            <div class="row py-5">
                <div class="col-md-12 text-center">
                    <h2 class="text-white">Testimoni Adu.co</h2>
                </div>
                <div class="slider" id="testimoni-slider">
                    <div class="px-4">
                        <div class="card w-100">
                            <div class="card-body">
                                <h5 class="card-title">Saputro Adi</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4">
                        <div class="card w-100">
                            <div class="card-body">
                                <h5 class="card-title">Adi Saputro Cahyo</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4">
                        <div class="card w-100">
                            <div class="card-body">
                                <h5 class="card-title">Saputro Cahyo Adi</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4">
                        <div class="card w-100">
                            <div class="card-body">
                                <h5 class="card-title mb-2">Cahyo Adi Saputro</h5>
                                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur, eos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#testimoni-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 5000,
        })
    </script>

@endsection
