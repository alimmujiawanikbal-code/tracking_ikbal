@extends('layouts.dashboard')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
        <h5 class="mb-0 fw-bold"><i class="bx bx-list-ul me-2"></i>Daftar Inventaris Barang</h5>
        <a href="#" class="btn btn-primary btn-sm shadow-sm">
            <i class="bx bx-plus me-1"></i> Tambah Barang
        </a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($barangs as $item)
                <tr>
                    <td><span class="badge bg-label-secondary">{{ $item->kode_barang }}</span></td>
                    <td><strong>{{ $item->nama_barang }}</strong></td>
                    <td>{{ $item->kategori->nama }}</td>
                    <td><i class="bx bx-map-pin text-danger"></i> {{ $item->lokasi->nama }}</td>
                    <td>{{ $item->jumlah }} {{ $item->satuan }}</td>
                    <td>
                        @php
                            $color = $item->kondisi == 'baik' ? 'success' : ($item->kondisi == 'rusak_ringan' ? 'warning' : 'danger');
                        @endphp
                        <span class="badge bg-{{ $color }}">{{ str_replace('_', ' ', $item->kondisi) }}</span>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu border-0 shadow">
                                <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item text-danger" href="#"><i class="bx bx-trash me-1"></i> Hapus</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection