<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\Migrasi\reservationMigrasi;
use App\Models\Migrasi\restaurantMigrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RestaurantController extends Controller
{
    /** Tells the view that the current active view is a home page */
    private static $ACTIVE_HOME = "home";

    /** Tells the view that the current active view is a history page */
    private static $ACTIVE_HISTORY = "history";

    /** Tells the view that the current active view is a statistic page */
    private static $ACTIVE_STATISTIC = "statistic";

    /**
     * Retrieve the current logged restaurant account and return it to the caller of the function.
     *
     * @return restaurantMigrasi|null The restaurant eloquent model if found, else return null.
     */
    private function getRestaurantFromSession(Request $request)
    {
        // Get restaurant model
        $restaurant = restaurantMigrasi::where('user_id', activeUser()->id)->get()[0];

        return $restaurant;
    }

    /**
     * Get the home page view of the restaurant and return it as a response.
     */
    public function getHomePage(Request $request)
    {
        return view('restaurant.restaurant-home', [
            'active' => RestaurantController::$ACTIVE_HOME,
            'restaurant' => $this->getRestaurantFromSession($request)
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
        $request->validate([
            'tableRow' => ['required', 'numeric', 'max:20', 'min:1'],
            'tableColumn' => ['required', 'numeric', 'max:20', 'min:1'],
            'restaurantAddress' => ['required'],
            'restaurantPhone' => ['required'],
            'restaurantDescription' => ['required'],
            'openTime' => ['required'],
            'shifts' => ['required', 'numeric'],
            'reservationCost' => ['required', 'numeric'],
        ]);

        // Get the restaurant
        $restaurant = $this->getRestaurantFromSession($request);

        if ($request->newPassword != null) {
            $request->validate([
                'newPassword' => ['confirmed'],
                'restaurantPassword' => ['required'],
            ]);
            if (Hash::check($request->currentPassword, $restaurant->user->password)) {
                return redirect()->intended("/restaurant/home")->with('err', 'Password is not correct!');
            }
        }

        $restaurant->row = $request->tableRow;
        $restaurant->col = $request->tableColumn;
        $restaurant->address = $request->restaurantAddress;
        $restaurant->phone = $request->restaurantPhone;
        $restaurant->description = $request->restaurantDescription;
        $restaurant->start_time = (int)explode(':', $request->openTime)[0];
        $restaurant->shifts = $request->shifts;
        $restaurant->price = $request->reservationCost;
        $restaurant->save();

        return redirect()->intended("/restaurant/home")->with('success', 'Successfully changed settings!');
    }

    /**
     * Get all available restaurant table from the authenticated user.
     */
    public function getRestaurantTables(Request $request)
    {
        $restaurant = $this->getRestaurantFromSession($request);

        $reservations = reservationMigrasi::where("restaurant_id", $restaurant->id)
            ->where("reservation_date_time", "==", DB::raw("NOW()"))
            ->orderBy("reservation_date_time", "asc")
            ->get();

        return view('restaurant.partial.table-reservation', [
            "restaurant" => $restaurant,
            "reservations" => $reservations,
        ]);
    }

    public function getReservations(Request $request)
    {
        $restaurant = $this->getRestaurantFromSession($request);

        // Get reservations in ascending order and more than today
        $reservations = reservationMigrasi::where("restaurant_id", $restaurant->id)
            ->where("reservation_date_time", ">=", DB::raw("NOW()"))
            ->orderBy("reservation_date_time", "asc")
            ->get();

        return view('restaurant.partial.reservation-card', ["reservations" => $reservations]);
    }
}
