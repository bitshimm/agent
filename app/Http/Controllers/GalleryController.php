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
            ->resize(null, 367, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 65);
            Storage::put('public/uploads/thumb/' . $name . '.jpg', $thumb);
            $thumb->destroy();
            $gallery->thumb_image = Storage::url('public/uploads/thumb/' . $name . '.jpg');

            $image = Image::make($source)
            ->encode('jpg', 90);
            Storage::put('public/uploads/' . $name . '.jpg', $image);
            $image->destroy();
            $gallery->path_to_file = Storage::url('public/uploads/' . $name . '.jpg');
        }
        $gallery->save();

        return redirect()->route('gallery')->with('success', 'Картинка добавлена');
    }

    public function GalleryDeleteSubmit($id){
        Gallery::find($id)->delete();
        return redirect()->route('gallery')->with('success', 'Изображение удалено');
    }
}
