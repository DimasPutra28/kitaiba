@extends('layouts.admin')
@section('erga')
    <h1 class="text-center" style="font-weight: 600">Detail Program : {{ $program->nama }}</h1>
    @if (session()->has('success'))
        <div class="row justify-content-center" style="padding-right: 18px">
            <div class="alert alert-success col-lg-6" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-4">Informasi Program Donasi</h4>
                    </div>
                    <div class="portfolio-description portfolio-item filter-product">

                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left" style="color: green"></i>
                                    {{ $program->deskripsi }}
                                <i class="bi bi-quote quote-icon-right" style="color: green"></i>
                            </p>
                            <div class="text-center mb-3">
                                <img class="img-fluid" src="{{ asset('storage/'.$program->gambar) }}" style="height: 400px; width: 800px" alt="">
                            </div>
                            <div>
                                <img src="{{ asset('../../assets/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img rounded-circle" style="height: 70px; width: 70px" alt="">
                                <h3>{{ $program->user->name }}</h3>
                                <h4>{{ $program->user->username }}</h4>
                            </div>
                        </div>

                        <div class="portfolio-wrap container my-5">
                            <h1 class="mt-3" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Berita Terkait</h1>
                            <div class="portfolio-info">
                                <div class="card container py-3 mb-3" style="border-radius: 5px;">
                                    <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                    <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                    <small>2 jam yang lalu</small>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>

                                <div class="card container py-3 mb-3" style="border-radius: 5px;">
                                    <img class="rounded-circle" src="/img/batmanlogo.jpg" style="width: 40px; height: 40px" alt="user">
                                    <h4><a href="" title="More Details">Dina Indayati</a></h4>
                                    <small>2 jam yang lalu</small>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>

                                <div class="card container py-3 mb-3" style="border-radius: 5px;">
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
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card" style="height: 22%">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-start">
                        <h4 class="card-title mb-4">Detail Program Donasi</h4>
                    </div>
                    <div class="portfolio-info">
                        <ul>
                            <li class="mb-2" style="list-style: none"><strong>Kategori Program</strong> <span style="color: #E39A06">{{ $program->kategori->nama }}</span></li>
                            <li class="mb-2" style="list-style: none"><strong>Pembuat Donasi</strong> <span style="color: #E39A06">{{ $program->user->name }}</span></li>
                            <li class="mb-2" style="list-style: none"><strong>Batas Akhir Donasi</strong> <span style="color: #E39A06">{{ \Carbon\Carbon::parse($program->deadline)->translatedFormat('l, d F Y') }}</span></li>
                            <li class="mb-2" style="list-style: none"><strong>Target Donasi</strong><span style="color: #E39A06"> Rp {{ number_format($program->targetdana, 2, ',','.') }}</span></li>
                            <li class="mb-3" style="list-style: none">
                                <div class="aksi d-flex justify-content-start">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#{{ $program->id }}" style="margin-right: 5px; border-radius: 5px; background-color: rgb(8, 80, 65); color: white;">Verifikasi Program</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#{{ $program->slug }}" style="margin-right: 5px; border-radius: 5px; background-color: rgb(80, 8, 8); color: white;">Batalkan Program</button>
                                    </div>
                                </div>

                                {{-- Modal button acc --}}
                                <div class="modal fade" id="{{ $program->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-1" id="exampleModalLabel">{{ $program->nama }}</h1>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin untuk memverifikasi progam ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Kembali</button>
                                                <form action="/dash-verifikasiprogrampending" method="post" >
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $program->id }}">
                                                    <button type="submit" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgba(11, 15, 82, 0.361); color: white; padding: 12px 27px 12px 27px">Iya</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal --}}

                                {{-- Modal button reject --}}
                                <div class="modal fade" id="{{ $program->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="background-color: #2A3038; color:white; border-radius: 1rem; width: 1150px;">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-1" id="exampleModalLabel">{{ $program->nama }}</h1>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin untuk membatalkan program ini?
                                            </div>
                                            <form action="/dash-rejectprogrampending" method="post" >
                                                @csrf
                                                <div class="hapus d-flex justify-content-center">
                                                    <input type="text" name="pesanbatal" class="form-control" style="width: 90%; background-color: rgb(44, 12, 12); border-radius: 5px" placeholder="Berikan alasan mengapa anda membatalkan program donasi ini!" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="margin-right: 5px; border-radius: 5px; background-color: rgb(13, 105, 30); color: white; padding: 12px 27px 12px 27px">Kembali</button>
                                                    <input type="hidden" name="id" value="{{ $program->id }}">
                                                    <button type="submit" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgba(82, 28, 11, 0.361); color: white; padding: 12px 27px 12px 27px">Batalkan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
