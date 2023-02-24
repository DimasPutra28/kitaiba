<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lupa password|Bantu Mereka</title>
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/signup.css" rel="stylesheet">
</head>

<body>
    <section class="p-6">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" data-mdb-delay="3000" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="wrapper">
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWl40uLVDguqfeV10t64Mi3erMP8IwCVkoGCIEvQV0gPzeJtHj&s" alt="">
            </div>
            <div class="text-center mt-4 name">
                BantuMereka
            </div>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Silahkan masukkan email akun anda untuk melakukan reset password
            </div>
            <form action="/lupapassword" method="post" class="p-3 mt-3">
                @csrf
                <div class="form-field d-flex align-items-center" style="margin-bottom: 20px">
                    <span class="far fa-user"></span>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat email" name="email" required/>
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        <small class="text-danger" style="font-size: 11px">{{ $message }}</small>
                    </div>
                @enderror

                <button class="btn mt-3" type="submit" style="background-color: #008374">Kirim link ke Email</button>
            </form>
            <small><a href="/login">Kembali ke halaman login</a></small>
        </div>
    </section>

  <!-- Vendor JS Files -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>
