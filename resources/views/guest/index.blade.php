@extends('layouts.guest')

@section('content')
<div class="container mt-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h2>Daftar Kamera Tersedia</h2>
        </div>
        
        <div class="col-md-6">
            <form action="{{ route('home') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama kamera..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    @if(request('search'))
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        <!--kategori kamera-->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex gap-2 overflow-auto pb-2">
                    <a href="{{ route('home') }}" 
                    class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-light' }} rounded-pill px-4"
                    style="{{ !request('category') ? '' : 'color: var(--text-color); border-color: var(--glass-border); background: var(--glass-bg); backdrop-filter: blur(5px);' }}">
                    Semua
                    </a>

                    @foreach($categories as $cat)
                        <a href="{{ route('home', ['category' => $cat, 'search' => request('search')]) }}" 
                        class="btn {{ request('category') == $cat ? 'btn-primary' : 'btn-outline-light' }} rounded-pill px-4"
                        style="{{ request('category') == $cat ? '' : 'color: var(--text-color); border-color: var(--glass-border); background: var(--glass-bg); backdrop-filter: blur(5px);' }}">
                        {{ $cat }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if($cameras->isEmpty())
        <div class="alert alert-warning text-center">
            <i class="fas fa-exclamation-circle"></i> 
            Maaf, kamera dengan kata kunci <strong>"{{ request('search') }}"</strong> tidak ditemukan.
        </div>
    @endif
    <div class="row">
        @foreach($cameras as $cam)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header" style="background-color: white;">
                    <img src="{{ asset('storage/'.$cam->image_path) }}" class="card-img-top" alt="{{ $cam->name }}" style="max-width: 50%; margin: auto; display: block;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $cam->name }}</h5>
                    <span class="badge bg-secondary">{{ $cam->category }}</span>
                    <p class="card-text">{{ Str::limit($cam->description, 50) }}</p>
                    <p class="fw-bold">Rp {{ number_format($cam->price_per_day) }} / hari</p>
                    <p class="text-muted">Stok: {{ $cam->quantity }}</p>

                    @if($cam->quantity > 0)
                        <form action="{{ route('cart.add', $cam->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Tambahkan</button>
                        </form>
                    @else
                        <button class="btn btn-danger w-100" disabled>Habis</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    @if(session('cart'))
        <div class="fixed-bottom bg-light p-3 border-top">
            <div class="container d-flex justify-content-between">
                <h4 class="text-black">Item di Keranjang: {{ count(session('cart')) }}</h4>
                <a href="{{ route('cart.view') }}" class="btn btn-success">Lihat Detail & Booking</a>
            </div>
        </div>
    @endif
</div>
@endsection