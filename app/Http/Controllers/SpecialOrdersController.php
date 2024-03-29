<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialOrders;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SpecialOrdersController extends Controller
{

    public function SpecialOrders()
    {
        $specialOrders = SpecialOrders::all();
        return view(
            'dashboard/specialOrders',
            compact('specialOrders')
        );
    }

    public function SpecialOrdersAdd()
    {
        $specialOrders = SpecialOrders::all();
        $specialOrders = new SpecialOrders();
        return view('dashboard/add/specialOrdersAdd', compact('specialOrders'));
    }

    public function SpecialOrdersAddSubmit(Request $req)
    {
        $specialOrders = new SpecialOrders();
        $specialOrders->title = $req->input('title');
        $specialOrders->description = $req->input('description');
        $source = $req->file('image');
        if ($source) {
            $extensionFile = $req->file('image')->getClientOriginalExtension();
            $name = md5(uniqid());
            $thumb = Image::make($source)
                ->resize(null, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode($extensionFile, 100);
            Storage::put('public/uploads/thumb/' . $name . '.' . $extensionFile, $thumb);
            $thumb->destroy();
            $specialOrders->path_to_image = Storage::url('public/uploads/thumb/' . $name . '.' . $extensionFile);
        }

        $specialOrders->save();

        return redirect()->route('specialOrders')->with('success', 'Спецпредложение добавлено');
    }

    public function SpecialOrdersEdit($id)
    {
        $specialOrders = new SpecialOrders();
        return view('dashboard/edit/specialOrdersEdit', ['specialOrders' => $specialOrders->find($id)]);
    }

    public function SpecialOrdersEditSubmit($id, Request $req)
    {
        $specialOrders = SpecialOrders::find($id);
        $specialOrders->title = $req->input('title');
        $specialOrders->description = $req->input('description');
        $source = $req->file('image');

        if ($source) {
            if ($specialOrders->path_to_image != '' && file_exists(public_path($specialOrders->path_to_image))) {
                unlink(public_path($specialOrders->path_to_image));
            }
            $extensionFile = $req->file('image')->getClientOriginalExtension();
            $name = md5(uniqid());
            $thumb = Image::make($source)
                ->resize(null, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode($extensionFile, 100);
            Storage::put('public/uploads/thumb/' . $name . '.' . $extensionFile, $thumb);
            $thumb->destroy();
            $specialOrders->path_to_image = Storage::url('public/uploads/thumb/' . $name . '.' . $extensionFile);
        }

        $specialOrders->save();

        return redirect()->route('specialOrders', $id)->with('success', 'Спецпредложение изменено');
    }

    public function SpecialOrdersDeleteSubmit($id)
    {
        $specialOrderItem = SpecialOrders::find($id);
        if ($specialOrderItem->path_to_image != '' && file_exists(public_path($specialOrderItem->path_to_image))) {
            unlink(public_path($specialOrderItem->path_to_image));
        }
        SpecialOrders::find($id)->delete();
        return redirect()->route('specialOrders')->with('success', 'Спецпредложение удалено');
    }
}
