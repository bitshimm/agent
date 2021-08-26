<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function Gallery()
    {
        $gallery = Gallery::all();
        return view(
            'dashboard/gallery',
            compact('gallery')
        );
    }

    public function GalleryAdd()
    {
        $gallery = Gallery::all();
        $gallery = new Gallery();
        return view('dashboard/add/galleryAdd', compact('gallery'));
    }

    public function GalleryAddSubmit(Request $req)
    {
        $gallery = new Gallery();
        $gallery->name = $req->input('name');
        $source = $req->file('image');
        if($source){
            $name = md5(uniqid());
            $thumb = Image::make($source)
            ->encode('jpg', 50);
            Storage::put('public/uploads/thumb/' . $name . '.jpg', $thumb);
            $thumb->destroy();
            $gallery->thumb_image = Storage::url('public/uploads/thumb/' . $name . '.jpg');
            $gallery->path_to_file = $source->storePublicly('uploads', 'public');
        }
        $gallery->save();

        return redirect()->route('gallery')->with('success', 'Картинка добавлена');
    }

    public function GalleryDeleteSubmit($id){
        Gallery::find($id)->delete();
        return redirect()->route('gallery')->with('success', 'Изображение удалено');
    }
}
