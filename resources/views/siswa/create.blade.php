@extends('layouts.admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Session::has('message'))
        <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} </p>
        @endif
          <form action="{{route('siswa.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Tambah Data Siswa</div>

                <div class="card-body">
                    <div class="form-group">
                      <label for="nisn">NISN</label>
                      <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Siswa</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" class = "form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                      @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class = "btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
    @endsection
