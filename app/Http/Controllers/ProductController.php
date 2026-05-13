<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function publicMenu()
    {
        $settings = Setting::first();
        $products = Product::where('is_active', true)
            ->orderByRaw("CASE 
                WHEN category = 'comida' THEN 1
                WHEN category = 'bebida' THEN 2
                ELSE 3
            END")
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');

        return view('menu.index', compact('products', 'settings'));
    }

    public function dashboard()
    {
        $productsCount = Product::count();
        $activeProductsCount = Product::where('is_active', true)->count();

        return view('admin.dashboard', compact('productsCount', 'activeProductsCount'));
    }

    public function index()
    {
        $products = Product::orderBy('category')->orderBy('sort_order')->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:comida,bebida'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image_url' => ['nullable', 'url'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Producto agregado correctamente.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:comida,bebida'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image_url' => ['nullable', 'url'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}