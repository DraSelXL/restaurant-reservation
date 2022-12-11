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
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <form action="/restaurant/updateRestaurant/123123" method="post">
                        {{-- A save button that will popup when a change has been detected --}}
                        <div id="unsavedPlaceholder" style="display: none">
                            <div class="d-flex mb-4">
                                <div class="rounded-3 me-2 p-2 px-3 bg-danger flex-fill">
                                    <span class="text-white">Unsaved Changes</span>
                                </div>
                                <input id="saveButton" type="submit" value="save" class="btn btn-primary">
                            </div>
                        </div>

                        <div id="restaurant-name" class="mb-3">
                            <h6 style="margin-bottom: 4px">Restaurant Name:</h6>
                            <input id="restaurantNameInput" type="text" class="form-control" value="{{ 'Portable' }}" placeholder="Restaurant's name" name="restaurantName" aria-label="Restaurant's name" aria-describedby="restaurant's-name" required>
                            <small><em>This name is visible to anyone who is looking for this establishment.</em></small>
                        </div>

                        <div id="new-password" class="mb-3">
                            <h6 style="margin-bottom: 4px">New Password:</h6>
                            <input id="newPasswordInput" type="password" class="form-control" placeholder="New Password" name="newPassword" aria-label="New password" aria-describedby="new-password">
                            <small><em>Keep this input empty to not change it.</em></small>
                        </div>

                        {{-- The below password box pop up to existence when a new password has been inserted, (change class form visible to invisible?) --}}
                        <div id="changePasswordPrompt" style="display: none">
                            <div class="card p-2 mb-3">
                                <div id="confirm-password" class="mb-3">
                                    <h6 style="margin-bottom: 4px">Confirm Password:</h6>
                                    <input id="confirmPasswordInput" type="password" class="form-control" placeholder="Confirm Password" name="restaurantPassword_confirm" aria-label="Confirm password" aria-describedby="confirm-password">
                                    <small><em>Re-enter the new password to confirm it.</em></small>
                                </div>
                                <div id="restaurant-password">
                                    <h6 style="margin-bottom: 4px">Restaurant Password:</h6>
                                    <input id="currentPasswordInput" type="password" class="form-control" placeholder="Current Password" name="restaurantPassword" aria-label="Restaurant's password" aria-describedby="restaurant's-password">
                                    <small><em>Enter the current password to change password.</em></small>
                                </div>
                            </div>
                        </div>

                        <div id="reservation-cost" class="mb-3">
                            <h6 style="margin-bottom: 4px">Reservation Cost:</h6>
                            <div class="input-group">
                                <span class="input-group-text" id="cost-currency">Rp.</span>
                                <input id="costInput" type="number" class="form-control" value="20000" placeholder="Reservation Cost" step="100" name="reservationCost" aria-label="Reservation cost" aria-describedby="reservation-cost" required>
                            </div>
                        </div>

                        <div id="active-time" class="mb-3">
                            <h6 style="margin-bottom: 4px">Active Time:</h6>
                            <div class="input-group">
                                <span class="input-group-text" id="open-time">Open:</span>
                                <input id="openTimeInput" type="time" class="form-control" name="openTime" aria-label="openTime" aria-describedby="Open-time" required>
                                <span class="input-group-text" id="open-time">Close:</span>
                                <input id="closeTimeInput" type="time" class="form-control" name="closeTime" aria-label="closeTime" aria-describedby="Close-time" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    {{-- The tables that are available to reserve in this establishment --}}
                    <h6>Available Tables:</h6>
                    <ul id="table-list" class="list-group mb-3">
                        {{-- A table that is available to reserve, table with the same number of person should be categorized in a single list-item --}}
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div id="table-2">
                                    2-man table x{{ 3 }} - {{ 0 }} reserved
                                </div>
                                <div>
                                    <button table="2" class="btn btn-danger fw-bold decrease-btn">-</button>
                                    <button table="2" class="btn btn-primary fw-bold increase-btn">+</button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div id="table-4">
                                    4-man Table x{{ 3 }} - {{ 0 }} reserved
                                </div>
                                <div>
                                    <button table="4" class="btn btn-danger fw-bold decrease-btn">-</button>
                                    <button table="4" class="btn btn-primary fw-bold increase-btn">+</button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div id="table-5">
                                    5-man Table x{{ 4 }} - {{ 4 }} reserved
                                </div>
                                <div>
                                    <button table="5" class="btn btn-danger fw-bold decrease-btn">-</button>
                                    <button table="5" class="btn btn-primary fw-bold increase-btn">+</button>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div id="table-6">
                                    6-man Table x{{ 3 }} - {{ 0 }} reserved
                                </div>
                                <div>
                                    <button table="6" class="btn btn-danger fw-bold decrease-btn">-</button>
                                    <button table="6" class="btn btn-primary fw-bold increase-btn">+</button>
                                </div>
                            </div>
                        </li>
                    </ul>

                    {{-- Add a new table to the available tables --}}
                    <h6>New table:</h6>
                    <form action="/restaurant/addTable" method="post">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" min="1" max="100" placeholder="4" aria-label="New Table" aria-describedby="new-table">
                            <span class="input-group-text">-man Table</span>
                            <input type="submit" class="btn btn-outline-secondary" type="button" id="add-button" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Global variable
        const INCREASE_TABLE = 0;
        const DECREASE_TABLE = 1;

        /**
         * Main function to trigger after the html document has finished loading.
         */
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize the element object variables
            const unsavedPlaceholder = $("#unsavedPlaceholder");
            const restaurantNameInput = $("#restaurantNameInput");
            const newPasswordInput = $("#newPasswordInput");
            const changePasswordPrompt = $("#changePasswordPrompt");
            const costInput = $("#costInput");
            const openTimeInput = $("#openTimeInput");
            const closeTimeInput = $("#closeTimeInput");

            // Variables
            const settingValues = ["Portable", "", "20000", "", ""]
            const settingStatus = [true, true, true, true, true]

            // Register events to the variables
            // Show the confirmation prompt when entering a new password
            newPasswordInput.on("input", showPrompt(newPasswordInput, changePasswordPrompt, ""));

            // Show the save prompt when a new value is detected
            restaurantNameInput.on("input", checkChanges(restaurantNameInput, unsavedPlaceholder, settingValues, settingStatus, 0));
            newPasswordInput.on("input", checkChanges(newPasswordInput, unsavedPlaceholder, settingValues, settingStatus, 1));
            costInput.on("input", checkChanges(costInput, unsavedPlaceholder, settingValues, settingStatus, 2));
            openTimeInput.on("input", checkChanges(openTimeInput, unsavedPlaceholder, settingValues, settingStatus, 3));
            closeTimeInput.on("input", checkChanges(closeTimeInput, unsavedPlaceholder, settingValues, settingStatus, 4));
        });

        /**
         * Toggle the prompt to show up or hidden away when a input element is empty or filled in.
         * Only applies to elements implementing the `d-flex`, `d-block` classes from bootstrap.
         *
         * @param {JqueryObject} inputElement  The input field of the html element.
         * @param {JqueryObject} promptElement The element which is going to be toggled if the condition is met.
         * @param {string}       compareValue  A string value to compare the input element value with.
         *
         * @return {function} An event handler function for the event.
         */
        function showPrompt(inputElement, promptElement, compareValue) {
            return (event) => {
                if (inputElement.val() !== compareValue) {
                    // Show prompt to existence
                    if (promptElement[0].style.display === "none") {
                        promptElement.slideDown('slow');
                    }
                }
                else {
                    // Unshow prompt from existence
                    if (!promptElement[0].classList.contains("d-none")) {
                        promptElement.slideUp('slow');
                    }
                }
            }
        }

        /**
         * Check for a different value when entering into the settings.
         * If a difference is detected, show the save button prompt.
         *
         * @param {JqueryObject} inputElement  The input field of the html element.
         * @param {JqueryObject} promptElement The element which is going to be toggled if the condition is met.
         * @param {Array}        settingValues An array of values for checking.
         * @param {Array}        settingStatus An array of booleans to indicate whether the input is the same or not.
         * @param {Integer}      arrayIndex    The index of the value and status that the input field corresponds to.
         *
         * @return {function} An event handler function to handle unsaved changes.
         */
        function checkChanges(inputElement, promptElement, settingValues, settingStatus, arrayIndex) {
            return (event) => {
                // Change status if a different value is detected
                if (inputElement.val() !== settingValues[arrayIndex]) {
                    if (settingStatus[arrayIndex])
                        settingStatus[arrayIndex] = false;
                }
                else {
                    if (!settingStatus[arrayIndex])
                        settingStatus[arrayIndex] = true;
                }

                // Show the prompt when a setting has been changed
                let isDifferent = false;
                let i = 0;
                while (i < settingStatus.length && !isDifferent) {
                    if (settingStatus[i] == false) {
                        isDifferent = true
                    }
                    i++;
                }

                if (isDifferent) {
                    if (promptElement[0].style.display === "none") {
                        promptElement.slideDown('slow');
                    }
                }
                else if (!isDifferent) {
                    if (promptElement[0].style.display !== "none") {
                        promptElement.slideUp('slow');
                    }
                }
            }
        }

        /**
         * Get the restaurant user's available tables.
         * ### Must be logged in in order to use!!!
         *
         * @param {JqueryObject} listElement  The element which the result will be printed to.
         */
        function getAvailableTables(listElement) {
            $.ajax({
                type: "GET",
                url: "/restaurant/getTables",
                data: {},
                success: function (response, status) {
                    // TODO: For every table, put into a list item in the listElement, add increase & decrease item event handler to the buttons in every item using the `mutateTableEvent()`.
                }
            });
        }

        /**
         * Increase or decrease the targeted table using the table attribute of the buttonElement.
         * Updates the list element when the AJAX request is successful, removes a table when none of the table type is available anymore.
         *
         * @param {JqueryObject} The button element that is going to fire the event.
         *
         * @return {function} The event handler function to handle the event.
         */
        function mutateTableEvent(buttonElement, mode) {
            let url = "";
            if (mode == INCREASE_TABLE) {
                url = "/restaurant/increaseTable";
            }
            else if (mode == DECREASE_TABLE) {
                url = "/restaurant/decreaseTable";
            }

            const table = buttonElement.attr("table");

            return (event) => {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        table: table
                    },
                    success: function (response) {
                        // TODO: Increase or decrease the availability of the table in the database, and update the element displaying the availability.
                    }
                });
            }
        }
    </script>
@endsection
