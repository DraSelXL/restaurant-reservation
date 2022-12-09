{{--
    LAYOUT YIELDS :

    A. HTML HEAD :
    1.  pagename : nama halaman ini (you dont say)
    2.  custom_css : jika butuh import custom css yang dibuat sendiri
    3.  dependencies : jika butuh import dependencies khusus page ini cth bootstrap, jquery

    B. HTML BODY :
    4.  header : untuk konten" header cth navbar, alert, error dsb
    5.  content : konten" utama halaman ini
    6.  footer

    C. OUTSIDE HTML BODY :
    7.  js_script

--}}

@extends('layouts.layout')

@section('pagename')
    Portable
@endsection

@section('custom_css')
    <link rel="stylesheet" href="{{asset('build/css/customer_home.css')}}">
    <style>
        .navigation:hover{
            transform: scale(1.2);
            font-weight: 600;
            cursor: pointer;
        }
    </style>
@endsection

@section('dependencies')
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')
    <div class="container">
        {{-- NAVBAR --}}
        @include('customer.partial.navbar')
        {{-- CONTENT --}}
        <div class="content py-4" style="height: calc(100vh - 80px)">
            <div class="row m-0">
                {{-- LEFT CONTENT --}}
                <div class="col-sm-12 col-md-8">
                    <div class="mb-3">
                        <p class="m-0" style="font-size: 2.5em;font-weight: bold;">History</p>
                        <p class="m-0">This is the transcipt/ ticket of all your reservation</p>
                    </div>


                    {{-- NOTIFICATION --}}
                    @for ($i=0;$i<5;$i++)
                        <div class="bg-light rounded-4 p-4 my-4">
                            <div class="row h-100">
                                <div class="col-sm-12 col-lg-4 d-flex">
                                    <img class="" src="{{asset("images/restaurant/Brad Pollich/restaurant_1.jpg")}}" alt="" width="100%">
                                </div>
                                <div class="col-sm-12 col-lg-8">
                                    <div class="restaurant_info mb-2">
                                        <div class="row m-0">
                                            <div class="col p-0">
                                                <h4 class="m-0">Pavillion Restaurant</h4>
                                            </div>
                                            <div class="col p-0 text-end">
                                                <p class="m-0">Saturday, 12/11/2022 12:40 AM</p>
                                            </div>
                                        </div>
                                        <p class="m-0 text-secondary">Asian, Indonesian, Steak</p>
                                    </div>
                                    <div class="order_info">
                                        <p class="m-0" style="font-family: helvetica_bold;">Transaction code : 1PKhfWqLiADhSb7</p>
                                        <p class="m-0">Table Number : 35</p>
                                        <p class="m-0">Order Price : 15.000,00</p>
                                        <p class="m-0">Status : Pending</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                {{-- RIGHT CONTENT --}}
                <div class="col-sm-12 col-md-4">
                    <div class="mb-3">
                        <p class="m-0" style="font-size: 2.5em;font-weight: bold;">Active Transaction</p>
                        <p class="m-0">This is the transcipt/ ticket of your last table reservation</p>
                    </div>
                    <div class="ticket">
                        {{-- TEMPLATE CARD --}}
                        <div class="mb-3" style="position: relative;">
                            <a class="text-dark p-0"  style="text-decoration: none;" href="/customer/restaurant/{{"Pavillion Restaurant"}}">
                                {{-- RESTAURANT EVENT --}}
                                <div class="event_container w-100" style="position: absolute;top:30px;">
                                    <div class="event_label text-light w-25 px-2 rounded-end" style="background-color: #ed3b27;">Sale</div>
                                    <div class="event_label text-light w-50 px-2 rounded-end" style="background-color: #6C4AB6; ">Best Seller</div>
                                </div>
                                <div class="number_container" style="position: absolute;top:30px;right:5%;">
                                    <div class="event_label text-light p-3 rounded-3" style="background-color: #FEB139; ">35</div>
                                </div>
                                {{-- CARD CONTENT --}}
                                <div class="restaurant_card bg-light p-3" >
                                    <div class="image_container" style="height: 18rem">
                                        <img class="navigation" src="{{asset('images/restaurant/Tina Feeney/restaurant_1.jpg')}}" alt="" width="100%" height="100%">
                                    </div>

                                    {{-- RESTAURANT INFO --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col-6">
                                            <div class="restaurant_info" >
                                                <p class="m-0" style="font-family: helvetica_regular;font-size: 1.5em">Pavillion Restaurant</p>
                                                <p class="m-0" style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">Asian, Indonesian, Steak</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end align-items-center">
                                            <p class="m-0">3</p>
                                            <img  src="{{asset('images/customer/person.png')}}" alt="" width="30px" height="30px">
                                        </div>
                                    </div>

                                    <hr>
                                    {{-- TRANSACTION DETAIL --}}
                                    <div class="code d-flex justify-content-end">
                                        <div class="text-end">
                                            <p class="m-0" style="font-family: helvetica_bold;font-size: 1.1em;">Transaction code : 1PKhfWqLiADhSb7</p>
                                            <p class="m-0" style="font-family: helvetica_regular;">Order Price : Rp 15.000,00</p>
                                            <p class="m-0" style="font-family: helvetica_regular;">Saturday, 11/10/2022 13.00 PM</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_script')

    <script>
        $(document).ready(function(){
            console.log('Welcome Customer!');

        });
    </script>
@endsection
