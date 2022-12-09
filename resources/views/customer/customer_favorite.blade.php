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
    {{-- RESERVATION POP_UP --}}
    @include('customer.partial.reservation_popup')
    
    <div class="container" style="heigh: 100vh;">
        {{-- NAVBAR --}}
        @include('customer.partial.navbar')
        {{-- CONTENT --}}
        <div class="content pb-3" style="height: calc(100vh - 98px)">
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
                    @foreach ($restaurants as $restaurant)
                        {{-- TEMPLATE CARD --}}
                        <div class="col-sm-6 col-lg-3 mb-3" style="position: relative;">
                            <a class="text-dark p-0"  style="text-decoration: none;" href="/customer/restaurant/{{$restaurant->full_name}}">
                                {{-- RESTAURANT EVENT --}}
                                <div class="event_container w-100" style="position: absolute;top:30px;">
                                    <div class="event_label text-light w-25 px-2 rounded-end" style="background-color: #ed3b27;">Sale</div>
                                    <div class="event_label text-light w-50 px-2 rounded-end" style="background-color: #6C4AB6; ">Best Seller</div>
                                </div>
                                {{-- CARD CONTENT --}}
                                <div class="restaurant_card bg-light p-3" >
                                    <div class="image_container" style="height: 10rem">
                                        <img class="navigation" src="{{asset("images/restaurant/$restaurant->full_name/restaurant_1.jpg")}}" alt="" width="100%" height="100%">
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
                                        <p class="m-0 mt-2" style="font-family: helvetica_regular">{{$restaurant->full_name}}</p>
                                        <p class="m-0" style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">{{$restaurant->address}}</p>
                                    </div>
                                    {{-- PRICE AND RESERVE BUTTON --}}
                                    <div class="d-flex w-100">
                                        <h3 class="p-0" style="font-family: helvetica_bold">$$</h3>
                                        <a class="text-dark d-flex ms-auto" style="text-decoration: none">
                                            <button class="btn btn-warning text-light" onclick="open_popup()">Reserve</button>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
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

        function open_popup(){
            $(".popup_container").removeClass("d-none",function(){
                $(".popup").css("height","90vh");
                $(".blank").animate({height : '0vh'},"slow");
            });
        }
        function close_popup(){
            $(".popup_container").addClass("d-none");
            $(".blank").animate({height : '90vh'});
        }
    </script>
@endsection
