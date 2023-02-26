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
        <div class="wrapper">
            <div class="logo">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWl40uLVDguqfeV10t64Mi3erMP8IwCVkoGCIEvQV0gPzeJtHj&s" alt="">
            </div>
            <div class="text-center mt-4 name">
                BantuMereka
            </div>
            <form action="/resetpassword" method="post" class="p-3">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required/>
                </div>
                @error('email')
                    <div class="invalid-feedback"></div>
                    {{ $message }}
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required />
                </div>
                @error('password')
                    <div class="invalid-feedback"></div>
                    {{ $message }}
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" required />
                </div>
                <button class="btn mt-3" style="background-color: #008374">Reset Password</button>
            </form>
        </div>
    </section>

@endsection
