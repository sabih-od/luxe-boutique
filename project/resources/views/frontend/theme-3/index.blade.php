@extends('layouts.theme-3.app')
@section('content')
    <secttion class="mainbanner">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="bannerList">
                        <ul>
                            @forelse($categories as $category)
                                <li>
                                                                        <a href="{{route('front.category', $category->slug)}}">
                                    <a href="javascript:;">
                                        <span><img src="{{ $category->photo ? asset('assets/images/categories/'.$category->photo) : asset('assets/images/noimage.png') }}"
                                                   class="img-fluid" alt="">{{ $category->name }}</span>
                                                                                <span><i class="fal fa-box-alt"></i>{{ $category->name }}</span>
                                        <i class="fal fa-angle-right"></i>
                                    </a>
                                </li>
                            @empty
                                <li>
                                    <a href="javascript:;">
                                        <span><i class="fal fa-box-alt"></i>No Categories Found</span>
                                                                                <i class="fal fa-angle-right"></i>
                                    </a>
                                </li>
                            @endforelse
                        </ul>
                        <a href="javascript:;" class="listBtn">Sell With Us <span><i
                                    class="fal fa-angle-right"></i></span></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="banRow">
                        <div class="row align-items-center">
                            <div class="col-md-5 offset-md-1">
                                <div class="banCont">
                                    <h3>Welcome To</h3>
                                    <h1>IMA USA Shop</h1>
                                    <p>Get exclusive discounts on shopping above $100.</p>
                                    <a href="javascript:;" class="themeBtn">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banCont">
                                    <img src="{{ asset('assets/theme-3/images/banImg.png') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </secttion>

    <section class="aboutSec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="abCont">
                        <img src="{{ asset('assets/theme-3/images/abImg.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="abCont">
                        <h3>About Us</h3>
                        <h2>Your Needs Are Now Just A Click Away.</h2>
                        <p>At <strong>IMA USA Shop,</strong> it does not matter if you are a seller or a buyer; you’ll
                            get your concerns
                            catered to. Our e-commerce site permits all the sellers and resellers to enable their
                            products to reach out to the right audience. Our professionals emphasize customer
                            satisfaction and provide a platform not just provides a better online space to surf through
                            but also makes everything easily navigable, transparent, and safe. We promote US-made
                            products and sell everything you need. To make sure that the site is clean and safe to surf,
                            we strictly prohibit and discourage the selling of guns, paraphernalia, drugs, or any
                            rated-X products.</p>
                                                <a href="{{ route('front.vendor', 'about') }}" class="themeBtn">Read More</a>
                        <a href="#" class="themeBtn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="enclusiveSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="encSec">
                        <div class="row justify-content-between">
                            <div class="col-md-8">
                                <div class="encHead">
                                    <h2 class="sectionHeading">Exclusive Deals for the week</h2>
                                    <p>Avail of your favorite products at the lowest prices! Get your hands on the deals
                                        now.</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="encSbtn">
                                    <button class="enPrev"><i class="fal fa-angle-left"></i></button>
                                    <button class="enNext"><i class="fal fa-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="encSlide">
                                    @forelse($arrivals as $arrival)
                                        <div class="enSCard">
                                            <a href="javascript:;">
                                                <div class="encHead">
                                                    <img src="{{ asset('assets/theme-3/images/ens-1.png') }}"
                                                         class="img-fluid" alt="">
                                                </div>
                                                <div class="encBody">
                                                    <h4>{{ $arrival->title }}</h4>
                                                    <div class="encbInner">
                                                        <h5>{{ $arrival->price }}</h5>
                                                        <div class="encShop"><i class="fal fa-shopping-bag"></i></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @empty
                                        <p>No Products Found</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="treSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="treHead">
                        <h2 class="sectionHeading">Treading products</h2>
                        <p>Our customers love our brand new collection. Give an eye to what our sellers have got for
                            you.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="tredNavs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                                   aria-controls="all" aria-selected="true">All</a>
                            </li>
                            @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" id="{{ $category->slug }}-tab" data-toggle="tab"
                                       href="#{{ $category->slug }}"
                                       role="tab" aria-controls="{{ $category->slug }}"
                                       aria-selected="false">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-md-2">
                                    <div class="enSCard">
                                                                                <a href="{{ route('front.product', $product->slug ?? '#') }}">
                                        <a href="#">
                                            <div class="encHead">
                                                <img
                                                    src="{{ $product->thumbnail ? asset('assets/images/thumbnails/'.$product->thumbnail) : asset('assets/images/noimage.png') }}"
                                                    class="img-fluid" alt="">
                                            </div>
                                            <div class="encBody">
                                                <h4>{{ $product->showName() }}</h4>
                                                <div class="encbInner">
                                                    <h5>{{ $product->showPrice() }}</h5>
                                                    <div class="encShop"><i class="fal fa-shopping-bag"></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @foreach($categories as $category)
                        <div class="tab-pane fade" id="{{ $category->slug }}" role="tabpanel"
                             aria-labelledby="{{ $category->slug }}-tab">
                            <div class="row">
                                @forelse($products as $product)
                                    @if($category->id == $product->category_id)
                                        <div class="col-md-2">
                                            <div class="enSCard">
                                                                                                <a href="{{ route('front.product', $product->slug ?? '#') }}">
                                                <a href="#">
                                                    <div class="encHead">
                                                        <img
                                                            src="{{ $product->thumbnail ? asset('assets/images/thumbnails/'.$product->thumbnail) : asset('assets/images/noimage.png') }}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                    <div class="encBody">
                                                        <h4>{{ $product->showName() }}</h4>
                                                        <div class="encbInner">
                                                            <h5>{{ $product->showPrice() }}</h5>
                                                            <div class="encShop"><i class="fal fa-shopping-bag"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <p>No Product Found</p>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="orange">
                        <figure>
                            <img src="{{ asset('assets/theme-3/images/org-1.png') }}" class="img-fluid" alt="">
                        </figure>
                        <div class="orgCls">
                            <h2 class="sectionHeading">Health and Beauty</h2>
                            <p>Shop above $150 and avail of a 35% discount.</p>
                            <a href="javascript:;" class="themeBtn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="brown">
                                <div class="orgCls">
                                    <h2 class="sectionHeading">Laptops and Other Electronics</h2>
                                    <p>Buy your favorite electronic appliances at a 20% discount..</p>
                                    <a href="javascript:;" class="themeBtn">Shop Now</a>
                                </div>
                                <figure>
                                    <img src="{{ asset('assets/theme-3/images/org-2.png') }}" class="img-fluid" alt="">
                                </figure>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="brown blue">
                                <figure>
                                    <img src="{{ asset('assets/theme-3/images/org-3.png') }}" class="img-fluid" alt="">
                                </figure>
                                <div class="orgCls">
                                    <h2 class="sectionHeading">Weekend Deals</h2>
                                    <p>Get free shipping on shopping above 150$.</p>
                                    <a href="javascript:;" class="themeBtn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="orange green">
                        <figure>
                            <img src="{{ asset('assets/theme-3/images/org-4.png') }}" class="img-fluid" alt="">
                        </figure>
                        <div class="orgCls">
                            <h2 class="sectionHeading">Health and Beauty</h2>
                            <p>Shop above $150 and avail of a 35% discount.</p>
                            <a href="javascript:;" class="themeBtn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="productSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="proHead">
                        <h2 class="sectionHeading">Our Product Category</h2>
                        <p>Be it a cellphone or clothing, you can get them all here. Take a peek at the varied
                            categories that we offer to our valued customers.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-3">
                        <div class="proCard">
                                                        <a href="{{route('front.category', $category->slug)}}">
                            <a href="#">
                                <div class="procHead">
                                                                        <img src="{{ $category->photo ? asset('assets/images/categories/'.$category->photo) : asset('assets/images/noimage.png') }}" class="img-fluid" alt="">
                                    <img src="{{ asset('assets/theme-3/images/pro-1.png') }}" class="img-fluid" alt="">
                                </div>
                                <div class="procBody">
                                    <h3 class="sectionHeading">{{ $category->name }}</h3>
                                    <p>+100 Product <span><i class="far fa-angle-right"></i></span></p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ctaSec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="ctaCont">
                        <h2 class="sectionHeading">Want to sell your products?</h2>
                        <p>At IMA USA Shop, we allow sellers and resellers to expand their businesses. Not only do we
                            make sure that we make our site a fun place for them, but we also make certain that they are
                            getting the value they are striving for. We promote locally made products in the US and
                            provide them a platform to excel; if you are willing to join us as a seller, fill out the
                            questionnaire now!</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="ctaCont">
                        <a href="javascript:;" class="themeBtn">Become a seller now</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="loyalSec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="loyBlue">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="loyalCont">
                                    <img src="{{ asset('assets/theme-3/images/loy-1.png') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="loyalCont">
                                    <h2 class="sectionHeading">Customer Loyalty Card</h2>
                                    <p>
                                        Check out your carts of more than $200 and get yourself our customer loyalty
                                        card to
                                        avail of special discounts.
                                    </p>
                                    <a href="javascript:;" class="themeBtn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="loyOrange">
                        <div class="row align-items-center">
                            <div class="col-md-6 offset-md-1">
                                <div class="loyalCont">
                                    <h2 class="sectionHeading">Customer Loyalty Card</h2>
                                    <p>Check out your carts of more than $200 and get yourself our customer loyalty card
                                        to avail of special discounts.</p>
                                    <a href="javascript:;" class="themeBtn">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="loyalCont">
                                    <img src="{{ asset('assets/theme-3/images/loy-2.png') }}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="getSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="getHead">
                        <h2 class="sectionHeading">Get in Touch</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-5">
                    <div class="getCont">
                        <h1>Got any queries?<br>Don’t you worry!</h1>
                        <p>
                            Our customer service representatives are available at your doorstep to clear your queries.
                            Reach out to us now, and find answers to your questions.
                        </p>
                        <div class="getLink">
                            <div class="getCall">
                                <i class="fas fa-phone-alt"></i>
                                <h4>Phone:</h4>
                                <p>{{ $ps->phone ?? '' }}</p>
                            </div>
                            <div class="getCall">
                                <i class="fal fa-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $ps->email ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="cntForm">
                        <form>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                          placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="formBtn text-right">
                                <button type="submit" class="themeBtn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
