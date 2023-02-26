@extends('layouts.auth')
@section('erga')
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

        @if (session()->has('verifikasi'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('verifikasi') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
            <form action="" method="post" class="p-3">
                @csrf
                <input type="hidden" name="user" value="">
                <div class="form-field d-flex align-items-center" style="margin-bottom: 130px">
                    <span class="far fa-user"></span>
                    <input type="number" id="otp" class="form-control @error('otp') is-invalid @enderror" name="otp" placeholder="Kode OTP" required autofocus>
                </div>
                <button class="btn mt-3" style="background-color: #008374;">Kirim</button>
            </form>
            <div class="text-center fs-6">
                <a href="/lupapassword" class="text-danger">Lupa password?</a> atau <a href="/register">Daftar Akun</a>
            </div>
        </div>
    </section>

@endsection