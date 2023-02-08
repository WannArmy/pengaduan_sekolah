@extends('layouts.admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Session::has('message'))
        <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} </p>
        @endif
          <form action="{{route('siswa.update', [$siswa->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card">
                <div class="card-header">Ubah Data Siswa</div>

                <div class="card-body">
                    <div class="form-group">
                      <label for="nisn">NISN</label>
                      <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{ $siswa->nisn }}">
                      @error('nisn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Siswa</label>
                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $siswa->nama }}">
                      @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" class = "form-control @error('alamat') is-invalid @enderror">{{ $siswa->alamat }}</textarea>
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
