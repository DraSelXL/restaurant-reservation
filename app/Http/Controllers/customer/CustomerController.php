<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Migrasi\favouriteMigrasi;
use App\Models\Migrasi\restaurantMigrasi;
use App\Models\Migrasi\userMigrasi;
use App\Rules\ImageCount;
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
        $start_price = $request->start_price;
        $end_price = $request->end_price;
        $description = $request->description;
        $location = $request->location;

        // NO PRICE FILTER
        if($start_price == null){ $start_price = 0; }
        if($end_price == null){ $end_price = 2147483647; }

        $restaurants = restaurantMigrasi::where(
            function ($q) use ($keyword,$description,$location,$start_price,$end_price)
            {
                $q
                ->where('full_name', 'like', "%$keyword%")
                ->where('address', 'like', "%$location%")
                ->where('price', '>', "$start_price")
                ->where('price', '<', "$end_price")
                ->where('description', 'like', "%$description%");
            }
        )->get();
        // dd($restaurants);
        return view('customer.customer_search',compact('currPage','restaurants','keyword'));
    }
    public function masterFavorite(Request $request)
    {
        $currPage = "favorite";
        $user_id = activeUser()->id;
        $restaurants = restaurantMigrasi::join('favourites','favourites.restaurant_id','=','restaurants.id')
                        ->where('favourites.user_id','=',$user_id)
                        ->get();
        $user = userMigrasi::find($user_id);
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
    public function editProfile(Request $request)
    {
        $user_id = activeUser()->id;
        $user = userMigrasi::find($user_id);
        if(password_verify($request->password, $user['password'])) {
            $user->username = $request->username;
            $user->full_name = $request->firstname.' '.$request->lastname;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->date_of_birth = $request->birthdate;
            $user->save();
            return redirect()->back()->with('pesan','Updated Successfully');
        }
        else{
            return redirect()->back()->with('pesan','Updated Unsuccessfully');
        }
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
        // Register validation
        $request->validate([
            'full_name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric|min:11',
            'open_at'=>'required',
            'shift'=>'required',
            'foto' => ['required', new ImageCount(count(($request->file("foto") != null) ? $request->file("foto") : []))]
        ]);

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
        $new_restaurant->user_id = activeUser()->id;
        $new_restaurant->col = 0;
        $new_restaurant->row = 0;
        $new_restaurant->shifts = $request->shift;
        $new_restaurant->price = 20000;
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

    public function filterRestaurant(Request $request)
    {
        $keyword = $request->keyword;
        $start_price = $request->start_price;
        $end_price = $request->end_price;
        $description = $request->description;
        $location = $request->location;
        // RETURN REDIRECT TO EXPLORE WITH KEYWORD
        return redirect()->route("customer_search",compact("keyword","start_price","end_price","description","location"));
    }

    public function generateMap(Request $request)
    {
        // GENERATE MAP AJAX
        $id = $request->restaurant_id;
        $restaurant = restaurantMigrasi::find($id);
        $col_length = $restaurant->col;
        $row_length = $restaurant->row;

        return view("customer.partial.restaurat_map",compact("col_length","row_length"));
    }
    public function generateForm(Request $request)
    {
        // GENERATE MAP AJAX
        $id = $request->restaurant_id;
        $restaurant = restaurantMigrasi::find($id);

        return view("customer.partial.restaurant_detail",compact("restaurant"));
    }
    public function bookTable(Request $request)
    {
        // BOOK TABLE
        $id = $request->restaurant_id;
        $restaurant = restaurantMigrasi::find($id);
        $table_number = $request->table_number;
        $reservation_date = $request->reservation_date;
        $reservation_time = $request->reservation_time;

        // return view("customer.partial.restaurant_detail",compact("restaurant"));
    }
}
