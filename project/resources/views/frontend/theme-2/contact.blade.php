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
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="contactPage">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-3">
                    <div class="cntctBox">
                        <figure><i class="fab fa-whatsapp"></i></figure>
                        <h2>Phone</h2>
                        @if($ps->phone != null )
                            <a href="tel:{{ $ps->phone }}">{{$ps->phone}}</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cntctBox">
                        <figure><i class="fal fa-envelope"></i></figure>
                        <h2>Email</h2>
                        @if($ps->email != null)
                            <a href="mailto:{{ $ps->email }}">{{ $ps->email }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cntctBox">
                        <figure><i class="fal fa-map-marker-alt"></i></figure>
                        <h2>Location</h2>
                        @if($ps->street != null)
                            <p>{{ $ps->street }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-md-7">
                    <h2 class="secHeading wow fadeInUp" data-wow-delay="0.5s">Contact Us</h2>
                    <form action="" class="cntctForm contactform" id="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" placeholder="First Name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" placeholder="Phone Number" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="col-md-12">
                                <textarea placeholder="Message" name="text" required></textarea>
                            </div>
                            <div class="col-md-12">
                                @if($gs->is_capcha == 1)
                                    <div class="form-input">
                                        {!! NoCaptcha::display() !!}
                                        {!! NoCaptcha::renderJs() !!}
                                        @error('g-recaptcha-response')
                                        <p class="my-2">{{$message}}</p>
                                        @enderror
                                    </div>
                                @endif
                                <input type="hidden" name="to" value="{{ $ps->contact_email }}">
                            </div>
                            <div class="col-md-12">
                                <button class="themeBtn">Contact Us</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <figure class="wow fadeInLeft" data-wow-delay="0.5s">
                        <img src="{{ asset('assets/images/cntctimg.jpg') }}" class="rounded-circle" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(".contactform").on("submit", function (e) {
            var $this = $(this);
            e.preventDefault();
            $this.find(".gocover").show();
            $this.find(".input-field").prop("readonly", true);
            $this.find("button").prop("disabled", true);
            $.ajax({
                method: "POST",
                url: $(this).prop("action"),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.errors) {
                        for (var error in data.errors) {
                            toastr.error(data.errors[error]);
                        }
                    } else {
                        toastr.success(data);
                        $this.find(".input-field").val("");
                        $this[0].reset();
                    }
                    $this.find("button").prop("disabled", false);
                },
            });
        });
    </script>
@endsection
