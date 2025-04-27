@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Tindakan</h1>
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
                    <h4 class="card-title">Tambah Tindakan</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Tindakan
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
                                    Tambah Tindakan</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('tindakan.store') }}" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    <p class="small">Pastikan semua kolom terisi</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Tindakan</label>
                                                <input id="addName" type="text" name="nama_tindakan" class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Tarif Tindakan</label>
                                                <input id="addName" type="text" name="tarif_tindakan" class="form-control" placeholder="fill name">
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
                                <th>Nama Tindakan</th>
                                <th>Tarif Tindakan</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Tindakan</th>
                                <th>Tarif Tindakan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($tindakans as $item)
                                <tr>
                                    <td>{{ $item->nama_tindakan }}</td>
                                    <td>{{ $item->tarif_tindakan }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('tindakan.edit', $item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('tindakan.destroy', $item->id) }}" method="POST">
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
