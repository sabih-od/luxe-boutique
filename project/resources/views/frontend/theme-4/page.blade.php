@extends('layouts.theme-4.app')
@section('content')
    <section class="shopInner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blgCont">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="javascript:;">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-md-12 p-0">
                    <h1 class="banHeading">About Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="aboutSec">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5">
                    <div class="abCont">
                        <img src="{{asset('assets/theme-4/images/abImg.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="abCont">
                        <h3>About Us</h3>
                        <p>Established in 2021, Haboob Enterprises LLC is an Amazon Online Arbitrage Reseller with a
                            desire to supply/provide links to/drop ship industry-relevant items to respective careers
                            and leisure activities.</p>
                        <p>
                            We deal in Safety gear, Work tools, Apparel, recreational items, personal care products, and
                            more at pocket-friendly prices.
                        </p>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="abCont">
                        <p>Haboob Enterprises LLC is a destination where like-minded individuals can seek out items for
                            everyday life and also share items and ideas for inclusion, where customer input is sought
                            out and acted upon, and the items provided fulfilling those needs and suggestions either by
                            a supplier, affiliate links or with direct links to products on Amazon.
                        </p>
                        <p>At Haboob Enterprises LLC, we strive to create a marketplace for people to share what
                            interests them with the ability to then build on those suggestions.</p>
                        <a href="about-us.php" class="themeBtn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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


    <section class="countSec">
        <div class="container">
            <div class="row wow fadeInDown justify-content-center">
                <div class="col-md-2">
                    <div class="csContent text-center">
                        <i class="far fa-box"></i>
                        <h2 class="count"><span class="counter">4.5</span> <span>M+</span>
                        </h2>
                        <p>Products</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="csContent text-center">
                        <i class="far fa-home-lg-alt"></i>
                        <h2 class="count"><span class="counter">43</span><span>+</span></h2>
                        <p>Categories</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="csContent text-center">
                        <i class="far fa-shopping-basket"></i>
                        <h2 class="count"><span>$</span><span class="counter">2.4</span><span>M+</span></h2>
                        <p>Projects Done</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="csContent text-center">
                        <i class="far fa-money-bill-wave-alt"></i>
                        <h2 class="count"><span class="counter">105</span></h2>
                        <p>Projects Done</p>
                    </div>
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
                                <img src="{{asset('assets/theme-4/images/mob.png')}}" class="img-fluid w-100" alt="">
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
                                        <a href="javascript:;"><img src="{{asset('assets/theme-4/images/play.png')}}" class="img-fluid"
                                                                    alt=""></a>
                                        <a href="javascript:;"><img src="{{asset('assets/theme-4/images/app.png')}}" class="img-fluid"
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

    <section class="shopSec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="shCard whCard">
                        <figure>
                            <img src="{{asset('assets/theme-4/images/wh-1.png')}}" class="img-fluid" alt="">
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
                            <img src="{{asset('assets/theme-4/images/wh-2.png')}}" class="img-fluid" alt="">
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
@endsection
