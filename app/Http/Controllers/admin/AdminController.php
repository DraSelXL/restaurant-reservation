<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Migrasi\restaurantMigrasi;
use App\Models\Migrasi\transactionMigrasi;
use App\Models\Migrasi\userMigrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function masterDashboard(Request $request)
    {
        $currPage = "dashboard";
        $transactions= transactionMigrasi::where('payment_status',1)->get();
        $totaltransaction = 0;
        foreach ($transactions as $transaction) {
            $totaltransaction += $transaction->payment_amount;
        }
        $totalOrder = transactionMigrasi::all();
        $countTotalOrder = $totalOrder->count();
        // foreach ($transactions as $transaction) {
        //     $getMonth = substr($transaction->created_at,5,2);
        // }
        $monthNow = date("m");
        $audienceGrowth = userMigrasi::whereMonth('created_at','=',$monthNow)->get();
        $topSales = DB::select("select r.id, r.full_name, r.address, SUM(t.payment_amount) FROM restaurants r JOIN transactions t ON r.id = t.restaurant_id GROUP BY r.id");
        // dd($topSales);
        return view('admin.admin_dashboard',compact('currPage','totaltransaction','countTotalOrder','audienceGrowth','topSales'));
    }
    public function masterCustomer(Request $request)
    {
        $currPage = "customer";
        $allUser = userMigrasi::all();
        $keyword = $request->keyword;

        if($keyword!=null){
            $allUser = userMigrasi::where('username','like',"%$keyword%")->get();
        };
        $tempId = [];
        $restaurantId = [];
        foreach ($allUser as $user) {
            $tempId[] = $user->id;
        }

        $restaurants = restaurantMigrasi::withTrashed()->get();
        foreach ($restaurants as $restaurant) {
            $restaurantId[] = $restaurant->user_id;
        }
        $userList = userMigrasi::withTrashed()
            ->where(function($q) use ($tempId,$restaurantId)
            {
                $q
                ->whereIn('id',$tempId)
                ->whereNotIn('id',$restaurantId);
            })
            ->get();
        // dd($userList);
        $countUser = $userList->count();

        //$countSpending = DB::select("select u.id,sum(t.payment_amount) as sum from transactions t join users u on u.id = t.user_id group by 1");
        // dd($countSpending);
        return view('admin.admin_customer',compact('currPage','userList','countUser'));
    }

    public function banUser(Request $request)
    {
        $selectedUser = userMigrasi::withTrashed()->find($request->id);
        if($selectedUser->trashed()){
            $result = $selectedUser->restore();
        }
        else{
            $result = $selectedUser->delete();
        }
        if($result){
            return redirect()->back()->with('pesan','User Banned');
        }
        else{
            return redirect()->back()->with('pesan','Error');
        }
    }

    public function searchCustomer(Request $request)
    {
        $keyword = $request->keyword;
        return redirect()->route('homeCustomerAdmin',compact('keyword'));
    }

    public function masterRestaurant(Request $request)
    {
        $currPage = "restaurant";
        $allRestaurant = restaurantMigrasi::withTrashed()->get();
        $keyword = $request->keyword;
        // dd($keyword);
        if($keyword!=null){
            $allRestaurant = restaurantMigrasi::where('full_name','like',"%$keyword%")->get();
        };
        //dd($allRestaurant);
        $countRestaurant = restaurantMigrasi::all()->count();
        return view('admin.admin_restaurant',compact('currPage','allRestaurant','countRestaurant'));
    }

    public function banRestaurant(Request $request)
    {
        $selectedRestaurant = restaurantMigrasi::withTrashed()->find($request->id);
        if($selectedRestaurant->trashed()){
            $result = $selectedRestaurant->restore();
        }
        else{
            $result = $selectedRestaurant->delete();
        }
        if($result){
            return redirect()->back()->with('pesan','Restaurant Banned');
        }
        else{
            return redirect()->back()->with('pesan','Error');
        }
    }

    public function searchRestaurant(Request $request)
    {
        $keyword = $request->keyword;
        return redirect()->route('homeRestaurantAdmin',compact('keyword'));
    }

    public function masterSettings(Request $request)
    {
        $currPage = "settings";
        return view('admin.admin_settings',compact('currPage'));
    }
}
