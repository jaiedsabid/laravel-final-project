<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class Log_Reg_Controller extends Controller
{
    //
    public function login_index()
    {

        return view('auth.login');
    }

    public function login_check(LoginRequest $req)
    {
        $user_x = User::where('email', $req->email)
            ->where('password', $req->password)
            ->get();

        if(count($user_x) > 0)
        {
            $req->session()->put('id', $user_x[0]->id);

            if($user_x[0]->user_type == 'admin')
            {
                $req->session()->put('user_type', 'admin');
                return redirect()->route('admin.index');
            }
            else
            {
                $req->session()->put('user_type', 'user');
                return redirect()->route('user.home');
            }
        }
        return back();
    }

    public function reg_index()
    {
        return view('auth.register');
    }

    public function reg_check(RegisterRequest $req)
    {

        //dd($req);
        $user = new User;

        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->address = $req->address;
        $user->user_type = 'user';

        if($req->hasFile('image_file'))
        {
            $image = $req->file('image_file');
            $extension = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $extension;
            $image->move('uploads/allUsers',$image_name);
            $user->image = $image_name;
        }
        else{
            $user->image = null;
        }


        $user->save();

        return redirect()->route('login');
    }
}
