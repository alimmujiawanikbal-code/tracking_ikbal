@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card bg-label-primary shadow-none border-0">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h4 class="card-title text-primary mb-1">Halo, {{ auth()->user()->name }}! 👋</h4>
                            <p class="mb-4">
                                Sistem manajemen inventaris berjalan lancar. Kamu memiliki <span class="fw-bold">{{ $sedang_dipinjam }}</span> barang yang sedang dipinjam hari ini.
                            </p>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">Kelola Peminjaman</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="avatar flex-shrink-0 mb-3">
                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-package fs-4"></i></span>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-muted">Total Barang</span>
                    <h3 class="card-title mb-2">{{ number_format($total_barang) }}</h3>
                    <small class="text-primary fw-medium"><i class="bx bx-up-arrow-alt"></i> Unit</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="avatar flex-shrink-0 mb-3">
                        <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-time-five fs-4"></i></span>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-muted">Sedang Dipinjam</span>
                    <h3 class="card-title mb-2">{{ $sedang_dipinjam }}</h3>
                    <small class="text-warning fw-medium">Perlu diawasi</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="avatar flex-shrink-0 mb-3">
                        <span class="avatar-initial rounded bg-label-success"><i class="bx bx-check-double fs-4"></i></span>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-muted">Selesai Pinjam</span>
                    <h3 class="card-title mb-2">{{ $total_selesai }}</h3>
                    <small class="text-success fw-medium">Transaksi Berhasil</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-6 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="avatar flex-shrink-0 mb-3">
                        <span class="avatar-initial rounded bg-label-info"><i class="bx bx-map-alt fs-4"></i></span>
                    </div>
                    <span class="fw-semibold d-block mb-1 text-muted">Lokasi</span>
                    <h3 class="card-title mb-2">{{ $total_lokasi }}</h3>
                    <small class="text-info fw-medium">Titik Distribusi</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-lg-8 order-2 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Barang Terbaru</h5>
                    <a href="{{ route('barang.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Barang</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($barang_terbaru as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xs me-2">
                                            <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-cube"></i></span>
                                        </div>
                                        <span class="fw-bold">{{ $item->nama_barang }}</span>
                                    </div>
                                </td>
                                <td>{{ $item->lokasi->nama_lokasi ?? 'N/A' }}</td>
                                <td><small class="text-muted">{{ $item->created_at->format('d/m/Y') }}</small></td>
                                <td><span class="badge bg-label-primary">Tersedia</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 order-3 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header d-flex align-items-center justify-content-between pb-3">
                    <h5 class="card-title m-0">Log Aktivitas</h5>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-user-plus"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0 small">User Baru</h6>
                                    <small class="text-muted">Admin menambahkan staf</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold text-muted">Baru saja</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-export"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0 small">Peminjaman</h6>
                                    <small class="text-muted">Kamera DSLR dipinjam</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold text-muted">2 Jam lalu</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-refresh"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0 small">Update Stok</h6>
                                    <small class="text-muted">Inventaris Lab diperbarui</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold text-muted">Kemarin</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button class="btn btn-primary w-100 mt-4 shadow-sm">Lihat Semua Laporan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection