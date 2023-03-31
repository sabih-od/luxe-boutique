@extends('layouts.front')
@section('content')

    <section class="productSec">
        <div class="container-fluid p-0">
            <div class="row ">
                <div class="col-md-6 mb-3">
                    <div class="productWrap" data-aos="zoom-in">
                        <figure>
                            <img src="{{asset('assets/front/images/product1.webp')}}" class="img-fluid" alt="">
                        </figure>
                        <div class="productContent">
                            <h3>NEW ARRIVALS</h3>
                            <a href="" class="themeBtn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="productWrap" data-aos="zoom-in">
                        <figure>
                            <img src="{{asset('assets/front/images/product2.webp')}}" class="img-fluid" alt="">
                        </figure>
                        <div class="productContent">
                            <h3>Adults</h3>
                            <a href="" class="themeBtn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="productWrap" data-aos="zoom-in">
                        <figure>
                            <img src="{{asset('assets/front/images/product3.webp')}}" class="img-fluid" alt="">
                        </figure>
                        <div class="productContent mugs" data-aos="zoom-in">
                            <h2 class="secHeading">Babes</h2>
                            <a href="" class="themeBtn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="productWrap" data-aos="zoom-in">
                        <figure>
                            <img src="{{asset('assets/front/images/product4.webp')}}" class="img-fluid" alt="">
                        </figure>
                        <div class="productContent mugs">
                            <h2 class="secHeading">Monogramming</h2>
                            <a href="" class="themeBtn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="productWrap" data-aos="zoom-in">
                        <figure>
                            <img src="{{asset('assets/front/images/product5.webp')}}" class="img-fluid" alt="">
                        </figure>
                        <div class="productContent mugs">
                            <h2 class="secHeading">Accessories</h2>
                            <a href="" class="themeBtn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Collection Sec Start -->
    <section class="collectionSec">
        <div class="container">
            <h2 class="secHeading text-center">OUR FAVORITES</h2>
            <div class="row">
<!--                --><?php //foreach ($items as $item): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="collectionBox" data-aos="zoom-in-down">
                        <figure>
                            <img src="{{asset('assets/front/images/img1.webp')}}" class="img-fluid" alt="">
                        </figure>

                        <div class="collectionContent">
{{--                            <h4><?= $item->name ?> </h4>--}}
{{--                            <a href="" class="price">$<?= $item->price * 0.01 ?></a>--}}
{{--                            <a href="#<?= $item->id ?>" class="themeBtn">Buy Now</a>--}}
                        </div>
                    </div>
                </div>
<!--                --><?php //endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Collection Sec Start -->


    <!-- sell Sec Start -->
    <section class="collectionSec sellcollection">
        <div class="container">
            <h2 class="secHeading text-center">BESTSELLERS</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="collectionBox" data-aos="fade-right">
                        <figure>
                            <img src="{{asset('assets/front/images/sell1.webp')}}" class="img-fluid" alt="">
                        </figure>

                        <div class="collectionContent">
                            <h4>Babies and kids Clothing </h4>
                            <a href="" class="price">$14.90</a>
                            <a href="" class="themeBtn">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="collectionBox" data-aos="fade-left">
                        <figure>
                            <img src="{{asset('assets/front/images/sell2.webp')}}" class="img-fluid" alt="">
                        </figure>

                        <div class="collectionContent">
                            <h4>Women’s Clothing</h4>
                            <a href="" class="price">$14.90</a>
                            <a href="" class="themeBtn">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="collectionBox" data-aos="fade-left">
                        <figure>
                            <img src="{{asset('assets/front/images/sell3.webp')}}" class="img-fluid" alt="">
                        </figure>

                        <div class="collectionContent">
                            <h4>Men’s Clothing</h4>
                            <a href="" class="price">$14.90</a>
                            <a href="" class="themeBtn">Buy Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="collectionBox" data-aos="fade-right">
                        <figure>
                            <img src="{{asset('assets/front/images/sell4.webp')}}" class="img-fluid" alt="">
                        </figure>

                        <div class="collectionContent">
                            <h4>New baby gifts</h4>
                            <a href="" class="price">$14.90</a>
                            <a href="" class="themeBtn">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- sell Sec  -->


    <section class="testimonialSec">
        <div class="container">
            <h2 class="secHeading text-center">LOVE FROM OUR CUSTOMERS</h2>
            <div class="row">

                <div class="col-md-12" data-aos="fade-up-right">
                    <div class="testimonialSlider">
                        <div class="testimonialWrap">
                            <div class="userName">
                                <h4>JULIA PETTROV</h4>
                                <ul>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fal fa-star"></i></a></li>
                                </ul>
                            </div>
                            <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt
                                ut labore et dolore maecenas aliqua Quis ipsum eiusmod tempor incididunt ut labore et
                                accumsan lacus vel facilisis "</p>
                            <div class="quote">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="user">
                                <img src="{{asset('assets/front/images/user1.webp')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="testimonialWrap">
                            <div class="userName">
                                <h4>JULIA PETTROV</h4>
                                <ul>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fal fa-star"></i></a></li>
                                </ul>
                            </div>
                            <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt
                                ut labore et dolore maecenas aliqua Quis ipsum eiusmod tempor incididunt ut labore et
                                accumsan lacus vel facilisis "</p>
                            <div class="quote">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="user">
                                <img src="{{asset('assets/front/images/user2.webp')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="testimonialWrap">
                            <div class="userName">
                                <h4>JULIA PETTROV</h4>
                                <ul>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fal fa-star"></i></a></li>
                                </ul>
                            </div>
                            <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt
                                ut labore et dolore maecenas aliqua Quis ipsum eiusmod tempor incididunt ut labore et
                                accumsan lacus vel facilisis "</p>
                            <div class="quote">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="user">
                                <img src="{{asset('assets/front/images/user3.webp')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="testimonialWrap">
                            <div class="userName">
                                <h4>JULIA PETTROV</h4>
                                <ul>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fas fa-star"></i></a></li>
                                    <li><a href=""><i class="fal fa-star"></i></a></li>
                                </ul>
                            </div>
                            <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt
                                ut labore et dolore maecenas aliqua Quis ipsum eiusmod tempor incididunt ut labore et
                                accumsan lacus vel facilisis "</p>
                            <div class="quote">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <div class="user">
                                <img src="{{asset('assets/front/images/user1.webp')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="instaSec">
        <div class="container-fluid p-0">
            <div class="insta-ar">
                <div class="secHeading">
                    <h2 class="secHeading mb-2">@instagram <i class="fab fa-instagram"></i></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="swiper instaSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-aos="zoom-in-right">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta1.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-aos="zoom-in-left">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta2.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-aos="zoom-in-right">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta3.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-aos="zoom-in-left">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta4.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-aos="zoom-in-right">
                                <figure>
                                    <img src="{{asset('assets/front/images/insta5.webp')}}" class="img-fluid" alt="img">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </figure>
                            </div>
                        </div>
                        <div class="swiper-button-next"><span data-hover="NEXT"><i
                                    class="fal fa-long-arrow-right"></i></span></div>
                        <div class="swiper-button-prev"><span data-hover="PREV"><i
                                    class="fal fa-long-arrow-left"></i></span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>








