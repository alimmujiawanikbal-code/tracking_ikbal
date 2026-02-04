@extends('layouts.dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Inventory /</span> Tambah Barang Baru</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-sm">
                <h5 class="card-header">Formulir Data Barang</h5>
                <div class="card-body">
                    <form action="{{ route('dashboard.barang.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input class="form-control" type="text" id="nama_barang" name="nama_barang" placeholder="Contoh: Laptop Asus ROG" required autofocus />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select id="kategori_id" name="kategori_id" class="select2 form-select" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="lokasi_id" class="form-label">Lokasi Penempatan</label>
                                <select id="lokasi_id" name="lokasi_id" class="select2 form-select" required>
                                    <option value="">Pilih Lokasi</option>
                                    @foreach($lokasis as $lokasi)
                                        <option value="{{ $lokasi->id }}">{{ $lokasi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input class="form-control" type="number" id="jumlah" name="jumlah" value="1" min="1" />
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Tambahkan catatan tentang barang ini..."></textarea>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan Barang</button>
                            <a href="{{ route('dashboard.products.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection