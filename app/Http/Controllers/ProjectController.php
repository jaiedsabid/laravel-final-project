<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewProjRequest;
use App\Models\Project;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    //
    public function index()
    {
        // $subs = User::find(7);
        // dd(gettype($subs->hassub->project_limit));


        $projs = Project::paginate(2);
        return view('welcome')->with('projs',$projs);
    }
    public function newProj()
    {

        $user = User::where('id',session()->get('id'))->first();
        return view('user.new_proj')->with('user',$user);
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

    public function viewProj(Request $req)
    {
        $user = User::where('id',$req->session()->get('id'))->firstOrFail();
        //dd($user->hasproj);

        return view('user.viewProj')->with('user',$user);
    }


    public function updateProj(Request $req)
    {
        $user = User::where('id',$req->session()->get('id'))->firstOrFail();
        //dd($user->hasproj);

        return view('user.update_Proj')->with('user',$user);
    }

    public function updateProjForm($parm)
    {
        $id = Crypt::decrypt($parm);
        //dd(Crypt::decrypt($parm));

        $proj = Project::find($id);

        return view('user.update_projForm')->with('proj',$proj);
    }

    public function storeProjForm(NewProjRequest $req,$parm)
    {
        $id = Crypt::decrypt($parm);
        //dd(Crypt::decrypt($parm));

        $proj = Project::find($id);

        $proj->title = $req->title;
        $proj->description = $req->description;
        $proj->req_money = $req->req_money;
        $proj->user_id = $req->session()->get('id');
        //image file


        if($req->hasFile('image'))
        {
            File::delete('uploads/project_images/'.$proj->image);
            $image = $req->file('image');
            $extension = $image->getClientOriginalExtension();
            $image_name = date('y-m-d').time() . '.' . $extension;
            $image->move('uploads/project_images',$image_name);
            $proj->image = $image_name;
        }

        $proj->save();
        return redirect()->route('proj.updateProj');


    }

    public function deleteProjView($parm)
    {
        $id = Crypt::decrypt($parm);
        //dd(Crypt::decrypt($parm));

        $proj = Project::find($id);

        return view('user.delete_proj')->with('proj',$proj);
    }

    public function deleteProj($parm)
    {
        $id = Crypt::decrypt($parm);

        if(Project::destroy($id)){
            return redirect()->route('proj.viewProj');
        }else{
            return redirect()->route('proj.viewProj');
        }
    }

}
