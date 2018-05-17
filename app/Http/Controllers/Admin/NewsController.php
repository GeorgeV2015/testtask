<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'content'     => 'required',
            'image'       => 'nullable|image|max:1500'
        ]);

        $news = News::add($request->all(), $request->file('image'));

        return redirect()->route('news.index')->with('status', "News '$news->title' has been created");
    }

    public function edit($slug)
    {
        $news = News::where('slug', $slug)->first();

        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title'       => 'required',
            'content'     => 'required',
            'image'       => 'nullable|image|max:1500'
        ]);
        $news = News::where('slug', $slug)->first();
        $news->edit($request->all(), $request->file('image'));

        return redirect()->route('news.index')->with('status', "Post '$news->title' has been updated");
    }

    public function destroy($slug)
    {
        $news = News::where('slug', $slug)->first();
        $newsTitle = $news->title;
        $news->remove();

        return redirect()->back()->with('status', "News '$newsTitle' has been deleted");
    }
}
