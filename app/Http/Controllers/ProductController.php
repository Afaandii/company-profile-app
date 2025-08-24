<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.product', [
            'title' => "Manage Table Product",
            'data_product' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create', [
            'title' => 'Form Tambah Product',
            'categories' => Categories::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:60|unique:product,name',
            'category_id' => 'required|integer',
            'user_id' => 'integer',
            'price' => 'required',
            'description' => 'required|string',
            'image_product' => 'required|file|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->file('image_product')) {
            $validateData['image_product'] = $request->file('image_product')->store('image_product', 'public');
        }

        $validateData['user_id'] = auth()->guard()->user()->id;

        Product::create($validateData);

        return redirect()->route('product-home')->with('success', 'Data Product Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('product.edit', [
            'title' => 'Form Edit Product',
            'data_product' => Product::findOrFail($id),
            'categories' => Categories::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'user_id' => 'integer',
            'price' => 'required',
            'description' => 'required|string',
            'image_product' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120'
        ]);

        if ($request->file('image_product')) {
            if ($request->imageLama) {
                Storage::delete($request->imageLama);
            }
            $validateData['image_product'] = $request->file('image_product')->store('image', 'public');
        } else {
            $validateData['image_product'] = $request->imageLama;
        }

        $validateData['user_id'] = auth()->guard()->user()->id;
        Product::where('id', $id)->update($validateData);

        return redirect()->route('product-home')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
