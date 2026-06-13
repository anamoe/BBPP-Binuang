<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category','tags','user'])
                    ->latest()
                    ->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('articles.create', compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'tags' => 'required|array',
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imagePath,
            'desc' => $request->desc,
            'view' => 0,
            'category_id' => $request->category_id,
            'created_by' => auth()->user()->id
        ]);

        $article->tags()->attach($request->tags);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('articles.edit', compact('article','categories','tags'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'tags' => 'required|array',
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = $article->image;

        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imagePath,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
        ]);

        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index')
            ->with('success', 'Artikel berhasil diupdate');
    }

    public function destroy(Article $article)
    {
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('articles.index')
                         ->with('success','Artikel berhasil dihapus');
    }
}