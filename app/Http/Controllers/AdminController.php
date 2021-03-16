<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function show_profile()
    {
        $id = session()->get('id');
        $user_x = User::find($id);
        return view('admin.profile')->with('user', $user_x);
    }

    public function user_list()
    {
        $users = User::where('user_type', '!=', 'admin')->get();
        return view('admin.user_list')->with('users', $users);
    }
    public function admin_list()
    {
        $users = User::where('user_type', '!=', 'admin');
        echo $users;
        //return view('admin.users_list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
