@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Daftar User Website Bantu Mereka</h1>
    </div>
    <div class="row ">
        <div class="col-12 grid-margin">
            @if (session()->has('success'))
                <div class="row justify-content-end" style="padding-right: 18px">
                    <div class="alert alert-success col-lg-4" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col" style="padding-left: 28px">
                            <h4 class="card-title">Data Master User</h4>
                        </div>
                        <div class="col d-flex justify-content-end" style="padding-right: 23px">
                            <a class="btn btn-primary" style="margin-right: 5px; border-radius: 5px; background-color: rgb(11, 136, 156); padding: 12px 27px 12px 27px" href="/dash-buatkategori"><span style="font-size: 20px; color:rgb(245, 230, 17)">+</span> Tambahkan Kategori</a>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-lg-6" style="padding-left: 30px">
                            <strong>Jumlah pengguna website : {{ $user->count() }}</strong>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center">

                            <thead>
                                <tr>
                                    <th>
                                        <strong>No</strong>
                                    </th>
                                    <th> Nama </th>
                                    <th> Username </th>
                                    <th> Email </th>
                                    <th> No Telepon </th>
                                    <th> Tanggal Lahir </th>
                                    <th> Jenis Kelamin </th>
                                    <th> Total Saldo Donasi </th>
                                    <th> Status User </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($user == null)

                            </tbody>
                        </table>
                                    <div class="text-center mt-3">
                                        <strong style="color: #6C7293; font-family:courier new">Daftar user website tidak tersedia!</strong>
                                    </div>
                                @else

                                    @foreach ($user as $us)
                                        <tr>
                                            <td>
                                                <strong>{{ $loop->iteration }}</strong>
                                            </td>
                                            <td>
                                                <span class="pl-2">{{ $us->name }}</span>
                                            </td>
                                            <td> {{ $us->username }} </td>
                                            <td> {{ $us->email }} </td>
                                            <td>
                                                @if ($us->notelp)
                                                    {{ $us->notelp }}
                                                @else
                                                    <strong>-</strong>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($us->tgllahir)
                                                    {{ $us->tgllahir }}
                                                @else
                                                    <strong>-</strong>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($us->gender)
                                                    @if ($us->gender == 1)
                                                        Pria
                                                    @else
                                                        Wanita
                                                    @endif
                                                @else
                                                    <strong>-</strong>
                                                @endif
                                            </td>
                                            <td> {{ $us->totalsaldo }} </td>
                                            <td>
                                                @if ($us->roleid == 1)
                                                    <div class="badge badge-outline-info" style="padding-left: 24px; padding-right: 24px">Admin</div>
                                                @else
                                                    <div class="badge badge-outline-success" style="padding-left: 24px; padding-right: 24px">User</div>
                                                @endif
                                            </td>
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
