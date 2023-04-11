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
            <div class="col-7 grid-margin stretch-card">
                <div class="card" style="background-color: #008374">
                    <div class="card-body">
                        <h4 class="card-title text-center">Program Bantu Mereka</h4>
                        {{-- <p class="card-description"> Basic form elements </p> --}}
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-1">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="mb-1">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <select class="form-select" data-control="select2" data-placeholder="Select an option">
                                    <option></option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                </select>
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
