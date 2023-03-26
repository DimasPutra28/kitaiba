@extends('layouts.auth')
@section('erga')
    <section class="p-6">
        @if (session()->has('success'))
            <div class="row justify-content-center">
                <div class="alert alert-success alert-dismissible text-center col-lg-4 fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="row justify-content-center">
                <div class="alert alert-danger alert-dismissible text-center col-lg-4 fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session()->has('verifikasi'))
            <div class="row justify-content-center">
                <div class="alert alert-danger alert-dismissible text-center col-lg-5 fade show" role="alert">
                    {{ session('verifikasi') }}&nbsp;<a href="/verifikasi">Verifikasi disini!</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (Session::has('message'))
            <div class="row justify-content-center">
                <div class="alert alert-success alert-dismissible text-center col-lg-4 fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif



        <div class="wrapper">
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWl40uLVDguqfeV10t64Mi3erMP8IwCVkoGCIEvQV0gPzeJtHj&s" alt="">
            </div>
            <div class="text-center mt-4 name">
                BantuMereka
            </div>
            <form action="/login" method="post" class="p-3">
                @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" required value="{{ old('username') }}">
                </div>
                @error('username')
                    <div class="invalid-feedback"></div>
                    {{ $message }}
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required />
                </div>
                <button class="btn mt-3" style="background-color: #008374">Masuk</button>
            </form>
            <div class="erga">
                <a href="auth/google" class="btn mt-3" style="background-color: #C54B41">Masuk dengan Google</a>
            </div>
            <div class="text-center fs-6">
                <a href="/lupapassword" class="text-danger">Lupa password?</a> atau <a href="/register">Daftar Akun</a>
            </div>
        </div>
    </section>
@endsection
