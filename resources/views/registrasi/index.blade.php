@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Data Registrasi</h1>
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
                    <h4 class="card-title">Tambah Registrasi</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Registrasi
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
                                    Tambah Registrasi</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('registrasi.store') }}" method="POST">
                                <div class="modal-body">
                                    <p class="small">Pastikan semua kolom terisi</p>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal Registrasi</label>
                                                <input type="date" name="tanggal_registrasi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Pasien</label>
                                                <select name="id_pasien" class="form-control">
                                                    <option>--- PILIH ---</option>
                                                    @foreach ($user as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Dokter</label>
                                                <select name="id_dokter" class="form-control">
                                                    <option>--- PILIH ---</option>
                                                    @foreach ($dokter as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Pegawai</label>
                                                <input type="hidden" name="id_pegawai" value="{{ Auth::user()->id }}" class="form-control">
                                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Asuransi</label>
                                                <select name="id_asuransi" class="form-control">
                                                    <option>--- PILIH ---</option>
                                                    @foreach ($asuransi as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_asuransi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>No Asuransi</label>
                                                <input type="text" name="nomor_asuransi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Ruangan</label>
                                                <select name="id_ruangan" class="form-control">
                                                    <option>--- PILIH ---</option>
                                                    @foreach ($ruangan as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_ruangan }}</option>
                                                    @endforeach
                                                </select>
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
                                <th>Tanggal Registrasi</th>
                                <th>Nama Pasien</th>
                                <th>Dokter</th>
                                <th>Pegawai</th>
                                <th>Asuransi</th>
                                <th>Ruangan</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal Registrasi</th>
                                <th>Nama Pasien</th>
                                <th>Dokter</th>
                                <th>Pegawai</th>
                                <th>Asuransi</th>
                                <th>Ruangan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- {{ dd($registrasis) }} --}}
                            @foreach ($registrasis as $item)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_registrasi)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $item->pasien->name }}</td>
                                    <td>{{ $item->dokter->name }}</td>
                                    <td>{{ $item->pegawai->name }}</td>
                                    <td>{{ $item->asuransi->nama_asuransi }} <br> ( {{ $item->nomor_asuransi }} )</td>
                                    <td>{{ $item->ruangan->nama_ruangan }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('registrasi.edit', $item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
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
