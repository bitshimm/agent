<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileEdit($id)
    {
        $users = new User();
        return view('dashboard/profile', ['users' => $users->find($id)]);
    }
    public function ProfileEditSubmit($id, Request $req)
    {
        $users = User::find($id);
        $users->name = $req->input('name');
        $users->email = $req->input('email');
        // $password = $req->input('password');
        // if ($password) {
        //     $users->password = bcrypt($password);
        // }
        $current_password = $req->input('current_password');
        $new_password = $req->input('new_password');
        $userpass = $users->password;
        if ($current_password) {
            if (Hash::check($current_password, $userpass)) {
                $users->password = bcrypt($new_password);
                dd('success',$current_password, $new_password, Hash::check($new_password, $users->password));

            }else {
                dd('error');
                return redirect()->route('profileEdit', $id)->with('success', 'Неверный пароль');
            }
        }
        $users->save();

        return redirect()->route('profileEdit', $id)->with('success', 'Профиль изменен');
    }
}
