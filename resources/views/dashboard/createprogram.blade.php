@extends('layouts.dashboard')

@section('erga')
<main id="main">
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Sample Inner Page</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Buat Program Penggalangan Dana</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <section class="sample-page">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-center">
            <div class="col-6 grid-margin stretch-card">
                <div class="card" style="background-color: #bcc1c1">
                    <div class="card-body">
                        <h4 class="card-title text-center">Program Bantu Mereka</h4>
                        {{-- <p class="card-description"> Basic form elements </p> --}}
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama">Nama Program</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Program" required value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label for="id_kategori" class="form-label">Kategori Program</label>
                                <select class="js-example-basic-single form-select" style="width:100%" id="id_kategori" name="id_kategori">
                                    <option selected>Pilih Kategori Program</option>
                                    @foreach ($kategori as $kat )
                                        @if (old('id_kategori') == $kat->id)
                                            <option value="{{ $kat->id }}" selected>{{ $kat->nama }}</option>
                                        @else
                                            <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-1">
                                <label for="deadline">Tenggat Donasi</label>
                                <input type="date" class="form-control @error('deadline') is-invalid @enderror"  name="deadline" min="{{ date('Y-m-d') }}" id="inputdate" placeholder="dd/mm/yyyy" required value="{{ old('deadline') }}" >
                                @error('deadline')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-1">
                                <label for="gambar">Gambar</label>
                                <div class="input-group col-xs-12">
                                    <input type="file" name="gambar" class="form-control file-upload-info @error('gambar') is-invalid @enderror" style="height: 2.875rem; padding: 0.56rem 0.75rem; font-size: 0.875rem;
                                    font-weight: 400; border-radius: 2px" placeholder="Upload Image" value="{{ old('gambar') }}">
                                </div>
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="row mt-5">
                                <div class="col">
                                    <button type="submit" class="btn btn-light" style="margin-right: 5px; border-radius: 5px; background-color: rgb(50, 45, 134); color: white; padding: 12px 27px 12px 27px">Tambah</button>
                                    <input type="reset" class="btn btn-light" style="border-radius: 5px; background-color: rgb(125, 26, 19); color: white; padding: 12px 27px 12px 27px">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </section>

  </main>
@endsection


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.simple-select2').select2({
                theme: 'bootstrap4',
                placeholder: "Select an option",
                allowClear: true
            });

            $('.simple-select2-sm').select2({
                theme: 'bootstrap4',
                containerCssClass: ':all:',
                placeholder: "Select an option",
                allowClear: true
            });
        });
    </script>
