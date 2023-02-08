@extends('layouts.admin.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Session::has('message'))
        <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} <button type="button"
                class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>
        @endif
          <form action="{{route('pengaduan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">Tambah Pengaduan</div>

                <div class="card-body">
                    {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                    <div class="form-group">
                            <label for="">Nama Siswa</label>
                            <select name="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror">
                                <option value="">Pilih Nama Siswa</option>
                                @foreach(App\Models\Siswa::all() as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                
                                @error('siswa_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                    </div>
                    <div class="form-group">
                            <label for="">Kategori</label>
                            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach(App\Models\Kategori::all() as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->keterangan }}</option>
                                @endforeach
                
                                @error('kategori_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </select>
                    </div>
                    <div class="form-group">
                      <label for="lokasi">Lokasi</label>
                      <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror">
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <textarea name="keterangan" class = "form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                      @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <input type="file" name="foto" class = "form-control @error('foto') is-invalid @enderror" value="">
                      @error('foto')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class = "btn btn-primary">Laporkan</button>
                    </div>
                </div>
              </div>
            </div>
            </form>
        </div>
    </div>
</div>
    @endsection
