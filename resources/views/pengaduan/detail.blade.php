@extends('layouts.admin.master')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="card">
            <div class="card-header"><b>Detail Pengaduan</b></div>
            <div class="card-body">
                <div class="form-group">
                    Nama Pelapor : <b>{{ $pengaduan->siswa->nama }}</b><br>
                    NISN : <b>{{ $pengaduan->siswa->nisn }}</b><br>
                    Status :
                    @if(empty(App\Models\Aspirasi::where('pengaduan_id',$pengaduan->id)->latest()->first()->status))
                    <b>Belum dilihat</b>
                    @else
                    <b>{{ App\Models\Aspirasi::where('pengaduan_id',$pengaduan->id)->latest()->first()->status}}</b></b>
                    @endif  
                    <br>
                    Isi Pengaduan : <b>{{ $pengaduan->keterangan }}</b><br>
                    Foto : <br><img src="{{ asset('foto') }}/{{ $pengaduan->foto }}" width="50%"> <br>
                    History : <br>
                    @foreach(App\Models\Aspirasi::where('pengaduan_id',$pengaduan->id)->get() as $aspirasi)
                    <b>{{ $aspirasi->created_at }} - {{ $aspirasi->feedback }}</b><br>
                    @endforeach
                </div>
                <div class="form-group">
                    <a href="{{ route('aspirasi.show', [$pengaduan->id]) }}"><button class="btn btn-primary">Beri Aspirasi</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection