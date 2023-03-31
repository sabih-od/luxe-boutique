@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Contact') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Contact') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <!--==================== Contact Section Start ====================-->
    {{--<div class="full-row">--}}
    {{--   <div class="container">--}}
    {{--      <div class="row">--}}
    {{--         <div class="col-lg-7 col-md-7">--}}
    {{--            <h3 class="down-line mb-5">{{ __('Send Message') }}</h3>--}}
    {{--            <div class="form-simple mb-5">--}}
    {{--               <form class="contactform"  id="contact-form" action="#" method="POST">--}}
    {{--                  @csrf--}}
    {{--                  <div class="row">--}}
    {{--                     <div class="col-md-6">--}}
    {{--                        <div class="mb-3">--}}
    {{--                           <label>{{ __('Full Name') }}:</label>--}}
    {{--                           <input type="text" class="form-control bg-gray" name="name" placeholder="{{ __('Name *') }}" required="">--}}
    {{--                        </div>--}}
    {{--                     </div>--}}
    {{--                     <div class="col-md-6">--}}
    {{--                        <div class="mb-3">--}}
    {{--                           <label>{{ __('Your Email') }}:</label>--}}
    {{--                           <input type="email" class="form-control bg-gray" name="email" placeholder="{{ __('Email Address *') }}" required="">--}}
    {{--                        </div>--}}
    {{--                     </div>--}}
    {{--                     <div class="col-md-12">--}}
    {{--                        <div class="mb-3">--}}
    {{--                           <label>{{ __('Phone Number') }}:</label>--}}
    {{--                           <input type="text" class="form-control bg-gray" name="phone" placeholder="{{ __('Phone Number *') }}" required="">--}}
    {{--                        </div>--}}
    {{--                     </div>--}}
    {{--                     <div class="col-md-12">--}}
    {{--                        <div class="mb-3">--}}
    {{--                           <label>{{ __('Message') }}:</label>--}}
    {{--                           <textarea class="form-control bg-gray" name="text" rows="8" placeholder="{{ __('Your Message *') }}" required=""></textarea>--}}
    {{--                        </div>--}}
    {{--                     </div>--}}

    {{--                     @if($gs->is_capcha == 1)--}}
    {{--                     <div class="form-input">--}}
    {{--                        {!! NoCaptcha::display() !!}--}}
    {{--                        {!! NoCaptcha::renderJs() !!}--}}
    {{--                        @error('g-recaptcha-response')--}}
    {{--                        <p class="my-2">{{$message}}</p>--}}
    {{--                        @enderror--}}
    {{--                     </div>--}}
    {{--                     @endif--}}
    {{--                     <input type="hidden" name="to" value="{{ $ps->contact_email }}">--}}
    {{--                     <div class="col-md-12 mt-3">--}}
    {{--                        <button class="btn btn-primary submit-btn mybtn1" name="submit" type="submit">{{ __('Send Message') }}</button>--}}
    {{--                     </div>--}}
    {{--                  </div>--}}
    {{--               </form>--}}
    {{--            </div>--}}
    {{--         </div>--}}
    {{--         <div class="col-lg-5 col-md-5">--}}
    {{--            <h3 class="down-line mb-5">{{ __('Get In Touch') }}</h3>--}}
    {{--            <div class="d-flex mb-3 infoCont">--}}
    {{--               <ul>--}}
    {{--                  @if($ps->street != null)--}}
    {{--                  <li class="mb-3">--}}
    {{--                     <strong>{{ __('Office Address') }} :</strong><br> {{ $ps->street }}--}}
    {{--                  </li>--}}
    {{--                  @endif--}}
    {{--                  @if($ps->phone != null )--}}
    {{--                  <li class="mb-3">--}}
    {{--                     <strong>Contact Number :</strong><br><a href="tel:(616) 888-6116">{{ $ps->phone }}</a>--}}
    {{--                  </li>--}}
    {{--                  @endif--}}
    {{--                  @if($ps->fax != null )--}}
    {{--                  <li class="mb-3">--}}
    {{--                     <strong>Fax :</strong><br> {{ $ps->fax }}--}}
    {{--                  </li>--}}
    {{--                  @endif--}}
    {{--                  @if($ps->email != null)--}}
    {{--                  <li class="mb-3">--}}
    {{--                     <strong>{{ __('Email Address') }} :</strong><br>--}}
    {{--                     <p class="email"><a href="mailto:admin@imausashop.com">{{ $ps->email }}</a></p>--}}
    {{--                  </li>--}}
    {{--                  @endif--}}
    {{--               </ul>--}}
    {{--            </div>--}}
    {{--         </div>--}}
    {{--      </div>--}}
    {{--   </div>--}}
    {{--</div>--}}
    <section class="contact-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <article>
                        <h3 class='text-center'>Always At Your Service.</h3>
                        <h4 class='text-center'>We Put Our <br>
                            Customers First.</h4>
                        <p>The customer representatives’ team at IMA USA Shop treats their customers as their families.
                            Whether you are a seller or a buyer, we make sure that you find valuable answers to all your
                            questions. We are available 24/7 for you, and we look forward to looking through your
                            feedback and getting even better.</p>
                        <!-- <h5>Local Sourced US Products</h5>
                        <p class="m-0">At IMA USA Shop, we promote US-based products to let national sellers excel.</p>
                        <h5>Clean and Safe Site</h5>
                        <p class="m-0">At IMA USA Shop, we promote US-based products to let national sellers excel.</p>
                        <h5>24/7 Customer Services</h5>
                        <p class="m-0">Our customer service team is available to make sure that your concerns are
                            catered to.</p> -->
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="map-detail">
                        <!-- <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004082.928417291!2d-104.65713107818928!3d37.275578278180674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1677178245394!5m2!1sen!2s"
                                width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <h3 class="mb-4 mt-4">Got Any Queries? Don’t You Worry!</h3>
                        </div> -->
                        <form action="{{route('front.contactUsSentEmail')}}"method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <h3>Get In Touch</h3>
                                    <p>Our customer service representatives are available at your doorstep to clear your
                                        queries. Reach out to us now, and find answers to your questions.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <input type="text" class="form-control" placeholder="First Name*" name="first_name">
                                    <span class="text-danger">@error ('first_name') {{$message}} @enderror</span>

                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <input type="text" class="form-control" placeholder="Last Name*" name="last_name">
                                    <span class="text-danger">@error ('last_name') {{$message}} @enderror</span>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <input type="text" class="form-control" placeholder="Emal Id*"name="email">
                                    <span class="text-danger">@error ('email') {{$message}} @enderror</span>

                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <input type="text" class="form-control" placeholder="Phone Number*"name="phone_number">
                                    <span class="text-danger">@error ('phone_number') {{$message}} @enderror</span>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                                    <span class="text-danger">@error ('message') {{$message}} @enderror</span>

                                    <button type="submit">
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
    <!--======================== Contact Section End ==========================-->
    @include('partials.global.common-footer')
@endsection
@section('script')
@endsection

