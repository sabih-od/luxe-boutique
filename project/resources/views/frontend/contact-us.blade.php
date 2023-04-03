@extends('layouts.front')
@section('content')
      {{--@includeIf('partials.global.common-header')--}}
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Contact Us') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Contact Us') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    {{--    <section class="contantSec my-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row align-items-center">--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <h3>Always at your service.</h3>--}}
    {{--                    <h2>We Put Our <br> Customers First.</h2>--}}
    {{--                    <p>The customer representatives’ team at IMA USA Shop treats their customers as their families.--}}
    {{--                        Whether you are a seller or a buyer, we make sure that you find valuable answers to all your--}}
    {{--                        questions. We are available 24/7 for you, and we look forward to looking through your feedback--}}
    {{--                        and getting even better.</p>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <figure>--}}
    {{--                        <img src="images/cntct.png" alt="">--}}
    {{--                    </figure>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <ul class="redLines ">--}}
    {{--                        <li><strong>Local Sourced US Products</strong><br><span>At IMA USA Shop, we promote US-based products to let national sellers excel.</span>--}}
    {{--                        </li>--}}
    {{--                        <li><strong>Clean and Safe Site</strong><br><span>At IMA USA Shop, we promote US-based products to let national sellers excel.</span>--}}
    {{--                        </li>--}}
    {{--                        <li><strong>24/7 Customer Services</strong><br><span>Our customer service team is available to make sure that your concerns are catered to.</span>--}}
    {{--                        </li>--}}

    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <section class="cntnInenr">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-5">--}}
    {{--                    <h2>Got any queries? Don’t you worry!</h2>--}}
    {{--                    <h3>Get in Touch</h3>--}}
    {{--                    <p>Our customer service representatives are available at your doorstep to clear your queries. Reach--}}
    {{--                        out to us now, and find answers to your questions.</p>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <div class="row">--}}
    {{--                        <form class="contactform" id="contact-form" action="{{ route('front.contact.submit') }}"--}}
    {{--                              method="POST">--}}
    {{--                            @csrf--}}
    {{--                            <div class="row align-items-center">--}}
    {{--                                <div class="col-md-3">--}}
    {{--                                    <div class="mb-3">--}}
    {{--                                        <label>{{ __('Full Name') }}:</label>--}}
    {{--                                        <input type="text" class="form-control bg-gray" name="name"--}}
    {{--                                               placeholder="{{ __('Name *') }}" required="">--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-3">--}}
    {{--                                    <div class="mb-3">--}}
    {{--                                        <label>{{ __('Your Email') }}:</label>--}}
    {{--                                        <input type="email" class="form-control bg-gray" name="email"--}}
    {{--                                               placeholder="{{ __('Email Address *') }}" required="">--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-3">--}}
    {{--                                    <div class="mb-3">--}}
    {{--                                        <label>{{ __('Phone Number') }}:</label>--}}
    {{--                                        <input type="text" class="form-control bg-gray" name="phone"--}}
    {{--                                               placeholder="{{ __('Phone Number *') }}" required="">--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                --}}{{--                        <div class="col-md-12">--}}
    {{--                                --}}{{--                            <div class="mb-3">--}}
    {{--                                --}}{{--                                <label>{{ __('Message') }}:</label>--}}
    {{--                                --}}{{--                                <textarea class="form-control bg-gray" name="text" rows="8" placeholder="{{ __('Your Message *') }}" required=""></textarea>--}}
    {{--                                --}}{{--                            </div>--}}
    {{--                                --}}{{--                        </div>--}}

    {{--                                @if($gs->is_capcha == 1)--}}
    {{--                                    <div class="form-input">--}}
    {{--                                        {!! NoCaptcha::display() !!}--}}
    {{--                                        {!! NoCaptcha::renderJs() !!}--}}
    {{--                                        @error('g-recaptcha-response')--}}
    {{--                                        <p class="my-2">{{$message}}</p>--}}
    {{--                                        @enderror--}}
    {{--                                    </div>--}}
    {{--                                @endif--}}
    {{--                                <input type="hidden" name="to" value="{{ $ps->contact_email }}">--}}
    {{--                                <div class="col-md-3 mt-3">--}}
    {{--                                    <button class="btn btn-primary submit-btn" name="submit"--}}
    {{--                                            type="submit">{{ __('Send Message') }}</button>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}


    {{--            <div class="row">--}}
    {{--                <div class="icon col-md-3">--}}
    {{--                    <i class="fas fa-phone-volume"></i>--}}
    {{--                    <h3>phone</h3>--}}
    {{--                    <p><a href="tel:(616) 888-6116">(616) 888-6116</a></p>--}}

    {{--                </div>--}}
    {{--                <div class="icon col-md-3">--}}
    {{--                    <i class="fas fa-envelope"></i>--}}
    {{--                    <h3>Email:</h3>--}}
    {{--                    <p><a href="mailto:admin@imausashop.com">admin@imausashop.com</a></p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <div class=" mapSec col-md-12">--}}
    {{--        <iframe--}}
    {{--            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115106.02499742675!2d-74.16411775340822!3d40.701335510780616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1668003929635!5m2!1sen!2s"--}}
    {{--            width="100%" height="644" style="border:0;" allowfullscreen="" loading="lazy"--}}
    {{--            referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
    {{--    </div>--}}
    <section class="contact-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <article>
                        <h3>Always At Your Service.</h3>
                        <h4>We Put Our <br>
                            Customers First.</h4>
                        <p>The customer representatives’ team at IMA USA Shop treats their customers as their families.
                            Whether you are a seller or a buyer, we make sure that you find valuable answers to all your
                            questions. We are available 24/7 for you, and we look forward to looking through your
                            feedback and getting even better.</p>
                        <h5>Local Sourced US Products</h5>
                        <p class="m-0">At IMA USA Shop, we promote US-based products to let national sellers excel.</p>
                        <h5>Clean and Safe Site</h5>
                        <p class="m-0">At IMA USA Shop, we promote US-based products to let national sellers excel.</p>
                        <h5>24/7 Customer Services</h5>
                        <p class="m-0">Our customer service team is available to make sure that your concerns are
                            catered to.</p>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="map-detail">
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004082.928417291!2d-104.65713107818928!3d37.275578278180674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1677178245394!5m2!1sen!2s"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <h3 class="mb-4 mt-4">Got Any Queries? Don’t You Worry!</h3>
                        </div>
                        <form action="">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <h3>Get In Touch</h3>
                                    <p>Our customer service representatives are available at your doorstep to clear your
                                        queries. Reach out to us now, and find answers to your questions.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <input type="text" class="form-control" placeholder="First Name*">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <input type="text" class="form-control" placeholder="Last Name*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <input type="text" class="form-control" placeholder="Emal Id*">
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <input type="text" class="form-control" placeholder="Phone Number*">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                                    <button>
                                        Submit Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--@includeIf('partials.global.common-footer')--}}
@endsection
