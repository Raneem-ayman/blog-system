<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->whereNotNull('published_at')->orderBy('published_at', 'desc')->paginate(10);
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function comment(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $news->comments()->create($request->all());

        return back();
    }
}