{{--@include('partials.global.subscription-popup')--}}

{{--<header class="ecommerce-header nav-on-banner">--}}
{{--     Top header currency and Language--}}
{{--    @include('partials.global.top-header')--}}
{{--     Top header currency and Language  end--}}
{{--    @include('partials.global.responsive-menubar')--}}
{{--</header>--}}
{{-- Coming Soon Section Start--}}
{{--@if(session()->has('userBooking') || \Illuminate\Support\Facades\Auth::check())--}}
{{--    @php--}}
{{--        $login_time = Carbon\Carbon::parse(session()->get('userBooking'))->addHour();--}}
{{--    @endphp--}}
{{--    @if((\Carbon\Carbon::now() > $login_time) && !(\Illuminate\Support\Facades\Auth::check()))--}}
{{--        <div class="commingSoon">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <h1>--}}
{{--                            Coming Soon--}}
{{--                        </h1>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <form action="{{ route('front.userBookings') }}" method="POST" name="booking" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <div class="inputCont">--}}
{{--                                <label for="">Password</label>--}}
{{--                                <input type="password" name="password">--}}
{{--                                @error('password')--}}
{{--                                <div class="text-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="inputCont">--}}
{{--                                <button type="submit">Submit</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--@else--}}
{{--    <div class="commingSoon">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <h1>--}}
{{--                        Coming Soon--}}
{{--                    </h1>--}}
{{--                </div>--}}
{{--                <div class="col-12">--}}
{{--                    <form action="{{ route('front.userBookings') }}" method="POST" name="booking" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="inputCont">--}}
{{--                            <label for="">Password</label>--}}
{{--                            <input type="password" name="password">--}}
{{--                            @error('password')--}}
{{--                            <div class="text-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="inputCont">--}}
{{--                            <button type="submit">Submit</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
{{-- Coming Soon Section End--}}
{{--@if($ps->slider == 1)--}}
{{--    <div class="position-relative">--}}
{{--        <span class="nextBtn"></span>--}}
{{--        <span class="prevBtn"></span>--}}
{{--        <section class="home-slider owl-theme owl-carousel">--}}
{{--            @foreach($sliders as $data)--}}
{{--            <div class="banner-slide-item" style="background: url('{{asset('assets/images/sliders/'.$data->photo)}}') no-repeat center center / cover ;">--}}
{{--                <div class="container">--}}
{{--                    <div class="banner-wrapper-item text-{{ $data->position }}">--}}
{{--                        <div class="banner-content text-dark ">--}}
{{--                            <h5 class="subtitle text-dark slide-h5">{{$data->subtitle_text}}</h5>--}}

{{--                            <h2 class="title text-dark slide-h5">{{$data->title_text}}</h2>--}}

{{--                            <p class="slide-h5">{{$data->details_text}}</p>--}}

{{--                            <a href="{{ route('front.category') }}" class="cmn--btn ">{{ __('SHOP NOW') }}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </section>--}}
{{--    </div>--}}
{{--    @endif--}}
{{--@if($ps->arrival_section == 1)--}}
{{--        <!--==================== Fashion Banner Section Start ====================-->--}}
{{--        <div class="full-row">--}}
{{--            <div class="container">--}}
{{--                <div class="fashion-banner-wrapper">--}}
{{--                @foreach ($arrivals as $key=>$arrival)--}}

{{--                <div class="row row-cols-lg-2 row-cols-1 justify-content-between">--}}
{{--                    <div class="col">--}}
{{--                        <div class="banner-wrapper hover-img-zoom custom-class-121">--}}
{{--                            <div class="banner-image overflow-hidden transation">--}}
{{--                                <a href="{{ route('front.category') }}"><img class="lazy" data-src="{{ $arrival->photo ?  asset('assets/images/arrival/'.$arrival->photo): "" }}" alt="Banner Image"></a>--}}
{{--                            </div>--}}
{{--                            <div class="banner-content position-absolute">--}}
{{--                                <div class="product-tag" style="font-size: 15px;text-transform: uppercase; color: var(--theme-secondary-color); letter-spacing: 3px;"><span>{{ __('Men Collection') }}</span></div>--}}
{{--                                <h2 style="margin: 10px 0 20px;"><a href="{{ route('front.category') }}" class="text-dark mb-10 d-block">{{ __('New Autumn Arrival 2021') }}</a></h2>--}}
{{--                                <a href="{{ route('front.category') }}" class="btn-link-left-line">{{ __('Shop Now') }}</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="col hide1">--}}
{{--                        <div class="products-avilable-number fact-counter">--}}
{{--                            @if($loop->first)--}}
{{--                            <div class="mb-30 count wow fadeIn" data-wow-duration="300ms">--}}
{{--                                <div class="counting d-table">--}}
{{--                                    <div>--}}
{{--                                        <span class="count-num" data-speed="3000" data-stop="{{ $products->count() }}">0</span>--}}
{{--                                        <span>+</span>--}}
{{--                                        <span class="title">@lang('Products For You')</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @elseif($loop->last)--}}
{{--                            <div class="mb-30 count wow fadeIn counting-bottom" data-wow-duration="300ms">--}}
{{--                                <div class="counting d-table">--}}
{{--                                    <div>--}}
{{--                                        <span class="count-num" data-speed="3000" data-stop="{{ $ratings->count()>0 ? $ratings->count() : '2156' }}">0</span>--}}
{{--                                        <span>+</span>--}}
{{--                                        <span class="title">@lang('Feedback Given By Customer')</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}



{{--                @endforeach--}}
{{--            </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--==================== Fashion Banner Section End ====================-->--}}
{{--@endif--}}


{{--<div id="extraData">--}}
{{--    <div class="text-center">--}}
{{--        <img  src="{{asset('assets/images/'.$gs->loader)}}">--}}
{{--    </div>--}}
{{--</div>--}}



{{--    @if(isset($visited))--}}
{{--    @if($gs->is_cookie == 1)--}}
{{--        <div class="cookie-bar-wrap show">--}}
{{--            <div class="container d-flex justify-content-center">--}}
{{--                <div class="col-xl-10 col-lg-12">--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="cookie-bar">--}}
{{--                            <div class="cookie-bar-text">--}}
{{--                                {{ __('The website uses cookies to ensure you get the best experience on our website.') }}--}}
{{--                            </div>--}}
{{--                            <div class="cookie-bar-action">--}}
{{--                                <button class="btn btn-primary btn-accept">--}}
{{--                                {{ __('GOT IT!') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @endif--}}
{{--<!-- Scroll to top -->--}}
{{--<a href="#" class="scroller text-white" id="scroll"><i class="fa fa-angle-up"></i></a>--}}
{{--<!-- End Scroll To top -->--}}

{{--@endsection--}}
{{--@section('script')--}}
{{--	<script>--}}
{{--		let checkTrur = 0;--}}
{{--		$(window).on('scroll', function(){--}}

{{--		if(checkTrur == 0){--}}
{{--			$('#extraData').load('{{route('front.extraIndex')}}');--}}
{{--			checkTrur = 1;--}}
{{--		}--}}
{{--		});--}}
{{--        var owl = $('.home-slider').owlCarousel({--}}
{{--        loop: true,--}}
{{--        nav: false,--}}
{{--        dots: true,--}}
{{--        items: 1,--}}
{{--        autoplay: true,--}}
{{--        margin: 0,--}}
{{--        animateIn: 'fadeInDown',--}}
{{--        animateOut: 'fadeOutUp',--}}
{{--        mouseDrag: false,--}}
{{--    })--}}
{{--    $('.nextBtn').click(function() {--}}
{{--        owl.trigger('next.owl.carousel', [300]);--}}
{{--    })--}}
{{--    $('.prevBtn').click(function() {--}}
{{--        owl.trigger('prev.owl.carousel', [300]);--}}
{{--    })--}}
{{--	</script>--}}
@endsection
