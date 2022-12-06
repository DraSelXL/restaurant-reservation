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
        // LANJUTAN KERJA MARCO
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $username = $request->username;
        $password = $request->password;

        // if($username == "admin" && $password == "admin"){

        // }
        // elseif()
    }

    public function checkRegister(Request $request)
    {
        // LANJUTAN KERJA MARCO
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        $username = $request->username;
        $password = $request->password;

        // if($username == "admin" && $password == "admin"){

        // }
        // elseif()
    }

    public function logout(Request $request)
    {
        return redirect()->route("index");
    }

    public function masterRestaurant(Request $request)
    {
        $currPage = "restaurant";
        return view('customer.customer_restaurant',compact('currPage'));
    }

}
