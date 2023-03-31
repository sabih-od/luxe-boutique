@extends('layouts.front')

@section('content')
    @include('partials.global.common-header')
    @if(session()->has('userBooking') || \Illuminate\Support\Facades\Auth::check())
        @php
            $login_time = Carbon\Carbon::parse(session()->get('userBooking'))->addHour();
        @endphp
        @if((\Carbon\Carbon::now() > $login_time) && !(\Illuminate\Support\Facades\Auth::check()))
            <div class="commingSoon">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1>
                                Coming Soon
                            </h1>
                        </div>
                        <div class="col-12">
                            <form action="{{ route('front.userBookings') }}" method="POST" name="booking" enctype="multipart/form-data">
                                @csrf
                                <div class="inputCont">
                                    <label for="">Password</label>
                                    <input type="password" name="password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="inputCont">
                                    <button type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="commingSoon">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            Coming Soon
                        </h1>
                    </div>
                    <div class="col-12">
                        <form action="{{ route('front.userBookings') }}" method="POST" name="booking" enctype="multipart/form-data">
                            @csrf
                            <div class="inputCont">
                                <label for="">Password</label>
                                <input type="password" name="password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="inputCont">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5" style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Verify') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>

                            <li class="breadcrumb-item active" aria-current="page">{{ __('Verify') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!--==================== Registration Form Start ====================-->
    <div class="full-row">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="woocommerce">
                        <div class="row">
                            <div class="col-lg-6 col-md-8 col-12 mx-auto">
                                <div class="registration-form border">
                                    @include('includes.admin.form-login')
                                    <h3>{{ __('Enter Your Code') }}</h3>
                                    <p>{{ __('You have received a code on the email.') }}</p>
                                    <form action="{{route('user-register-verification')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $data['user_id'] }}">
                                        <input type="hidden" name="verification_code" value="{{ $data['code'] }}">
                                        <p>
                                            <input type="password" name="entered_code" class="form-control" placeholder="{{ __('Enter 6 Digit Code') }}">
                                        </p>
                                        <button type="submit" class="btn btn-primary float-none w-100 rounded-0 submit-btn">{{ __('Submit') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Registration Form Start ====================-->


    @include('partials.global.common-footer')
@endsection
