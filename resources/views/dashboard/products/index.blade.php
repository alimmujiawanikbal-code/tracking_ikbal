@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Katalog Produk / Barang</h5>
            <a href="{{ route('dashboard.barang.create') }}" class="btn btn-primary">Tambah Barang</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($barangs as $barang)
                    <tr>
                        <td><span class="fw-bold">{{ $barang->kode_barang }}</span></td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                        <td><span class="badge bg-label-info">{{ $barang->lokasi->nama ?? '-' }}</span></td>
                        <td>{{ $barang->jumlah }} {{ $barang->satuan }}</td>
                        <td>
                            <span class="badge bg-label-{{ $barang->kondisi == 'baik' ? 'success' : 'danger' }}">
                                {{ ucfirst($barang->kondisi) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-icon btn-outline-warning"><i class="bx bx-edit"></i></button>
                            <button class="btn btn-sm btn-icon btn-outline-danger"><i class="bx bx-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Data barang masih kosong.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection