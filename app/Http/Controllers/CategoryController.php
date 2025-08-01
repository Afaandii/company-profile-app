<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.category', [
            'title' => "Manage Tabel Kategori",
            'category_list' => Categories::orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create', [
            'title' => "Form Tambah Kategori",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:80|unique:categories,name',
            'slug' => 'max:80'
        ]);

        Categories::create($validateData);

        return redirect()->route('category_home')->with('success', 'Data Berhasil Ditambahkan!');
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
        $category = Categories::findOrFail($id);
        return view('category.edit', [
            'title' => 'Form Edit Kategori',
            'data_edit' => compact("category"),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:150',
            'slug' => 'max:120',
        ]);

        Categories::where('id', $id)->update($validateData);

        return redirect()->route('category_home')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $find = Categories::findOrFail($id);
        $find->delete();

        return redirect()->route('category_home')->with('success', 'Data Berhasil Dihapus!');
    }


    //data untuk form create dan mengisi data slug otomatis
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Categories::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
