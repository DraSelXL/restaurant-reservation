<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function masterHome(Request $request)
    {
        return view('customer.customer_home');
    }
    public function masterExplore(Request $request)
    {

    }
    public function masterFavorite(Request $request)
    {
        # code...
    }
    public function masterHistory(Request $request)
    {
        # code...
    }
    public function masterProfile(Request $request)
    {
        # code...
    }
}
