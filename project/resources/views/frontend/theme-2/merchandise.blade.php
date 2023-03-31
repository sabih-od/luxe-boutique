@extends('layouts.theme-2.app')
@section('body-class', 'merchandise')
@section('content')

    <!-- Begin: Main Slider -->
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/inrbnr1.png') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">Merchandise Store</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="aboutSec merchandisePage">
        <div class="container">
            <h2 class="secHeading wow fadeInUp" data-wow-delay="0.3s">Merchandise Store</h2>

            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-3">
                        <div class="proCard wow fadeInUp" data-wow-delay="0.75s">
                            <a href="{{ route('front.product', $product->slug ?? '#') }}" class="imgWrap">
                                <img
                                    src="{{ $product->thumbnail ? asset('assets/images/thumbnails/'.$product->thumbnail) : asset('assets/images/noimage.png') }}"
                                    alt="product">
                            </a>
                            <div class="content">
                                <h3>{{ $product->showName() }}</h3>
                                <span>
                                    @for($x = 1; $x < 6; $x++)
                                        <i class="fas fa-star"
                                           style="color: {{ $product->ratings->avg('rating') >= $x ? '' : '#000' }}"></i>
                                    @endfor
                                </span>
                                <a href="{{ route('front.product', $product->slug ?? '#') }}">{{ $product->showPrice() }}</a>
                                <ul>
                                    <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fal fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
