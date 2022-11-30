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
        {{-- EASY ACCESS --}}
        <div class="easy-access mt-3 px-5 py-4 rounded-3 bg-dark">
            <h3 class="text-light" style="font-family: helvetica_bold">Book a Table</h3>

            <form class="mt-3" method="POST" action="/customer/checkAvailability">
                <div class="row m-0">
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control p-3" id="restaurant_name" name="restaurant_name" placeholder="Restaurant Name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="date" class="form-control p-3" id="reservation_date" name="reservation_date">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input type="time" class="form-control p-3" id="reservation_date" name="reservation_date">
                        </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn text-light w-100 p-3" style="background-color: #ed3b27">Check Availability</button>
                    </div>
                </div>
            </form>
        </div>
        {{-- PARALAX --}}
        <div class="paralax my-5">
            <div class="row m-0">
                <div class="col mx-2 text-center rounded-4 p-4" >
                    <img src="{{asset('images/customer/home/order.png')}}" alt="">
                    <h3>Order</h3>
                    <p class="my-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis repellendus aspernatur voluptatem ex ea minima.</p>
                </div>
                <div class="col mx-2 text-center rounded-4 p-4">
                    <img src="{{asset('images/customer/home/ticket.png')}}" alt="">
                    <h3>Ticket</h3>
                    <p class="my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, cumque nesciunt dolorem hic fugit officiis.</p>
                </div>
                <div class="col mx-2 text-center rounded-4 p-4">
                    <img src="{{asset('images/customer/home/meet.png')}}" alt="">
                    <h3>Confirm</h3>
                    <p class="my-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis repellendus aspernatur voluptatem ex ea minima.</p>
                </div>
                <div class="col mx-2 text-center rounded-4 p-4">
                    <img src="{{asset('images/customer/home/dine.png')}}" alt="">
                    <h3>Dine</h3>
                    <p class="my-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis repellendus aspernatur voluptatem ex ea minima.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="about_us bg-dark text-light">
        <div class="container">
            <div class="py-5">
                <div class="row m-0">
                    <div class="col">
                        <p class="m-0" style="font-size: 1.5em;font-family: helvetica_regular;">Contacts</p>
                        <p class="mt-3" style="color: rgb(200, 200, 200);">
                            Address : <br>
                            Jl. Ngagel Jaya Tengah No.73-77, Baratajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60284
                            <br><br>
                            Phone : <br>
                            ISTTS - 082122907788 <br>
                            Ian William - 089674436016 <br>
                            Antonio Christopher - 085755115331 <br>

                        </p>
                    </div>
                    <div class="col">
                        <p class="m-0" style="font-size: 1.5em;font-family: helvetica_regular;">Menu</p>
                        <div class="mt-3">
                            <p><span class="navigation">Home</span> </p>
                            <p><span class="navigation">Search</span> </p>
                            <p><span class="navigation">Favorite</span> </p>
                            <p><span class="navigation">History</span> </p>
                            <p><span class="navigation">Profile</span> </p>

                        </div>
                    </div>
                    <div class="col-6">
                        <p class="m-0" style="font-size: 1.5em;font-family: helvetica_regular;">Reviews</p>
                        <form class="mt-3" action="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control p-3" placeholder="Please kindly review our service :)">
                                <button type="submit" class="btn text-light p-3" style="background-color: #ed3b27">Submit Review</button>
                            </div>
                        </form>

                        <p class="my-1" style="color: rgb(200, 200, 200);">
                            If you want to know more about our developer. <a href="">Click me!</a>
                        </p>
                    </div>
                </div>
            </div>
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
