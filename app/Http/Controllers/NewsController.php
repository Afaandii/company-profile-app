<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news.news', [
            'title' => 'Manage Tabel News',
            'data_news' => News::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create', [
            'title' => 'Form Tambah News',
            'categories' => Categories::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:20',
            'slug' => 'max:20',
            'category_id' => 'required|integer',
            'content' => 'required|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2550',
            'user_id' => 'integer',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('image', 'public');
        }

        $validateData['user_id'] = auth()->guard()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->content), 120);

        News::create($validateData);

        return redirect()->route('news-home')->with('success', 'Data Berhasil Ditambah!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
