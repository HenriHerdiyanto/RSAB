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
    <h1>Edit Pegawai</h1>
    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{ $pegawai->name }}" class="form-control">
                    </div>
                </div>
        
                <div class="form-group">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $pegawai->email }}" class="form-control">
                    </div>
                </div>
        
                <div class="form-group">
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password baru jika ingin mengubahnya">
                        <small class="form-text text-muted">
                            Jika Anda tidak mengganti password, password lama akan tetap digunakan.
                        </small>
                    </div>
                </div>                
        
                <div class="form-group">
                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="form-group">
                    <div class="mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L" {{ $pegawai->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $pegawai->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
        
                <div class="form-group">
                    <div class="mb-3">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" value="{{ $pegawai->alamat }}">
                            {{ $pegawai->alamat }}
                        </textarea>
                    </div>
                </div>
        
                <div class="form-group">
                    <div class="mb-3">
                        <label>No HP</label>
                        <input type="text" name="no_hp" value="{{ $pegawai->no_hp }}" class="form-control">
                    </div>
                </div>

                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-success mt-3">UPDATE</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
