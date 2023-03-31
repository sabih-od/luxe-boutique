@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Security center') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Security center') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    {{--    <section class="affiliatesSec my-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>security-center</h2>--}}
    {{--                    <h3>Stay Safe at IMA USA Shop</h3>--}}

    {{--                    <p>Welcome to the Security Center at IMA USA Shop. We look forward to making sure that you are having a safe time at our site. Our security center ensures;</p>--}}
    {{--                    <p>• Protection of your account information</p>--}}
    {{--                    <p>• Protection of your privacy</p>--}}
    {{--                    <p>• Protection of your device</p>--}}
    {{--                    <p>• Protection of your wireless networks</p>--}}
    {{--                    <h3>At the Security Center of IMA USA Shop, we report all your concerns.</h3>--}}

    {{--                    <ul class="redLine">--}}
    {{--                        <li></li>--}}
    {{--                        <li> <strong>Customer Services</strong> <br>Do you feel as if your account has been hacked?</li>--}}
    {{--                        <li> <strong>Do you have a fake email?</strong> <br>Do you have any other queries?</li>--}}

    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="developer-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="box-styles">
                        <h4>Stay Safe At IMA USA Shop</h4>
                        <p>Welcome to the Security Center at IMA USA Shop. We look forward to making sure that you are
                            having a safe time at our site. Our security center ensures;</p>
                        <ul>
                            <li>• Protection of your account information</li>
                            <li> • Protection of your privacy</li>
                            <li> • Protection of your device</li>
                            <li>• Protection of your wireless networks</li>
                        </ul>
                    </div>
                    <div class="box-styles">
                        <h4>At The Security Center Of IMA USA Shop, We Report All Your Concerns.</h4>
                        <h5>Customer Services</h5>
                        <ul>
                            <li>• Do you feel as if your account has been hacked?</li>
                            <li> • Do you have a fake email?</li>
                            <li>• Do you have any other queries?</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeIf('partials.global.common-footer')
@endsection
