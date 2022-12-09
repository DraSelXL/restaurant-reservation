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
        .info{
            background-image: linear-gradient( rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2));
            position: absolute;
            z-index:2;
            width: 100%;
            height: 100%;
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

        {{-- CAROUSEL --}}
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" style="height: 70vh;">
            <div class="info text-light">
                <h1 style="font-family: helvetica_bold; position: absolute;top: 5%;left: 5%;z-index:3;">
                    <a href="/customer/explore" style="text-decoration: none;">
                        <span class="btn btn-outline-light p-0">
                            <img src="{{asset("images/customer/back.png")}}" width="30px" height="30px">
                        </span>
                    </a>
                    {{$restaurant->full_name}}
                </h1>

                {{-- NEXT PREV BUTTON --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            {{-- IMAGE --}}
            <div class="carousel-inner h-100">
              <div class="carousel-item active">
                <img src="{{asset("images/customer/search/$restaurant->full_name/restaurant_1.jpg")}}" class="d-block w-100" alt="...">
              </div>

              <div class="carousel-item">
                <img src="{{asset("images/customer/search/$restaurant->full_name/restaurant_2.jpg")}}" class="d-block w-100" alt="...">
              </div>

              <div class="carousel-item">
                <img src="{{asset("images/customer/search/$restaurant->full_name/restaurant_3.jpg")}}" class="d-block w-100" alt="...">
              </div>
            </div>

        </div>
        {{-- TIME --}}
        <div class="easy_access bg-dark text-light px-5 d-flex align-items-center" style="height: calc(30vh - 80px)">
            <div class="row m-0 w-100">
                <div class="col-sm-12 col-lg-6">
                    <h3 class="text-light">Available time</h3>
                    <div class="time_available mt-3">
                        @php
                            $total_shift = 8;
                            $start_hour = 11;
                            $start_minute = 30;
                        @endphp
                        @for ($i = 0; $i<$total_shift;$i++)
                            <div class="btn btn-outline-light">
                                {{$start_hour+$i.":".$start_minute}}
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <h3 class="text-light">Description</h3>
                    <p class="m-0" style="font-family: helvetica_regular;color: rgb(111, 111, 111);">{{$restaurant->address}}</p>
                    <p class="m-0" style="font-family: helvetica_regular;color: rgb(111, 111, 111);">{{$restaurant->phone}}</p>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <button class="btn btn-light h-100 w-100" onclick="open_popup()">Book table!</button>
                </div>
            </div>
        </div>
    </div>

    {{-- FOOTER --}}
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
