@extends('layouts.admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Session::has('message'))
        <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} </p>
        @endif
          <form action="{{route('kategori.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Tambah Data Kategori</div>

                <div class="card-body">
                    <div class="form-group">
                      <label for="keterangan">Kategori</label>
                      <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
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
