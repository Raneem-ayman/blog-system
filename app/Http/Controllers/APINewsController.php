<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class APINewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::with('category')->paginate(10);

        return response()->json($news);
    }
}
