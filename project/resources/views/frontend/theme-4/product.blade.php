@extends('layouts.theme-4.app')
@section('content')



    <section class="prodetSec">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="main">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="mqSlider slider-for">
                                    <a href="#" data-slide="1">
                                        <div>
                                            <img src="{{asset('assets/theme-4/images/nt-3.png')}}" class="img-fluid w-100" alt="">
                                        </div>
                                    </a>
                                    <a href="#" data-slide="2">

                                        <div>
                                            <img src="{{asset('assets/theme-4/images/nt-3.png')}}" class="img-fluid w-100" alt="">
                                        </div>

                                    </a>
                                    <a href="#" data-slide="3">
                                        <div>
                                            <img src="{{asset('assets/theme-4/images/nt-3.png')}}" class="img-fluid w-100" alt="">
                                        </div>
                                    </a>


                                </div>
                            </div>
                        </div>
                        <div class="mqAction">
                            <div class="row m-0">
                                <div class="col-md-4 p-0">
                                    <a href="#" data-slide="1">
                                        <div class="slItems">
                                            <img src="{{asset('assets/theme-4/images/nt-3.png')}}" class="img-fluid " alt="">

                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4 p-0">
                                    <a href="#" data-slide="2">
                                        <div class="slItems">
                                            <img src="{{asset('assets/theme-4/images/nt-3.png')}}" class="img-fluid " alt="">

                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-4 p-0">
                                    <a href="#" data-slide="3">
                                        <div class="slItems">
                                            <img src="{{asset('assets/theme-4/images/nt-3.png')}}" class="img-fluid " alt="">

                                        </div>
                                    </a>
                                </div>

                            </div>




                        </div>




                    </div>
                </div>
                <div class="col-md-7">
                    <div class="proDetails">

                        <h1>Product 6</h1>
                        <h2>$54.00</h2>
                        <p>
                            Nice shirt in great condition!<br>
                            Shipping or local pickup is available<br>
                            posted on multiple sites
                        </p>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="quantity">
                                    <a href="#" class="quantity__minus"><span>-</span></a>
                                    <input name="quantity" type="text" class="quantity__input" value="1">
                                    <a href="#" class="quantity__plus"><span>+</span></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <a href="javascript:;" class="adcartBtn">Add to Cart <span><i
                                            class="fal fa-shopping-bag"></i></span></a>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3">
                                    <a href="javascript:;" class="getSupp">Get Suppot</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="javascript:;" class="adcartBtn-1">Add to Cart <span><i
                                            class="fal fa-heart"></i></span></a>
                            </div>
                            <div class="col-md-4">
                                <a href="javascript:;" class="adcartBtn-2">Share <span><i
                                            class="fal fa-share-alt"></i></span></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="catProduct">
                                    <h5>Categories</h5>
                                    <ul>
                                        <li><a href="javascript:;">Fashion,</a></li>
                                        <li><a href="javascript:;">Health & Beauty,</a></li>
                                        <li><a href="javascript:;">Home & Garden</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="prdTabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                                   role="tab" aria-controls="description" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab"
                                   aria-controls="shipping" aria-selected="false">Shipping</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                   aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vendor-tab" data-toggle="tab" href="#vendor" role="tab"
                                   aria-controls="vendor" aria-selected="false">Vendor Info</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="products-tab" data-toggle="tab" href="#products" role="tab"
                                   aria-controls="products" aria-selected="false">More Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="enquiry-tab" data-toggle="tab" href="#enquiry" role="tab"
                                   aria-controls="enquiry" aria-selected="false">Product Enquiry</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                 aria-labelledby="description-tab">
                                <p>
                                    Brand New with basket and cover. The wicker basket has a small dent on the bottom
                                    from shipping. Never used. Lightweight and all put together for you!
                                </p>
                            </div>
                            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">...
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <h1>Be The First To Review “Men’s Tall Large Ralph Lauren Polo (Teal/Turquise)”</h1>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <h4>Your rating <span><i class="far fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i><i class="far fa-star"></i><i
                                            class="far fa-star"></i></span></h4>
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Name *">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" placeholder="Email *">
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                  placeholder="Your Review *"></textarea>
                                    </div>
                                    <button type="submit" class="btn">Submit</button>
                                </form>
                                <div class="tabReview">
                                    <h2 class="sectionHeading">Reviews</h2>
                                    <p>There are no reviews yet.</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="assets/images/adminImg.png" class="img-fluid w-100" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="admCont">
                                            <a href="javascript:;">admin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                                <!-- <div class="row ml-3">
                                    <div class="col-md-3">
                                        <div class="featCard">
                                            <a href="javascript:;">
                                                <div class="featHead">
                                                    <figure>
                                                        <img src="assets/images/feat-1.png" class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                            </a>
                                            <div class="featBody"><a href="javascript:;">
                                                    <h4>(Pending) 44″ Ceiling Fan with LED Light (indoor/outdoor)</h4>
                                                    <h5>$50.00</h5>
                                                </a><a href="javascript:;" class="cartBtn"><i
                                                        class="fal fa-shopping-bag"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="featCard">
                                            <a href="javascript:;">
                                                <div class="featHead">
                                                    <figure>
                                                        <img src="assets/images/feat-1.png" class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                            </a>
                                            <div class="featBody"><a href="javascript:;">
                                                    <h4>(Pending) 44″ Ceiling Fan with LED Light (indoor/outdoor)</h4>
                                                    <h5>$50.00</h5>
                                                </a><a href="javascript:;" class="cartBtn"><i
                                                        class="fal fa-shopping-bag"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="featCard">
                                            <a href="javascript:;">
                                                <div class="featHead">
                                                    <figure>
                                                        <img src="assets/images/feat-1.png" class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                            </a>
                                            <div class="featBody"><a href="javascript:;">
                                                    <h4>(Pending) 44″ Ceiling Fan with LED Light (indoor/outdoor)</h4>
                                                    <h5>$50.00</h5>
                                                </a><a href="javascript:;" class="cartBtn"><i
                                                        class="fal fa-shopping-bag"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="featCard">
                                            <a href="javascript:;">
                                                <div class="featHead">
                                                    <figure>
                                                        <img src="assets/images/feat-1.png" class="img-fluid" alt="">
                                                    </figure>
                                                </div>
                                            </a>
                                            <div class="featBody"><a href="javascript:;">
                                                    <h4>(Pending) 44″ Ceiling Fan with LED Light (indoor/outdoor)</h4>
                                                    <h5>$50.00</h5>
                                                </a><a href="javascript:;" class="cartBtn"><i
                                                        class="fal fa-shopping-bag"></i></a>
                                            </div>

                                        </div>
                                    </div>

                                </div> -->

                                <section class="treSec treInner prDet">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="enSCard">
                                                    <div class="encHead">
                                                        <a href="product-shop.php"><img src="assets/images/nt-1.png"
                                                                                        class="img-fluid" alt=""></a>
                                                    </div>
                                                    <div class="adminDiv">
                                                        <ul>
                                                            <li><a href="javascript:;"><i
                                                                        class="fal fa-shopping-bag"></i></a></li>
                                                            <li><a href="javascript:;"><i class="fal fa-eye"></i></a>
                                                            </li>
                                                            <li><a href="javascript:;"><i class="fal fa-heart"></i></a>
                                                            </li>
                                                            <li><a href="javascript:;"><i
                                                                        class="far fa-chart-bar"></i></a></li>
                                                        </ul>
                                                        <a href="javascript:;">Admin</a>
                                                    </div>
                                                    <div class="encBody">
                                                        <a href="javascript:;">
                                                            <h4>Product 8</h4>
                                                        </a>
                                                        <div class="encbInner">
                                                            <h5>$ 54.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="enSCard">
                                                    <div class="encHead">
                                                        <a href="product-shop.php"><img src="assets/images/nt-2.png"
                                                                                        class="img-fluid" alt=""></a>
                                                    </div>
                                                    <div class="adminDiv">
                                                        <ul>
                                                            <li><a href="javascript:;"><i
                                                                        class="fal fa-shopping-bag"></i></a></li>
                                                            <li><a href="javascript:;"><i class="fal fa-eye"></i></a>
                                                            </li>
                                                            <li><a href="javascript:;"><i class="fal fa-heart"></i></a>
                                                            </li>
                                                            <li><a href="javascript:;"><i
                                                                        class="far fa-chart-bar"></i></a></li>
                                                        </ul>
                                                        <a href="javascript:;">Admin</a>
                                                    </div>
                                                    <div class="encBody">
                                                        <a href="javascript:;">
                                                            <h4>Product 8</h4>
                                                        </a>
                                                        <div class="encbInner">
                                                            <h5>$ 54.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="enSCard">
                                                    <div class="encHead">
                                                        <a href="product-shop.php"><img src="assets/images/nt-3.png"
                                                                                        class="img-fluid" alt=""></a>
                                                    </div>
                                                    <div class="adminDiv">
                                                        <ul>
                                                            <li><a href="javascript:;"><i
                                                                        class="fal fa-shopping-bag"></i></a></li>
                                                            <li><a href="javascript:;"><i class="fal fa-eye"></i></a>
                                                            </li>
                                                            <li><a href="javascript:;"><i class="fal fa-heart"></i></a>
                                                            </li>
                                                            <li><a href="javascript:;"><i
                                                                        class="far fa-chart-bar"></i></a></li>
                                                        </ul>
                                                        <a href="javascript:;">Admin</a>
                                                    </div>
                                                    <div class="encBody">
                                                        <a href="javascript:;">
                                                            <h4>Product 8</h4>
                                                        </a>
                                                        <div class="encbInner">
                                                            <h5>$ 54.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="enSCard">
                                                    <div class="encHead">
                                                        <a href="product-shop.php"><img src="assets/images/nt-4.png"
                                                                                        class="img-fluid" alt=""></a>
                                                    </div>
                                                    <div class="adminDiv">
                                                        <ul>
                                                            <li><a href="javascript:;"><i
                                                                        class="fal fa-shopping-bag"></i></a></li>
                                                            <li><a href="javascript:;"><i class="fal fa-eye"></i></a>
                                                            </li>
                                                            <li><a href="javascript:;"><i class="fal fa-heart"></i></a>
                                                            </li>
                                                            <li><a href="javascript:;"><i
                                                                        class="far fa-chart-bar"></i></a></li>
                                                        </ul>
                                                        <a href="javascript:;">Admin</a>
                                                    </div>
                                                    <div class="encBody">
                                                        <a href="javascript:;">
                                                            <h4>Product 8</h4>
                                                        </a>
                                                        <div class="encbInner">
                                                            <h5>$ 54.00</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane fade" id="enquiry" role="tabpanel" aria-labelledby="enquiry-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="enqCont">
                                            <h2 class="sectionHeading">Product Enquiry</h2>
                                            <form class="mt-5">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           id="exampleFormControlInput1" placeholder="Your Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control"
                                                           id="exampleFormControlInput1" placeholder="you@example.com">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                              placeholder="Details about your enquiry"></textarea>
                                                </div>
                                                <button type="submit" class="btn">Submit Enquiry</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="treSec treInner">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="enSCard">
                        <div class="encHead">
                            <a href="product-shop.php"><img src="assets/images/nt-1.png" class="img-fluid" alt=""></a>
                        </div>
                        <div class="adminDiv">
                            <ul>
                                <li><a href="javascript:;"><i class="fal fa-shopping-bag"></i></a></li>
                                <li><a href="javascript:;"><i class="fal fa-eye"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="fal fa-heart"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                            </ul>
                            <a href="javascript:;">Admin</a>
                        </div>
                        <div class="encBody">
                            <a href="javascript:;">
                                <h4>Product 8</h4>
                            </a>
                            <div class="encbInner">
                                <h5>$ 54.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="enSCard">
                        <div class="encHead">
                            <a href="product-shop.php"><img src="assets/images/nt-2.png" class="img-fluid" alt=""></a>
                        </div>
                        <div class="adminDiv">
                            <ul>
                                <li><a href="javascript:;"><i class="fal fa-shopping-bag"></i></a></li>
                                <li><a href="javascript:;"><i class="fal fa-eye"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="fal fa-heart"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                            </ul>
                            <a href="javascript:;">Admin</a>
                        </div>
                        <div class="encBody">
                            <a href="javascript:;">
                                <h4>Product 8</h4>
                            </a>
                            <div class="encbInner">
                                <h5>$ 54.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="enSCard">
                        <div class="encHead">
                            <a href="product-shop.php"><img src="assets/images/nt-3.png" class="img-fluid" alt=""></a>
                        </div>
                        <div class="adminDiv">
                            <ul>
                                <li><a href="javascript:;"><i class="fal fa-shopping-bag"></i></a></li>
                                <li><a href="javascript:;"><i class="fal fa-eye"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="fal fa-heart"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                            </ul>
                            <a href="javascript:;">Admin</a>
                        </div>
                        <div class="encBody">
                            <a href="javascript:;">
                                <h4>Product 8</h4>
                            </a>
                            <div class="encbInner">
                                <h5>$ 54.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="enSCard">
                        <div class="encHead">
                            <a href="product-shop.php"><img src="assets/images/nt-4.png" class="img-fluid" alt=""></a>
                        </div>
                        <div class="adminDiv">
                            <ul>
                                <li><a href="javascript:;"><i class="fal fa-shopping-bag"></i></a></li>
                                <li><a href="javascript:;"><i class="fal fa-eye"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="fal fa-heart"></i></a>
                                </li>
                                <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                            </ul>
                            <a href="javascript:;">Admin</a>
                        </div>
                        <div class="encBody">
                            <a href="javascript:;">
                                <h4>Product 8</h4>
                            </a>
                            <div class="encbInner">
                                <h5>$ 54.00</h5>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
