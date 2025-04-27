@extends('layouts.admin') {{-- Kalau kamu pakai layout, misal pakai Bootstrap --}}

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Selamat datang, {{ $user->name }}!</h5>

            <p class="card-text">
                Email: {{ $user->email }}<br>
                Role: {{ $user->role ?? 'Tidak ada role' }}
            </p>

            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="btn btn-danger">
               Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
