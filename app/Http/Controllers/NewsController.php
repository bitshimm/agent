<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function News()
    {
        $news = News::all();
        return view(
            'dashboard/news',
            compact('news')
        );
    }

    public function NewsAdd()
    {
        $news = News::all();
        $news = new News();
        return view('dashboard/add/newsAdd', compact('news'));
    }

    public function NewsAddSubmit(Request $req)
    {
        $news = new News();
        $news->title = $req->input('title');
        $news->short_desc = $req->input('short_desc');
        $news->description = $req->input('description');
        $news->path_to_file = $req->file('image')->storePublicly('uploads', 'public');

        $news->save();

        return redirect()->route('news')->with('success', 'Новость добавлена');
    }

    public function NewsEdit($id)
    {
        $news = new News();
        return view('dashboard/edit/newsEdit', ['news' => $news->find($id)]);
    }

    public function NewsEditSubmit($id, Request $req)
    {
        $news = News::find($id);
        $news->title = $req->input('title');
        $news->short_desc = $req->input('short_desc');
        $news->description = $req->input('description');

        $news->save();

        return redirect()->route('news', $id)->with('success', 'Новость изменена');
    }

    public function NewsDeleteSubmit($id)
    {
        News::find($id)->delete();
        return redirect()->route('news')->with('success', 'Новость удалена');
    }
}
