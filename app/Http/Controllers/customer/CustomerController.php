<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function masterHome(Request $request)
    {
        $currPage = "home";
        return view('customer.customer_home',compact('currPage'));
    }
    public function masterExplore(Request $request)
    {
        $currPage = "search";
        return view('customer.customer_search',compact('currPage'));
    }
    public function masterFavorite(Request $request)
    {
        $currPage = "favorite";
        return view('customer.customer_favorite',compact('currPage'));
    }
    public function masterHistory(Request $request)
    {
        $currPage = "history";
        return view('customer.customer_history',compact('currPage'));
    }
    public function masterProfile(Request $request)
    {
        $currPage = "profile";
        return view('customer.customer_profile',compact('currPage'));
    }
}
