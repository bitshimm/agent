<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MetaController extends Controller
{
    public function MetaEdit($id)
    {
        $meta = new Meta();
        return view('dashboard/edit/metaEdit', ['meta' => $meta->find($id)]);
    }

    public function MetaEditSubmit($id, Request $req)
    {
        $meta = Meta::find($id);
        $meta->title = $req->input('title');
        $meta->description = $req->input('description');
        $meta->site_name = $req->input('site_name');
        $meta->type = $req->input('type');
        $meta->email = $req->input('email');
        $meta->metrika = $req->input('metrika');
        $source = $req->file('image');
        if ($source) {
            if ($meta->thumb_image && file_exists(public_path($meta->thumb_image))) {
                unlink(public_path($meta->thumb_image));
            }
            if ($meta->image && file_exists(public_path($meta->image))) {
                unlink(public_path($meta->image));
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
            $meta->thumb_image = Storage::url('public/uploads/thumb/' . $name . '.' . $extensionFile);

            $image = Image::make($source)
                ->resize(766, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode($extensionFile, 90);
            Storage::put('public/uploads/' . $name . '.' . $extensionFile, $image);
            $image->destroy();
            $meta->image = Storage::url('public/uploads/' . $name . '.' . $extensionFile);
        }
        $meta->save();

        return redirect()->route('metaEdit', $id)->with('success', 'Meta-информация изменена');
    }
}
