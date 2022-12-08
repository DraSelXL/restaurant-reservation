<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    private static $ACTIVE_HOME = "home";
    private static $ACTIVE_HISTORY = "history";
    private static $ACTIVE_STATISTIC = "statistic";

    /**
     * Get the home page view of the restaurant and return it as a response.
     */
    public function getHomePage(Request $request)
    {
        return view('restaurant.restaurant-home', [
            'active' => RestaurantController::$ACTIVE_HOME
        ]);
    }

    /**
     * Get the history page view of the restaurant and return it as a response.
     */
    public function getHistoryPage(Request $request)
    {
        return view('restaurant.restaurant-history', [
            'active' => RestaurantController::$ACTIVE_HISTORY
        ]);
    }

    /**
     * Get the statistic page view of the restaurant and return it as a response.
     */
    public function getStatisticPage(Request $request)
    {
        return view('restaurant.restaurant-statistic', [
            'active' => RestaurantController::$ACTIVE_STATISTIC
        ]);
    }
}
