<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\SubsRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Project;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsersRequest $req)
    {
        $userX = new User;
        $userX->name = $req->name;
        $userX->email = $req->email;
        $userX->password = $req->password;
        $userX->address = $req->address;
        $userX->user_type = $req->user_type;

        if($userX->save())
        {
            session()->flash('msg', 'User account created successfully.');
        }
        else {
            session()->flash('msg', 'User account creation failed!!.');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_x = User::find($id);
        return view('admin.user_details')->with('user', $user_x);
    }

    public function show_profile()
    {
        $id = session()->get('id');
        $user_x = User::find($id);
        return view('admin.profile')->with('user', $user_x);
    }

    public function user_list()
    {
        $users = User::where('user_type', '!=', 'admin')->simplePaginate(5);
        return view('admin.user_list')->with('users', $users);
    }

    public function admin_list()
    {
        $users = User::where('user_type', 'admin')->simplePaginate(5);
        return view('admin.user_list')->with('users', $users);
    }

    public function search(Request $req)
    {
        if($req->route()->getName() == 'admin.admin_list')
        {
            $users = User::where('email', 'LIKE', $req->search.'%')
                ->where('user_type', 'admin')
                ->simplePaginate(5);

            return view('admin.user_list')->with('users', $users);
        }

        else if($req->route()->getName() == 'admin.user_list')
        {
            $users = User::where('email', 'LIKE', $req->search.'%')
                ->where('user_type', 'user')
                ->simplePaginate(5);

            return view('admin.user_list')->with('users', $users);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_x = User::find($id);
        return view('admin.edit_details')->with('user', $user_x);
    }

    public function edit_profile()
    {
        $id = session()->get('id');
        $user_x = User::find($id);
        return view('admin.edit_profile')->with('user', $user_x);
    }

    public function update_profile(UpdateProfileRequest $req)
    {
        $id = session()->get('id');

        $user_x = User::find($id);
        $user_x->name = $req->name;
        $user_x->email = $req->email;
        $user_x->password = $req->password;
        $user_x->address = $req->address;
        if($req->hasFile('image_file'))
        {
            File::delete('uploads/images/'.$user_x->image);
            $file_name = date('y-m-d').time().'.'.$req->file('image_file')
                    ->getClientOriginalExtension();
            $user_x->image = $file_name;
            $req->file('image_file')->move('uploads/images', $file_name);
        }

        if($user_x->save())
        {
            session()->flash('msg', 'Updated successfully');
        }
        else {
            session()->flash('msg', 'Update failed!');
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $req, $id)
    {
        $success_msg = 'Details updated successfully.';
        $failed_msg = 'User details update failed!';

        $user_x = User::find($id);
        $user_type = $user_x->user_type;

        $user_x->name = $req->name;
        $user_x->email = $req->email;
        $user_x->password = $req->password;
        $user_x->address = $req->address;
        $user_x->user_type = $req->user_type;

        if($user_type == 'admin')
        {
            if($user_x->save())
            {
                $req->session()->flash('msg', $success_msg);
            } else {
                $req->session()->flash('msg', $failed_msg);
            }
            return redirect()->back();
        }
        else if($user_type == 'user')
        {
            if($user_x->save())
            {
                $req->session()->flash('msg', $success_msg);
            } else {
                $req->session()->flash('msg', $failed_msg);
            }
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $req)
    {
        $user_x = User::find($id);
        $success_msg = 'User removed successfully.';
        $failed_msg = 'User failed to remove.';

        if($user_x->user_type == 'admin')
        {
            if(User::destroy($id))
            {
                $req->session()->flash('msg', $success_msg);
            } else {
                $req->session()->flash('msg', $failed_msg);
            }
            return redirect()->route('admin.admin_list');
        }
        else if($user_x->user_type == 'user')
        {
            if(User::destroy($id))
            {
                $req->session()->flash('msg', $success_msg);
            } else {
                $req->session()->flash('msg', $failed_msg);
            }
            return redirect()->route('admin.user_list');
        }
    }

    public function subs_list()
    {
        $subs = Subscription::simplePaginate(5);
        return view('admin.subs_list')->with('subs', $subs);
    }

    public function subs_view($id)
    {
        $sub = Subscription::find($id);
        return view('admin.subs_view')->with('sub', $sub);
    }

    public function subs_edit($id)
    {
        $sub = Subscription::find($id);
        return view('admin.subs_edit')->with('sub', $sub);
    }
    public function subs_update(SubsRequest $req, $id)
    {
        $sub = Subscription::find($id);
        $sub->name = $req->name;
        $sub->info = $req->info;
        $sub->duration = $req->duration;
        $sub->price = $req->price;
        $sub->project_limit = $req->project_limit;

        if($sub->save())
        {
            session()->flash('msg', 'Subscription package details updated successfully.');
        }
        else
        {
            session()->flash('msg', 'Failed to update subscription package details!');
        }
        return redirect()->back();
    }

    public function subs_delete($id)
    {
        if(Subscription::destroy($id))
        {
            session()->flash('msg', 'Package removed successfully.');
        }
        else
        {
            session()->flash('msg', 'Failed to remove the package!');
        }
        return redirect()->route('admin.subs_list');
    }

    public function subs_create()
    {
        return view('admin.subs_create');
    }

    public function subs_store(SubsRequest $req)
    {
        $sub = new Subscription;
        $sub->name = $req->name;
        $sub->info = $req->info;
        $sub->duration = $req->duration;
        $sub->price = $req->price;
        $sub->project_limit = $req->project_limit;

        if($sub->save())
        {
            session()->flash('msg', 'New subscription package created successfully.');
        }
        else
        {
            session()->flash('msg', 'Failed to create new subscription package!');
        }
        return redirect()->back();
    }

    public function project_list()
    {
        $projs = Project::simplePaginate(5);
        return view('admin.project_list')
            ->with('projs', $projs)
            ->with('title', 'All Projects');
    }

    public function project_details($id)
    {
        $proj = Project::find($id);
        return view('admin.project_details')
            ->with('proj', $proj);
    }

    public function project_approve($id)
    {
        $proj = Project::find($id);
        $proj->status = 'active';
        if($proj->save())
        {
            session()->flash('msg', 'Project Approved.');
        }
        else
        {
            session()->flash('msg', 'Failed to approve the project!');
        }
        return redirect()->route('admin.project_details', $proj->id);
    }

    public function project_delete($id)
    {
        if(Project::destroy($id))
        {
            session()->flash('msg', 'The project removed successfully.');
        }
        else {
            session()->flash('msg', 'Failed to remove the project!');
        }
        return redirect()->route('admin.project_list');
    }

    public function project()
    {
        $total = Project::all()->count();
        $active = Project::where('status', 'active')->get()->count();
        $pending = Project::where('status', 'pending')->get()->count();
        $closed = Project::where('status', 'closed')->get()->count();
        $status_all = [
            'total'=>$total,
            'active'=>$active,
            'pending'=>$pending,
            'closed'=>$closed
        ];
        return view('admin.project')->with('status', $status_all);
    }

    public function pending_projects()
    {
        $projects = Project::where('status', 'pending')->simplePaginate(5);
        return view('admin.project_list')
            ->with('title', 'Pending Projects')
            ->with('projs', $projects);
    }

    public function active_projects()
    {
        $projects = Project::where('status', 'active')->simplePaginate(5);
        return view('admin.project_list')
            ->with('title', 'Active Projects')
            ->with('projs', $projects);
    }

    public function closed_projects()
    {
        $projects = Project::where('status', 'closed')->simplePaginate(5);
        return view('admin.project_list')
            ->with('title', 'Closed Projects')
            ->with('projs', $projects);
    }

    public function subscription()
    {
        $total_packages = Subscription::all()->count();
        $total_active_users = User::where('subscription_id', '!=', null)
            ->get()->count();
        $total_inactive_users = User::where('subscription_id', null)
            ->where('user_type', '!=', 'admin')
            ->get()->count();
        return view('admin.subscription')
            ->with('total_packages', $total_packages)
            ->with('total_active_users', $total_active_users)
            ->with('total_inactive_users', $total_inactive_users);
    }

    public function users()
    {
        $total_users = User::where('user_type', 'user')->get()->count();
        $total_admins = User::where('user_type', 'admin')->get()->count();
        return view('admin.users')
            ->with('total_users', $total_users)
            ->with('total_admins', $total_admins);
    }
}
