<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $req)
    {
        $data = User::where('id',$req->session()->get('id'))->first();
        return view('user.dashboard')->with('data',$data);
    }

}
