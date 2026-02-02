@extends('layouts.app') {{-- Pastikan ini mengarah ke file layout nomor 1 yang kamu kirim --}}

@section('content') {{-- Ganti 'konten' jadi 'content' agar sesuai dengan @yield di layout --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 mt-5">
                <div class="card-body p-4">
                    <div class="app-brand justify-content-center mb-4 text-center">
                        <h3 class="fw-bolder text-uppercase text-primary">INVAS</h3>
                    </div>
                    
                    <h4 class="mb-2">Daftar Akun Baru 🚀</h4>
                    <p class="mb-4 text-muted">Silakan isi data untuk mengelola inventaris.</p>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama Anda" value="{{ old('name') }}" required autofocus>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="nama@email.com" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold">Role Akses</label>
                            <select name="role" class="form-select" required>
                                <option value="" disabled selected>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="••••••••" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-dark fw-bold">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="••••••••" required>
                        </div>

                        <button class="btn btn-primary d-grid w-100 shadow-sm py-2" type="submit">Daftar Sekarang</button>
                    </form>

                    <p class="text-center mt-3">
                        <span>Sudah punya akun?</span>
                        <a href="{{ route('login') }}" class="text-primary fw-bold"> Login di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection