<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barangs = Barang::with(['lokasi', 'kategori'])->latest()->get();

        return view('dashboard.products.index', compact('barangs'));
    }

    public function create()
    {
        $lokasis = Lokasi::all();
        $kategoris = Kategori::all();

        return view('dashboard.products.create', compact('lokasis', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'lokasi_id' => 'required',
            'kategori_id' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'lokasi_id' => $request->lokasi_id,
            'stok' => $request->jumlah,
        ]);

        return redirect()->route('dashboard.products.index')->with('success', 'Barang berhasil disimpan!');
    }

    // --- FITUR KATEGORI ---
    public function indexCategory()
    {
        $categories = Kategori::all();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('dashboard.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Kategori berhasil ditambah!');
    }
}
