@extends('layouts.app')

@section('konten')
<div class="container">
    <div class="card shadow border-0 p-5 text-center">
        <i class="bx bx-book-open text-primary mb-3" style="font-size: 5rem;"></i>
        <h2 class="fw-bold">Panduan Sistem</h2>
        <p class="text-muted">Halaman panduan sedang dalam proses penyusunan.</p>
        <a href="{{ route('home') }}" class="btn btn-primary px-4 rounded-pill">Kembali ke Dashboard</a>
    </div>
</div>
@endsection