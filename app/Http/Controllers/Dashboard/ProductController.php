<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = \App\Models\Product::with('category')->get();

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
   // app/Http/Controllers/Dashboard/ProductController.php

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name'        => 'required|string|max:255',
        'price'       => 'required|numeric',
        'stock'       => 'required|integer',
    ]);

    // Simpan data
    \App\Models\Product::create([
        'category_id' => $request->category_id,
        'name'        => $request->name,
        'price'       => $request->price,
        'stock'       => $request->stock,
    ]);

    // Kembalikan ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('dashboard.products.index')->with('success', 'Produk berhasil ditambahkan!');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
