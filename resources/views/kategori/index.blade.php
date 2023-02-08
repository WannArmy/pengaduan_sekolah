@extends('layouts.admin.master')
@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-info" href="{{ url('kategori/create') }}"> [+] Add Kategori</a><br><br>
        <h6 class="m-0 font-weight-bold text-primary">List Kategori</h6>
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
                        <th scope="col" style="text-align:center;">Kategori</th>
                        <th scope="col" colspan="3" style="text-align:center;" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($kategoris)>0)
                    @foreach ($kategoris as $kategori)
                    <tr>
                        <th scope="row" style="text-align:center;">{{ $loop->iteration }}</th>
                        <td style="text-align:center;">{{ $kategori->keterangan }}</td>
                        <td style="text-align:center;"><a href="{{ route('kategori.edit', [$kategori->id]) }}"
                                class="btn btn-info">Edit</a></td>
                        <td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{$kategori->id}}">Delete</button></td>
                    </tr>

                    <div class="modal fade" id="exampleModal{{$kategori->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ route('kategori.destroy', [$kategori->id]) }}" method="POST">@csrf
                                {{method_field('DELETE')}}
                                <div class="modal-content">
                                    <div class="modal-header" style="display:flex;">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah kamu yakin ingin menghapus data ini?
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
                        <p>Tidak ada siswa yang dapat ditampilkan.</p>
                    </td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection