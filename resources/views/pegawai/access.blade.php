@extends('layouts.admin') <!-- Atau layout yang kamu pakai -->

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4>Atur Akses Menu untuk {{ $user->name }}</h4>
            <form action="{{ route('pegawai.updateAccess', $user->id) }}" method="POST">
                @csrf
        
                <ul class="list-group">
                    @foreach ($menus as $menu)
                        <li class="list-group-item">
                            <input 
                                class="form-check-input me-1" 
                                type="checkbox" 
                                name="menu_ids[]" 
                                value="{{ $menu->id }}"
                                id="menu_{{ $menu->id }}"
                                {{ in_array($menu->id, $userMenuIds) ? 'checked' : '' }}>
                            <label class="form-check-label" for="menu_{{ $menu->id }}"> {{ $menu->name }} {{ $menu->id }}</label>
                        </li>
                    @endforeach
                </ul>
        
                <button type="submit" class="btn btn-primary mt-3">Simpan Akses</button>
            </form>
        </div>
    </div>
</div>
@endsection
