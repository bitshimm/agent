<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $news->description = $req->input('description');
        $source = $req->file('image');
        if($source){
            $extensionFile = $req->file('image')->getClientOriginalExtension();
            $name = md5(uniqid());
            $thumb = Image::make($source)
            ->resize(null, 367, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode($extensionFile, 65);

            Storage::put('public/uploads/thumb/' . $name . '.' . $extensionFile, $thumb);
            $thumb->destroy();
            $news->thumb_image = Storage::url('public/uploads/thumb/' . $name . '.' . $extensionFile);

            $image = Image::make($source)
            ->resize(766, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode($extensionFile, 90);
            Storage::put('public/uploads/' . $name . '.' . $extensionFile, $image);
            $image->destroy();
            $news->path_to_file = Storage::url('public/uploads/' . $name . '.' . $extensionFile);
        }else{
            $news->path_to_file = "";
            $news->thumb_image = "";
        }
        
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
        $news->description = $req->input('description');
        $source = $req->file('image');
        if ($source) {
            if ($news->thumb_image && $news->thumb_image != ' ' && file_exists(public_path($news->thumb_image))) {
                unlink(public_path($news->thumb_image));
            }
            if ($news->path_to_file && file_exists(public_path($news->path_to_file))){
                unlink(public_path($news->path_to_file));
            }
            $extensionFile = $req->file('image')->getClientOriginalExtension();
            $name = md5(uniqid());
            $thumb = Image::make($source)
            ->resize(null, 367, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode($extensionFile, 65);

            Storage::put('public/uploads/thumb/' . $name . '.' . $extensionFile, $thumb);
            $thumb->destroy();
            $news->thumb_image = Storage::url('public/uploads/thumb/' . $name . '.' . $extensionFile);

            $image = Image::make($source)
            ->resize(766, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode($extensionFile, 90);
            Storage::put('public/uploads/' . $name . '.' . $extensionFile, $image);
            $image->destroy();
            $news->path_to_file = Storage::url('public/uploads/' . $name . '.' . $extensionFile);
        }
        $news->save();

        return redirect()->route('news', $id)->with('success', 'Новость изменена');
    }

    public function NewsDeleteSubmit($id)
    {
        $newsItem = News::find($id);
        if ($newsItem->title != "Морские круизы из Сочи в Турцию"){
            if ($newsItem->thumb_image && $newsItem->thumb_image != ' ' && file_exists(public_path($newsItem->thumb_image))) {
                unlink(public_path($newsItem->thumb_image));
            }
            if ($newsItem->path_to_file && file_exists(public_path($newsItem->path_to_file))){
                unlink(public_path($newsItem->path_to_file));
            }
        }
        
        News::find($id)->delete();
        return redirect()->route('news')->with('success', 'Новость удалена');
    }
}
