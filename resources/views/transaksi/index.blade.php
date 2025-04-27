@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Transaksi</h1>
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
                    <h4 class="card-title">Tambah Transaksi</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Transaksi
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
                                    Tambah Transaksi</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            {{-- <form action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <p class="small">Pastikan semua kolom terisi</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Pilih Pasien</label>
                                                <select name="id_pasien" class="form-control">
                                                    <option>--- PILIH ---</option>
                                                    @foreach ($registrasi as $item)
                                                        @if($item->user)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->user->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Pilih Tindakan</label>
                                                <select name="id_tindakan" class="form-control">
                                                    <option>--- PILIH ---</option>
                                                    @foreach ($tindakans as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->nama_tindakan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">  
                                            <div class="form-group form-group-default">                                  
                                                <ul class="list-group">
                                                    @foreach ($tindakans as $tindakan)
                                                        <li class="list-group-item">
                                                            <input 
                                                                class="form-check-input me-1" 
                                                                type="checkbox" 
                                                                name="tindakan_ids[]" 
                                                                value="{{ $tindakan->id }}" 
                                                                id="tindakan_{{ $tindakan->id }}">
                                                            <label class="form-check-label" for="tindakan_{{ $tindakan->id }}">
                                                                {{ $tindakan->nama_tindakan }}
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Pegawai</label>
                                                <input type="hidden" name="id_pegawai" value="{{ Auth::user()->id }}" class="form-control">
                                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form> --}}
                            <form action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <p class="small">Pastikan semua kolom terisi</p>
                                    <div class="row">
                                        <!-- Pilih Pasien -->
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Pilih Pasien</label>
                                                <select name="id_registrasi" class="form-control">
                                                    <option>--- PILIH ---</option>
                                                    @foreach ($registrasi as $item)
                                                        @if($item->user) <!-- Pastikan ada user yang terkait dengan registrasi -->
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->user->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <!-- Pilih Tindakan -->
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Pilih Tindakan</label>
                                                <select name="id_tindakan" class="form-control">
                                                    <option>--- PILIH ---</option>
                                                    @foreach ($tindakans as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->nama_tindakan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                            
                                        <!-- Name Pegawai (hidden input) -->
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Pegawai</label>
                                                <input type="hidden" name="id_pegawai" value="{{ Auth::user()->id }}" class="form-control">
                                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
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
                                <th>Nama Pasien</th>
                                <th>Tindakan Diambil</th>
                                <th>Pegawai</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Pasien</th>
                                <th>Tindakan Diambil</th>
                                <th>Pegawai</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- {{ dd($registrasis) }} --}}
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->id_registrasi }}</td>
                                    <td>{{ $transaksi->id_tindakan }}</td>
                                    <td>{{ $transaksi->id_pegawai }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('transaksi.edit', $item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('users.access', $item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg" data-original-title="Transaksi">
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                            <form action="{{ route('pasien.destroy', $item->id) }}" method="POST">
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
