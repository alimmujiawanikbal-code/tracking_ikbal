@extends('layouts.app')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-success"><i class="bx bx-map-pin"></i> Tambah Lokasi Baru</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('lokasi.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" class="form-control" placeholder="Contoh: Ruang Meeting" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100 py-2">Simpan Lokasi</button>
                        <a href="{{ route('home') }}" class="btn btn-link w-100 mt-2 text-decoration-none text-muted">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection