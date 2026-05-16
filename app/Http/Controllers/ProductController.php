<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'date'        => 'required|date',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'       => 'required|numeric|min:0',
        ]);

        // Bug fix: use only() to avoid _token, _method and other extra fields
        $data = $request->only(['title', 'date', 'description', 'price']);

        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')->path()));
            $response = \Illuminate\Support\Facades\Http::asForm()->post('https://api.imgbb.com/1/upload', [
                'key' => env('IMGBB_API_KEY'),
                'image' => $image,
            ]);

            if ($response->successful()) {
                $data['image'] = $response->json()['data']['url'];
            }
        }

        Product::create($data);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'date'        => 'required|date',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'       => 'required|numeric|min:0',
        ]);

        // Bug fix: use only() to avoid _token, _method and other extra fields
        $data = $request->only(['title', 'date', 'description', 'price']);

        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')->path()));
            $response = \Illuminate\Support\Facades\Http::asForm()->post('https://api.imgbb.com/1/upload', [
                'key' => env('IMGBB_API_KEY'),
                'image' => $image,
            ]);

            if ($response->successful()) {
                $data['image'] = $response->json()['data']['url'];
            }
        }

        $product->update($data);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
