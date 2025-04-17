@extends('main.layouts.app')

@section('hero')
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft hero-judul">Harga Kaki Lima<br>Kualitas Bintang Lima</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Semua menu yang ada di sini dibuat dengan penuh perhatian, sehingga menghasilkan cita rasa yang sempurna. Makanan kami juga tersedia untuk semua kalangan, tanpa terkecuali.</p>
                    <a href="{{ url('menu') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft lengkung">Pesan Sekarang</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img draggable="false" (dragstart)="false;" class="img-fluid" src="{{ asset('main/img/hero.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('main')

    <div class="container-fluid">
        @include('components.message')
    </div>
    
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-money-bill-wave text-primary mb-4"></i>
                            <h5>Harga Murah</h5>
                            <p>Anak kuliahan? Pelajar? Tenang, harga makanan kami sangat bersahabat!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                            <h5>Makanan Berkualitas</h5>
                            <p>Setiap makanan dibuat dengan penuh perhatian, sehingga berkualitas tinggi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                            <h5>Pemesanan Online</h5>
                            <p>Pemesanan makanan dapat dilakukan secara online, tidak perlu keluar rumah!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h5>Pengantaran 8 to 8</h5>
                            <p>Pengantaran dilakukan pada jam 8 pagi hingga jam 8 malam. Sangat memudahkan dan fleksibel.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    <!-- About Start -->
    <div id="about" class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('main/img/about-1.jpg') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('main/img/about-2.jpg') }}" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('main/img/about-3.jpg') }}">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('main/img/about-4.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">Tentang Kami</h5>
                    <h1 class="mb-4">Selamat Datang di <i class="fa fa-utensils text-primary me-2"></i> Warung Khas Suramadu - Mahatir</h1>
                    <p class="mb-4">Ingin makan enak dengan uang seminimal mungkin? Warung Khas Suramadu - Mahatir hadir untuk memenuhi kebutuhan kalian!</p>
                    <p class="mb-4">Kami menyediakan makanan dengan cita rasa yang tinggi namun dengan harga terjangkau. Semua kalangan dapat menikmati makanan kami. Pelajar, anak kuliahan, pekerja, dan lain-lainnya sangat cocok dengan makanan kami!</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Tahun</p>
                                    <h6 class="text-uppercase mb-0">Pengalaman</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">100</h1>
                                <div class="ps-4">
                                    <p class="mb-0">lebih</p>
                                    <h6 class="text-uppercase mb-0">Ulasan Positif</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection