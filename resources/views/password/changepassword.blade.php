<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reset Password|Bantu Mereka</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/signup.css') }}" rel="stylesheet">
  <style>
    body{
        background: #008374;
    }
  </style>
</head>

<body>

    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="img/logo.png" alt=""> -->
                <h3 style="color: white">Bantu Mereka<span>.</span></h3>
            </a>
          <nav id="navbar" class="navbar" style="padding-right: 75px">
            <ul>
              <li><a href="#hero">Beranda</a></li>
              <li><a href="#progam">Progam</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#services">Services</a></li>
              <li><a href="#team">Team</a></li>
              <li><a href="#recent-posts">Blog</a></li>
              <li><a href="#contact">Contact</a></li>
              @auth
                <li class="dropdown" style="margin-right: -27px"><a href="#"><span>{{ auth()->user()->username }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="" class="bi bi-person-fill" style="padding-right: 120px"> Profil</a></li>
                        <li><a href="/ubahpassword" class="bi bi-key-fill" style="padding-right: 45px">Ubah Password</a></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item bi bi-box-arrow-right" style="padding-right: 112px">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </li>
              @else
                <li class="dropdown" style="margin-right: -27px"><a href="#"><span>User</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                    <li><a class="bi bi-person-plus-fill" style="padding-right: 113px" href="/register">Daftar</a></li>
                    <li><a class="bi bi-box-arrow-left" style="padding-right: 110px" href="/login">Masuk</a></li>
                    </ul>
                </li>
              @endauth
            </ul>
          </nav>
          <!-- .navbar -->

          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <section class="p-6">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="wrapper">
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWl40uLVDguqfeV10t64Mi3erMP8IwCVkoGCIEvQV0gPzeJtHj&s" alt="">
            </div>
            <div class="text-center mt-4 name">
                BantuMereka
            </div>
            <form action="" method="post" class="p-3">
                @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Password saat ini" name="current_password" value="{{ old('current_password') }}" required/>
                </div>
                @error('current_password')
                    <div class="invalid-feedback"></div>
                    {{ $message }}
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password" class="form-control" placeholder="Password baru" name="password" required />
                </div>
                @error('password')
                    <div class="invalid-feedback"></div>
                    {{ $message }}
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password_confirmation" class="form-control" placeholder="Konfirmasi password" name="password_confirmation" required />
                </div>
                <button class="btn mt-3" style="background-color: #008374">Reset Password</button>
            </form>
        </div>
    </section>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
