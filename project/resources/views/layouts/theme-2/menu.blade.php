
<!-- Begin: Header -->
<header class="wow fadeInDown" data-wow-delay="0.5s">
    <div class="topRow">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/'.$gs->logo) }}" alt="Logo">
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="topMenu">
                        <ul>
                            <li><a href="#"><i class="fal fa-link"></i> Member Portal</a></li>
                            <li><a href="{{ url('forums') }}">SLP Helpline</a></li>
                        </ul>
                        <ul class="list-unstyled socialIo">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                        <ul>
                            <li><a href="openSearch"><i class="fas fa-search"></i></a></li>
                            <li><a href="{{ route('front.cart') }}" class="cartBtn"><i class="fas fa-shopping-cart"></i></a></li>
                            @if (Auth::check())
                                {{--                                <img class="img-fluid user lazy"--}}
                                {{--                                     data-src="{{ asset('assets/images/users/'.Auth::user()->photo) }}" alt="">--}}
                                <li><a href="{{ url('user/dashboard') }}" class="themeBtn">View Profile</a></li>
                            @else
                                <li><a href="#" class="themeBtn" data-toggle="modal" data-target="#signIn">Sign Up</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg p-0">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('about') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ request()->is('training') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.training') }}">Training </a>
                    </li>
                    <li class="nav-item {{ request()->is('category/real-items') ? 'active' : '' }}">
{{--                        <a class="nav-link" href="{{ route('front.real-item-marketplace') }}">Marketplace</a>--}}
                        <a class="nav-link" href="{{ url('category/real-items') }}">Marketplace</a>
                    </li>
                    <li class="nav-item {{ request()->is('membership') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.membership') }}">Membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.merchandise') }}">Shop </a>
                    </li>
                    <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.blog') }}">Blog</a>
                    </li>
                    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('front.contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Search Box Start -->
    <div class="searchBox">
        <span class="searchClose"><i class="far fa-times-circle"></i></span>
        <form class="form-group">
            <input type="search" placeholder="search here" name="search">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <!-- Search Box End -->
</header>
<!-- END: Header -->
