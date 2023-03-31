@extends('layouts.theme-2.app')
@section('body-class', 'Vendor Real Item Products')
@section('content')
    <!-- Begin: Main Slider -->

    <section class="marktSearch itemProducts">
        <div class="container">
            <!-- <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="">
                        <input type="text" placeholder="Search">
                        <input type="text" placeholder="Grade">
                        <input type="text" placeholder="Subject">
                        <input type="text" placeholder="Price">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div> -->
        </div>
    </section>


    <section class="profileSec">
        <div class="container">
            <div class="row align-items-end justify-content-between">
                <div class="col-md-5">
                    <div class="userBox">
                        <img
                            src="{{ $vendor->photo ? asset('assets/images/users/') . '/' . $vendor->photo : asset('assets/vendor/images/user.png') }}"
                            class="img-fluid" alt="img">
                        <div class="userContent">
                            <h4>{{ $vendor->name }}</h4>
                            <p>68% positive Seller Ratings</p>
                        </div>
                    </div>

                    <div class="profileList">
                        <ul>
                            <li><a href="{{ route('front.vendor.virtual.product', str_replace(' ', '-', $vendor->shop_name)) }}" class="themeBtn">Virtual Products</a></li>
                            <li><a href="{{ route('front.vendor.product', str_replace(' ', '-', $vendor->shop_name)) }}"
                                   class="themeBtn active">Real Iteam Products</a></li>
                            <li><a href="{{ route('front.vendor', str_replace(' ', '-', $vendor->shop_name)) }}"
                                   class="themeBtn">Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="selerSearch">
                        <form>
                            <input type="text" placeholder="Search">
                            <a href="#"><i class="far fa-search"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="virtualPage realMarkt">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- <div class="storeBox">
                        <h2>STORE CATEGORIES</h2>
                        <ul>
                            <li><a href="#">ALL</a></li>
                            <li><a href="#">Used Books</a></li>
                            <li><a href="#">Toys</a></li>
                            <li><a href="#">Therapy Materials</a></li>
                            <li><a href="#">Stationary</a></li>
                            <li><a href="#">Much More</a></li>
                        </ul>
                    </div> -->
                    <div id="accordion">
                        <div class="card">
                            <div id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                        STORE CATEGORIES
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapsed" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                            <label for="vehicle1">ALL</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle2" name="vehicle2" value="Bike">
                                            <label for="vehicle2">Used Books</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle3" name="vehicle3" value="Bike">
                                            <label for="vehicle3">Toys</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle4" name="vehicle4" value="Bike">
                                            <label for="vehicle4">Therapy Materials</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle5" name="vehicle5" value="Bike">
                                            <label for="vehicle5">Stationary</label>
                                        </li>
                                    </ul>
                                    <a href="#" class="readMore">+ much more</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                        AGE
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapsed" aria-labelledby="headingTwo"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="vehicle6" name="vehicle6" value="Bike">
                                            <label for="vehicle6">0 – 3 months</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle7" name="vehicle7" value="Bike">
                                            <label for="vehicle7">3 – 6 months</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle8" name="vehicle8" value="Bike">
                                            <label for="vehicle8">6 – 12 months</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle9" name="vehicle9" value="Bike">
                                            <label for="vehicle9">12 – 18 months</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle10" name="vehicle10" value="Bike">
                                            <label for="vehicle10">18 – 24 months</label>
                                        </li>
                                    </ul>
                                    <a href="#" class="readMore">+ show more</a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                        PRICE
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapsed" aria-labelledby="headingThree"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="vehicle11" name="vehicle11" value="Bike">
                                            <label for="vehicle11">$0 - $20</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle12" name="vehicle12" value="Bike">
                                            <label for="vehicle12">$20 - $50</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle13" name="vehicle13" value="Bike">
                                            <label for="vehicle13">$50 - $100</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle14" name="vehicle14" value="Bike">
                                            <label for="vehicle14">$100 - $250</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle15" name="vehicle15" value="Bike">
                                            <label for="vehicle15">$250 - $1000</label>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                        LOCATIONS
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapsed" aria-labelledby="headingFour"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <div class="searchOne">
                                        <input type="text" placeholder="Search">
                                        <a href="#"><i class="far fa-search"></i></a>
                                    </div>
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="vehicle16" name="vehicle16" value="Bike">
                                            <label for="vehicle16">800 - Online Store</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle17" name="vehicle17" value="Bike">
                                            <label for="vehicle17">285 - South Edmonton</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle18" name="vehicle18" value="Bike">
                                            <label for="vehicle18">292 - Red Deer</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle19" name="vehicle19" value="Bike">
                                            <label for="vehicle19">321 - Kildonan</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle20" name="vehicle20" value="Bike">
                                            <label for="vehicle20">280 - Shawnessy</label>
                                        </li>
                                    </ul>
                                    <a href="#" class="readMore">+ show more</a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div id="headingFive">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseFive" aria-expanded="false"
                                            aria-controls="collapseFive">
                                        BRAND
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapsed" aria-labelledby="headingFive"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="vehicle21" name="vehicle21" value="Bike">
                                            <label for="vehicle21">$0 - $20</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle22" name="vehicle22" value="Bike">
                                            <label for="vehicle22">$20 - $50</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle23" name="vehicle23" value="Bike">
                                            <label for="vehicle23">$50 - $100</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle24" name="vehicle24" value="Bike">
                                            <label for="vehicle24">$100 - $250</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="vehicle25" name="vehicle25" value="Bike">
                                            <label for="vehicle25">$250 - $1000</label>
                                        </li>
                                    </ul>
                                    <a href="#" class="readMore">+ show more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-md-4">
                                <div class="proCard wow fadeInUp" data-wow-delay="0.75s">
                                    <a href="{{ route('front.product', $product->slug ?? '#') }}" class="imgWrap">
                                        <img
                                            src="{{ $product->thumbnail ? asset('assets/images/thumbnails/'.$product->thumbnail) : asset('assets/images/noimage.png') }}"
                                            alt="product">
                                    </a>
                                    <div class="content">
                                        <h3>{{ $product->showName() }}</h3>
                                        <a href="#">{{ $product->showPrice() }}</a>
                                        <span>
                                            @for($x = 1; $x < 6; $x++)
                                                <i class="fas fa-star"
                                                   style="color: {{ $product->ratings->avg('rating') >= $x ? '' : '#000' }}"></i>
                                            @endfor
                                            <small>{{ App\Models\Rating::ratingCount($product->id) }}</small>
                                        </span>
                                    </div>
                                    <div class="amzngSt">
                                        <img src="{{ $vendor->photo ? asset('assets/images/users/') . '/' . $vendor->photo : asset('assets/vendor/images/user.png') }}" class="img-fluid" alt="img">
                                        <a href="{{ route('front.vendor', str_replace(' ', '-', $vendor->shop_name)) }}"><h6>{{ $vendor->shop_name }}</h6></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <h1 class="text-center">No Products Found</h1>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
