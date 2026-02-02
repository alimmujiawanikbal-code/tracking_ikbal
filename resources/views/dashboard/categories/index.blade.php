@extends('layouts.dashboard') 

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- Toast Notification --}}
    @if(session('success'))
    <div class="bs-toast toast fade show bg-success position-fixed top-0 end-0 m-3" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 9999">
        <div class="toast-header">
            <i class="bx bx-check-circle me-2"></i>
            <div class="me-auto fw-semibold">Berhasil</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-white">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold py-3 mb-0">
            <span class="text-muted fw-light">Inventory System /</span> Categories
        </h4>
        <button class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#modalAddCategory">
            <i class="bx bx-plus me-1"></i> Add New Category
        </button>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center border-bottom bg-white">
            <h5 class="mb-0 fw-bold text-primary"><i class="bx bx-category-alt me-2"></i>Data Categories</h5>
            <div class="card-tools">
                <div class="input-group input-group-merge input-group-sm">
                    <span class="input-group-text"><i class="bx bx-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search categories...">
                </div>
            </div>
        </div>
        
        <div class="table-responsive text-nowrap">
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="bg-light">
                        <th class="ps-4 text-center" width="70">NO</th>
                        <th>CATEGORY INFO</th>
                        <th>SLUG PATH</th>
                        <th class="text-center" width="150">ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($categories as $key => $item)
                    <tr>
                        <td class="ps-4 text-center text-muted">{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <span class="avatar-initial rounded-circle bg-label-primary fw-bold">
                                        {{ strtoupper(substr($item->name, 0, 1)) }}
                                    </span>
                                </div>
                                <div>
                                    <span class="fw-bold d-block text-dark">{{ $item->name }}</span>
                                    <small class="text-muted">ID: #CAT-0{{ $item->id }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-label-secondary text-lowercase px-3">
                                <i class="bx bx-link me-1"></i>{{ $item->slug }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-icon btn-sm btn-outline-warning" title="Edit">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                                <button class="btn btn-icon btn-sm btn-outline-danger" title="Delete">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <img src="https://illustrations.popsy.co/gray/empty-folder.svg" alt="empty" width="120" class="mb-3 opacity-50">
                            <p class="text-muted mb-0">Belum ada data kategori tersedia.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Add Category --}}
<div class="modal fade" id="modalAddCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered shadow-lg">
        <div class="modal-content border-0">
            <form action="{{ route('dashboard.categories.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-primary py-3">
                    <h5 class="modal-title text-white fw-bold"><i class="bx bx-plus-circle me-2"></i>Add New Category</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Category Name</label>
                        <div class="input-group input-group-merge border rounded">
                            <span class="input-group-text bg-light border-0"><i class="bx bx-tag text-primary"></i></span>
                            <input type="text" name="name" class="form-control border-0 ps-2" placeholder="e.g. Alat Tulis Kantor" required autofocus>
                        </div>
                        <p class="form-text text-muted mb-0 mt-2 small">Sistem akan membuat slug secara otomatis untuk keperluan URL.</p>
                    </div>
                </div>
                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4 shadow">
                        <i class="bx bx-save me-1"></i> Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .table thead th { font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.5px; }
    .avatar-initial { width: 38px; height: 38px; }
    .card { transition: transform 0.2s ease; }
    .table-hover tbody tr:hover { background-color: rgba(105, 108, 255, 0.04) !important; }
    .btn-icon { width: 32px; height: 32px; }
    .modal-content { border-radius: 15px; overflow: hidden; }
</style>

<script>
    // Auto hide toast after 4 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const toastElList = [].slice.call(document.querySelectorAll('.toast'));
        toastElList.map(function(toastEl) {
            setTimeout(() => {
                const toast = new bootstrap.Toast(toastEl);
                toast.hide();
            }, 4000);
        });
    });
</script>
@endsection