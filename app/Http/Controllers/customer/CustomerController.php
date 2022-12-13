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
        $user = activeUser();
        return view('customer.customer_home',compact('currPage','user'));
    }
    public function masterExplore(Request $request)
    {
        $currPage = "search";
        $restaurants = restaurantMigrasi::all();

        // SEARCH RESTAURANT
        $keyword = $request->keyword;
        $user = activeUser();
        if($keyword != null){
            $restaurants = restaurantMigrasi::where("full_name",'like',"%$keyword%",'user')->get();
        }
        return view('customer.customer_search',compact('currPage','restaurants'));
    }
    public function masterFavorite(Request $request)
    {
        $currPage = "favorite";
        $restaurants = restaurantMigrasi::all();
        $user = activeUser();
        return view('customer.customer_favorite',compact('currPage','restaurants','user'));
    }
    public function masterHistory(Request $request)
    {
        $currPage = "history";
        return view('customer.customer_history',compact('currPage'));
    }
    public function masterProfile(Request $request)
    {
        $currPage = "profile";
        $user = activeUser();
        return view('customer.customer_profile',compact('currPage','user'));
    }
    public function masterNotification(Request $request)
    {
        $currPage = "notification";
        return view('customer.customer_notification',compact('currPage'));
    }


    // HOME FUNCTIONS
    public function checkAvailability(Request $request)
    {
        $keyword = $request->restaurant_name;
        $date = $request->reservation_date;
        $time = $request->reservation_time;
        return redirect()->route("customer_search",compact("keyword"));
    }
    public function masterRegister(Request $request)
    {
        $currPage = "register";
        return view('customer.customer_register',compact('currPage'));
    }
    public function registerRestaurant(Request $request)
    {
        // INPUT IMAGE BATCH
        $img_ctr = 1;
        foreach ($request->file("foto") as $file) {
            $file_name = "restaurant_".$img_ctr.".".$file->getClientOriginalExtension();
            $path = "images/restaurant/".$request->full_name;
            $file->storeAs($path,$file_name,"public");
            $img_ctr++;
        }

        // REGISTER RESTAURANT
        $new_restaurant = new restaurantMigrasi;
        $new_restaurant->full_name = $request->full_name;
        $new_restaurant->address = $request->address;
        $new_restaurant->phone = $request->phone;
        $new_restaurant->average_rating = 0;
        $new_restaurant->user_id = 1;
        $new_restaurant->col = 0;
        $new_restaurant->row = 0;
        $new_restaurant->start_time = $request->open_at."";
        $new_restaurant->description = $request->description;
        $new_restaurant->save();

        // RETURN REDIRECT TO RESTAURANT HOME
        return redirect()->route("customer_home")->with("successMessage","Restaurant account has been registered!");
    }

    // SEARCH/EXPLORE FUNCTIONS
    public function masterRestaurant(Request $request)
    {
        $currPage = "search";
        $restaurant_name = $request->restaurant_name;
        $restaurant = restaurantMigrasi::where('full_name',$restaurant_name)->first();

        return view('customer.customer_restaurant',compact('currPage','restaurant'));
    }
    public function searchRestaurant(Request $request)
    {
        $keyword = $request->keyword;
        // RETURN REDIRECT TO EXPLORE WITH KEYWORD
        return redirect()->route("customer_search",compact("keyword"));
    }

}
