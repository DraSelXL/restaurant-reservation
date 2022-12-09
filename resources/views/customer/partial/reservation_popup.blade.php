{{--
    RESERVATION POPUP :
    view ini akan muncul apabila salah satu dari tombol reserve pada card dalam catalog ditekan
    reservation popup berisi peta yang sudah, belum terisi dan juga form detail pemesanan

    FLow :
    customer dapat memilih meja yang akan direservasi dengan cara menekan meja yang available
    data dari meja tersebut kemudian akan masuk kedalam form
    ketika form disubmit maka transaksi baru akan terbuat
--}}
<div class=" popup_container position-fixed w-100 d-flex align-items-end flex-column d-none" style="background-color: rgb(0, 0, 0, 0.4);z-index: 100;">
    {{-- CLOSE BUTTON --}}
    <div class="close d-flex justify-content-end align-items-center w-100 px-5" style="height: 10vh;">
        <div class="btn btn-outline-light" onclick="close_popup()">X</div>
    </div>
    {{-- BLANK SPACE FOR ANIMATION --}}
    <div class="blank w-100" style="height: 90vh" >

    </div>
    <div class="popup bg-light w-100 p-5 overflow-auto" style="border-top-left-radius: 20px;border-top-right-radius: 20px;">

        <div class="row m-0 h-100">
            {{-- AVAILABLE TABLE --}}
            <div class="col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-center h-100">
                <div class="table_container">
                    {{-- SELECT TABLE --}}
                    <div class="w-100 mb-3">
                        <p class="m-0" style="font-family: helvetica_bold;font-size: 2em">Select Table</p>
                    </div>
                    {{-- RESTAURANT MAP --}}
                    @php
                        $row_lenght = 5;
                        $col_length = 7;
                    @endphp
                    @for ($i = 0; $i<$row_lenght;$i++)
                        <div class="d-flex">
                            @for ($j = 0; $j<$col_length;$j++)
                                <div class="p-1" style="width: 70px;">
                                    @if ($j==$i)
                                        <div class="btn w-100 d-flex justify-content-center align-items-center" style="height: 60px;background-color: #ed3b27;color:white;">
                                            {{($i*$col_length)+($j+1)}}
                                        </div>
                                    @else
                                        <div class="btn w-100 d-flex justify-content-center align-items-center" style="height: 60px;background-color: #6C4AB6;color:white;">
                                            {{($i*$col_length)+($j+1)}}
                                        </div>
                                    @endif
                                </div>
                            @endfor
                        </div>
                    @endfor
                    {{-- DESCRIPTION --}}
                    <div class="w-100 mt-3">
                        <p class="m-0" style="font-family: helvetica_bold;font-size: 1.5em">Description</p>
                        <div class="available">
                            <div class="btn" style="background-color: #6C4AB6;color:white;">Available</div>
                            <div class="btn" style="background-color: #FEB139;">Selected</div>
                            <div class="btn" style="background-color: #ed3b27;color:white;">Reserved</div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- FORM DETAIL --}}
            <div class="col-sm-12 col-md-6 p-3 d-flex justify-content-center align-items-center">
                <div class="detail_container">
                    <p class="m-0" style="font-family: helvetica_bold;font-size: 2em">Imari Japanese Restaurant</p>
                    <div class="time_available mt-3">
                        @php
                            $total_shift = 8;
                            $start_hour = 11;
                            $start_minute = 30;
                        @endphp
                        @for ($i = 0; $i<$total_shift;$i++)
                            <div class="btn btn-outline-dark">
                                {{$start_hour+$i.":".$start_minute}}
                            </div>
                        @endfor
                    </div>
                    {{-- RESTAURANT INFO --}}
                    <div class="restaurant_info">
                        <p class="m-0 mt-3" style="font-family: helvetica_bold;font-size: 1.5em">Description</p>
                        <p style="color: rgb(110, 110, 110)">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe omnis dolor numquam, voluptatibus, quis unde nisi est placeat consequatur fugit ab ex molestias nesciunt, sint natus vero sequi laboriosam soluta!</p>
                    </div>
                    {{-- RESERVATION DETAIL --}}
                    <div class="reservation_detail">
                        <p class="m-0 mt-3" style="font-family: helvetica_bold;font-size: 1.5em">Reservation Detail</p>
                        <form action="" method="POST">
                            <input type="text" class="form-control mt-3 p-3" placeholder="Selected Table...">
                            <input type="date" class="form-control mt-3 p-3">
                            <div class="btn w-100 mt-3 p-3" style="background-color: #ed3b27;color:white;">Book Table!</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

