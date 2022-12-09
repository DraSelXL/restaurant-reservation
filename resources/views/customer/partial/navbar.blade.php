
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
                <div class="col d-none d-lg-flex justify-content-center align-items-center">
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
                        <a href="{{route("customer_notification")}}">
                            <img class="navigation" src="{{asset("images/admin/notification.png")}}" alt="" width="30px">
                        </a>
                    </div>
                    <div class="profile">
                        <li class="dropdown-center">
                            <img class="dropdown-toggle" role="button" data-bs-toggle="dropdown" src="{{asset("images/customer/pp.jpg")}}" alt="" width="45px" height="45px" style="border-radius: 50%">
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Balance : Rp 73.500</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="#">Top up Balance</a></li>
                                <li><a class="dropdown-item" href="#">Restaurant Account</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </ul>
