<?php

namespace App\Http\Controllers\Frontend;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;

class NewsController extends FrontendController
{
    public function index()
    {
        $news = News::latest()->paginate(6);
        return view("frontend.news.index", [
            "news" => $news,
        ]);
    }

    public function show(News $news)
    {
        $news->views++;
        $news->save();
        return view("frontend.news.show", [
            "news" => $news,
        ]);
    }
}
