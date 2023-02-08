@extends('layouts.admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Session::has('message'))
        <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} </p>
        @endif
          <form action="{{route('kategori.update', [$kategori->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="card">
                <div class="card-header">Ubah Data Kategori</div>

                <div class="card-body">
                    <div class="form-group">
                      <label for="keterangan">Kategori</label>
                      <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ $kategori->keterangan }}">
                      @error('nisn')
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
