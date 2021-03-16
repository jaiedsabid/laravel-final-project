<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewCamp;
use App\Http\Requests\NewProjRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserImageUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Project;
use App\Models\Subscription;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function index(Request $req)
    {
        $data = User::where('id',$req->session()->get('id'))->first();
        $subs = Subscription::find($data['subscription_id']);
        //dd($subs->subscription_find);
        //dd($subs['name']);
        return view('user.dashboard')->with('data',$data)->with('subs',$subs);
    }

    public function update()
    {
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

            File::delete('uploads/images/'.$user->image);
            $image = $req->file('image_file');
            $extension = $image->getClientOriginalExtension();
            $image_name = date('y-m-d').time() . '.' . $extension;
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
