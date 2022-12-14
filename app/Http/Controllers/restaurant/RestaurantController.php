<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\Migrasi\reservationMigrasi;
use App\Models\Migrasi\restaurantMigrasi;
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
        // Get restaurant model
        $restaurant = null;
        if ($request->session()->has("OPEN_TABLE_RESTAURANT_INFO")) {
            $restaurant = $request->session()->get("OPEN_TABLE_RESTAURANT_INFO");
        }
        else {
            $restaurant = restaurantMigrasi::where('user_id', activeUser()->id)->get();
        }

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

    /**
     * Get all available restaurant table from the authenticated user.
     */
    public function getRestaurantTables(Request $request)
    {
        // TODO: Get all tables that is available and return it as a html list-item elements
    }

    /**
     * Add a new type of table to the database assocciated with the current authenticated user.
     */
    public function addTable(Request $request)
    {
        // TODO: Add a new type table
    }

    /**
     * Increase the number of the targeted table size, from the authenticated user restaurant.
     */
    public function increaseTable(Request $request)
    {
        // TODO: Increase the table with the current authenticated user, and the targeted table size. Return the new size of the available targeted table.
    }

    /**
     * Decrease the number of the targeted table size, from the authenticated user restaurant.
     */
    public function decreaseTable(Request $request)
    {
        // TODO: Decrease the table with the current authenticated user, and the targeted table size. Return the new size of the available targeted table.
    }
}
