@extends('layouts.restaurant-sidebar')

@section("dependencies")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@endsection

@section("custom-css-extended")
    <style>
        .toggle-card {
            background-color: inherit;
            border: 0 solid black;

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
                            <img class="bg-light rounded-3 p-2 me-3" src="{{asset("images/admin/sale.png")}}" alt="" width="60px">
                            <div class="">
                                <p class="m-0"><b>Total Sales</b></p>
                                <p class="m-0 overview_sub">{{date("F")}} {{date("jS")}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-100">
                            <h1 class="font-weight-bold">Rp. {{ 123123 }},00</h1>
                        </div>
                        {{-- Toggle Total Revenue Time Limit --}}
                        <div class="d-flex justify-content-end w-100">
                            <div id="revenue-toggle" style="border-radius: 6px; border: 1px solid black">
                                <button id="revenue-toggle-monthly" class="toggle-card p-1 px-2" style="border-right: 1px solid black">Monthly</button>
                                <button id="revenue-toggle-yearly" class="toggle-card p-1 px-2">Yearly</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Card to represent total orders --}}
                <div class="col">
                    <div class="card p-4 m-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <img class="bg-light rounded-3 p-2 me-3" src="{{asset("images/admin/order.png")}}" alt="" width="60px">
                            <div class="">
                                <p class="m-0"><b>Total Orders</b></p>
                                <p class="m-0 overview_sub">{{date("F")}} {{date("jS")}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-100">
                            <h1 class="font-weight-bold">{{ 123 }}</h1>
                        </div>
                        {{-- Toggle Total Order Time Limit --}}
                        <div id="order-toggle" class="d-flex justify-content-end w-100">
                            <div style="border-radius: 6px; border: 1px solid black">
                                <button id="order-toggle-monthly" class="toggle-card p-1 px-2" style="border-right: 1px solid black">Monthly</button>
                                <button id="order-toggle-yearly" class="toggle-card p-1 px-2">Yearly</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Card to represent total growth --}}
                <div class="col">
                    <div class="card p-4 m-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <img class="bg-light rounded-3 p-2 me-3" src="{{asset("images/admin/growth.png")}}" alt="" width="60px">
                            <div class="">
                                <p class="m-0"><b>Audience Growth</b></p>
                                <p class="m-0 overview_sub">{{date("F")}} {{date("jS")}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-100">
                            <h1 class="font-weight-bold">{{ 345 }}</h1>
                        </div>
                        {{-- Toggle Total Growth Time Limit --}}
                        <div id="growth-toggle" class="d-flex justify-content-end w-100">
                            <div style="border-radius: 6px; border: 1px solid black">
                                <button id="growth-toggle-monthly" class="toggle-card p-1 px-2" style="border-right: 1px solid black">Monthly</button>
                                <button id="growth-toggle-yearly" class="toggle-card p-1 px-2">Yearly</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2>Total revenue graph</h2>
            <canvas id="revenue-graph" class="w-100"></canvas>
        </div>
    </main>

    <script>
        /**
         * Start the script as soon as the HTML DOM loads. Acts as the main function.
         */
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Document Element
            const revenueToggle = $("#revenue-toggle");
            const orderToggle = $("#order-toggle");
            const growthToggle = $("#growth-toggle");

            // Initialize Variables
            let xValues = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            let yValues = [1000000, 400000, 921000, 1200000, 300000, 704000, 1002000, 421000, 511000, 4000100, 2000000, 3170000];

            // Register Events
            loadGraph(xValues, yValues); // Load the graph as soon as the page loads
            revenueToggle.on("click", toggleContainer(revenueToggle));
            orderToggle.on("click", toggleContainer(orderToggle));
            growthToggle.on("click", toggleContainer(growthToggle));
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
         * Toggles the current active button and do an action corresponding to the type of the button being pressed.
         *
         * @param {JqueryObject} toggleContainer The container of the buttons to toggle.
         *
         * @return {function} The handler function that will handle the click event.
         */
        function toggleContainer(toggleContainer) {
            return (event) => {
                console.log("Clicked");
                // TODO: Handle toggle event
            }
        }
    </script>
@endsection
