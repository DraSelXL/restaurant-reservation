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
        @include("customer.partial.navbar")
        {{-- CONTENT --}}
        <div class="content py-3 overflow-auto" style="height: calc(100vh - 136px);">
            <h3 class="m-0" style="font-family: helvetica_bold">Notification</h3>

            {{-- NOTIFICATION --}}
            @for ($i=0;$i<5;$i++)
                <div class="bg-light rounded-4 p-4 my-4">
                    <div class="row h-100">
                        <div class="col-2 d-none d-lg-flex justify-content-center align-items-center">
                            <img class="" src="{{asset('storage/images/admin/notification.png')}}" alt="" width="100px" height="100px">
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <div class="row m-0">
                                <div class="col p-0">
                                    <h4>Notification Title</h4>
                                </div>
                                <div class="col p-0 text-end">
                                    <p class="m-0">Saturday, 12/11/2022 12:40 AM</p>
                                </div>
                            </div>
                            <p class="m-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque ipsam cumque consequatur incidunt quasi suscipit quis maxime quibusdam. Nemo incidunt alias illum expedita enim placeat labore exercitationem autem officia perspiciatis?</p>
                        </div>
                    </div>
                </div>
            @endfor

        </div>
    </div>
@endsection

@section("footer")
    {{-- FOOTER --}}
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
