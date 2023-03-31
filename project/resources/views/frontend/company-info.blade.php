@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Company Info') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Company Info') }}</li>
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
    {{--                    <h2>company-info</h2>--}}
    {{--                    <h3>IMA USA Shop</h3>--}}
    {{--                    <h3>About the Company</h3>--}}
    {{--                    <p>Your needs are now just a click away.</p>--}}
    {{--                    <p>At IMA USA Shop, no matter if you are a seller or a buyer, you’ll get your concerns catered to. Our e-commerce site permits all the sellers and resellers to enable their products to reach out to the right audience. Our professionals emphasize customer satisfaction and provide a platform that not only provides a better online space to surf through but also makes everything easily navigable, transparent, and safe. We promote US-made products and sell everything you need.</p>--}}
    {{--                    <h3>Top Reasons to Choose IMA USA Shop</h3>--}}
    {{--                    <p>We make customers, not the sale</p>--}}
    {{--                    <p>Finding these products at some other e-commerce site is quite possible; however, you can never be sure that you’ll receive the adequate services that you are looking forward to. At IMA USA Shop, our professionals make sure that we make the whole selling and buying process transparent for you, promote your products to the right audience and make our site a cleaner one for you. We assure you that the products we are offering fall in affordable ranges and never compromise on quality.</p>--}}
    {{--                    <ul class="redLine">--}}
    {{--                        <li>700K ACTIVE BUYERS</li>--}}
    {{--                        <li>100K ACTIVE SELLERS</li>--}}
    {{--                        <li>500K+ PRODUCTS SOLD</li>--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="companyinfo-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="box-styles">
                        <h6 class="colored">IMA USA Shop</h6>
                        <h4>About The Company</h4>
                        <p class="mb-2">Your needs are now just a click away.</p>
                        <p>At IMA USA Shop, no matter if you are a seller or a buyer, you’ll get your concerns catered
                            to. Our e-commerce site permits all the sellers and resellers to enable their products to
                            reach out to the right audience. Our professionals emphasize customer satisfaction and
                            provide a platform that not only provides a better online space to surf through but also
                            makes everything easily navigable, transparent, and safe. We promote US-made products and
                            sell everything you need.</p>
                    </div>
                    <article>
                        <h3>Top Reasons To Choose IMA USA Shop</h3>
                        <p class="mb-2">We make customers, not the sale</p>
                        <p>Finding these products at some other e-commerce site is quite possible; however, you can
                            never be sure that you’ll receive the adequate services that you are looking forward to. At
                            IMA USA Shop, our professionals make sure that we make the whole selling and buying process
                            transparent for you, promote your products to the right audience and make our site a cleaner
                            one for you. We assure you that the products we are offering fall in affordable ranges and
                            never compromise on quality.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    @includeIf('partials.global.common-footer')
@endsection
