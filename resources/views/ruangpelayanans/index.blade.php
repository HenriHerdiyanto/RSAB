@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Ruangan</h1>
    <!-- Pesan Sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Tambah Ruangan</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Ruangan
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                    Tambah Ruangan</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('ruangpelayanans.store') }}" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Ruangan</label>
                                                <input id="addName" type="text" name="nama_ruangan" class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Nama Ruangan</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangans as $item)
                                <tr>
                                    <td>{{ $item->nama_ruangan }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('ruangpelayanans.edit', $item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ruangpelayanans.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE') <!-- Gunakan DELETE, bukan POST -->
                                                <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
