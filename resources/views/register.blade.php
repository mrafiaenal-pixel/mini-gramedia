@extends('layout.app');

@section('content')
    <form action="{{ route('register.store') }}" method="POST" class="form-fieldset w-50 mx-auto mt-5 p-3 border rounded">
        @csrf
        <div class="mb-3">
            <label class="form-label required">Nama Lengkap</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
            @error('name')
                {{-- memanggil err validasi --}}
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label required">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off" />
            @error('email')
                {{-- memanggil err validasi --}}
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" autocomplete="off" />
            @error('password')
                {{-- memanggil err validasi --}}
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" autocomplete="off" />
            @error('password_confirmation')
                {{-- memanggil err validasi --}}
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Buat Akun</button>
    </form>
@endsection
