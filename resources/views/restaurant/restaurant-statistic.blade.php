@extends('layouts.restaurant-sidebar')

@section("dependencies")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@endsection

@section("custom-css-extended")
    <style>
        .toggle-container {
            border-radius: 6px;
            border: 1px solid black;
        }
        .toggle-card {
            background-color: inherit;
            border: 0 solid black;

        }
        .toggle-card.active {
            background-color: rgb(240, 240, 240);
        }
    </style>
@endsection

@section('main-content')
    <main class="p-4">
        <div class="container">
            <div class="d-flex mb-5">
                {{-- Card to represent total revenue --}}
                <div class="col">
                    <div class="card p-4 m-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <img class="bg-light rounded-3 p-2 me-3" src="{{asset("/storage/images/admin/sale.png")}}" alt="" width="60px">
                            <div class="">
                                <p class="m-0"><b>Total Sales</b></p>
                                <p class="m-0 overview_sub">{{date("F")}} {{date("jS")}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-100">
                            <h1 id="revenue-placeholder" class="font-weight-bold">Fetching...</h1>
                        </div>
                    </div>
                </div>
                {{-- Card to represent total orders --}}
                <div class="col">
                    <div class="card p-4 m-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <img class="bg-light rounded-3 p-2 me-3" src="{{asset("/storage/images/admin/order.png")}}" alt="" width="60px">
                            <div class="">
                                <p class="m-0"><b>Total Orders</b></p>
                                <p class="m-0 overview_sub">{{date("F")}} {{date("jS")}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-100">
                            <h1 id="order-placeholder" class="font-weight-bold">Fetching...</h1>
                        </div>
                    </div>
                </div>
                {{-- Card to represent total growth --}}
                <div class="col">
                    <div class="card p-4 m-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <img class="bg-light rounded-3 p-2 me-3" src="{{asset("/storage/images/admin/growth.png")}}" alt="" width="60px">
                            <div class="">
                                <p class="m-0"><b>Audience Growth</b></p>
                                <p class="m-0 overview_sub">{{date("F")}} {{date("jS")}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-100">
                            <h1 id="growth-placeholder" class="font-weight-bold">Fetching...</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-3">
                <h2>Total revenue graph</h2>
                <hr class="my-2">
                <canvas id="revenue-graph" class="w-100"></canvas>
            </div>
        </div>
    </main>

    <script>
        // Global Variable
        const MONTHLY_FILTER = 1;
        const YEARLY_FILTER = 2;

        /**
         * Start the script as soon as the HTML DOM loads. Acts as the main function.
         */
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Document Element
            const revenuePlaceholder = $("#revenue-placeholder");
            const orderPlaceholder = $("#order-placeholder");
            const growthPlaceholder = $("#growth-placeholder");

            // Initialize Variables
            let xValues = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            let yValues = [];

            // Register Events
            loadGraph(xValues, yValues); // Load the graph as soon as the page loads
            getYearRevenueData(2022, xValues);
            getTotalRevenue(revenuePlaceholder)
            getTotalOrder(orderPlaceholder)
        });

        /**
         * Load the graph with the X-axis values and Y-axis values.
         *
         * @param {Array} xValues An array containing the labels of the columns.
         * @param {Array} yValues An array containing the labels of the rows.
         */
        function loadGraph(xValues, yValues) {
            let myChart = new Chart("revenue-graph", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        label: 'Revenue per Month',
                        borderWidth: 1,
                        tension: 0.2,
                        backgroundColor: "rgb(6, 199, 0, 1.0)",
                        borderColor: "rgb(6, 199, 0, 1.0)",
                        data: yValues
                    }],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });
        }

        /**
         * Retrieve the data of revenue from the targeted year, and show it into the graph.
         *
         * @param {Integer} year    The year which the data is going to be retrieved.
         * @param {Arrayy}  xValues The label for each column that represents the months.
         */
        function getYearRevenueData(year, xValues) {
            $.ajax({
                type: "get",
                url: "/restaurant/revenue",
                data: {
                    year: year
                },
                success: function (response) {
                    loadGraph(xValues, response);
                }
            });
        }

        /**
         * Fetch the total revenue of the current authenticated restaurat.
         *
         * @param (JqueryObject) placeholder The element to put the response into.
         */
        function getTotalRevenue(placeholder) {
            $.ajax({
                type: "get",
                url: "/restaurant/totalRevenue",
                data: {},
                success: function (response) {
                    placeholder.html(`Rp. ${new Intl.NumberFormat('id-ID').format(response)}`)
                }
            });
        }

        /**
         * Fetch the total order that has been made to the restaurant.
         *
         * @param (JqueryObject) placeholder The element to put the response into.
         */
        function getTotalOrder(placeholder) {
            $.ajax({
                type: "get",
                url: "/restaurant/totalOrder",
                data: {},
                success: function (response) {
                    placeholder.html(response)
                }
            });
        }
    </script>
@endsection
