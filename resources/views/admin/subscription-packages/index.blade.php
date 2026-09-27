@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Paket Langganan</h2>
        <a href="{{ route('admin.subscription-packages.create') }}" class="btn btn-primary">Tambah Paket Langganan</a>
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
                            <th>Nama Paket</th>
                            <th>Deskripsi</th>
                            <th>Warna Tampilan</th>
                            <th>Harga</th>
                            <th style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscriptionPackages as $package)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->description }}</td>
                                <td>
                                    <span class="badge" style="background-color: {{ $package->color }}; color: #fff;">
                                        {{ $package->color }}
                                    </span>
                                </td>
                                <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('admin.subscription-packages.edit', $package->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.subscription-packages.destroy', $package->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus paket langganan ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada paket langganan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
