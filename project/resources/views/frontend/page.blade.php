@extends('layouts.front')

@section('content')
      {{--@includeIf('partials.global.common-header')--}}

    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ $page->title }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>

                            <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!--==================== About Owner Section Start ====================-->
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div
                    class="col-md-12 {{ $page->slug == 'terms' || $page->slug == 'privacy' ? 'col-lg-12' : 'col-lg-7' }}">
                    {!! clean($page->details , array('Attr.EnableID' => true)) !!}
                </div>
                <div
                    class="col-lg-5 col-md-12 sm-mx-none mt-5 {{ $page->slug == 'terms' || $page->slug == 'privacy' ? 'd-none' : '' }}">
                    <img class="sm-mb-30"
                         src="{{ $page->photo ? asset('assets/images/pages/'.$page->photo) : 'Image not found!'}}"
                         alt="Image not found!">
                </div>

                @if($page->slug == 'about')
                    <div
                        class="col-lg-5 col-md-12 sm-mx-none mt-5 {{ $page->slug == 'terms' || $page->slug == 'privacy' ? 'd-none' : '' }}">
                        <img class="sm-mb-30"
                             src="{{ $page->photo ? asset('assets/images/pages/abImg.png') : 'Image not found!'}}"
                             alt="Image not found!">
                    </div>
                    <div
                        class="p-5 col-md-12 {{ $page->slug == 'terms' || $page->slug == 'privacy' ? 'col-lg-12' : 'col-lg-7' }}">
                        <h3 class="aux-modern-heading-secondary" style="font-family:Montserrat;letter-spacing:-1.5px;font-weight:bold;margin-top:0.2em;font-size:50px;line-height:1.4em;margin-bottom:0.6em;text-transform:capitalize;max-width:544px;"><span class="aux-head-before">We Make Customers, Not The Sale.</span></h3>
                        <p>Finding these products at some other e-commerce site is quite possible; however, you can never be sure that you’ll receive the adequate services that you are looking forward to. At IMA USA Shop, our professionals make sure that we make the whole selling and buying process transparent for you, promote your products to the right audience and make our site a cleaner one for you. We assure you that the products we are offering fall in affordable ranges and never compromise on quality. Here are the top three reasons why you should choose us.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--==================== About Owner Section End ====================-->




    {{--@includeIf('partials.global.common-footer')--}}

@endsection
