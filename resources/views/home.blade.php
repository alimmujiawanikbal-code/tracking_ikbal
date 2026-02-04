@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row g-4">
        {{-- Banner Selamat Datang --}}
        <div class="col-12">
            <div class="card bg-primary text-white p-4 overflow-hidden position-relative border-0 shadow">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h2 class="text-white fw-bold">Selamat Datang di Sistem Inventaris!</h2>
                        <p class="mb-4 opacity-75">Kelola barang, pantau lokasi, dan monitor peminjaman dalam satu dashboard terintegrasi.</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('laporan.index') }}" class="btn btn-light text-primary fw-bold rounded-pill px-4">Lihat Laporan</a>
                            <a href="{{ route('panduan') }}" class="btn btn-outline-light rounded-pill px-4 border-2">Panduan</a>
                        </div>
                    </div>
                    <div class="col-md-5 d-none d-md-block text-end">
                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/assets/img/illustrations/man-with-laptop-light.png" 
                             alt="Welcome" style="height: 160px; margin-bottom: -30px;">
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistik Dinamis --}}
        <div class="col-md-3">
            <div class="card h-100 p-3 text-center shadow-sm">
                <div class="mx-auto bg-label-primary p-3 rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bx bx-package fs-3"></i>
                </div>
                <h6 class="text-muted mb-1">Total Barang</h6>
                <h4 class="fw-bold mb-0">{{ \App\Models\Barang::count() }}</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 p-3 text-center shadow-sm">
                <div class="mx-auto bg-label-info p-3 rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bx bx-map-pin fs-3"></i>
                </div>
                <h6 class="text-muted mb-1">Lokasi Barang</h6>
                <h4 class="fw-bold mb-0">{{ \App\Models\Lokasi::count() }} Titik</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 p-3 text-center shadow-sm">
                <div class="mx-auto bg-label-warning p-3 rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bx bx-transfer-alt fs-3"></i>
                </div>
                <h6 class="text-muted mb-1">Peminjaman Aktif</h6>
                <h4 class="fw-bold mb-0">0</h4> {{-- Ganti dengan hitungan model peminjaman nanti --}}
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 p-3 text-center shadow-sm">
                <div class="mx-auto bg-label-danger p-3 rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bx bx-error-circle fs-3"></i>
                </div>
                <h6 class="text-muted mb-1">Barang Rusak</h6>
                <h4 class="fw-bold mb-0">0 Unit</h4>
            </div>
        </div>

        {{-- Tabel Barang Terbaru --}}
        <div class="col-lg-8">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-transparent border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Barang Terbaru</h5>
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Lokasi</th>
                                <th>Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($barangs)
                                @forelse($barangs as $barang)
                                <tr>
                                    <td><span class="fw-bold text-primary">#BRG-{{ $barang->id }}</span></td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    {{-- Menggunakan $barang->lokasi->nama sesuai kolom database kamu --}}
                                    <td><span class="badge bg-label-info px-3 rounded-pill">{{ $barang->lokasi->nama ?? 'Tanpa Lokasi' }}</span></td>
                                    <td><small class="text-muted">{{ $barang->created_at->format('d/m/Y') }}</small></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data barang.</td>
                                </tr>
                                @endforelse
                            @else
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted small italic">Memuat data...</td>
                                </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Aksi Cepat --}}
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">Aksi Cepat</h5>
                    
                    <a href="{{ route('dashboard.barang.create') }}" class="btn btn-primary w-100 mb-3 py-2 text-start d-flex align-items-center gap-3 text-decoration-none">
                        <i class="bx bx-plus-circle fs-4"></i> 
                        <span>Tambah Barang Baru</span>
                    </a>

                    <a href="{{ route('lokasi.create') }}" class="btn btn-outline-success w-100 mb-3 py-2 text-start d-flex align-items-center gap-3 text-decoration-none">
                        <i class="bx bx-map-pin fs-4"></i> 
                        <span>Tambah Lokasi Baru</span>
                    </a>

                    <button class="btn btn-outline-primary w-100 mb-3 py-2 text-start d-flex align-items-center gap-3">
                        <i class="bx bx-export fs-4"></i> Export Data (Excel)
                    </button>

                    <div class="alert alert-info border-0 shadow-none mt-4">
                        <small class="d-block mb-1 fw-bold"><i class="bx bx-info-circle me-1"></i> Tip Penggunaan:</small>
                        <small>Pastikan untuk menambah **Lokasi Baru** terlebih dahulu sebelum menambah barang agar pilihan lokasi muncul.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection