@extends('layouts.app')

@section('konten')
<div class="container">
    <div class="row g-4">
        <div class="col-12">
            <div class="card bg-primary text-white p-4 overflow-hidden position-relative border-0 shadow">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h2 class="text-white fw-bold">Selamat Datang di Sistem Inventaris!</h2>
                        <p class="mb-4 opacity-75">Kelola barang, pantau lokasi, dan monitor peminjaman dalam satu dashboard terintegrasi.</p>
                        <div class="d-flex gap-2">
                           <a href="{{ route('laporan.index') }}" class="btn btn-light text-primary fw-bold rounded-pill px-4">Lihat Laporan</a>
                            <a href="#" class="btn btn-outline-light rounded-pill px-4 border-2">Panduan</a>
                        </div>
                    </div>
                    <div class="col-md-5 d-none d-md-block text-end">
                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/assets/img/illustrations/man-with-laptop-light.png" 
                             alt="Welcome" style="height: 160px; margin-bottom: -30px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 p-3 text-center shadow-sm">
                <div class="mx-auto bg-label-primary p-3 rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bx bx-package fs-3"></i>
                </div>
                <h6 class="text-muted mb-1">Total Barang</h6>
                <h4 class="fw-bold mb-0">1,240</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 p-3 text-center shadow-sm">
                <div class="mx-auto bg-label-info p-3 rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bx bx-map-pin fs-3"></i>
                </div>
                <h6 class="text-muted mb-1">Lokasi Barang</h6>
                <h4 class="fw-bold mb-0">12 Titik</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 p-3 text-center shadow-sm">
                <div class="mx-auto bg-label-warning p-3 rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bx bx-transfer-alt fs-3"></i>
                </div>
                <h6 class="text-muted mb-1">Peminjaman Aktif</h6>
                <h4 class="fw-bold mb-0">45</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card h-100 p-3 text-center shadow-sm">
                <div class="mx-auto bg-label-danger p-3 rounded-circle mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="bx bx-error-circle fs-3"></i>
                </div>
                <h6 class="text-muted mb-1">Barang Rusak</h6>
                <h4 class="fw-bold mb-0">8 Unit</h4>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-transparent border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Peminjaman Terbaru</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Kode</th>
                                <th>Nama Peminjam</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="fw-bold text-primary">#PMJ-001</span></td>
                                <td>Budi Santoso</td>
                                <td><span class="badge bg-label-success px-3 rounded-pill">Dikembalikan</span></td>
                                <td><small class="text-muted">2 Feb 2026</small></td>
                            </tr>
                            <tr>
                                <td><span class="fw-bold text-primary">#PMJ-002</span></td>
                                <td>Siswa Kelas XI</td>
                                <td><span class="badge bg-label-warning px-3 rounded-pill">Dipinjam</span></td>
                                <td><small class="text-muted">1 Feb 2026</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-4">Aksi Cepat</h5>
                    <button class="btn btn-primary w-100 mb-3 py-2 text-start d-flex align-items-center gap-3">
                        <i class="bx bx-plus-circle fs-4"></i> Tambah Barang Baru
                    </button>
                    <button class="btn btn-outline-primary w-100 mb-3 py-2 text-start d-flex align-items-center gap-3">
                        <i class="bx bx-export fs-4"></i> Export Data (Excel)
                    </button>
                    <div class="alert alert-info border-0 shadow-none mt-4">
                        <small class="d-block mb-1 fw-bold"><i class="bx bx-info-circle me-1"></i> Tip Penggunaan:</small>
                        <small>Gunakan modul 'Peminjaman' untuk mencatat barang keluar agar stok otomatis terupdate.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Agar tampilan lebih mirip Sneat/Modern UI */
    .bg-label-primary { background: #e7e7ff; color: #696cff; }
    .bg-label-info { background: #d7f5fc; color: #03c3ec; }
    .bg-label-warning { background: #fff2d6; color: #ffab00; }
    .bg-label-danger { background: #ffe5e5; color: #ff3e1d; }
    .bg-label-success { background: #e8fadf; color: #71dd37; }
    
    .card { transition: all 0.3s ease; border: 1px solid #eee; }
    .card:hover { transform: translateY(-5px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1) !important; }
    .table thead th { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #8e94a3; }
</style>
@endsection