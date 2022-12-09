<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Migrasi\restaurantMigrasi;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // NAVIGATION (NAVBAR) RELATED
    public function masterHome(Request $request)
    {
        $currPage = "home";
        return view('customer.customer_home',compact('currPage'));
    }
    public function masterExplore(Request $request)
    {
        $currPage = "search";
        $restaurants = restaurantMigrasi::all();
        return view('customer.customer_search',compact('currPage','restaurants'));
    }
    public function masterFavorite(Request $request)
    {
        $currPage = "favorite";
        $restaurants = restaurantMigrasi::all();
        return view('customer.customer_favorite',compact('currPage','restaurants'));
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
    public function masterNotification(Request $request)
    {
        $currPage = "notification";
        return view('customer.customer_notification',compact('currPage'));
    }

    public function masterRestaurant(Request $request)
    {
        $currPage = "search";
        $restaurant_name = $request->restaurant_name;
        $restaurant = restaurantMigrasi::where('full_name',$restaurant_name)->first();

        return view('customer.customer_restaurant',compact('currPage','restaurant'));
    }


    public function masterRegister(Request $request)
    {
        $currPage = "home";
        return view('customer.customer_register',compact('currPage'));
    }
    public function registerRestaurant(Request $request)
    {
        $currPage = "home";
        return redirect()->route("customer_home")->with("successMessage","Restaurant account has been registered!");
    }
}
