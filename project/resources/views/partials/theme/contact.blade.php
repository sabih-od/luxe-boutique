@extends('layouts.front')
@section('content')


    <!-- Begin: Main Slider -->
    <div class="innerBan">
    <img src="{{asset('assets/front/images/innerbnr1.webp')}}" class="w-100" alt="">
        <div class="overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h2>Contact us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Main Slider -->


    <section class="contactSe " >
        <div class="container">
        <h2 class="secHeading text-center ">GET IN TOUCH</h2>
            <div class="row align-items-center">

                <div class="col-md-12 text-center mt-5">

                        <p>Use this text to share information about your brand with your customers. Describe a product,<br>
                            share announcements, or welcome customers to your store.</p>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="getForm viewbtn ">

                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" placeholder="">
                                </div>


                                <div class="col-md-12">
                                    <label for="">Message </label>
                                    <textarea rows="10" placeholder=""></textarea>
                                </div>
                                <div class="col-12 text-center">
                                <a href="#" class="themeBtn">send</a>
                                </div>
                                <div class="col-md-12 text-center mt-4">
                                    <p>This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</p>
                                </div>
                            </div>
                        </form>
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
                        <div class="swiper-button-next"><span data-hover="NEXT"><i class="fal fa-long-arrow-right"></i></span></div>
                        <div class="swiper-button-prev"><span data-hover="PREV"><i class="fal fa-long-arrow-left"></i></span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
