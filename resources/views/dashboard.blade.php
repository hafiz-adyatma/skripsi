@extends('layouts.app')

@section('content')
<div class="container-fluid p-0" style="position: relative;">
    <div class="header-image" style="background: url('assets/header.jpeg') no-repeat center center / cover; width: auto; height: 100vh; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <h1 class="text-white text-center">Welcome to</h1>
            <h1 class="text-white text-center">Kampung Warna-Warni</h1>
            <h1 class="text-white text-center">Official Website</h1>
            <p class="text-white text-center">You will see beautiful moments you never see before</p>
            <a href="/virtual-tour" class="btn btn-warning px-3 py-3">Go virtual tour now!</a>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: #FEEDCA;">
    <div class="container p-5">
        <div class="row align-items-center">
            <div class="col-md-6 justify-content-center">
                <h2 class="text-dark mb-4">Sejarah Kampung Warna-Warni</h2>
                <p class="text-dark">Kampung Wisata Jodipan adalah kampung wisata pertama di Kota Malang, berupa
                    sederetan rumah warga di tepi Sungai Brantas yang menampilkan dinding dengan aneka warna yang
                    menarik dan tidak monoton.</p>
                <p class="text-dark">Kampung ini terletak di Jodipan berada di tepi Sungai Brantas. Kampung Wisata
                    Jodipan ini biasanya dijuluki Kampung Warna Warni. Kampung Warna Warni.</p>
                <a href="/about" class="btn btn-warning mt-3">View more..</a>
            </div>
            <div class="col-md-6 mt-5 justify-content-center">
                <img src="{{ asset('assets/sejarah.png') }}" alt="Sejarah Kampung Warna-warni" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-5 mb-5">
    <h1 class="text-dark mb-4">Galeri Kampung Warna-warni</h1>
    <h3 class="text-muted">Buka</h3>
    <h3 class="text-muted"> 07.00 - 17.00 WIB</h3>
    <div class="row">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="card border border-light">
                    <div class="card-body">
                        <img src="{{ asset('assets/carousel-1.png') }}" alt="Sejarah Kampung Warna-warni" class="card-img-top">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border border-light">
                    <div class="card-body">
                        <img src="{{ asset('assets/carousel-2.png') }}" alt="Sejarah Kampung Warna-warni" class="card-img-top">
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border border-light">
                    <div class="card-body">
                        <img src="{{ asset('assets/carousel-1.png') }}" alt="Sejarah Kampung Warna-warni" class="card-img-top">
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-nav mt-3 d-flex justify-content-end">
            <button id="prevButton" class="btn btn-warning me-2">
                < </button>
                    <button id="nextButton" class="btn btn-warning"> > </button>
        </div>

    </div>
</div>


<div class="container-fluid py-5 px-5" style="background-color: #FEEDCA;">
    <div class="container text-center mt-5">
        <h1 class="text-dark mb-4">Merchandise</h1>
        <p class="text-muted">Menjual produk - produk UMKM yang diproduksi oleh warga Kampung</p>
        <p class="text-muted">warna-warni Jodipan Kota Malang</p>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($product as $p)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/'.$p['photo']) }}" alt="{{ $p['name'] }}" class="img img-thumbnail" style="height: 300px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $p['name'] }}</h5>
                        <p class="card-text">Rp.{{ number_format($p['price'], 0, ',', '.') }}</p>
                        <a href="/product/{{ $p['id'] }}" class="btn btn-warning">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="container text-center mt-5 py-5 px-5">
    <h1 class="text-dark mb-4">Videos of Kampung Warna-warni</h1>
    <div class="ratio ratio-16x9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/QwWSRrVG2LU" allowfullscreen></iframe>
    </div>
</div>
<div class="container-fluid py-5 px-5" style="background-color: #FEEDCA;">
    <div class="container text-center mt-5">
        <h1 class="text-dark mb-4">Location of Kampung Warna-warni</h1>
        <div class="ratio ratio-16x9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.148376456353!2d112.6349482762182!3d-7.983608592041772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629537cd9ffdf%3A0x614750a282c3fe65!2sKampung%20Warna%20Warni%20Jodipan!5e0!3m2!1sen!2sid!4v1718767313705!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection