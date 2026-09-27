@extends('layout.app')

@section('content')
    <div class="card mt-5 w-50 d-block mx-auto ">
        <h1>Edit Kategori Buku</h1>
        <div class="card-body">
            <form action="{{ route('admin.book-categories.update', $bookCategory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" value="{{ old('name', $bookCategory->name) }}" id="name" @error('name') is-invalid @enderror name="name" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit kategori</button>
            </form>
        </div>
    </div>
@endsection
