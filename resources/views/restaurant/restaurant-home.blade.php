@extends('layouts.restaurant-sidebar')

@section('custom-css-extended')
    <style>
        .reservation-holder {
            width: 100%;
            overflow: scroll;
            margin-bottom: 4em;
        }

        .reservation-holder .reservation-scroll {
            width: max-content;
            height: min-content;
            margin-bottom: 8px;
        }

        .reservation {
            display: inline-block;
            max-width: 30em;
        }
    </style>
@endsection

@section('main-content')
    <main class="p-4">
        {{-- Holds all reservation curently being made to the restaurant, don't forget to order it from the most closest based on time in an ascending order --}}
        <h1>Pending Reservations</h1>
        <hr>
        <div class="reservation-holder" id="pending-reservations">
            <div class="reservation-scroll">
                {{-- An active reservation card, create a card with this template --}}
                <div class="reservation">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ date("F j, Y, g:i a") }}</h5>
                            <div class="card-text mb-3">
                                <p class="m-0">Reserver: John Doe</p>
                                <p class="m-0">Seats: 5</p>
                            </div>
                            {{-- The responds button to mark a reservation as filled or not --}}
                            <div class="text-end">
                                <a href="{{ url('/restaurant/reject/123123') }}" class="btn btn-danger">Reject</a>
                                <a href="{{ url('/restaurant/confirm/123123') }}" class="btn btn-primary">Attended</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- An active reservation card, create a card with this template --}}
                <div class="reservation">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ date("F j, Y, g:i a") }}</h5>
                            <div class="card-text mb-3">
                                <p class="m-0">Reserver: John Doe</p>
                                <p class="m-0">Seats: 5</p>
                            </div>
                            {{-- The responds button to mark a reservation as filled or not --}}
                            <div class="text-end">
                                <a href="{{ url('/restaurant/reject/123123') }}" class="btn btn-danger">Reject</a>
                                <a href="{{ url('/restaurant/confirm/123123') }}" class="btn btn-primary">Attended</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- An active reservation card, create a card with this template --}}
                <div class="reservation">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ date("F j, Y, g:i a") }}</h5>
                            <div class="card-text mb-3">
                                <p class="m-0">Reserver: John Doe</p>
                                <p class="m-0">Seats: 5</p>
                            </div>
                            {{-- The responds button to mark a reservation as filled or not --}}
                            <div class="text-end">
                                <a href="{{ url('/restaurant/reject/123123') }}" class="btn btn-danger">Reject</a>
                                <a href="{{ url('/restaurant/confirm/123123') }}" class="btn btn-primary">Attended</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- An active reservation card, create a card with this template --}}
                <div class="reservation">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ date("F j, Y, g:i a") }}</h5>
                            <div class="card-text mb-3">
                                <p class="m-0">Reserver: John Doe</p>
                                <p class="m-0">Seats: 5</p>
                            </div>
                            {{-- The responds button to mark a reservation as filled or not --}}
                            <div class="text-end">
                                <a href="{{ url('/restaurant/reject/123123') }}" class="btn btn-danger">Reject</a>
                                <a href="{{ url('/restaurant/confirm/123123') }}" class="btn btn-primary">Attended</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h1>Settings</h1>
        <hr>
        <form action="/restaurant/updateRestaurant/123123" method="post">
            <div class="container">
                {{-- A save button that will popup when a change has been detected --}}
                <div class="d-flex mb-4">
                    <div class="rounded-3 me-2 p-2 px-3 bg-danger flex-fill">
                        <span class="text-white">Unsaved Changes</span>
                    </div>
                    <input type="submit" value="save" class="btn btn-primary">
                </div>

                <div class="row">
                    <div class="col-8">
                        <div id="restaurant-name" class="mb-3">
                            <h6 style="margin-bottom: 4px">Restaurant Name:</h6>
                            <input type="text" class="form-control" value="{{ 'Portable' }}" placeholder="Restaurant's name" name="restaurantName" aria-label="Restaurant's name" aria-describedby="restaurant's-name" required>
                            <small><em>This name is visible to anyone who is looking for this establishment.</em></small>
                        </div>

                        <div id="new-password" class="mb-3">
                            <h6 style="margin-bottom: 4px">New Password:</h6>
                            <input type="password" class="form-control" placeholder="New Password" name="newPassword" aria-label="New password" aria-describedby="new-password">
                            <small><em>Keep this input empty to not change it.</em></small>
                        </div>

                        {{-- The below password box pop up to existence when a new password has been inserted, (change class form visible to invisible?) --}}
                        <div class="visible card p-2 mb-3">
                            <div id="confirm-password" class="mb-3">
                                <h6 style="margin-bottom: 4px">Confirm Password:</h6>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="restaurantPassword_confirm" aria-label="Confirm password" aria-describedby="confirm-password">
                            </div>
                            <div id="restaurant-password">
                                <h6 style="margin-bottom: 4px">Restaurant Password:</h6>
                                <input type="password" class="form-control" placeholder="Current Password" name="restaurantPassword" aria-label="Restaurant's password" aria-describedby="restaurant's-password">
                            </div>
                        </div>

                        <div id="reservation-cost" class="mb-3">
                            <h6 style="margin-bottom: 4px">Reservation Cost:</h6>
                            <div class="input-group">
                                <span class="input-group-text" id="cost-currency">Rp.</span>
                                <input type="number" class="form-control" value="20000" placeholder="Reservation Cost" step="100" name="reservationCost" aria-label="Reservation cost" aria-describedby="reservation-cost" required>
                            </div>
                        </div>

                        <div id="active-time" class="mb-3">
                            <h6 style="margin-bottom: 4px">Active Time:</h6>
                            <div class="input-group">
                                <span class="input-group-text" id="open-time">Open:</span>
                                <input type="time" class="form-control" name="openTime" aria-label="openTime" aria-describedby="Open-time" required>
                                <span class="input-group-text" id="open-time">Close:</span>
                                <input type="time" class="form-control" name="closeTime" aria-label="closeTime" aria-describedby="Close-time" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        {{-- <img src="{{ asset('images/restaurant/banner-612x612.jpg') }}" alt="Banner" style="width: 100%">
                        <button class="btn btn-primary">Edit</button> --}}
                    </div>
                </div>
            </div>
        </form>
    </main>

    {{-- TODO: Interact with the settings --}}
@endsection
