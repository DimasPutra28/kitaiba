@extends('layouts.auth')
@section('erga')
    <section class="p-6">
        @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" data-mdb-delay="3000" aria-label="Close"></button>
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

            <form action="/validasi" method="post" class="p-3 mt-3">
                @csrf
                <div class="form-field d-flex align-items-center" style="margin-bottom: 20px">
                    <span class="far fa-user"></span>
                    <input type="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" required value="{{ old('username') }}" />
                </div>
                @error('username')
                    <div class="invalid-feedback"></div>
                    <small class="text-danger" style="font-size: 11px">{{ $message }}</small>
                @enderror

                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required />
                </div>
                @error('password')
                    <div class="invalid-feedback"></div>
                    <small class="text-danger" style="font-size: 11px">{{ $message }}</small>
                @enderror

                <div class="form-field d-flex align-items-center" style="margin-top: 20px">
                    <span class="fas fa-key"></span>
                    <input type="password" id="password_confirmation" class="form-control" placeholder="Konfirmasi password" name="password_confirmation" required />
                </div>

                <button class="btn mt-3" type="submit" style="background-color: #008374">Validasi Akun</button>
            </form>
        </div>
    </section>

@endsection
