@extends('layouts.guest')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning">Edit Kamera: {{ $camera->name }}</div>
        <div class="card-body">
            <form action="{{ route('cameras.update', $camera->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Kamera</label>
                        <input type="text" name="name" value="{{ $camera->name }}" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Kategori</label>
                        <select name="category" class="form-control">
                            <option value="DSLR" {{ $camera->category == 'DSLR' ? 'selected' : '' }}>DSLR</option>
                            <option value="Mirrorless" {{ $camera->category == 'Mirrorless' ? 'selected' : '' }}>Mirrorless</option>
                            <option value="Action Cam" {{ $camera->category == 'Action Cam' ? 'selected' : '' }}>Action Cam</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Stok Unit</label>
                        <input type="number" name="quantity" value="{{ $camera->quantity }}" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Harga Sewa per Hari</label>
                        <input type="number" name="price_per_day" value="{{ $camera->price_per_day }}" class="form-control" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3">{{ $camera->description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Ganti Foto (Kosongkan jika tidak ingin mengganti)</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Foto saat ini:</small> <br>
                        <img src="{{ asset('storage/'.$camera->image_path) }}" width="100">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('cameras.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection