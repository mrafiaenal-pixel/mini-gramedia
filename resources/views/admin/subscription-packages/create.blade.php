@extends('layout.app')

@section('content')
    <div class="card mt-5 w-50 d-block mx-auto">
        <div class="card-header">
            <h3 class="card-title">Tambah Paket Langganan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.subscription-packages.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Paket</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: PREMIUM" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Paket</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Deskripsi paket..." required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Warna Tampilan (Hex / Name)</label>
                    <div class="d-flex gap-2">
                        <input type="color" class="form-control form-control-color" id="colorPicker" value="{{ old('color', '#a7f1c6') }}" title="Pilih warna" onchange="document.getElementById('color').value = this.value">
                        <input type="text" class="form-control @error('color') is-invalid @enderror" id="color" name="color" value="{{ old('color', '#a7f1c6') }}" placeholder="#a7f1c6" required>
                    </div>
                    @error('color')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="49000" required>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.subscription-packages.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Paket</button>
                </div>
            </form>
        </div>
    </div>
@endsection
