<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function NewsAddSubmit(Request $req)
    {
        $news = new News();
        $news->title = $req->input('title');
        $news->description = $req->input('description');
        $source = $req->file('image');
        if($source){
            $name = md5(uniqid());
            $thumb = Image::make($source)
            ->resize(null, 367, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('webp', 65);
            Storage::put('public/uploads/thumb/' . $name . '.webp', $thumb);
            $thumb->destroy();
            $news->thumb_image = Storage::url('public/uploads/thumb/' . $name . '.webp');


            $image = Image::make($source)
            ->encode('webp', 90);
            Storage::put('public/uploads/' . $name . '.webp', $image);
            $image->destroy();
            $news->path_to_file = Storage::url('public/uploads/' . $name . '.webp');
        }else{
            $news->path_to_file = "";
            $news->thumb_image = " ";
        }
        
        $news->save();

        return redirect()->route('news')->with('success', 'Новость добавлена');
    }
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

    

    public function NewsEdit($id)
    {
        $news = new News();
        return view('dashboard/edit/newsEdit', ['news' => $news->find($id)]);
    }

    public function NewsEditSubmit($id, Request $req)
    {
        $news = News::find($id);
        $news->title = $req->input('title');
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
