@extends('layouts.theme-2.app')
@section('css')
    <style>
        .membrBox ul li:before {
            font-family: 'Font Awesome 5 Pro';
            content: "\f00c";
        }
    </style>
@endsection
@section('content')
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/inrbnr1.png') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">Membership</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="membershipPage">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="membrHead">
                        <h2 class="secHeading wow fadeInUp" data-wow-delay="0.3s">Membership</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($subscriptions as $subscription)
                    <div class="col-md-3">
                        <div class="membrBox">
                            <h2>{{ $subscription->title }}</h2>
                            <h3>{{ \PriceHelper::showCurrencyPrice($subscription->price) }}</h3>
                            <ul class="scrollable">
                                {!! $subscription->details !!}
                            </ul>
                            @if(Auth::check())
                                <a href="{{ route('user-package') }}" class="themeBtn wow fadeInUp"
                                   data-wow-delay="0.5s">Subscribe</a>
                            @else
                                <a href="{{ route('user-package') }}" class="themeBtn wow fadeInUp"
                                   data-wow-delay="0.5s" data-toggle="modal" data-target="#signIn">Subscribe</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>No Packages Found</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
