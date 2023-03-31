@extends('layouts.theme-4.app')
@section('content')
    <secttion class="mainbanner">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-md-12 p-0">
                    <div class="banCont">
                        <video autoplay="true" loop="loop" muted="muted" volume="0">
                            <source src="{{ asset('assets/theme-4/images/banVideo.mp4') }}" type="video/mp4">
                            <source src="{{ asset('assets/theme-4/images/banVideo.ogg') }}" type="video/ogg">
                        </video>
                        <div class="overlay">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="banText">
                                        <h1>Welcome to Haboob Enterprises LLC!</h1>
                                        <p>Your one-stop destination for everyday quality products! At Haboob
                                            Enterprises LLC, we have got something for everyone by searching and
                                            purchasing products related to your occupation and interests.</p>
                                        <a href="javascript:;">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </secttion>

    <section class="repSec">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div class="banRep">
                        <div>
                            <i class="fal fa-rocket"></i>
                        </div>
                        <div class="brText">
                            <h3>Free Delivery</h3>
                            <p>On all the orders above $99</p>
                        </div>

                    </div>
                </div>
                <div class="col-md">
                    <div class="banRep">
                        <div>
                            <i class="fal fa-sync"></i>
                        </div>
                        <div class="brText">
                            <h3>14 Days Return Policy</h3>
                            <p>In case of damage or defect</p>
                        </div>

                    </div>
                </div>
                <div class="col-md">
                    <div class="banRep">
                        <div>
                            <i class="fal fa-credit-card"></i>
                        </div>
                        <div class="brText">
                            <h3>Secure Payment Method</h3>
                            <p>100% secure payment options</p>
                        </div>

                    </div>
                </div>
                <div class="col-md">
                    <div class="banRep">
                        <div>
                            <i class="fal fa-comments"></i>
                        </div>
                        <div class="brText">
                            <h3>24/7 Customer Support</h3>
                            <p>For clients' support and assistance</p>
                        </div>

                    </div>
                </div>
                <div class="col-md">
                    <div class="banRep">
                        <div>
                            <i class="fal fa-gift"></i>
                        </div>
                        <div class="brText">
                            <h3>Vouchers and Discounts</h3>
                            <p>Every week bundle offers and sales</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="categSec">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="catCard">
                        <div class="catCont">
                            <div class="figure">
                                <img src="{{ asset('assets/theme-4/images/ct-1.png') }}" class="img-fluid w-100" alt="">
                                <div class="overlay">
                                    <h2>Outdoors</h2>
                                    <a href="javascript:;">Click Here</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="catCard">
                        <div class="catCont">
                            <div class="figure">
                                <img src="{{ asset('assets/theme-4/images/ct-2.png') }}" class="img-fluid w-100" alt="">
                                <div class="overlay">
                                    <h2>Sports</h2>
                                    <a href="javascript:;">Click Here</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="catCard">
                        <div class="catCont">
                            <div class="figure">
                                <img src="{{ asset('assets/theme-4/images/ct-3.png') }}" class="img-fluid w-100" alt="">
                                <div class="overlay">
                                    <h2>Toys & Games</h2>
                                    <a href="javascript:;">Click Here</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="catCard">
                        <div class="catCont">
                            <div class="figure">
                                <img src="{{ asset('assets/theme-4/images/ct-4.png') }}" class="img-fluid w-100" alt="">
                                <div class="overlay">
                                    <h2>Health & Personal Care</h2>
                                    <a href="javascript:;">Click Here</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="catCard">
                        <div class="catCont">
                            <div class="figure">
                                <img src="{{ asset('assets/theme-4/images/ct-5.png') }}" class="img-fluid w-100" alt="">
                                <div class="overlay">
                                    <h2>Grocery & Gourmet Foods</h2>
                                    <a href="javascript:;">Click Here</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="catCard">
                        <div class="catCont">
                            <div class="figure">
                                <img src="{{ asset('assets/theme-4/images/ct-6.png') }}" class="img-fluid w-100" alt="">
                                <div class="overlay">
                                    <h2>Beauty</h2>
                                    <a href="javascript:;">Click Here</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="catCard">
                        <div class="catCont">
                            <div class="figure">
                                <img src="{{ asset('assets/theme-4/images/ct-7.png') }}" class="img-fluid w-100" alt="">
                                <div class="overlay">
                                    <h2>Clothing Shoes Jewelry</h2>
                                    <a href="javascript:;">Click Here</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="catCard">
                        <div class="catCont">
                            <div class="figure">
                                <img src="{{ asset('assets/theme-4/images/ct-8.png') }}" class="img-fluid w-100" alt="">
                                <div class="overlay">
                                    <h2>Baby Products</h2>
                                    <a href="javascript:;">Click Here</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="aboutSec">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5">
                    <div class="abCont">
                        <img src="{{ asset('assets/theme-4/images/abImg.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="abCont">
                        <h3>About Us</h3>
                        <p>Established in 2021, Haboob Enterprises LLC is an Amazon Online Arbitrage Reseller with a
                            desire to supply/provide links to/drop ship industry-relevant items to respective careers
                            and leisure activities. We deal in Safety gear, Work tools, Apparel, recreational items,
                            personal care products, and more at pocket-friendly prices.</p>
                        <p>
                            Haboob Enterprises LLC is a destination where like-minded individuals can seek out items for
                            everyday life and also share items and ideas for inclusion, where customer input is sought
                            out and acted upon
                        </p>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="abCont">
                        <p>
                            and the items provided fulfilling those needs and suggestions either by a supplier,
                            affiliate links or with direct links to products on Amazon. At Haboob Enterprises LLC, we
                            strive to create a marketplace for people to share what interests them with the ability to
                            then build on those suggestions.
                        </p>
                        <a href="#" class="themeBtn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shopSec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="shCard">
                        <figure>
                            <img src="{{ asset('assets/theme-4/images/sh-1.png') }}" class="img-fluid" alt="">
                            <div class="overlay">
                                <h2>Personal <br><span>Care</span></h2>
                                <p>Discounted price starting just<br><span>from $45</span></p>
                                <a href="javascript:;" class="themeBtn">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="shCard">
                        <figure>
                            <img src="{{ asset('assets/theme-4/images/sh-2.png') }}" class="img-fluid" alt="">
                            <div class="overlay">
                                <h2>Safety <br><span>Gears</span></h2>
                                <p>Price starting from<br><span>just $105.50</span></p>
                                <a href="javascript:;" class="themeBtn">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="shCard">
                        <figure>
                            <img src="{{ asset('assets/theme-4/images/sh-3.png') }}" class="img-fluid" alt="">
                            <div class="overlay">
                                <h2>Work <br><span>Tools</span></h2>
                                <p>Price<br><span>just $45</span></p>
                                <a href="javascript:;" class="themeBtn">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wkToolSec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="wkCard">
                        <figure>
                            <img src="{{ asset('assets/theme-4/images/wt-1.png') }}" class="img-fluid w-100" alt="">
                            <div class="overlay">
                                <h2>SAFETY GEAR, WORK TOOLS, AND MORE!</h2>
                                <p>Get your hands on a wide range of equipment, professional tools, and everything used
                                    in an everyday workplace environment at unbeatable prices!</p>
                                <div class="wtBtn">
                                    <a href="javascript:;" class="themeBtn">Shop Now</a>
                                    <a href="javascript:;" class="themeBtn">Read More</a>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="wkCard">
                        <figure>
                            <img src="{{ asset('assets/theme-4/images/wt-2.png') }}" class="img-fluid w-100" alt="">
                            <div class="overlay">
                                <h2>PERSONAL CARE, APPARELS, AND RECREATIONAL ITEMS</h2>
                                <p>We can get you everyday essentials at prices like never before! From personal hair
                                    and care products to numerous recreational items, Haboob Enterprises have everything
                                    you’re looking for.</p>
                                <div class="wtBtn">
                                    <a href="javascript:;" class="themeBtn">Shop Now</a>
                                    <a href="javascript:;" class="themeBtn">Read More</a>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="treSec">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="tredNavs">
                        <h2 class="tabHeading">Sports & Outdoor Activities</h2>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab"
                                    aria-controls="arrival" aria-selected="true">New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="seller-tab" data-toggle="tab" href="#seller" role="tab"
                                    aria-controls="seller" aria-selected="false">Best Seller</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="popular-tab" data-toggle="tab" href="#popular" role="tab"
                                    aria-controls="popular" aria-selected="false">Most Popular</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="viewAll-tab" data-toggle="tab" href="#viewAll" role="tab"
                                    aria-controls="viewAll" aria-selected="false">View All</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="arrival" role="tabpanel"
                            aria-labelledby="arival-tab">
                            <div class="row">
                                @foreach($latest_products as $prod)
                                    <div class="col-md-3">
                                        <div class="enSCard">
                                            <div class="encHead">
                                                <a href="{{ route('front.product', $prod->slug) }}">
                                                    <img src="{{ $prod->thumbnail ? asset('assets/images/thumbnails/'.$prod->thumbnail):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                            <div class="adminDiv">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:;" data-href="{{ route('product.cart.add',$prod->id) }}"  class="add-cart">
                                                            <i class="fal fa-shopping-bag"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="javascript:;"><i class="fal fa-eye"></i></a></li>
                                                    @if(Auth::check())
                                                        <li>
                                                            <a href="javascript:;" data-href="{{ route('user-wishlist-add',$prod->id) }}" class="add_to_wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('user.login') }}" class="add_to_wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                                                </ul>
                                                <a href="javascript:;">Admin</a>
                                            </div>
                                            <div class="encBody">
                                                <a href="{{ route('front.product', $prod->slug) }}">
                                                    <h4>{{ $prod->showName() }}</h4>
                                                </a>
                                                <div class="encbInner">
                                                    <h5>{{ $prod->showPrice() }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seller" role="tabpanel" aria-labelledby="seller-tab">
                            <div class="row">
                            @foreach($best_products as $prod)
                                    <div class="col-md-3">
                                        <div class="enSCard">
                                            <div class="encHead">
                                                <a href="{{ route('front.product', $prod->slug) }}">
                                                    <img src="{{ $prod->thumbnail ? asset('assets/images/thumbnails/'.$prod->thumbnail):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                            <div class="adminDiv">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:;" data-href="{{ route('product.cart.add',$prod->id) }}"  class="add-cart">
                                                            <i class="fal fa-shopping-bag"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="javascript:;"><i class="fal fa-eye"></i></a></li>
                                                    @if(Auth::check())
                                                        <li>
                                                            <a href="javascript:;" data-href="{{ route('user-wishlist-add',$prod->id) }}" class="add_to_wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('user.login') }}" class="add_to_wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                                                </ul>
                                                <a href="javascript:;">Admin</a>
                                            </div>
                                            <div class="encBody">
                                                <a href="{{ route('front.product', $prod->slug) }}">
                                                    <h4>{{ $prod->showName() }}</h4>
                                                </a>
                                                <div class="encbInner">
                                                    <h5>{{ $prod->showPrice() }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                            <div class="row">
                                @foreach($popular_products as $prod)
                                    <div class="col-md-3">
                                        <div class="enSCard">
                                            <div class="encHead">
                                                <a href="{{ route('front.product', $prod->slug) }}">
                                                    <img src="{{ $prod->thumbnail ? asset('assets/images/thumbnails/'.$prod->thumbnail):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                            <div class="adminDiv">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:;" data-href="{{ route('product.cart.add',$prod->id) }}"  class="add-cart">
                                                            <i class="fal fa-shopping-bag"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="javascript:;"><i class="fal fa-eye"></i></a></li>
                                                    @if(Auth::check())
                                                        <li>
                                                            <a href="javascript:;" data-href="{{ route('user-wishlist-add',$prod->id) }}" class="add_to_wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('user.login') }}" class="add_to_wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                                                </ul>
                                                <a href="javascript:;">Admin</a>
                                            </div>
                                            <div class="encBody">
                                                <a href="{{ route('front.product', $prod->slug) }}">
                                                    <h4>{{ $prod->showName() }}</h4>
                                                </a>
                                                <div class="encbInner">
                                                    <h5>{{ $prod->showPrice() }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="viewAll" role="tabpanel" aria-labelledby="viewAll-tab">
                            <div class="row">
                                @foreach($products as $prod)
                                    <div class="col-md-3">
                                        <div class="enSCard">
                                            <div class="encHead">
                                                <a href="{{ route('front.product', $prod->slug) }}">
                                                    <img src="{{ $prod->thumbnail ? asset('assets/images/thumbnails/'.$prod->thumbnail):asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                            <div class="adminDiv">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:;" data-href="{{ route('product.cart.add',$prod->id) }}"  class="add-cart">
                                                            <i class="fal fa-shopping-bag"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="javascript:;"><i class="fal fa-eye"></i></a></li>
                                                    @if(Auth::check())
                                                        <li>
                                                            <a href="javascript:;" data-href="{{ route('user-wishlist-add',$prod->id) }}" class="add_to_wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a href="{{ route('user.login') }}" class="add_to_wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                        </li>
                                                    @endif
                                                    <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                                                </ul>
                                                <a href="javascript:;">Admin</a>
                                            </div>
                                            <div class="encBody">
                                                <a href="{{ route('front.product', $prod->slug) }}">
                                                    <h4>{{ $prod->showName() }}</h4>
                                                </a>
                                                <div class="encbInner">
                                                    <h5>{{ $prod->showPrice() }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shopSec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="shCard whCard">
                        <figure>
                            <img src="{{ asset('assets/theme-4/images/wh-1.png') }}" class="img-fluid" alt="">
                            <div class="overlay">

                                <h2>Accessories Discounts<br>up to 25%</h2>
                                <p>From watches to jewelry and everything between, Haboob Enterprises LLC brings you
                                    thousands of luxury, recreational, and everyday products at the most reasonable
                                    prices</p>
                                <h3><span>$260.50</span><br>$219.05</h3>
                                <a href="javascript:;" class="themeBtn">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="shCard whCard">
                        <figure>
                            <img src="{{ asset('assets/theme-4/images/wh-2.png') }}" class="img-fluid" alt="">
                            <div class="overlay">
                                <h2>Camera &<br>Photo Books</h2>
                                <p>Discount <span>25%</span> Off</p>
                                <a href="javascript:;" class="themeBtn">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
    </section>

    <section class="downSec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="graBg">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5">
                                <img src="{{ asset('assets/theme-4/images/mob.png') }}" class="img-fluid w-100" alt="">
                            </div>
                            <div class="col-md-5">
                                <div class="downCont">
                                    <h2 class="tabHeading">Download Haboob-Enterprises App Now!</h2>
                                    <p>Now your favorite products are just one tap away. Enjoy a better experience and
                                        improved services by downloading our app now! Moreover, you can also subscribe
                                        to our newsletter to stay updated about our upcoming discounts and sales.</p>
                                    <form>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" placeholder="Email Address"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button">Button</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="storeBtn">
                                        <a href="javascript:;"><img src="{{ asset('assets/theme-4/images/play.png') }}" class="img-fluid"
                                                alt=""></a>
                                        <a href="javascript:;"><img src="{{ asset('assets/theme-4/images/app.png') }}" class="img-fluid"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
