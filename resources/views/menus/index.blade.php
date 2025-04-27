@extends('layouts.admin') <!-- Ini kalau kamu pakai template utama, kalau tidak hapus saja -->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Tambah Pasien</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah Pasien
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
                                        Tambah Menu</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('menus.store') }}" method="POST">
                                    <div class="modal-body">
                                        <p class="small">Pastikan semua kolom terisi</p>
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Menu</label>
                                                    <input id="addName" type="text" name="name" class="form-control" placeholder="fill name">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Route</label>
                                                    <input type="text" name="route_name" class="form-control" placeholder="Masukkan nama route">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" class="btn btn-primary">Add</button>
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
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Route</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Route</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($menus as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->route_name }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ route('user.give-access', $item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('menus.destroy', $item->id) }}" method="POST">
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
</div>
@endsection
