<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /** Tells the view that the current active view is a home page */
    private static $ACTIVE_HOME = "home";

    /** Tells the view that the current active view is a history page */
    private static $ACTIVE_HISTORY = "history";

    /** Tells the view that the current active view is a statistic page */
    private static $ACTIVE_STATISTIC = "statistic";

    /**
     * Get the home page view of the restaurant and return it as a response.
     */
    public function getHomePage(Request $request)
    {
        // TODO: Get restaurant model
        // TODO: Get reservations in ascending order and more than today

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

    /**
     * Update the reservation with the specified id in the URL status to attended.
     */
    public function confirmReservation(Request $request)
    {
        // TODO: Confirm the status of the reservation and update the database.
    }

    /**
     * Update the reservation with the specified id in the URL status to rejected.
     */
    public function rejectReservation(Request $request)
    {
        // TODO: Reject the status of the reservation and update the database.
    }

    /**
     * Update the restaurant data with the given properties.
     */
    public function updateRestaurant(Request $request)
    {
        // TODO: Handle the new data to update the database.
    }
}
