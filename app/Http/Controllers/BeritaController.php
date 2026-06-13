<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;

class BeritaController extends Controller
{
    public function __construct()
    {
        /*
        |--------------------------------------------------------------------------
        | Data Global (Dipakai Semua Method Controller Ini)
        |--------------------------------------------------------------------------
        */

        $footer = About::first();

        $mingguIni = Visitor::whereBetween(
            'visited_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->count();

        $bulanIni = Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();

        $tahunIni = Visitor::whereYear('visited_at', Carbon::now()->year)
            ->count();

        $total = Visitor::count();

        View::share([
            'footer'     => $footer,
            'mingguIni'  => $mingguIni,
            'bulanIni'   => $bulanIni,
            'tahunIni'   => $tahunIni,
            'total'      => $total,
        ]);
    }

   public function index(Request $request)
    {
        $search     = $request->search;
        $categoryId = $request->category;
        $tagId      = $request->tag;

        $query = Article::with(['category', 'tags']);

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('desc', 'like', '%' . $search . '%');
            });
        }

        /*
        |--------------------------------------------------------------------------
        | CATEGORY FILTER (ONE TO MANY)
        |--------------------------------------------------------------------------
        */
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        /*
        |--------------------------------------------------------------------------
        | TAG FILTER (MANY TO MANY)
        |--------------------------------------------------------------------------
        */
        if ($tagId) {
            $query->whereHas('tags', function ($q) use ($tagId) {
                $q->where('tags.id', $tagId);
            });
        }

        /*
        |--------------------------------------------------------------------------
        | HEADLINE
        |--------------------------------------------------------------------------
        */
        $headline = (clone $query)->latest()->first();

        $articlesQuery = (clone $query)->latest();

        if ($headline) {
            $articlesQuery->where('id', '!=', $headline->id);
        }

        $articles = $articlesQuery->paginate(5);

        /*
        |--------------------------------------------------------------------------
        | SIDEBAR
        |--------------------------------------------------------------------------
        */
        $categories = Category::withCount('articles')->get();
        $tags       = Tag::all();
        $popular    = Article::orderBy('view','desc')->take(4)->get();

        if ($request->ajax()) {
            return view('berita-list', compact('headline', 'articles'))->render();
        }

        return view('berita', compact(
            'headline',
            'articles',
            'categories',
            'tags',
            'popular',
            'search',
            'categoryId',
            'tagId'
        ));
    }

    public function show(Article $article)
    {
        $article->increment('view');

        $categories = Category::withCount('articles')->get();
        $tags = Tag::all();

        $popular = Article::orderBy('view','desc')
            ->take(4)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Similar Post (Kategori Sama)
        |--------------------------------------------------------------------------
        */
        $similar = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(3)
            ->get();

        return view('berita-detail', compact(
            'article',
            'categories',
            'tags',
            'popular',
            'similar'
        ));
    }
}