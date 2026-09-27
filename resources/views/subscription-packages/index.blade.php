@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-dark">Pilihan Paket Langganan</h1>
        <p class="text-secondary">Pilih paket langganan terbaik untuk mengakses koleksi buku favorit Anda.</p>
    </div>

    <div class="row g-4 justify-content-center">
        @forelse ($subscriptionPackages as $package)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0" style="background: linear-gradient(135deg, #ffffff 0%, {{ $package->color ?? '#a7f1c6' }}); border-radius: 12px;">
                    <div class="card-body p-4 text-dark d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge bg-yellow text-yellow-fg p-2">
                                    <i class="fa-solid fa-crown fs-4"></i>
                                </span>
                                <span class="badge bg-primary-subtle text-primary fw-bold">Active</span>
                            </div>
                            <h2 class="fw-bold mb-1 text-uppercase">{{ $package->name }}</h2>
                            <p class="text-secondary fw-semibold mb-3">{{ $package->description }}</p>
                        </div>
                        <div class="mt-4">
                            <div class="mb-3">
                                <span class="text-secondary fw-bold fs-6">Rp</span>
                                <span style="font-size: 2.2rem; font-weight: bold;" class="text-warning ms-1">
                                    {{ number_format($package->price, 0, ',', '.') }}
                                </span>
                                <span class="text-secondary fw-bold"> / 30 Hari</span>
                            </div>
                            <button class="btn btn-primary w-100 py-2 fw-bold">Pilih Paket</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="text-muted fs-4">Belum ada paket langganan yang tersedia saat ini.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
