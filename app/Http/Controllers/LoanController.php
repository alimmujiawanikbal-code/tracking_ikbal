<?php

namespace App\Http\Controllers;

class LoanController extends Controller
{
    public function index()
    {
        // Mengarahkan ke view peminjaman (kita buat foldernya setelah ini)
        return view('peminjaman.index');
    }
}
