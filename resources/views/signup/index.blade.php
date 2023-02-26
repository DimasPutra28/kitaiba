@extends('layouts.auth')
@section('erga')
    <section class="p-6">
        <div class="wrapper">
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWl40uLVDguqfeV10t64Mi3erMP8IwCVkoGCIEvQV0gPzeJtHj&s" alt="">
            </div>
            <div class="text-center mt-4 name">
                BantuMereka
            </div>
            <form action="/register" method="post" class="p-3">
            @csrf
                <input type="hidden" name="otp" value="{{ @rand(100000, 999999) }}">
                <div class="form-field d-flex align-items-center" style="margin-top: 20px" >
                    <span class="far fa-user"></span>
                    <input type="name" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama" required value="{{ old('name') }}" />
                </div>
                @error('name')
                    <div class="invalid-feedback"></div>
                    <small class="text-danger" style="font-size: 11px">{{ $message }}</small>
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="far fa-user"></span>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required value="{{ old('email') }}" />
                </div>
                @error('email')
                    <div class="invalid-feedback"></div>
                    <small class="text-danger" style="font-size: 11px">{{ $message }}</small>
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="far fa-user"></span>
                    <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" required value="{{ old('username') }}">
                </div>
                @error('username')
                    <div class="invalid-feedback"></div>
                    <small class="text-danger" style="font-size: 11px">{{ $message }}</small>
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required/>
                </div>
                @error('password')
                    <div class="invalid-feedback"></div>
                    <small class="text-danger" style="font-size: 11px">{{ $message }}</small>
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Konfirmasi password" required/>
                </div>

                <button class="btn mt-3" style="background-color: #008374">Daftar</button>
            </form>
            <div class="erga">
                <a href="auth/google" class="btn mt-3" style="background-color: #C54B41">Daftar dengan Google</a>
            </div>
            <div class="text-center fs-6">
                <small href="#" style="color: black">Sudah punya akun?</small><a href="/login">Masuk</a>
            </div>
        </div>
    </section>

@endsection
