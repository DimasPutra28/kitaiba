@extends('layouts.auth')
@section('erga')
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

@endsection
