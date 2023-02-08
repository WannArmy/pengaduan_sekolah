@extends('layouts.admin.master')
@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-info" href="{{ route('pengaduan/create') }}"> [+] Add pengaduan</a><br><br>
        <h6 class="m-0 font-weight-bold text-primary">List pengaduan</h6><br>
        <form class="d-none d-md-flex" action="/pengaduan">
            <input class="form-control border-1" type="search" placeholder="Search ..." name="search" value="{{ request('search') }}">
        </form>
    </div>
    <div class="card-body">
        @if(Session::has('message'))
        <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} </p>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                    <tr>
                        <th scope="col" style="text-align:center;">No</th>
                        <th scope="col" style="text-align:center;">Nama</th>
                        <th scope="col" style="text-align:center;">Lokasi</th>
                        <th scope="col" style="text-align:center;">Keterangan</th>
                        <th scope="col" style="text-align:center;">Foto</th>
                        <th scope="col" colspan="3" style="text-align:center;" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($pengaduans)>0)
                    @foreach ($pengaduans as $pengaduan)
                    <tr>
                        <th scope="row" style="text-align:center;">{{ $loop->iteration }}</th>
                        <td style="text-align:center;">{{ $pengaduan->siswa->nama }}</td>
                        <td style="text-align:center;">{{ $pengaduan->lokasi }}</td>
                        <td style="text-align:center;">{{ $pengaduan->keterangan }}</td>
                        <td style="text-align:center;"><a href="{{ asset('foto') }}/{{ $pengaduan->foto }}" target="_blank"><img src="{{ asset('foto') }}/{{ $pengaduan->foto }}" width="120px"></a></td>
                        <td style="text-align:center;"><a href="{{ route('pengaduan.show', [$pengaduan->id]) }}"
                                class="btn btn-warning">View</a></td>
                        <td style="text-align:center;"><a href="{{ route('pengaduan.edit', [$pengaduan->id]) }}"
                                class="btn btn-info">Edit</a></td>
                        <td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{$pengaduan->id}}">Delete</button></td>
                    </tr>

                    <div class="modal fade" id="exampleModal{{$pengaduan->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ route('pengaduan.destroy', [$pengaduan->id]) }}" method="POST">@csrf
                                {{method_field('DELETE')}}
                                <div class="modal-content">
                                    <div class="modal-header" style="display:flex;">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Pengaduan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah kamu yakin ingin menghapus data {{ $pengaduan->nama }} ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <td colspan="7" style="text-align:center;"><br>
                        <p>Tidak ada pengaduan yang dapat ditampilkan.</p>
                    </td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection