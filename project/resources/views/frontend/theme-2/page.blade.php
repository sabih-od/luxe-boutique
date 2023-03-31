@extends('layouts.theme-2.app')
@section('body-class', '')
@section('content')

    <!-- Begin: Main Slider -->
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/inrbnr1.png') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">{{ $page->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>

    <!-- END: Main Slider -->
    <section class="aboutSec abtPage">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <figure class="wow fadeInLeft" data-wow-delay="0.5s">
                        <img src="{{ $page->photo ? asset('assets/images/pages/'.$page->photo) : 'Image not found!'}}" class="rounded-circle" alt="">
                    </figure>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInRight" data-wow-delay="0.5s">
                        {!! clean($page->details , array('Attr.EnableID' => true)) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
