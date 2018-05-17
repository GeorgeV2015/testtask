<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(4);
        $title = 'News';

        return view('pages.news.index', compact('news', 'title'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('pages.news.show', compact('news'));
    }
}
