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
                    <li class="nav-item" style=" {{($currPage === 'home') ? 'border-bottom: 1px solid black' : ''}}">
                        <a class="nav-link text-dark navigation" href="{{route("customer_home")}}">Home</a>
                    </li>
                    <li class="nav-item" style=" {{($currPage === 'search') ? 'border-bottom: 1px solid black' : ''}}">
                        <a class="nav-link text-dark navigation" href="{{route("customer_search")}}">Search</a>
                    </li>
                    <li class="nav-item" style=" {{($currPage === 'favorite') ? 'border-bottom: 1px solid black' : ''}}">
                        <a class="nav-link text-dark navigation" href="{{route("customer_favorite")}}">Favorite</a>
                    </li>
                    <li class="nav-item" style=" {{($currPage === 'history') ? 'border-bottom: 1px solid black' : ''}}">
                        <a class="nav-link text-dark navigation" href="{{route("customer_history")}}">History</a>
                    </li>
                    <li class="nav-item" style=" {{($currPage === 'profile') ? 'border-bottom: 1px solid black' : ''}}">
                        <a class="nav-link text-dark navigation" href="{{route("customer_profile")}}">Profile</a>
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

    </div>
    <div class="about_us bg-dark text-light">
        <div class="container">
            <div class="copyright text-center">
                <p class="m-0 py-3" style="color: rgb(200, 200, 200);">
                    &copy; 2022. Institut Sains dan Teknologi Terpadu Surabaya
                </p>
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
