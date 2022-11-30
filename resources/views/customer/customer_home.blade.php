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
            font-weight: 600
        }
    </style>
@endsection

@section('dependencies')
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')
    <div class="container">

        {{-- NAVBAR --}}
        <ul class="nav py-3">
            <div class="row w-100">
                {{-- LOGO --}}
                <div class="col">
                    <h1 class="m-0" style="cursor: pointer;">
                        <span class="text-light bg-dark p-3">
                            ρσятαвℓє
                        </span>
                    </h1>
                </div>
                {{-- NAVIGATION --}}
                <div class="col d-flex justify-content-center align-items-center">
                    <li class="nav-item" style="border-bottom: 1px solid black">
                        <a class="nav-link text-dark navigation" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark navigation" href="#">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark navigation" href="#">Favorite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark navigation" href="#">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark navigation" href="#">Profile</a>
                    </li>
                </div>
                {{-- PROFILE --}}
                <div class="col d-flex justify-content-end align-items-center">
                    <div class="notification me-4" style="cursor: pointer">
                        <img class="navigation" src="{{asset("images/admin/notification.png")}}" alt="" width="30px">
                    </div>
                    <div class="profile">
                        <img src="{{asset("images/customer/pp.jpg")}}" alt="" width="45px" height="45px" style="border-radius: 50%">
                    </div>
                </div>
            </div>
        </ul>

        {{-- JUMBOTRON --}}
        <div class="jumbotron row m-0 w-100" style="height: 60vh;">
            <div class="col-6 d-flex justify-content-end align-items-center" >
                <div class="left_content">

                    {{-- BANNER TEXT --}}
                    <div class="banner_text">
                        <p class="text-end " style="font-size: 3.5em;font-family: helvetica_bold">A New Way</p>
                        <p class="text-end " style="font-size: 3.5em;font-family: helvetica_bold;margin-top:-20px;">To Order a Table</p>
                        <p class="text-end " style="font-family: helvetica_regular;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum dignissimos nobis ad sequi aliquid impedit iusto officia ea enim? Cum eius dolore labore tempore assumenda, quia quas cupiditate? Officia, voluptatum.</p>
                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex justify-content-end mt-4">
                        <div class="btn me-2" style="background-color: #ed3b27;color:white;">Explore Restaurant</div>
                        <div class="btn" style="border:1px solid #ed3b27; color: #ed3b27;">Favorite</div>
                    </div>


                </div>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <img src="{{asset('images/customer/banner1.png')}}" width="100%" alt="">
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
