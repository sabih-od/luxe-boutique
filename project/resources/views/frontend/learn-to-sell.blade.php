@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Learn to sell') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Learn to sell') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <section class="mainBanner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="banCont">
                        <h3>Sell</h3>
                        <h1>How to start selling
                            on <span>IMA</span> <span>USA Shop</span></h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy text
                            ever since the 1500s.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banCont">
                        <img src="{{asset('assets/images/ban-img.png')}}" class="img-fluid w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tab-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="workCont">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="#seo">Before You Start</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#logo">Adding Your Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#animation">Attracting Customers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#website">After Your First Sale</a>
                            </li>
                        </ul>


                        <div class="tab-bord" id="seo">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="tab-Cont">
                                        <img src="{{asset('assets/images/tb-1.png')}}" class="img-fluid w-100"
                                             alt="">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="tab-Cont">
                                        <h2>Choose A Selling Plan</h2>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever
                                            since the 1500s,</p>
                                        <p>
                                            when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. it has survived not only five centuries,
                                            but
                                            also the leap into electronic typesetting, remaining essentially
                                            unchanged. t was popularised in the 1960s with the release of
                                            Letraset
                                            sheets containing Lorem Ipsum passages, and more recently
                                            with desktop publishing software like Aldus PageMaker in-
                                            cluding versions of Lorem Ipsum.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="tab-bord" id="logo">
                            <div class="row align-items-center flex-row-reverse">
                                <div class="col-md-5">
                                    <div class="tab-Cont">
                                        <img src="{{asset('assets/images/tb-2.png')}}" class="img-fluid w-100"
                                             alt="">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="tab-Cont">
                                        <h2>Choose A Selling Plan</h2>
                                        <h3>Resellers</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy
                                            text
                                            ever
                                            since the 1500s,</p>
                                        <h3>Brand owners</h3>
                                        <p>
                                            when an unknown printer took a galley of type and scrambled it
                                            to
                                            make a type specimen book. it has survived not only five
                                            centuries,
                                            but
                                            also the leap into electronic typesetting, remaining essentially
                                            unchanged. t was popularised in the 1960s with the release of
                                            Letraset
                                            sheets containing Lorem Ipsum passages, and more recently
                                            with desktop publishing software like Aldus PageMaker in-
                                            cluding versions of Lorem Ipsum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-bord" id="animation">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="tab-Cont">
                                        <img src="{{asset('assets/images/tb-3.png')}}" class="img-fluid w-100"
                                             alt="">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="tab-Cont">
                                        <h2>Perfect Launch
                                            Five steps for your first
                                            90 days</h2>

                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s,
                                        </p>
                                        <p>
                                            when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-bord" id="website">
                            <div class="row align-items-center flex-row-reverse">
                                <div class="col-md-5">
                                    <div class="tab-Cont">
                                        <img src="{{asset('assets/images/tb-4.png')}}" class="img-fluid w-100"
                                             alt="">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="tab-Cont">
                                        <h2>Create A Seller Account</h2>

                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text
                                            ever since the 1500s,
                                        </p>
                                        <ul>
                                            <li><i class="fas fa-circle"></i>Lorem Ipsum is simply dummy text of
                                                the printing
                                            </li>
                                            <li><i class="fas fa-circle"></i>Lorem Ipsum is simply dummy text of
                                                the printing
                                            </li>
                                            <li><i class="fas fa-circle"></i>Lorem Ipsum is simply dummy text of
                                                the printing
                                            </li>
                                            <li><i class="fas fa-circle"></i>Lorem Ipsum is simply dummy text of
                                                the printing
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="tab-content" id="myTabContent">--}}
                        {{--                            <div class="tab-pane fade show active" id="seo" role="tabpanel" aria-labelledby="seo-tab">--}}

                        {{--                            </div>--}}
                        {{--                            <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">--}}
                        {{--                                <div class="row justify-content-center mt-5">--}}
                        {{--                                    <div class="col-md-8">--}}
                        {{--                                        <div class="tab-Cont text-center">--}}
                        {{--                                            <h2>Adding Your Products</h2>--}}
                        {{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                        {{--                                                industry.--}}
                        {{--                                                Lorem Ipsum has been the industry's standard dummy text ever since the--}}
                        {{--                                                1500s</p>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="row mt-5">--}}
                        {{--                                    <div class="col-md-12">--}}
                        {{--                                        <div class="tab-Cont">--}}
                        {{--                                            <img src="{{asset('assets/images/lap.png')}}" class="img-fluid w-100"--}}
                        {{--                                                 alt="">--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="tab-bord">--}}
                        {{--                                    <div class="row align-items-center flex-row-reverse">--}}
                        {{--                                        <div class="col-md-5">--}}
                        {{--                                            <div class="tab-Cont">--}}
                        {{--                                                <img src="{{asset('assets/images/tb-5.png')}}" class="img-fluid w-100"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="col-md-7">--}}
                        {{--                                            <div class="tab-Cont">--}}
                        {{--                                                <h2>Product Listing Details</h2>--}}
                        {{--                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                        {{--                                                    industry. Lorem Ipsum has been the industry's standard dummy text--}}
                        {{--                                                    ever since the 1500s,</p>--}}
                        {{--                                                <p>--}}
                        {{--                                                    when an unknown printer took a galley of type and scrambled it to--}}
                        {{--                                                    make a type specimen book. it has survived not only five centuries,--}}
                        {{--                                                    but also the leap into electronic typesetting, remaining essentially--}}
                        {{--                                                    unchanged.--}}
                        {{--                                                </p>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}

                        {{--                                </div>--}}

                        {{--                                <div class="row align-items-center">--}}
                        {{--                                    <div class="col-md-5">--}}
                        {{--                                        <div class="tab-Cont">--}}
                        {{--                                            <img src="{{asset('assets/images/tb-6.png')}}" class="img-fluid w-100"--}}
                        {{--                                                 alt="">--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-7">--}}
                        {{--                                        <div class="tab-Cont">--}}
                        {{--                                            <h2>The Product Detail Page</h2>--}}
                        {{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                        {{--                                                industry. Lorem Ipsum has been the industry's standard dummy text--}}
                        {{--                                                ever since the 1500s, </p>--}}
                        {{--                                            <p>--}}
                        {{--                                                When an unknown printer took a galley of type and scrambled it to--}}
                        {{--                                                make a type specimen book. it has survived not only five centuries,--}}
                        {{--                                                but also the leap into electronic typesetting, remaining essentially--}}
                        {{--                                                unchanged. t was popularised in the 1960s with the release of--}}
                        {{--                                                Letraset sheets containing Lorem Ipsum passages, and more recently--}}
                        {{--                                                with desktop publishing software like Aldus PageMaker in---}}
                        {{--                                                cluding versions of Lorem Ipsum.--}}
                        {{--                                            </p>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}

                        {{--                            </div>--}}
                        {{--                            <div class="tab-pane fade" id="animation" role="tabpanel" aria-labelledby="animation-tab">--}}
                        {{--                                <div class="tab-bord">--}}
                        {{--                                    <div class="row align-items-center flex-row-reverse">--}}
                        {{--                                        <div class="col-md-5">--}}
                        {{--                                            <div class="tab-Cont">--}}
                        {{--                                                <img src="{{asset('assets/images/tb-7.png')}}" class="img-fluid w-100"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="col-md-7">--}}
                        {{--                                            <div class="tab-Cont">--}}
                        {{--                                                <h2>Attracting Customers</h2>--}}
                        {{--                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                        {{--                                                    industry. Lorem Ipsum has been the industry's standard dummy text--}}
                        {{--                                                    ever since the 1500s,</p>--}}
                        {{--                                                <p>--}}
                        {{--                                                    when an unknown printer took a galley of type and scrambled it to--}}
                        {{--                                                    make a type specimen book. it has survived not only five centuries,--}}
                        {{--                                                    but also the leap into electronic typesetting, remaining essentially--}}
                        {{--                                                    unchanged.--}}
                        {{--                                                </p>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}

                        {{--                                </div>--}}

                        {{--                                <div class="row align-items-center">--}}
                        {{--                                    <div class="col-md-5">--}}
                        {{--                                        <div class="tab-Cont">--}}
                        {{--                                            <img src="{{asset('assets/images/tb-8.png')}}" class="img-fluid w-100"--}}
                        {{--                                                 alt="">--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-7">--}}
                        {{--                                        <div class="tab-Cont">--}}
                        {{--                                            <h2>Advertise Your Offers</h2>--}}
                        {{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                        {{--                                                industry. Lorem Ipsum has been the industry's standard dummy text--}}
                        {{--                                                ever since the 1500s, </p>--}}
                        {{--                                            <p>--}}
                        {{--                                                When an unknown printer took a galley of type and scrambled it to--}}
                        {{--                                                make a type specimen book. it has survived not only five centuries, but--}}
                        {{--                                                also the leap into electronic typesetting, remaining essentially--}}
                        {{--                                                unchanged.--}}
                        {{--                                            </p>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="tab-pane fade" id="website" role="tabpanel" aria-labelledby="website-tab">--}}
                        {{--                                <div class="row justify-content-center mt-5">--}}
                        {{--                                    <div class="col-md-8">--}}
                        {{--                                        <div class="tab-Cont text-center">--}}
                        {{--                                            <h2>After Your First Sale</h2>--}}
                        {{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                        {{--                                                industry.--}}
                        {{--                                                Lorem Ipsum has been the industry's standard dummy text ever since the--}}
                        {{--                                                1500s</p>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="tab-bord">--}}
                        {{--                                    <div class="row align-items-center flex-row-reverse">--}}
                        {{--                                        <div class="col-md-5">--}}
                        {{--                                            <div class="tab-Cont">--}}
                        {{--                                                <img src="{{asset('assets/images/tb-7.png')}}" class="img-fluid w-100"--}}
                        {{--                                                     alt="">--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="col-md-7">--}}
                        {{--                                            <div class="tab-Cont">--}}
                        {{--                                                <h2>Attracting Customers</h2>--}}
                        {{--                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                        {{--                                                    industry. Lorem Ipsum has been the industry's standard dummy text--}}
                        {{--                                                    ever since the 1500s,</p>--}}
                        {{--                                                <p>--}}
                        {{--                                                    when an unknown printer took a galley of type and scrambled it to--}}
                        {{--                                                    make a type specimen book. it has survived not only five centuries,--}}
                        {{--                                                    but also the leap into electronic typesetting, remaining essentially--}}
                        {{--                                                    unchanged.--}}
                        {{--                                                </p>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}

                        {{--                                </div>--}}

                        {{--                                <div class="row align-items-center">--}}
                        {{--                                    <div class="col-md-5">--}}
                        {{--                                        <div class="tab-Cont">--}}
                        {{--                                            <img src="{{asset('assets/images/tb-8.png')}}" class="img-fluid w-100"--}}
                        {{--                                                 alt="">--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-md-7">--}}
                        {{--                                        <div class="tab-Cont">--}}
                        {{--                                            <h2>Advertise Your Offers</h2>--}}
                        {{--                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting--}}
                        {{--                                                industry. Lorem Ipsum has been the industry's standard dummy text--}}
                        {{--                                                ever since the 1500s, </p>--}}
                        {{--                                            <p>--}}
                        {{--                                                When an unknown printer took a galley of type and scrambled it to--}}
                        {{--                                                make a type specimen book. it has survived not only five centuries, but--}}
                        {{--                                                also the leap into electronic typesetting, remaining essentially--}}
                        {{--                                                unchanged.--}}
                        {{--                                            </p>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}


                        {{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </section>


    @includeIf('partials.global.common-footer')
@endsection
