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
    <div class="card">
        <div class="card-header">
            <h1>Edit Ruangan Pelayanan</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('ruangpelayanans.update', $ruangans->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama_ruangan" value="{{ $ruangans->nama_ruangan }}" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-success mt-3">UPDATE</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
