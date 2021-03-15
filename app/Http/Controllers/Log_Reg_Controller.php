<?php

namespace App\Http\Controllers;

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
            $req->session()->put('name', $user_x[0]->name);
            $req->session()->put('id', $user_x[0]->id);

            if($user_x[0]->user_type == 'admin')
            {
                return redirect()->route('admin.index');
            }
            else
            {
                return redirect()->route('user.home');
            }
        }
        return back();
    }

    public function reg_index()
    {
        return view('auth.register');
    }

    public function reg_check()
    {
        return view('auth.login');
    }
}
