@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <h1 class="text-bold">Edit Menu</h1>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama Menu</label>
                                        <input id="addName" type="text" name="name" class="form-control" value="{{ $menu->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Route</label>
                                        <input type="text" name="route_name" class="form-control" value="{{ $menu->route_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="submit" class="btn btn-success">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection