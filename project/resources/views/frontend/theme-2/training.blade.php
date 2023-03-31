@extends('layouts.theme-2.app')
@section('content')
    <!-- Begin: Main Slider -->
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/inrbnr1.png') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">Training Program</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="aboutSec trainingPage">
        <div class="container">
            <h2 class="secHeading wow fadeInUp" data-wow-delay="0.3s">Training Program</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <figure class="wow fadeInLeft" data-wow-delay="0.5s">
                        <img src="{{ asset('assets/theme-2/images/training1.jpg') }}" class="img-fluid" alt="img">
                    </figure>
                </div>
                <div class="col-md-6">
                    <div class="slipTrang wow fadeInRight" data-wow-delay="0.5s">
                        <h2 class="secHeading">SLP and SLP Graduate Student Mentorship Program</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="{{ route('front.slpMentors')}}" class="themeBtn wow fadeInUp" data-wow-delay="0.5s">Submit A Request</a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-6">
                    <figure class="wow fadeInLeft" data-wow-delay="0.5s">
                        <img src="{{ asset('assets/theme-2/images/training1.jpg') }}" class="img-fluid" alt="img">
                    </figure>
                </div>
                <div class="col-md-6">
                    <div class="slipTrang wow fadeInRight" data-wow-delay="0.5s">
                        <h2 class="secHeading">Live Trainings</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        @if (Auth::check())
                            <a href="{{ url('user/dashboard') }}" class="themeBtn wow fadeInUp" data-wow-delay="0.5s">View Profile</a>
                        @else
                            <a href="#" class="themeBtn wow fadeInUp" data-wow-delay="0.5s" data-toggle="modal" data-target="#signIn">Sign In</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
