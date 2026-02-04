@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inventory /</span> Daftar Barang</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Produk Terdaftar</h5>
            <a href="{{ route('dashboard.barang.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Tambah Barang
            </a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    {{-- VARIABEL DISESUAIKAN DENGAN CONTROLLER ($barangs) --}}
                    @forelse($barangs as $barang)
                    <tr>
                        <td><strong>{{ $barang->nama_barang }}</strong></td>
                        <td><span class="badge bg-label-info">{{ $barang->kategori->nama_kategori ?? 'N/A' }}</span></td>
                        <td>{{ $barang->jumlah }} {{ $barang->satuan }}</td>
                        <td>{{ $barang->lokasi->nama ?? 'N/A' }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    {{-- ROUTE EDIT (Pastikan sudah ada di web.php nanti) --}}
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <form action="#" method="POST" onsubmit="return confirm('Yakin hapus barang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Tidak ada data barang ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection