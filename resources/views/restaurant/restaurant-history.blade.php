@extends('layouts.restaurant-sidebar')

@section('main-content')
    <main class="p-4">
        <h1>Restaurant History</h1>
        <hr style="margin: 6px 0">
        <table class="table table-striped">
            <thead class="table-info">
                <tr>
                    <th>No.</th>
                    <th>Reserver</th>
                    <th>Table</th>
                    <th>Reservation Date</th>
                    <th>Reservation Made</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                {{-- The page history will be contained here --}}
            </tbody>
        </table>

        {{-- Pagination Navigation Buttons --}}
        <div class="d-flex justify-content-center align-item-center">
            <button id="pagination-previous" class="btn btn-secondary"><</button>
            <div id="pagination-container" class="pagination-buttons mx-1">
                {{-- The pagination buttons will be contained here --}}
            </div>
            <button id="pagination-next" class="btn btn-secondary">></button>
        </div>
    </main>
    <script>
        // Global Variable
        let viewPage = 1;

        /**
         * The main function to call when the HTML has loaded.
         */
        document.addEventListener("DOMContentLoaded", function () {
            // Intialize element variables
            const tableBody = $("#tableBody");
            const paginationContainer = $("#pagination-container");
            const previousPage = $("#pagination-previous");
            const nextPage = $("#pagination-next");

            // Register Event
            loadPagination(paginationContainer, tableBody, viewPage);
            getReservations(tableBody, viewPage);

            previousPage.on("click", switchPage(viewPage-1, paginationContainer, tableBody))
            nextPage.on("click", switchPage(viewPage+1, paginationContainer, tableBody))
        });

        /**
         * Fetch a fixed amount of reservation details using pagination using AJAX and put them into an element's body.
         *
         * @param {JQueryObject} containerElement The element that will contain the AJAX responds.
         * @param {Integer}      page             The page that is to fetch.
         */
        function getReservations(containerElement, page) {
            $.ajax({
                type: "GET",
                url: "/restaurant/getReservationHistory",
                data: {
                    page: page
                },
                success: function (response) {
                    if (response != "") {
                        containerElement.html(response);
                    }
                    else containerElement.html("<tr><td colspan='6'><h1>No reservations has been made</h1></td></tr>");
                }
            });
        }

        /**
         * Load the pagination of the history page according to what pagae the current page is in.
         *
         * @param {JqueryObject} containerElement    The element which will contain the page.
         * @param {JqueryObject} paginationContainer The object of which the result of the AJAX is printed to.
         * @param {Integer}      currentPage         The number of the page this view is currently on.
         */
        function loadPagination(paginationContainer, containerElement, currentPage) {
            $.ajax({
                type: "GET",
                url: "/restaurant/getReservationPagination",
                data: {
                    page: currentPage
                },
                success: function (response) {
                    paginationContainer.html(response);
                    paginationContainer.find("button.btn").each(function (index) {
                        $(this).on('click', switchPage(Number($(this).attr("page")), paginationContainer, containerElement));
                    });
                }
            });
        }

        /**
         * Switch page of the reservation history based on what button is being clicked.
         *
         * @param {Integer}      targetPage          The element that fires the event.
         * @param {JqueryObject} paginationContainer The element that contains the pagination buttons.
         * @param {JqueryObject} containerElement    The element that is going to contain the switch result.
         */
        function switchPage(targetPage, paginationContainer, containerElement) {
            return (event) => {
                getReservations(containerElement, targetPage);
                loadPagination(paginationContainer, containerElement, targetPage)
                viewPage = targetPage;
            }
        }
    </script>
@endsection
