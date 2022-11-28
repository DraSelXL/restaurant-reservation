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
    PorTable
@endsection

@section('custom_css')
    <link rel="stylesheet" href="{{asset('build/css/index.css')}}">
@endsection

@section('dependencies')
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;background: rgb(240, 240, 240);">
        <div class="row m-0 w-75">
            {{-- JUMBOTRON  --}}
            {{-- COLOR : 6C4AB6 8D72E1 8D9EFF B9E0FF 7743DB --}}
            <div class="col-6 border-leftside d-flex align-items-center" style="background-color: #7743DB;" id="left_form">
                <img class="" src="{{asset('images/login/banner1.png')}}" alt="" width="100%" id="jumbotron">
            </div>

            {{-- FORM --}}
            <div class="col-6 p-5 border-rightside d-flex align-items-center" style="background-color: white;" id="right_form">

                {{-- LOGIN FORM --}}
                <div id="login_form_holder" class="login_form_holder w-100">
                    <div class="title">PorTable</div>
                    <p style="font-size: 1.1em">Order Table & Enjoy With Friend and Family, because food tasted better when you eat with them</p>

                    <form action="/checkLogin" method="POST">
                        <div class="group">
                            <input class="w-100" type="text"><span class="highlight"></span><span class="bar"></span>
                            <label>Username</label>
                        </div>
                        <div class="group">
                            <input class="w-100" type="password"><span class="highlight"></span><span class="bar"></span>
                            <label>Password</label>
                        </div>
                        <input type="submit" class="submit btn p-2 text-light" value="Sign in" style="background-color: #6C4AB6" id="submit">
                    </form>

                    <p class="my-4" style="">By clicking the sign in button, you are agree to the Privacy and Policy, for more information you can read about our policy <a href="">here</a>.</p>

                    {{-- LOGIN REGISTER TOGGLER --}}
                    <div class="d-flex justify-content-end w-100">
                        <p class="m-0" id="indexToggleSubtitle">New member?</p> <span style="width: 10px"></span> <p class="indexToggle" style="cursor: pointer;color:#0d9efe;text-decoration: underline" id="indexToggle">Create account!</p>
                    </div>
                </div>

                {{-- REGISTER FORM --}}
                <div id="register_form_holder" class="register_form_holder w-100 d-none">
                    <div class="title">Welcome to Portable!</div>
                    <p class="mb-4" style="font-size: 1.1em">Join us now, feel the convenience of ordering table!</p>

                    <form action="/checkRegister" method="POST">
                        <div class="row">
                            <div class="col group">
                                <input class="w-100" type="text"><span class="highlight"></span><span class="bar"></span>
                                <label>First Name</label>
                            </div>

                            <div class="col group">
                                <input class="w-100" type="text"><span class="highlight"></span><span class="bar"></span>
                                <label>Username</label>
                            </div>
                            <div class="col-12 group">
                                <input class="w-100" type="text"><span class="highlight"></span><span class="bar"></span>
                                <label>Phone</label>
                            </div>

                            <div class="col group">
                                <input class="w-100" type="password"><span class="highlight"></span><span class="bar"></span>
                                <label>Password</label>
                            </div>
                            <div class="col group">
                                <input class="w-100" type="password"><span class="highlight"></span><span class="bar"></span>
                                <label>Confrim Password</label>
                            </div>
                        </div>
                        <p class="mb-4" style="">By clicking the register button, you are agree to the Privacy and Policy, for more information you can read about our policy <a href="">here</a>.</p>

                        <input type="submit" class="submit btn p-2 text-light" value="Register" style="background-color: #FEB139" id="submit">
                    </form>

                    {{-- LOGIN REGISTER TOGGLER --}}
                    <div class="d-flex justify-content-end w-100 mt-4">
                        <p class="m-0" id="indexToggleSubtitle">Already Have Account?</p> <span style="width: 10px"></span> <p class="indexToggle" style="cursor: pointer;color:#0d9efe;text-decoration: underline" id="indexToggle">Sign in!</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js_script')

    <script>
        $(document).ready(function(){
            console.log('Welcome to PorTable!');

            // PorTable Title
            $(".title").css("font-size", 0);
            $(".title").animate({fontSize : '2.7em'},"slow");

            // Jumbotron image
            $("#jumbotron").css("display","none");
            $("#jumbotron").fadeIn(800);

            // Submit Button
            $(".submit").css("width",0);
            $(".submit").animate({ width: '+=100%' },"slow");

            // Toggle Login <-> Register
            let page = "login";
            $(".indexToggle").on("click", function() {

                // Submit Button
                $(".submit").css("width",0);
                $(".submit").animate({ width: '+=100%' },"slow");

                let slide_direction;
                if(page == "login"){
                    slide_direction = "left";
                    $("#left_form").animate({backgroundColor : "#FEB139"});

                    $("#login_form_holder").addClass("d-none");
                    $("#register_form_holder").removeClass("d-none");

                    $("#register_form_holder").css("display","none");
                    $("#register_form_holder").fadeIn(800);
                }
                else{
                    slide_direction = "right";
                    $("#left_form").animate({backgroundColor : "#6C4AB6"});

                    $("#login_form_holder").removeClass("d-none");
                    $("#register_form_holder").addClass("d-none");

                    $("#login_form_holder").css("display","none");
                    $("#login_form_holder").fadeIn(800);
                }


                $('#jumbotron').toggle("slide",{direction:slide_direction},function(){
                    if(page == "login"){
                        page = "register";

                        $("#jumbotron").attr("src","/images/login/banner2.png");
                        $('#jumbotron').toggle("slide");

                    }else {
                        page = "login";

                        $("#jumbotron").attr("src","/images/login/banner1.png");
                        $('#jumbotron').toggle("slide",{direction:slide_direction});
                    }
                });
            });
        });
    </script>
@endsection
