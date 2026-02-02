@extends('layouts.app')

@section('konten')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="fw-bold mb-0">Laporan Aktivitas</h4>
                    <small class="text-muted">Data peminjaman dan pengembalian barang secara mendetail</small>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary" onclick="window.location.reload()">
                        <i class="bx bx-refresh"></i> Refresh
                    </button>
                    <button onclick="window.print()" class="btn btn-primary">
                        <i class="bx bx-printer me-1"></i> Cetak PDF
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-label-primary">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-uppercase fw-semibold d-block mb-1 text-muted">Total Laporan</small>
                        <h4 class="card-title mb-0 fw-bold">{{ $laporan->count() }}</h4>
                    </div>
                    <div class="avatar bg-white p-2 rounded">
                        <i class="bx bx-file fs-3 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-label-warning">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-uppercase fw-semibold d-block mb-1 text-muted">Sedang Dipinjam</small>
                        <h4 class="card-title mb-0 fw-bold">{{ $laporan->where('status', 'dipinjam')->count() }}</h4>
                    </div>
                    <div class="avatar bg-white p-2 rounded">
                        <i class="bx bx-time-five fs-3 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-label-success">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-uppercase fw-semibold d-block mb-1 text-muted">Selesai/Kembali</small>
                        <h4 class="card-title mb-0 fw-bold">{{ $laporan->where('status', 'selesai')->count() }}</h4>
                    </div>
                    <div class="avatar bg-white p-2 rounded">
                        <i class="bx bx-check-double fs-3 text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="mb-0 fw-bold"><i class="bx bx-list-ul me-2"></i>Rincian Transaksi</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3">Kode</th>
                                <th class="py-3">Nama Peminjam</th>
                                <th class="py-3 text-center">Tgl Pinjam</th>
                                <th class="py-3 text-center">Tgl Kembali</th>
                                <th class="py-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($laporan as $row)
                            <tr>
                                <td><span class="fw-bold text-primary">{{ $row->kode_peminjaman }}</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xs me-2">
                                            <span class="avatar-initial rounded-circle bg-label-secondary"><i class="bx bx-user"></i></span>
                                        </div>
                                        <span>{{ $row->nama_peminjam }}</span>
                                    </div>
                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($row->tanggal_pinjam)->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    {{ $row->tanggal_kembali ? \Carbon\Carbon::parse($row->tanggal_kembali)->format('d/m/Y') : '-' }}
                                </td>
                                <td class="text-center">
                                    @if($row->status == 'dipinjam')
                                        <span class="badge rounded-pill bg-label-warning px-3">Dipinjam</span>
                                    @else
                                        <span class="badge rounded-pill bg-label-success px-3">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bx bx-folder-open fs-1 mb-2"></i>
                                        <p class="mb-0">Tidak ada data untuk ditampilkan</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white border-top py-3 text-muted">
                    <small>Menampilkan total <strong>{{ $laporan->count() }}</strong> data laporan.</small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling khusus agar cetakan rapi */
    @media print {
        .btn, .navbar, .card-footer, .text-muted, .breadcrumb { display: none !important; }
        .card { box-shadow: none !important; border: 1px solid #ddd !important; }
        body { background: white !important; }
        .container-xxl { padding: 0 !important; }
    }
    
    /* Hover effect */
    .table-hover tbody tr:hover { background-color: rgba(105, 108, 255, 0.04) !important; }
</style>
@endsection