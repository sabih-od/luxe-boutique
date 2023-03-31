@extends('layouts.theme-2.app')
@section('body-class', 'Cart')
@section('content')
    <!-- Begin: Main Slider -->
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{asset('assets/theme-2/images/inrbnr1.png')}}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">Thank You</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('assets/theme-2/images/bgshape.png')}}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="ThankyouSec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="thankyouContent">
                        <div class="waviy ">
                            <span>T</span>
                            <span>H</span>
                            <span>A</span>
                            <span>N</span>
                            <span>K</span>
                            <span>Y</span>
                            <span>O</span>
                            <span>U</span>
                        </div>
                        <!-- <h5>Thank you  <span>for contacting us..</span></h5> -->
                        <p data-aos="fade-up" data-aos-duration="2500" class="aos-init">
                            Thank you for placing the order. You’ll receive a confirmation email shortly.

                        </p>
                        <a href="{{ url('/') }}">Return to Homepage</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="imageThanks aos-init aos-animate" data-aos="fade-left" data-aos-duration="2500">
                        <img src="{{asset('assets/theme-2/images/thank.jpg')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
