@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="{{ route('user.give-access', $user->id) }}" method="POST">
                @csrf
                <h4>Berikan Akses Menu untuk {{ $user->name }}</h4>
            
                @foreach($menus as $menu)
                    <div>
                        <input type="checkbox" name="menu_ids[]" value="{{ $menu->id }}"
                            {{ in_array($menu->id, $user->menus->pluck('id')->toArray()) ? 'checked' : '' }}>
                        {{ $menu->name }}
                    </div>
                @endforeach
            
                <button type="submit" class="btn btn-primary">Simpan Akses</button>
            </form>
        </div>
    </div>
</div>
    
@endsection