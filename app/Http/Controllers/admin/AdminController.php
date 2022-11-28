<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function masterDashboard(Request $request)
    {
        $currPage = "dashboard";
        return view('admin.admin_dashboard',compact('currPage'));
    }
    public function masterCustomer(Request $request)
    {
        $currPage = "customer";
        return view('admin.admin_customer',compact('currPage'));
    }
    public function masterRestaurant(Request $request)
    {
        $currPage = "restaurant";
        return view('admin.admin_restaurant',compact('currPage'));
    }
    public function masterSettings(Request $request)
    {
        $currPage = "settings";
        return view('admin.admin_settings',compact('currPage'));
    }
}
