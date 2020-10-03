<header>
    <div class="header-area ">
        <div class="header-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 ">
                        <div class="social_media_links">
                            {{ menu('social', 'partials.menu.social') }}
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li><a href="#"> <i class="fa fa-envelope"></i> {{setting('site.email')}}</a></li>
                                <li><a href="#"> <i class="fa fa-phone"></i> {{setting('site.telephone')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <h2 class="text-primary text-uppercase">{{ config('app.name', 'Oxygenta') }}</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="{{ URL::to('/') }}">home</a></li>
                                    <li><a href="{{ route('articles') }}">Articles</a></li>
                                    <li><a href="{{ route('doctors') }}">Doctors</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="d-none d-lg-block">
                                @guest
                                    <a class="btn btn-primary" href="{{ route('login') }}">Sign In</a>
                                    @if (Route::has('register'))
                                        <a class="btn btn-primary" href="{{ route('register') }}">Sign Up</a>
                                    @endif
                                @else
                                    <div class="dropdown">

                                        @php
                                            $count = DB::table('orders')
                                                    ->where('status', 1)
                                                    ->where('user_id', Auth::user()->id)
                                                    ->count();
                                        @endphp
                                        @if($count > 0)
                                            <span class="badge badge-danger mr-2">{{ $count }}</span>
                                        @endif

                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            {{ Auth::user()->first_name . " " .  Auth::user()->last_name }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('account') }}"> <i class="ti-user mr-2"></i> My Account</a>
                                            <a class="dropdown-item" href="{{ route('account.order') }}"> <i class="ti-calendar mr-2"></i> My Order History</a>
                                            <a class="dropdown-item @if($count > 0) bg-success text-white @endif" href="{{ route('account.approved') }}"> <i class="ti-check mr-2"></i> Approved Orders @if($count > 0) <span class="badge badge-danger ml-2">{{ $count }}</span>@endif</a>
                                            <a class="dropdown-item" href="{{ route('account.prescription') }}"> <i class="ti-clipboard mr-2"></i> My Prescriptions</a>
                                            <a class="dropdown-item" href="{{ route('orders') }}"> <i class="ti-upload mr-2"></i> Upload Prescriptions</a>
                                            <a class="dropdown-item" href="{{ route('cart') }}"> <i class="ti-shopping-cart mr-2"></i> Cart</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="ti-close mr-2"></i> {{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
