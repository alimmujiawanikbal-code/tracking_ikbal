<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan katalog produk.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $categories = Category::all();

        return view('dashboard.products.index', compact('products', 'categories'));
    }

    /**
     * Menampilkan laporan stok.
     */
    public function stock()
    {
        $products = Product::with('category')->orderBy('stock', 'asc')->get();

        return view('dashboard.products.stock', compact('products'));
    }

    /**
     * Menyimpan produk baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Product::create($validated);

        return redirect()->route('dashboard.products.index')
                         ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Memproses pembaruan data produk.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('dashboard.products.index')
                         ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Menghapus produk.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboard.products.index')
                         ->with('success', 'Produk berhasil dihapus');
    }
}
