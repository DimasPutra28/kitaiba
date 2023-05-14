@extends('layouts.dashboard')
@section('erga')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
        <div class="page-header d-flex align-items-center" style="background-image: url('');">
            <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                <h2>Detail Program</h2>
                <p>Memberi adalah sebuah kebahagiaan. Memberi adalah cara terbaik untuk menciptakan hubungan yang berarti. Berbagi itu seperti membuka jendela dunia baru yang penuh dengan kebaikan dan keindahan.</p>
                </div>
            </div>
            </div>
        </div>
        <nav>
            <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li>Detail Program</li>
            </ol>
            </div>
        </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container" data-aos="fade-up">

                <div class="position-relative h-100">
                    <div class="slides-1 portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/'.$program->gambar) }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    {{-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> --}}

                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8">
                        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

                            <div>
                                <ul class="portfolio-flters">
                                    <li data-filter=".filter-app" class="filter-active" >Informasi Donasi</li>
                                    <li data-filter=".filter-product" style="padding-left: 100px">Rincian Donasi</li>
                                </ul>
                            </div>

                            <div class="row gy-4 portfolio-container">

                                <div class="portfolio-description portfolio-item filter-app">
                                    <h2>{{ $program->nama }}</h2>

                                    <div class="testimonial-item">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                                {{ $program->deskripsi }}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <div>
                                            <img src="{{ asset('../../assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                                            <h3>{{ $program->user->name }}</h3>
                                            <h4>{{ $program->user->username }}</h4>
                                        </div>
                                    </div>

                                    <div class="portfolio-wrap container my-5">
                                        <h1 class="mt-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Berita terkait</h1>
                                        <div class="portfolio-info">
                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>

                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>

                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="portfolio-wrap container my-3">
                                        <h1 class="mt-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Kiriman Doa</h1>
                                        <div class="portfolio-info">
                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>

                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>

                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="portfolio-description portfolio-item filter-product">
                                    <h2>{{ $program->nama }}</h2>

                                    <div class="testimonial-item">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                                {{ $program->deskripsi }}
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <div>
                                            <img src="{{ asset('../../assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                                            <h3>{{ $program->user->name }}</h3>
                                            <h4>{{ $program->user->username }}</h4>
                                        </div>
                                    </div>

                                    <div class="portfolio-wrap container my-5">
                                        <h1 class="mt-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Donatur</h1>
                                        <div class="portfolio-info">
                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>

                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>

                                            <div class="card container py-3 mb-3" style="border-radius: 5px; background-color: #F1F1F1">
                                                <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                                <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                                <small>2 jam yang lalu</small>
                                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><h2>Rp {{ number_format($program->danaskrg, 2, ',','.') }}</h2></li>
                                <li>
                                    <div class="progress" role="progressbar" aria-label="Example 100px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" title="Rp{{ $program->danaskrg }}" style="width: {{ $program->danaskrg/$program->targetdana*100 }}%"></div>
                                    </div>
                                    <div class="count d-flex justify-content-between">
                                        <div class="col">
                                            <small>484 donatur</small>
                                        </div>
                                        <div class="col text-end">
                                            <small>{{ \Carbon\Carbon::parse($program->deadline)->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </li>
                                <li><strong>Kategori Program</strong> <span>{{ $program->kategori->nama }}</span></li>
                                <li><strong>Pembuat Donasi</strong> <span>{{ $program->user->name }}</span></li>
                                <li><strong>Batas Akhir Donasi</strong> <span>{{ \Carbon\Carbon::parse($program->deadline)->translatedFormat('l, d F Y') }}</span></li>
                                <li><strong>Target Donasi</strong>Rp {{ number_format($program->targetdana, 2, ',','.') }}</li>
                                <li><a href="/donasi/{{ $program->slug }}" class="btn btn-light btn-lg align-self-start" style="background-color: #008374; color: white; padding: 12px 31px 12px 31px; font-family: sans-serif; text-transform: none">Donasi Sekarang</a></li>
                                <li><a href="#" class="btn btn-light btn-lg align-self-start" style="background-color: #008374; color: white; padding: 12px 51px 12px 51px; font-family: sans-serif"><i class="bi bi-share-fill"></i> Bagikan</a></li>
                                <li class="mt-4"><h2 style="font-weight: 700">5 Donatur Terbesar</h2></li>
                                <li>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="donatur">
                                        </div>
                                        <div class="col-9">
                                            <h5>Anonim</h5>
                                            <small style="font-weight: 700">Rp10.000.000</small>
                                            <small class="ms-4">2 jam</small>
                                        </div>
                                    </div>
                                    <hr style="border: 2px solid black;">
                                </li>

                                <li>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="donatur">
                                        </div>
                                        <div class="col-9">
                                            <h5>Anonim</h5>
                                            <small style="font-weight: 700">Rp10.000.000</small>
                                            <small class="ms-4">2 jam</small>
                                        </div>
                                    </div>
                                    <hr style="border: 2px solid black;">
                                </li>

                                <li>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="donatur">
                                        </div>
                                        <div class="col-9">
                                            <h5>Anonim</h5>
                                            <small style="font-weight: 700">Rp10.000.000</small>
                                            <small class="ms-4">2 jam</small>
                                        </div>
                                    </div>
                                    <hr style="border: 2px solid black;">
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Portfolio Details Section -->

    </main>
    <!-- End #main -->
@endsection
