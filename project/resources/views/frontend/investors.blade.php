@extends('layouts.front')
@section('content')
      {{--@includeIf('partials.global.common-header')--}}
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Investors') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Investors') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    {{--    <section class="affiliatesSec my-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row align-items-center">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>investors</h2>--}}
    {{--                    <h3>INVESTORS</h3>--}}
    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <figure>--}}
    {{--                        <img src="images/a.png" alt="">--}}
    {{--                    </figure>--}}

    {{--                </div>--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <h3>INVESTORS</h3>--}}
    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
    {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--    </section>--}}

    <section class="investors-sec">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10 col-sm-12 col-12">
                    <article class="text-center mb-5">
                        <h3>Investors</h3>
                        <p>At IMA USA Shop, we don’t allow the buying and selling of rated-x products, drugs, and other
                            inappropriate products. Any seller that will be found while exchanging any such item would
                            be suspended from our site and would not be able to operate anymor</p>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-12">
                    <div class="investors-items">
                        <img src="{{asset('assets/images/invest-img01.png')}}" alt="">
                        <div class="overlay">
                            <h5>Olivia</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-12">
                    <div class="investors-items">
                        <img src="{{asset('assets/images/invest-img02.png')}}" alt="">
                        <div class="overlay">
                            <h5>Demo</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-12">
                    <div class="investors-items">
                        <img src="{{asset('assets/images/invest-img03.png')}}" alt="">
                        <div class="overlay">
                            <h5>Demo</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-12">
                    <div class="investors-items">
                        <img src="{{asset('assets/images/invest-img04.png')}}" alt="">
                        <div class="overlay">
                            <h5>Demo</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--@includeIf('partials.global.common-footer')--}}
@endsection
