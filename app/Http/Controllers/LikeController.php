<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Project $project)
    {
        if($project->likedBy(session()->get('id'))){
            return response(null,409);
        }
        else{
            $project->likes()->create([
                'user_id' => session()->get('id'),
            ]);
        }

        return back();
    }
    public function destroy(Project $project)
    {

        $user = User::find(session()->get('id'));
        $user->likes()->where('project_id',$project->id)->delete();
        return back();
    }
}
