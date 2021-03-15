<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserImageUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $req)
    {
        $data = User::where('id',$req->session()->get('id'))->first();
        return view('user.dashboard')->with('data',$data);
    }

    public function update(Request $req)
    {


        // $user->name = $req->name;
        // $user->email = $req->email;
        // $user->password = $req->password;
        // $user->address = $req->address;
        // $user->user_type = 'user';

        // if($req->hasFile('image_file'))
        // {
        //     $image = $req->file('image_file');
        //     $extension = $image->getClientOriginalExtension();
        //     $image_name = time() . '.' . $extension;
        //     $image->move('uploads/allUsers',$image_name);
        //     $user->image = $image_name;
        // }
        // else{
        //     $user->image = null;
        // }


        //$user->save();


        return view('user.update');
    }

    public function store(UserUpdateRequest $req)
    {

        $user = User::find($req->session()->get('id'));

        $user->name = $req->name;
        $user->password = $req->password;
        $user->address = $req->address;

        $user->save();

        return redirect()->route('user.home');
    }

    public function updateImage()
    {

        return view('user.updateImage');
    }
    public function storeImage(UserImageUpdateRequest $req)
    {

        $user = User::find($req->session()->get('id'));

        if($req->hasFile('image_file'))
        {
            $image = $req->file('image_file');
            $extension = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $extension;
            $image->move('uploads/images',$image_name);
            $user->image = $image_name;
        }
        else{
            $user->image = null;
        }

        $user->save();

        return redirect()->route('user.home');
    }

}
