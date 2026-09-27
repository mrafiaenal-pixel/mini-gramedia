@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Kategori Buku</h2>
        <a href="{{ route('admin.book-categories.create') }}" class="btn btn-primary">Tambah Kategori Buku</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered bg-white mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Kategori</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($BookCategorys as $bookCategory)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $bookCategory->name }}</td>
                                <td>
                                    <a href="{{ route('admin.book-categories.edit', $bookCategory->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.book-categories.destroy', $bookCategory->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada kategori buku.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
