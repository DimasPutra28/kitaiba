@extends('layouts.admin')
@section('erga')
<section class="portfolio sections-bg">
    <h1 class="text-center" style="font-family:courier new; font-style: initial;">Daftar Semua Program Donasi Bantu Mereka</h1>
    <div class="portfolio-isotope" style="margin-top: 45px" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="300">
        <div>
            <ul class="portfolio-flters mb-3">
                <li data-filter="*" class="filter-active">All</li>
                @foreach ($kategori as $kat)
                    <li data-filter=".{{ $kat->slug }}">{{ $kat->nama }}</li>
                @endforeach
            </ul>
        </div>
        <div class="row portfolio-container">
            @foreach ($program as $prog)
                <div class="col-md-6 col-xl-4 mb-3 portfolio-item {{ $prog->kategori->slug }}">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $prog->nama }}</h4>
                            <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                                <div class="item">
                                    <img class="img-fluid" src="{{ asset('storage/'.$prog->gambar) }}" style="height: 193px; width:380px" alt="">
                                </div>
                            </div>
                            <div class="d-flex py-4">
                                <div class="preview-list w-100">
                                    <div class="preview-item p-0">
                                        <div class="preview-thumbnail">
                                            <img src="assets/images/faces/face12.jpg" class="rounded-circle" alt="">
                                        </div>
                                        <div class="preview-item-content d-flex flex-grow">
                                            <div class="flex-grow">
                                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                <h6 class="preview-subject">{{ $prog->user->name }}</h6>
                                                <p class="text-muted text-small">berakhir pada {{ \Carbon\Carbon::parse($prog->deadline)->translatedFormat('d F Y') }}</p>
                                                </div>
                                                @if ($prog->user->roleid == 1)
                                                    <p class="text-muted">Admin Bantu Mereka</p>
                                                @else
                                                    <p class="text-muted">User Bantu Mereka</p>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <strong>Rp {{ number_format($prog->danaskrg, 2, ',','.') }}</strong>
                            <div class="progress progress-md portfolio-progress">
                                <div class="progress-bar bg-success" role="progressbar"  title="Rp{{ $prog->danaskrg }}" style="width: {{ $prog->danaskrg/$prog->targetdana*100 }}%">Rp{{ number_format($prog->danaskrg,'2',',','.') }} aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small>terkumpul dari Rp {{ number_format($prog->targetdana, 2, ',','.') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
{{-- <script>
    let portfolionIsotope = document.querySelector('.portfolio-isotope');

    if (portfolionIsotope) {

  let portfolioFilter = portfolionIsotope.getAttribute('data-portfolio-filter') ? portfolionIsotope.getAttribute('data-portfolio-filter') : '*';
  let portfolioLayout = portfolionIsotope.getAttribute('data-portfolio-layout') ? portfolionIsotope.getAttribute('data-portfolio-layout') : 'masonry';
  let portfolioSort = portfolionIsotope.getAttribute('data-portfolio-sort') ? portfolionIsotope.getAttribute('data-portfolio-sort') : 'original-order';

  window.addEventListener('load', () => {
    let portfolioIsotope = new Isotope(document.querySelector('.portfolio-container'), {
      itemSelector: '.portfolio-item',
      layoutMode: portfolioLayout,
      filter: portfolioFilter,
      sortBy: portfolioSort
    });

    let menuFilters = document.querySelectorAll('.portfolio-isotope .portfolio-flters li');
    menuFilters.forEach(function(el) {
      el.addEventListener('click', function() {
        document.querySelector('.portfolio-isotope .portfolio-flters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aos_init === 'function') {
          aos_init();
        }
      }, false);
    });

  });

}

function aos_init() {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });
</script> --}}
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
