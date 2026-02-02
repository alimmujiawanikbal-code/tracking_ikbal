@extends('layouts.dashboard')
@section('title', 'Add New User')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6"> {{-- Membuat form tidak terlalu lebar --}}
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                    <h5 class="mb-0 fw-bold"><i class="bx bx-user-plus me-2"></i>Tambah Pengguna</h5>
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>
                <div class="card-body mt-4">
                    <form action="{{ route('dashboard.users.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-medium">Nama Lengkap</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                    id="name" name="name" placeholder="Masukkan nama" value="{{ old('name') }}" required autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Alamat Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                    id="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label fw-medium">Role / Hak Akses</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="" selected disabled>Pilih Role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-medium">Password</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                    id="password" name="password" placeholder="••••••••" required>
                            </div>
                            <small class="text-muted">Gunakan minimal 8 karakter dengan kombinasi angka.</small>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bx bx-save me-1"></i> Simpan Data Pengguna
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection