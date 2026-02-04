@extends('layouts.dashboard')

@section('content') {{-- Pastikan menggunakan 'content' atau 'konten' sesuai layout Anda --}}
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Laporan Stok Barang</h5>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok Tersedia</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td>{{ $product->category->name ?? 'Tanpa Kategori' }}</td>
                        {{-- PERBAIKAN: Gunakan 'stock' bukan 'quantity' --}}
                        <td>{{ $product->stock }}</td> 
                        <td>
                            @if($product->stock <= 0)
                                <span class="badge bg-label-danger">Stok Habis</span>
                            @elseif($product->stock <= 5)
                                <span class="badge bg-label-warning">Stok Tipis</span>
                            @else
                                <span class="badge bg-label-success">Aman</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection