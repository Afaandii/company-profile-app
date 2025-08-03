<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'title' => 'required|max:50',
            'slug' => 'required|unique:news,slug',
            'category_id' => 'required|integer',
            'content' => 'required|string',
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:5120',
            'user_id' => 'integer',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('image', 'public');
        }

        $validateData['user_id'] = auth()->guard()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->content), 80);

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
        return view('news.edit', [
            'title' => 'Form Edit News',
            'data_news' => News::findOrFail($id),
            'categories' => Categories::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        if ($news->user_id != auth()->guard()->user()->id) {
            abort(403);
        }

        $validateData = $request->validate([
            'title' => 'required|max:50',
            'category_id' => 'required|integer',
            'content' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2550',
            'user_id' => 'integer',
        ]);

        $validateData['slug'] = $request->slug;
        if ($request->slug != $news->slug) {
            $request->validate([
                'slug' => 'required|unique:news,slug,' . $news->id,
            ]);
        }

        if ($request->file('image')) {
            if ($request->imageLama) {
                Storage::delete($request->imageLama);
            }
            $validateData['image'] = $request->file('image')->store('image', 'public');
        } else {
            $validateData['image'] = $request->imageLama;
        }

        $validateData['user_id'] = auth()->guard()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->content), 80);

        News::where('id', $id)->update($validateData);

        return redirect()->route('news-home')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::findOrFail($id)->delete();

        return redirect()->route('news-home')->with('success', 'Data Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(News::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
