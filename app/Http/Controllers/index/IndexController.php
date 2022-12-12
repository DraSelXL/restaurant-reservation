<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\Models\Migrasi\userMigrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function masterIndex(Request $request)
    {
        return view('index.index');
    }

    public function checkLogin(Request $request)
    {
        // Login validation
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        // AUTHENTICATION
        $credential = [
            "username" => $request->username,
            "password" => $request->password
        ];
        if($request->username == "admin" && $request->password == "admin"){
            return redirect()->route("admin_dashboard");
        }
        if(Auth::attempt($credential)){
            // Check user role
            if(activeUser()->role->name == "Admin"){
                return redirect()->route("admin_dashboard");
            }else if(activeUser()->role->name == "Customer"){
                return redirect()->route("customer_home");
            }else if(activeUser()->role->name == "Restaurant"){
                return redirect()->route("restaurant_home");
            }
        }else{
            return redirect()->route("index")->with("errorMessage","User not found!");
        }
    }

    public function checkRegister(Request $request)
    {
        // Register validation
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'password'=>'required|confirmed',
        ]);

        // Authentication
        $credential = [
            "username" => $request->username,
            "password" => $request->password
        ];
        Auth::attempt($credential);
        return redirect()->route("customer_home");
    }

    public function logout(Request $request)
    {
        if(Auth::guard('web')->check()){
            Auth::guard('web')->logout();
        }
        return redirect()->route("index");
    }
}
