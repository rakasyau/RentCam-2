@extends('layouts.guest')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">Tambah Kamera Baru</div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops! Ada masalah dengan inputanmu:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('cameras.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Kamera</label>
                        <input type="text" name="name" class="form-control" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Kategori</label>
                        <select name="category" class="form-control">
                            <option value="DSLR">DSLR</option>
                            <option value="Mirrorless">Mirrorless</option>
                            <option value="Action Cam">Action Cam</option>
                            <option value="Drone">Drone</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Stok Unit</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Harga Sewa per Hari (Rp)</label>
                        <input type="number" name="price_per_day" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Foto Kamera</label>
                        <input type="file" name="image" class="form-control" required>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan Data</button>
                <a href="{{ route('cameras.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection