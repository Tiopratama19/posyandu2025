<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginadminController extends Controller
{
    public function index (){
        return view ("admin.loginadmin");
    }
}