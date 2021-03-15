<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Log_Reg_Controller extends Controller
{
    //
    public function log_index()
    {

        return view('auth.login');
    }

    public function lgin_check()
    {
        return view('auth.login');
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
