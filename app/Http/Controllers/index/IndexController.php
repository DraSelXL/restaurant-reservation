<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Migrasi\userMigrasi;
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

        if($username == "admin" && $password == "admin"){
            return redirect('admin/dashboard');
        }
        $userData = userMigrasi::all()->where('username','=',$username);
        $user = $userData[0];
        if(password_verify($password, $user['password'])){
            return redirect()->route('customer_home');
        }
        else{
            return redirect()->back()->with('pesan','Password False');
        }

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
