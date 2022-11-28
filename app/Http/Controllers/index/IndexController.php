<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function masterIndex(Request $request)
    {
        return view('index.index');
    }

    public function checkLogin(Request $request)
    {

    }

    public function checkRegister(Request $request)
    {

    }

    public function logout(Request $request)
    {
        return redirect()->route("index");
    }
}
