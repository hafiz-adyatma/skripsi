@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="container align-items-center ">
        <h1 class="mb-5 mt-5 text-center">About Us</h1>
        <div class="row">
            <div class="col-md-6">
                <p class="me-5">
                    Kampung Wisata Jodipan adalah kampung wisata pertama di Kota Malang,
                    berupa sederetan rumah warga di tepi Sungai Brantas yang menampilkan
                    dinding dengan aneka warna yang menarik dan tidak monoton.
                </p>
                <p class="me-5">
                    Kampung ini terletak di Jodipan berada di tepi Sungai Brantas. Kampung
                    Wisata Jodipan ini biasanya dijuluki Kampung Warna Warni. Kampung Warna
                    Warni Jodipan merupakan sebutan untuk wilayah yang terletak di RT 6, RT 7, dan
                    RT 9 di RW 2 Kelurahan Jodipan, Kecamatan Blimbing, Kota Malang. Ditinjau
                    dari alur sejarah Kampung Warna-warni Jodipan dimulai saat sekelompok
                    mahasiswa dari Universitas Muhammadiyah Malang menjalankan program
                    Kuliah Kerja Nyata (KKN) dan bermitra dengan sebuah perusahaan lokal yang
                    spesialis dalam pembuatan cat, yang dikenal dengan nama Guys Pro.
                </p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-6 mb-3">
                        <img src="{{ asset('assets/about/about-1.png') }}" class="img-fluid rounded" alt="Image 1">
                    </div>
                    <div class="col-6 mb-3">
                        <img src="{{ asset('assets/about/about-2.png') }}" class="img-fluid rounded" alt="Image 2">
                    </div>
                    <div class="col-6 mb-3">
                        <img src="{{ asset('assets/about/about-3.png') }}" class="img-fluid rounded" alt="Image 3">
                    </div>
                    <div class="col-6 mb-3">
                        <img src="{{ asset('assets/about/about-4.png') }}" class="img-fluid rounded" alt="Image 4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5 py-5" style="background-color: #FEEDCA;">
        <div class="container text-center mt-5">
            <div class="mb-5">
                <h1 class="text-dark mb-4">Sejarah Pembuatan Virtual Tour</h1>
                <h1 class="text-dark mb-4">Kampung Warna-Warni</h1>
                <p class="text-muted">Alasan dibuatnya website virtual tour untuk Kampung Warna-warni oleh mahasiswa </p>
                <p class="text-muted"> Universitas Bina Nusantara Malang prodi Ilmu Komputer</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row align-items-center">
                        <div class="col-4 mb-3">
                            <img src="{{ asset('assets/about/about-hafiz.jpeg') }}" class="img-fluid rounded" alt="Image 1">
                        </div>
                        <div class="col-4 mb-3">
                            <img src="{{ asset('assets/about/about-diego.png') }}" class="img-fluid rounded" alt="Image 2">
                        </div>
                        <div class="col-4 mb-3">
                            <img src="{{ asset('assets/about/about-viegar.jpeg') }}" class="img-fluid rounded" alt="Image 3">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="text-start ms-5">
                        Melihat kurangnya perhatian pemerintah terhadap wisata yang terdapat di Kota Malang khsusunya
                        Kampung Warna-Warni Jodipan, membuat kami sebagai mahasiswa berinisiatif untuk membuat sebuah
                        project website virtual tour dengan tujuan dapat membantu mengembangkan dan mempromosikan tempat
                        wisata Kampung Warna-warni ini. Project tersebut kami tuangkan dalam rangka tugas akhir yang kami
                        tempuh selama empat tahun melakukan pembelajaran di Universitas Bina Nusantara Malang. Dengan adanya
                        website virtual tour tersebut kami berharap dapat membantu wisata Kampung Warna-warni untuk terus
                        berkembang dan diketahui oleh banyak masyarakat luas di luar Kota Malang.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
