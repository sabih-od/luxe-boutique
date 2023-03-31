@extends('layouts.front')
@section('content')

    <!-- Begin: Main Slider -->
    <div class="innerBan">
        <img src="{{asset('assets/front/images/innerbnr1.webp')}}" class="w-100" alt="">
        <div class="overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h2>categories</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Main Slider -->


    <!-- sell Sec Start -->
    <section class="collectionSec sellcollection catagry">
        <div class="bgwhite">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ser-wrap">
                        <div class="">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
{{--                                <?php foreach ($categories as $key => $category): ?>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link themeBtn <?= $key == 0 ? 'active' : '' ?>"--}}
{{--                                           id="tab-<?= $category->id ?>" data-toggle="tab"--}}
{{--                                           href="#content-<?= $category->id ?>"--}}
{{--                                           role="tab" aria-controls="content-<?= $category->id ?>"--}}
{{--                                           aria-selected="<?= $key == 0 ? 'true' : 'false' ?>"><?= $category->name ?></a>--}}
{{--                                    </li>--}}
{{--                                <?php endforeach; ?>--}}

                                <!--<li class="nav-item">
                                    <a class="nav-link themeBtn" id="profile-tab" data-toggle="tab" href="#profile"
                                       role="tab" aria-controls="profile" aria-selected="false">Baby Boys</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link themeBtn" id="profile-tab" data-toggle="tab" href="#girs"
                                       role="tab" aria-controls="profile" aria-selected="false">Girls</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link themeBtn" id="profile-tab" data-toggle="tab" href="#boys"
                                       role="tab" aria-controls="profile" aria-selected="false">Boys</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link themeBtn" id="profile-tab" data-toggle="tab" href="#Womens"
                                       role="tab" aria-controls="profile" aria-selected="false">Women’s</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link themeBtn" id="profile-tab" data-toggle="tab" href="#mens"
                                       role="tab" aria-controls="profile" aria-selected="false">Men’s</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link themeBtn" id="profile-tab" data-toggle="tab" href="#jewelry"
                                       role="tab" aria-controls="profile" aria-selected="false">Jewelry</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link themeBtn" id="profile-tab" data-toggle="tab" href="#revive"
                                       role="tab" aria-controls="profile" aria-selected="false">Revive Skincare</a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent">

{{--                      Clovage Code  --}}

{{--                        @foreach ($categories_items as $key => $category)--}}
{{--                            <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="content-{{ $category->id }}"--}}
{{--                                 role="tabpanel" aria-labelledby="tab-{{ $category->id }}">--}}
{{--                                <h2 class="secHeading text-center">{{ $category->name }}</h2>--}}
{{--                                <div class="row">--}}
{{--                                    @foreach (getItemsByCatId($category->id) as $item)--}}
{{--                                        <div class="col-md-3 col-sm-6">--}}
{{--                                            <div class="collectionBox" data-aos="fade-down">--}}
{{--                                                <figure>--}}
{{--                                                    <img src="{{ asset('assets/front/images/b1.webp') }}" class="img-fluid" alt="">--}}
{{--                                                </figure>--}}

{{--                                                <div class="collectionContent">--}}
{{--                                                    <h4>{{ $item->name }}</h4>--}}
{{--                                                    <a href="" class="price">$ {{ $item->price * 0.01 }}</a>--}}
{{--                                                    <a href="#{{ $item->id }}" class="themeBtn">Buy Now</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                    @endforeach--}}



{{--                        <?php foreach ($categories as $key => $category): ?>--}}
{{--                            <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="content-<?= $category->id ?>"--}}
{{--                                 role="tabpanel"--}}
{{--                                 aria-labelledby="tab-<?= $category->id ?>">--}}
{{--                                <h2 class="secHeading text-center"><?= $category->name ?></h2>--}}
{{--                                <div class="row">--}}
{{--                                    <?php--}}
{{--                                    $cat_items = getItemsByCatId($category->id);--}}
{{--                                    foreach ($cat_items as $item):?>--}}
{{--                                        <div class="col-md-3 col-sm-6">--}}
{{--                                            <div class="collectionBox" data-aos="fade-down">--}}
{{--                                                <figure>--}}
{{--                                                    <img src="{{asset('assets/front/images/b1.webp')}}" class="img-fluid" alt="">--}}
{{--                                                </figure>--}}

{{--                                                <div class="collectionContent">--}}
{{--                                                    <h4><?= $item->name ?></h4>--}}
{{--                                                    <a href="" class="price">$<?= $item->price * 0.01 ?></a>--}}
{{--                                                    <a href="#<?= $item->id ?>" class="themeBtn">Buy Now</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    <?php endforeach; ?>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        <?php endforeach; ?>--}}








                        <!--<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="secHeading text-center">Baby Girls</h2>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/b1.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/b2.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/b3.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/b4.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="secHeading text-center">Baby Boys </h2>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/b5.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/b6.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/b7.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/b8.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade " id="girs" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="secHeading text-center">Girls </h2>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/g1.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/g2.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/g3.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/g4.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade " id="boys" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="secHeading text-center">Boys </h2>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/b11.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/b22.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/b33.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/b44.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade " id="Womens" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="secHeading text-center">Womens </h2>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/w1.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/w2.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/w3.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/w4.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade " id="mens" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="secHeading text-center">mens </h2>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/men1.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/men2.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/men3.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/men4.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade " id="jewelry" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="secHeading text-center">jewelry</h2>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/j1.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/j2.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/j3.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/j4.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade " id="revive" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="secHeading text-center">Revive Skincare</h2>
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/skin1.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/skin2.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-left">
                                        <figure>
                                            <img src="images/skin3.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="collectionBox" data-aos="fade-right">
                                        <figure>
                                            <img src="images/skin4.webp" class="img-fluid" alt="">
                                        </figure>

                                        <div class="collectionContent">
                                            <h4>Baby Girls</h4>
                                            <a href="" class="price">$14.90</a>
                                            <a href="" class="themeBtn">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- sell Sec  -->


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
@endsection
