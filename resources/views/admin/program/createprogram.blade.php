@extends('layouts.admin')
@section('erga')
    <div class="title mb-4">
        <h1 class="text-center" style="font-family:courier new; font-style: initial;">Buat Program Donasi</h1>
    </div>
    {{-- Start Form --}}
    <div class="row justify-content-center">
        <div class="col-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Program Bantu Mereka</h4>
                    {{-- <p class="card-description"> Basic form elements </p> --}}
                    <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender">
                        <option>Male</option>
                        <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        {{-- <input type="file" name="img[]" class="file-upload-default"> --}}
                        <div class="input-group col-xs-12">
                            <input type="file" class="form-control file-upload-info" style="background-color: #2A3038; height: 2.875rem; padding: 0.56rem 0.75rem; font-size: 0.875rem;
                            font-weight: 400; color: #495057; border-radius: 2px" placeholder="Upload Image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
