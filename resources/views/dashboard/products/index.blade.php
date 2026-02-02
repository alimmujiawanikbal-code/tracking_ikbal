{{-- Ganti 'layouts.admin' sesuai dengan file yang ada di resources/views/layouts/ --}}
@extends('layouts.dashboard')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Product Catalog</h5>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddProduct">
                <i class="bx bx-plus me-1"></i> Add New Product
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>PRODUCT NAME</th>
                        <th>CATEGORY</th>
                        <th>PRICE</th>
                        <th>STOCK</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td><span class="badge bg-label-info">{{ $product->category->name }}</span></td>
                        <td> {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-outline-warning me-2"><i class="bx bx-edit-alt"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah Produk --}}
<div class="modal fade" id="modalAddProduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('dashboard.products.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select Category</option>
                            {{-- Kita asumsikan kamu mempassing data categories ke view ini juga --}}
                            @foreach(\App\Models\Category::all() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection