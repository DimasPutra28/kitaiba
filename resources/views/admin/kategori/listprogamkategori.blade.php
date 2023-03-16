@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Daftar Program Kategori: {{ $kategori[0]->nama }}</h1>
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
                        <div class="col-lg-6" style="padding-left: 40px">
                            <h4 class="card-title">Data program</h4>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end" style="padding-right: 63px">
                            <a class="btn btn-primary" style="border-radius: 5px; background-color: rgb(196, 106, 16); padding: 12px 27px 12px 27px;" href="/dash-kategoriprogram">Kembali</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center">

                            <thead>
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama program </th>
                                    <th> Slug </th>
                                    <th> Dibuat oleh </th>
                                    <th> Dana terkumpul </th>
                                    <th> Target dana </th>
                                    <th> Status program </th>
                                    <th> Tanggal dibuat </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($program)

                            </tbody>
                        </table>
                                <div class="text-center mt-3">
                                    <strong style="color: #6C7293; font-family:courier new">Belum ada program di kategori ini!</strong>
                                </div>
                                @else

                                    @foreach ($program as $prog)
                                    <tr>
                                        <td>
                                            <strong>{{ $loop->iteration }}</strong>
                                        </td>
                                        <td>
                                            <span class="pl-2">{{ $prog->nama }}</span>
                                        </td>
                                        <td> {{ $prog->slug }} </td>
                                        <td> {{ $prog->user->name }} </td>
                                        <td> {{ $prog->danaskrg }} </td>
                                        <td> {{ $prog->targetdana }} </td>
                                        <td> {{ $prog->status }} </td>
                                        <td> {{ $prog->created_at->format('dd/mm/yyyy') }} </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                                @endif
                    <div>
                </div>
            </div>
        </div>
    </div>
@endsection
