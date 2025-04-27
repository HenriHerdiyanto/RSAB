@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-md-12">
        <!-- Pesan Error -->
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Edit Pasien</h3>
            </div>
            <form action="{{ route('registrasi.update', $transaksis->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Registrasi</label>
                                <input type="date" name="tanggal_registrasi" value="{{ $transaksis->tanggal_registrasi }}" class="form-control">
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Nama Pasien</label>
                                <select name="id_pasien" class="form-control">
                                    <option value="{{ $transaksis->id_pasien }}" selected>{{ $transaksis->pasien->name }}</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Nama Dokter</label>
                                <select name="id_dokter" class="form-control">
                                    <option value="{{ $transaksis->id_dokter }}" selected>{{ $transaksis->dokter->name }}</option>
                                    @foreach ($dokter as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Nama Pegawai</label>
                                <select name="id_pegawai" class="form-control">
                                    <option value="{{ $transaksis->id_pegawai }}" selected>{{ $transaksis->pegawai->name }}</option>
                                    @foreach ($pegawai as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Asuransi</label>
                                <select name="id_asuransi" class="form-control">
                                    <option value="{{ $transaksis->id_asuransi }}" selected>{{ $transaksis->asuransi->nama_asuransi }}</option>
                                    @foreach ($asuransis as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_asuransi }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Nomor Asuransi</label>
                                <input type="text" name="nomor_asuransi" value="{{ $transaksis->nomor_asuransi }}" class="form-control">
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Nama Ruangan</label>
                                <select name="id_ruangan" class="form-control">
                                    <option value="{{ $transaksis->id_ruangan }}" selected>{{ $transaksis->ruangan->nama_ruangan }}</option>
                                    @foreach ($ruangans as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-3">UPDATE</button>
                            </div>
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.card-body -->
            </form>
        </div> <!-- /.card -->
    </div> <!-- /.container -->
    
</div>
@endsection
