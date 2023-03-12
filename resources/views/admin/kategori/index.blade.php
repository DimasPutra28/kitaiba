@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Kategori Program Donasi Bantu Mereka</h1>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-end">
                    <div class="alert alert-success col-lg-3" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <h4 class="card-title">Data Master Kategori Program</h4>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a class="btn btn-primary" style="margin-right: 5px; border-radius: 5px; background-color: rgb(11, 136, 156); padding: 12px 27px 12px 27px" href="/dash-buatkategori"><span style="font-size: 20px; color:rgb(245, 230, 17)">+</span> Tambahkan Kategori</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center">

                            <thead>
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama Kategori </th>
                                    <th> Slug </th>
                                    <th> Dibuat oleh </th>
                                    <th> Tanggal dan Waktu dibuat </th>
                                    <th> Tanggal dan Waktu diupdate </th>
                                    <th> List Program </th>
                                    <th> Tindakan </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($kategori as $kat)
                                <tr>
                                    <td>
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    <td>
                                        <span class="pl-2">{{ $kat->nama }}</span>
                                    </td>
                                    <td> {{ $kat->slug }} </td>
                                    <td> {{ $kat->user->name }} </td>
                                    <td> {{ $kat->created_at }} </td>
                                    <td> {{ $kat->updated_at }} </td>
                                    <td> <a class="btn btn-primary" style="margin-right: 5px; border-radius: 5px; background-color: rgb(50, 45, 134); padding: 12px 27px 12px 27px" href="">Detail</a> </td>
                                    <td>
                                        @if (auth()->user()->id === $kat->user->id)
                                            <div class="row justify-content-center">
                                                <a href="/dash-updatekategori/{{ $kat->slug }}" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(26, 100, 63); color: white; padding: 12px 27px 12px 27px">Update</a>
                                                <form action="/dash-hapuskategori" >
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $kat->id }}">
                                                    <button type="submit" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">Hapus</button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="row justify-content-center">
                                                <a href="/dash-updatekategori/{{ $kat->slug }}" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(26, 100, 63); color: white; padding: 12px 27px 12px 27px; pointer-events: none" disabled>Update</a>
                                                <form action="">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $kategori[0]->id }}">
                                                    {{-- <button type="submit" class="nav-link active btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus Post?')">Delete</button> --}}
                                                    <button type="submit" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px; pointer-events: none">Hapus</button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
