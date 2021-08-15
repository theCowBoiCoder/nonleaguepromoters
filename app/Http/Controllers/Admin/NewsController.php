<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $request->file('image')->storeAs('news', $request->file('image')->getClientOriginalName());

        News::query()->create([
            'title' => $request->title,
            'image' => $request->file('image')->getClientOriginalName(),
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'News Article has been created');
    }

    public function all()
    {
        $news = News::query()->paginate(15);
        return view('admin.news.all', [
            'news' => $news
        ]);
    }

    public function edit(News $news)
    {
        return view('admin.news.form', [
            'news' => $news
        ]);
    }

    public function update(Request $request)
    {
        dd($request->all());
    }

}
