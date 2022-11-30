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
    {{-- <link rel="stylesheet" href="{{asset('build/css/customer_home.css')}}"> --}}
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
    <div class="container" style="heigh: 100vh;">
        {{-- NAVBAR --}}
        @include('customer.partial.navbar')
        {{-- CONTENT --}}
        <div class="content pb-3 overflow-auto" style="height: calc(100vh - 98px)">
            {{-- SEARCH BAR --}}
            <div class="d-flex justify-content-center">
                <div class="p-3 w-50">
                    <form action="/customer/searchRestaurant" class="d-flex" role="search" method="POST">
                        @csrf
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="keyword">
                        <button class="btn border-0 navigation" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                        </button>
                    </form>
                </div>
            </div>
            {{-- CATALOG --}}
            <div class="catalog">
                <div class="row m-0">
                    {{-- FILTER --}}
                    <div class="col-3 border-end">
                        <h3 style="font-family: helvetica_bold">Filter</h3>
                        <form action="" style="font-family: helvetica_regular">
                            <div class="price mt-3">
                                <p class="m-0" style="font-family: helvetica_regular;color: rgb(111, 111, 111);">Price Range</p>
                                <div class="input-group">
                                    <input type="text" aria-label="First name" class="form-control" placeholder="From">
                                    <input type="text" aria-label="Last name" class="form-control" placeholder="To">
                                </div>
                            </div>
                            <div class="establishment mt-3">
                                <p class="m-0" style="font-family: helvetica_regular;color: rgb(111, 111, 111);">Establishment Type</p>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="0">Any</option>
                                    <option value="1">Restaurant</option>
                                    <option value="2">Bar/Pub</option>
                                    <option value="3">Cafee</option>
                                  </select>
                            </div>
                            <div class="location mt-3">
                                <p class="m-0" style="font-family: helvetica_regular;color: rgb(111, 111, 111);">Location</p>
                                <input type="text" class="form-control" placeholder="...">
                            </div>
                            <button type="submit" class="btn text-light w-100 mt-3" style="background-color: #ed3b27">Filter!</button>
                        </form>
                    </div>
                    {{-- RESTAURANT LIST --}}
                    <div class="col">
                        <div class="row m-0">

                            {{-- CARD --}}
                            <div class="col-4 mb-3" style="position: relative;">
                                {{-- RESTAURANT EVENT --}}
                                <div class="event_container w-100" style="position: absolute;top:30px;">
                                    <div class="event_label text-light w-25 px-2 rounded-end" style="background-color: #ed3b27;">Sale</div>
                                    <div class="event_label text-light w-50 px-2 rounded-end" style="background-color: #6C4AB6; ">Best Seller</div>
                                </div>
                                {{-- CARD CONTENT --}}
                                <div class="restaurant_card bg-light p-3" >
                                    <div class="image_container" style="height: 10rem">
                                        <img class="navigation" src="{{asset('images/customer/search/restaurant_1.jpg')}}" alt="" width="100%" height="100%">
                                    </div>

                                    {{-- RATING AND FAVORITE --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col p-0">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                        </div>
                                        <div class="col p-0 text-end">
                                            <img class="navigation" src="{{asset('images/customer/search/fav.png')}}" alt="" width="15%">
                                        </div>
                                    </div>
                                    {{-- RESTAURANT INFO --}}
                                    <div class="restaurant_info overflow-auto" style="height: 4rem">
                                        <p class="m-0 mt-2" style="font-family: helvetica_regular">Pavillion Restaurant</p>
                                        <p class="m-0" style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">Asian, Indonesian, Steak</p>
                                    </div>

                                    {{-- PRICE AND RESERVE BUTTON --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col p-0">
                                            <h3 style="font-family: helvetica_bold">$</h3>
                                        </div>
                                        <div class="col p-0 text-end">
                                            <div class="btn btn-warning text-light">Reserve</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD --}}
                            <div class="col-4 mb-3" style="position: relative;">
                                {{-- RESTAURANT EVENT --}}
                                <div class="event_container w-100" style="position: absolute;top:30px;">
                                    <div class="event_label text-light w-25 px-2 rounded-end" style="background-color: #ed3b27;">Sale</div>
                                    <div class="event_label text-light w-50 px-2 rounded-end d-none" style="background-color: #6C4AB6; ">Best Seller</div>
                                </div>
                                {{-- CARD CONTENT --}}
                                <div class="restaurant_card bg-light p-3" >
                                    <div class="image_container" style="height: 10rem">
                                        <img class="navigation" src="{{asset('images/customer/search/restaurant_2.jpg')}}" alt="" width="100%" height="100%">
                                    </div>

                                    {{-- RATING AND FAVORITE --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col p-0">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                        </div>
                                        <div class="col p-0 text-end">
                                            <img class="navigation" src="{{asset('images/customer/search/fav.png')}}" alt="" width="15%">
                                        </div>
                                    </div>

                                    <div class="restaurant_info overflow-auto" style="height: 4rem">
                                        <p class="m-0 mt-2" style="font-family: helvetica_regular">Imari Japanese Restaurant</p>
                                        <p class="m-0" style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">Asian, Japanese, Sushi</p>
                                        <p class="m-0 mt-2" style="font-family: helvetica_regular">Description</p>
                                        <p class="" style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere animi, quis molestias illum deserunt sit voluptate exercitationem cupiditate harum quod nisi sunt? Voluptatibus impedit veritatis amet recusandae illo, molestias dolorem?</p>
                                    </div>

                                    {{-- PRICE AND RESERVE BUTTON --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col p-0">
                                            <h3 style="font-family: helvetica_bold">$$</h3>
                                        </div>
                                        <div class="col p-0 text-end">
                                            <div class="btn btn-warning text-light">Reserve</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD --}}
                            <div class="col-4 mb-3" style="position: relative;">
                                {{-- RESTAURANT EVENT --}}
                                <div class="event_container w-100" style="position: absolute;top:30px;">
                                    <div class="event_label text-light w-25 px-2 rounded-end d-none" style="background-color: #ed3b27;">Sale</div>
                                    <div class="event_label text-light w-50 px-2 rounded-end" style="background-color: #6C4AB6; ">Best Seller</div>
                                </div>

                                {{-- CARD CONTENT --}}
                                <div class="restaurant_card bg-light p-3" >
                                    <div class="image_container" style="height: 10rem">
                                        <img class="navigation"src="{{asset('images/customer/search/restaurant_3.jpg')}}" alt="" width="100%" height="100%">
                                    </div>

                                    {{-- RATING AND FAVORITE --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col p-0">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                        </div>
                                        <div class="col p-0 text-end">
                                            <img class="navigation" src="{{asset('images/customer/search/fav_filled.png')}}" alt="" width="15%">
                                        </div>
                                    </div>
                                    {{-- RESTAURANT INFO --}}
                                    <div class="restaurant_info overflow-auto" style="height: 4rem">
                                        <p class="m-0 mt-2" style="font-family: helvetica_regular">Cloud 22 Rooftop Bar</p>
                                        <p class="m-0" style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">Bar, Pub, Winebar, Diner</p>
                                        <p class="m-0 mt-2" style="font-family: helvetica_regular">Description</p>
                                        <p class="" style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere animi, quis molestias illum deserunt sit voluptate exercitationem cupiditate harum quod nisi sunt? Voluptatibus impedit veritatis amet recusandae illo, molestias dolorem?</p>
                                    </div>

                                    {{-- PRICE AND RESERVE BUTTON --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col p-0">
                                            <h3 style="font-family: helvetica_bold">$$$</h3>
                                        </div>
                                        <div class="col p-0 text-end">
                                            <div class="btn btn-warning text-light">Reserve</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- CARD --}}
                            <div class="col-4 mb-3" style="position: relative;">
                                {{-- RESTAURANT EVENT --}}
                                <div class="event_container w-100" style="position: absolute;top:30px;">
                                    <div class="event_label text-light w-25 px-2 rounded-end" style="background-color: #ed3b27;">Sale</div>
                                    <div class="event_label text-light w-50 px-2 rounded-end" style="background-color: #6C4AB6; ">Best Seller</div>
                                </div>

                                {{-- CARD CONTENT --}}
                                <div class="restaurant_card bg-light p-3" >
                                    <div class="image_container" style="height: 10rem">
                                        <img class="navigation"src="{{asset('images/customer/search/restaurant_4.jpg')}}" alt="" width="100%" height="100%">
                                    </div>

                                    {{-- RATING AND FAVORITE --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col p-0">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                            <img src="{{asset('images/customer/search/star.png')}}" alt="" width="15%">
                                        </div>
                                        <div class="col p-0 text-end">
                                            <img class="navigation" src="{{asset('images/customer/search/fav_filled.png')}}" alt="" width="15%">
                                        </div>
                                    </div>
                                    {{-- RESTAURANT INFO --}}
                                    <div class="restaurant_info overflow-auto" style="height: 4rem">
                                        <p class="m-0 mt-2" style="font-family: helvetica_regular">Cloud 22 Rooftop Bar</p>
                                        <p class="m-0" style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">Bar, Pub, Winebar, Diner</p>
                                    </div>

                                    {{-- PRICE AND RESERVE BUTTON --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col p-0">
                                            <h3 style="font-family: helvetica_bold">$$$</h3>
                                        </div>
                                        <div class="col p-0 text-end">
                                            <div class="btn btn-warning text-light">Reserve</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <div class="about_us bg-dark text-light">
        <div class="container">
            <div class="copyright text-center">
                <p class="m-0 py-3" style="color: rgb(200, 200, 200);">
                    &copy; 2022. Institut Sains dan Teknologi Terpadu Surabaya
                </p>
            </div>
        </div>
    </div> --}}
@endsection

@section('js_script')

    <script>
        $(document).ready(function(){
            console.log('Welcome Customer!');

        });
    </script>
@endsection
