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

{{--
    MOHON DIBACA YA SOBAT - SOBAT !!!!
    user = Variabel buat ambil data user yang lagi log in
--}}

@extends('layouts.layout')

@section('pagename')
    Portable
@endsection
@php

@endphp
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('build/css/customer_home.css') }}">
    <style>
        .navigation:hover {
            transform: scale(1.2);
            font-weight: 600;
            cursor: pointer;
        }
    </style>
@endsection

@section('dependencies')
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
{{-- GET NUMBER VALUE --}}
@php
    $phone = '';
    $number = '1234567890';
    $arrNum = str_split($number);

    foreach (str_split($user['phone']) as $num) {
        if (Str::contains($num, $arrNum)) {
            // if(str_contains($num,$arrNum)){
            $phone .= $num;
            // dump(Str::contains($num, $arrNum));
        }
    }
    $arrName = explode(' ',$user['full_name']);
@endphp
@section('content')
    <div class="container">
        {{-- NAVBAR --}}
        @include('customer.partial.navbar')
        {{-- CONTENT --}}
        <div class="content py-4" style="height: calc(100vh - 80px)">
            <div class="row m-0">
                {{-- LEFT CONTENT --}}
                <div class="col-sm-12 col-md-6">

                    <form action="{{url('customer/editProfile')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <p class="m-0" style="font-size: 2.5em;font-weight: bold;">Profile</p>
                            <p class="m-0">Update your profile photo and personal details here</p>
                        </div>

                        {{-- IMAGE --}}
                        <div class="row mb-3">
                            <div class="col-4 d-flex align-items-center">
                                <p class="m-0 ">Profile Picture</p>
                            </div>
                            <div class="col d-flex align-items-center">
                                <img class="dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    src="{{ asset('images/customer/pp.jpg') }}" alt="" width="70px" height="70px"
                                    style="border-radius: 50%">
                            </div>
                        </div>
                        {{-- NAME --}}
                        <div class="row mb-3">
                            <div class="col-4 d-flex align-items-center">
                                <p class="m-0">Username</p>
                            </div>
                            <div class="col d-flex align-items-center">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $user['username'] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 d-flex align-items-center">
                                <p class="m-0">First Name</p>
                            </div>
                            <div class="col d-flex align-items-center">
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    value="{{ $arrName[0] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 d-flex align-items-center">
                                <p class="m-0">Last Name</p>
                            </div>
                            <div class="col d-flex align-items-center">
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    value="{{ $arrName[1] }}">
                            </div>
                        </div>
                        {{-- PHONE ADDRESS --}}
                        <div class="row mb-3">
                            <div class="col-4">
                                <p class="m-0">Phone Number</p>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="phone" name="phone"
                                    value="{{ intval($phone) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4 d-flex align-items-center">
                                <p class="m-0">Address</p>
                            </div>
                            <div class="col d-flex align-items-center">
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $user['address'] }}">
                            </div>
                        </div>
                        {{-- BIRTHDATE --}}
                        <div class="row mb-3">
                            <div class="col-4">
                                <p class="m-0">Date of Birth</p>
                            </div>
                            <div class="col">
                                <input type="date" class="form-control" id="date" name="birthdate"
                                    value="{{ $user['date_of_birth'] }}">
                            </div>
                        </div>
                        {{-- PASSWORD --}}
                        <div class="row mb-3">
                            <div class="col-4 d-flex align-items-center">
                                <p class="m-0">Password</p>
                            </div>
                            <div class="col d-flex align-items-center">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>

                        <button type="submit" class="submit btn p-2 text-light w-100" style="background-color: #ed3b27">
                            Update Profile
                        </button>
                    </form>

                </div>

                {{-- RIGHT CONTENT --}}
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <p class="m-0" style="font-size: 2.5em;font-weight: bold;">Active Transaction</p>
                        <p class="m-0">This is the transcipt/ ticket of your last table reservation</p>
                    </div>
                    <div class="ticket">
                        {{-- TEMPLATE CARD --}}
                        <div class="mb-3" style="position: relative;">
                            <a class="text-dark p-0" style="text-decoration: none;"
                                href="/customer/restaurant/{{ 'Pavillion Restaurant' }}">
                                {{-- RESTAURANT EVENT --}}
                                <div class="event_container w-100" style="position: absolute;top:30px;">
                                    <div class="event_label text-light w-25 px-2 rounded-end"
                                        style="background-color: #ed3b27;">Sale</div>
                                    <div class="event_label text-light w-50 px-2 rounded-end"
                                        style="background-color: #6C4AB6; ">Best Seller</div>
                                </div>
                                <div class="number_container" style="position: absolute;top:30px;right:5%;">
                                    <div class="event_label text-light p-3 rounded-3" style="background-color: #FEB139; ">
                                        35</div>
                                </div>
                                {{-- CARD CONTENT --}}
                                <div class="restaurant_card bg-light p-3">
                                    <div class="image_container" style="height: 18rem">
                                        <img class="navigation"
                                            src="{{ asset('storage/images/restaurant/Tina Feeney/restaurant_1.jpg') }}"
                                            alt="" width="100%" height="100%">
                                    </div>

                                    {{-- RESTAURANT INFO --}}
                                    <div class="row m-0 mt-2">
                                        <div class="col-6">
                                            <div class="restaurant_info">
                                                <p class="m-0" style="font-family: helvetica_regular;font-size: 1.5em">
                                                    Pavillion Restaurant</p>
                                                <p class="m-0"
                                                    style="font-family: helvetica_regular;font-size: 0.8em;color: rgb(111, 111, 111);">
                                                    Asian, Indonesian, Steak</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end align-items-center">
                                            <p class="m-0">3</p>
                                            <img src="{{ asset('storage/images/customer/person.png') }}" alt=""
                                                width="30px" height="30px">
                                        </div>
                                    </div>

                                    <hr>
                                    {{-- TRANSACTION DETAIL --}}
                                    <div class="code d-flex justify-content-end">
                                        <div class="text-end">
                                            <p class="m-0" style="font-family: helvetica_bold;font-size: 1.1em;">
                                                Transaction code : 1PKhfWqLiADhSb7</p>
                                            <p class="m-0" style="font-family: helvetica_regular;">Order Price : Rp
                                                15.000,00</p>
                                            <p class="m-0" style="font-family: helvetica_regular;">Saturday, 11/10/2022
                                                13.00 PM</p>
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
        $(document).ready(function() {
            console.log('Welcome Customer!');

        });
    </script>
@endsection
