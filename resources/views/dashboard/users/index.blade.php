@extends('layouts.dashboard')
@section('title','Users Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center border-bottom py-3">
                    <h5 class="m-0 fw-bold"><i class="bx bx-user-circle me-2"></i>Data Users</h5>
                    <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i> Add New User
                    </a>
                </div>

                <div class="card-body mt-3">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover w-100" id="users-table">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th>User Info</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-3">
                                                <span class="avatar-initial rounded-circle bg-label-primary">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </span>
                                            </div>
                                            <span class="fw-medium text-heading">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role === 'admin')
                                            <span class="badge bg-label-danger">Administrator</span>
                                        @else
                                            <span class="badge bg-label-info">User Staff</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                               class="btn btn-icon btn-outline-warning btn-sm" 
                                               title="Edit User">
                                                <i class="bx bx-edit-alt"></i>
                                            </a>
                                            
                                            {{-- Proteksi agar admin pertama tidak bisa dihapus --}}
                                            @if(!($loop->first && $user->role === 'admin'))
                                                <a href="{{ route('dashboard.users.destroy', $user->id) }}"
                                                   class="btn btn-icon btn-outline-danger btn-sm" 
                                                   data-confirm-delete="true"
                                                   title="Delete User">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
{{-- Gunakan versi CDN yang stabil --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button { padding: 0; }
    .avatar-initial { font-weight: 600; }
    .table thead th { font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#users-table').DataTable({
            "pageLength": 10,
            "language": {
                "search": "Cari User:",
                "lengthMenu": "_MENU_ data per halaman"
            }
        });
    });
</script>
@endpush