<div class="row">
    <div class="col-xl">
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
                <h5 class="mb-0 fw-bold">Transaksi Peminjaman Baru</h5>
                <small class="text-muted float-end">Input data peminjam</small>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kode Peminjaman</label>
                            <input type="text" class="form-control bg-light" value="PMJ-{{ date('YmdHis') }}" readonly />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama Peminjam</label>
                            <input type="text" class="form-control" name="nama_peminjam" placeholder="Input nama lengkap..." required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Jenis Peminjam</label>
                            <select class="form-select" name="jenis_peminjam">
                                <option value="siswa">Siswa</option>
                                <option value="guru">Guru</option>
                                <option value="staf">Staf</option>
                                <option value="luar">Pihak Luar</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" name="tanggal_kembali" required />
                        </div>
                    </div>
                    <hr class="my-4">
                    <h6 class="fw-bold"><i class="bx bx-package me-2"></i>Detail Barang</h6>
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</div>