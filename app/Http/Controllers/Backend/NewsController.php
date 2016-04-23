<?php

namespace App\Http\Controllers\Backend;

use App\News;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Backend\NewsCreateRequest;
use App\Http\Requests\Backend\NewsEditRequest;

class NewsController extends BackendController
{
    public function index()
    {
        $news = News::latest()->paginate(25);
        return view("backend.news.index", [
            "news" => $news,
        ]);
    }

    public function create()
    {
        return view("backend.news.create");
    }

    public function store(NewsCreateRequest $request)
    {
        $news = new News;
        $news->name = $request->get('name');
        $news->slug = $request->get('slug');
        $news->content = $request->get('content');

        if($request->hasFile("image")){
            $filename = str_slug($news->name).".".$request->file("image")->getClientOriginalExtension();
            while(\File::exists(public_path("uploads/news/".$filename)))
                $filename = str_slug($news->name)."-".str_random(3).".".$request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("uploads/news"), $filename);
            $news->image = "uploads/news/".$filename;
        }
        $news->save();

        return redirect()->route("backend.news.index")->with("success", "News successfully created!");
    }

    public function edit(News $news)
    {
        return view("backend.news.edit", [
            "news" => $news,
        ]);
    }

    public function update(NewsEditRequest $request, News $news)
    {
        $news->name = $request->get('name');
        $news->slug = $request->get('slug');
        $news->content = $request->get('content');
        if($request->hasFile("image")){
            if($news->image && \File::exists(public_path($news->image)))
                \File::delete(public_path($news->image));
            $filename = str_slug($news->name).".".$request->file("image")->getClientOriginalExtension();
            while(\File::exists(public_path("uploads/news/".$filename)))
                $filename = str_slug($news->name)."-".str_random(3).".".$request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("uploads/news"), $filename);
            $news->image = "uploads/news/".$filename;
        }
        $news->save();

        return redirect()->route("backend.news.index")->with("success", "News successfully updated!");
    }

    public function destroy(News $news)
    {
        if($news->image && \File::exists(public_path($news->image)))
            \File::delete($news->image);
        $news->delete();

        return redirect()->route("backend.news.index")->with("success", "News successfully deleted!");
    }
}
