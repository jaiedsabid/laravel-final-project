<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewProjRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function newProj()
    {

        return view('user.new_proj');
    }
    public function storeNewProj(NewProjRequest $req)
    {

        $proj = New Project;

        $proj->title = $req->title;
        $proj->description = $req->description;
        $proj->req_money = $req->req_money;
        $proj->user_id = $req->session()->get('id');
        $proj->status = 'pending';
        //image file


        if($req->hasFile('image'))
        {
            $image = $req->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = date('y-m-d').time() . '.' . $extension;
            $image->move('uploads/project_images',$image_name);
            $proj->image = $image_name;
        }
        else{
            $proj->image = null;
        }

        $proj->save();
        return redirect()->route('user.home');
    }
}
