<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Migrasi\transactionMigrasi;
use Illuminate\Http\Request;

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
        return view('admin.admin_dashboard',compact('currPage','totaltransaction','countTotalOrder'));
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
