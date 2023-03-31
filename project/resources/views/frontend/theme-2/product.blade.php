@extends('layouts.theme-2.app')
@section('body-class', 'realItem')
@section('content')
    <!-- Begin: Main Slider -->
    <section class="marktSearch">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="">
                        <input type="text" placeholder="Search">
                        <input type="text" placeholder="Grade">
                        <input type="text" placeholder="Subject">
                        <input type="text" placeholder="Price">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Main Slider -->

    <section class="proDetail">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="slider slider-nav">
                        <div>
                            <div class="cell">
                                <img alt="" class="img-responsive"
                                     src="{{ asset('assets/images/products/' . $productt->photo) }}">
                            </div>
                        </div>
                        @foreach($productt->galleries as $gal)
                            <div>
                                <div class="cell">
                                    <img alt="" class="img-responsive"
                                         src="{{ asset('assets/images/galleries/' . $gal->photo) }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="prodtl-img">
                        <div class="slider slider-for">
                            <div>
                                <img alt="" class="img-responsive"
                                     src="{{ asset('assets/images/products/' . $productt->photo) }}">
                            </div>
                            @foreach($productt->galleries as $gal)
                                <div>
                                    <img alt="" class="img-responsive"
                                         src="{{ asset('assets/images/galleries/' . $gal->photo) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="dtlContent">
                        <h2>{{ $productt->name }}</h2>
                        <h3>{{ ($productt->type == 'Merchandise' ? $productt->previous_price . ' - ' : '') }}{{ $productt->showPrice() }}</h3>
                        {{--                        <h3>{{ $productt->price }}</h3>--}}
                        <h4>{{ $productt->category->name }}</h4>
                        <ul>
                            <li>
                                @for($x = 1; $x < 6 ; $x++)
                                    @if($x <= $productt->ratings->avg('rating'))
                                        <a href="#">
                                            <img src="{{ asset('assets/theme-2/images/badge.jpg') }}" class="img-fluid"
                                                 alt="img">
                                        </a>
                                    @else
                                        <a href="#">
                                            <img src="{{ asset('assets/theme-2/images/badge.jpg') }}" class="img-fluid"
                                                 alt="img" style="filter: grayscale(1);">
                                        </a>
                                    @endif
                                @endfor
                                <span>{{ \App\Models\Rating::ratingCount($productt->id) }} Ratings</span>
                            </li>
                        </ul>

                        @if ($productt->stock_check == 1)
                            {{-- Product Size Option--}}
                            @if(!empty($productt->size))
                                <div class="product-size">
                                    <p class="title">{{ __('Size :') }}</p>
                                    <ul class="siz-list">
                                        @foreach(array_unique($productt->size) as $key => $data1)
                                            <li class="{{ $loop->first ? 'active' : '' }}"
                                                data-key="{{ str_replace(' ','',$data1) }}">
                                                <span class="box">
                                                  {{ $data1 }}
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- PRODUCT COLOR SECTION  --}}
                            @if(!empty($productt->color))
                                <div class="product-color">
                                    <div class="title">{{ __('Color :') }}</div>
                                    <ul class="color-list">
                                        @foreach($productt->color as $key => $data1)
                                            <li class="{{ $loop->first ? 'active' : '' }} {{ $productt->IsSizeColor($productt->size[$key]) ? str_replace(' ','',$productt->size[$key]) : ''  }} {{ $productt->size[$key] == $productt->size[0] ? 'show-colors' : '' }}">
                                                <span class="box" data-color="{{ $productt->color[$key] }}"
                                                      style="background-color: {{ $productt->color[$key] }}; width: 20px; height: 20px; border-right: 10px;">

                                                  <input type="hidden" class="size" value="{{ $productt->size[$key] }}">
                                                  <input type="hidden" class="size_qty"
                                                         value="{{ $productt->size_qty[$key] }}">
                                                  <input type="hidden" class="size_key" value="{{$key}}">
                                                  <input type="hidden" class="size_price"
                                                         value="{{ round($productt->size_price[$key] * $curr->value,2) }}">

                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif
                            {{-- PRODUCT COLOR SECTION ENDS  --}}
                        @else
                            @if(!empty($productt->size_all))
                                <div class="product-size mb-2" data-key="false">
                                    <div class="title">{{ __('Size :') }}</div>
                                    <select name="size" id="size">
                                        @foreach(array_unique(explode(',',$productt->size_all)) as $key => $data1)
                                            <option value="{{ str_replace(' ','',$data1) }}">{{ $data1 }}</option>
                                            {{--                                            <input type="hidden" class="size" value="{{$data1}}">--}}
                                            {{--                                            <input type="hidden" class="size_key" value="{{$key}}">--}}
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            @if(!empty($productt->color_all))
                                <div class="product-color" data-key="false">
                                    <div class="title">{{ __('Color :') }}</div>
                                    <select name="color" id="color">
                                        @foreach(explode(',', $productt->color_all) as $key => $color1)
                                            <option value="{{ $color1 }}"
                                                    style="background-color: {{ $color1 }}">{{ $color1 }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        @endif

                        <input type="hidden" id="product_id" value="{{ $productt->id }}">

                        @if($productt->type != 'Merchandise')
                            <div class="quntity">
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input class="qttotal" type="text" id="order-qty" name="quantity[]"
                                           value="{{ $productt->minimum_qty == null ? '1' : (int)$productt->minimum_qty }}">
                                    <span class="plus">+</span>
                                    <input type="hidden" id="product_minimum_qty"
                                           value="{{ $productt->minimum_qty == null ? '0' : $productt->minimum_qty }}">
                                </div>
                                <a href="javascript:;" id="addcrt" class="themeBtn">Add To Cart</a>
                            </div>
                        @else
                            <form action="{{ route('front.merchandise.request', $productt->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="name">Customer Name*</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="email">Customer Email*</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="phone">Customer Number*</label>
                                        <input type="tel" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="description">Requirement Description*</label>
                                        <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="additional_note">Additional Notes*</label>
                                        <textarea name="additional_note" id="additional_note" class="form-control" rows="5">{{ old('additional_note') }}</textarea>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="images">Upload Images*</label>
                                        <input type="file" name="images[]" id="images" multiple>
                                    </div>
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $productt->id }}">
                                    <input type="submit" value="Submit" class="themeBtn">
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="descpSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="descpContent">
                        <h2>Description</h2>
                        {!! $productt->details !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="descpContent reviewContent">
                        <h2>Reviews</h2>
                        <div class="revewOne">
                            <ul id="stars">
                                @for($x = 1; $x < 6 ; $x++)
                                    @if($x <= $productt->ratings->avg('rating'))
                                        <li class='star' data-value='1'>
                                            <img src="{{ asset('assets/theme-2/images/badge.jpg') }}" class="img-fluid"
                                                 alt="img" style="filter: none">
                                        </li>
                                    @else
                                        <li class='star' data-value='1'>
                                            <img src="{{ asset('assets/theme-2/images/badge.jpg') }}" class="img-fluid"
                                                 alt="img">
                                        </li>
                                    @endif
                                @endfor
                            </ul>
                            <span>{{ round($productt->ratings->avg('rating'), 1) }}</span>
                        </div>
                        <p>Based on {{ \App\Models\Rating::ratingCount($productt->id) }} reviews</p>
                        <h6>Ratings</h6>
                    </div>
                    <div class="progresContent">
                        <ul>
                            @for($x = 5; $x > 0; $x--)
                                <li>
                                    <span>{{ $x }} stars</span>
                                    <div class="progress">
                                        <div class="progress-bar"
                                             style="width: {{ (count($productt->ratings->where('rating', $x)) > 0) ? $percentage = count($productt->ratings->where('rating', $x)) / count($productt->ratings) * 100 : 0 }}%"></div>
                                    </div>
                                    <span>{{ count($productt->ratings->where('rating', $x)) }}</span>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="descpContent reviewContent">
                        <h2 class="mb-5">Product Ratings and Reviews</h2>
                    </div>
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-end">
                        {!! $ratings->links() !!}
                    </div>
                    @forelse($ratings as $review)
                        <div class="reviewBox">
                            <figure style="width: 135px;">
                                <img
                                    src="{{ $review->user->photo ? asset('assets/images/users/'.$review->user->photo):asset('assets/images/'.$gs->user_image) }}"
                                    class="img-fluid" alt="img">
                            </figure>
                            <div class="reviewLst">
                                <h5>{{ $review->user->name }}</h5>
                                <p>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$review->review_date)->diffForHumans() }}</p>
                                <ul>
                                    <li>
                                        @for($x = 1; $x <= $review->rating; $x++)
                                            <img src="{{ asset('assets/theme-2/images/badge.jpg') }}" class="img-fluid"
                                                 alt="img">
                                        @endfor
                                    </li>
                                </ul>
                                <p>{!! $review->review !!}</p>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center">
                            <h3>No Reviews Found</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="moreSec">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="moreContent">
                        <figure>
                            <img
                                src="{{ $productt->user->shop_image ? asset('assets/images/shop/' . $review->user->photo) : asset('assets/images/'.$gs->user_image) }}"
                                class="img-fluid" alt="img">
                        </figure>
                        <h4>More from</h4>
                        <h5>{{ $productt->user->shop_name }}</h5>
                        <a href="#">See all resources</a>

                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        @forelse($vendors as $vendorsProduct)
                            <div class="col-md-3">
                                <div class="moreBox">
                                    <figure>
                                        <img src="{{ asset('assets/images/products/' . $vendorsProduct->photo) }}"
                                             class="img-fluid" alt="img">
                                    </figure>
                                    <p>{{ $vendorsProduct->showName() }}</p>
                                    <span>{{ $vendorsProduct->showPrice() }}</span>
                                    <ul>
                                        <li>
                                            @for($x = 1; $x <= $vendorsProduct->ratings->avg('rating'); $x++)
                                                <a href="#"><img src="{{ asset('assets/theme-2/images/badge.jpg') }}"
                                                                 alt="#"></a>
                                            @endfor
                                        </li>
                                        <li class="crt"><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center">
                                <h3>No Other product found for this vendor.</h3>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var mainurl = "<?php echo e(url('/')); ?>";
        var sizes = "";
        var size_qty = "";
        var size_price = "";
        var size_key = "";
        var colors = "";
        var keys = "";
        var values = "";
        var prices = "";

        // Add Product To Cart
        $(document).on("click", "#addcrt", function () {
            var qty = $(".qttotal").val() ? $(".qttotal").val() : 1;
            var pid = $("#product_id").val();
            var colors = $('select[name="color"]').find(":selected").text();
            var sizes = $('select[name="size"]').find(":selected").text();

            if ($(".product-attr").length > 0) {
                values = $(".product-attr:checked")
                    .map(function () {
                        return $(this).val();
                    })
                    .get();

                keys = $(".product-attr:checked")
                    .map(function () {
                        return $(this).data("key");
                    })
                    .get();

                prices = $(".product-attr:checked")
                    .map(function () {
                        return $(this).data("price");
                    })
                    .get();

                if (!isNaN(size_qty)) {
                    if (size_qty == "0") {
                        toastr.error(lang.cart_out);
                        return false;
                    }
                } else {
                    size_qty = null;
                }
            }

            $.ajax({
                type: "GET",
                url: mainurl + "/addnumcart",
                data: {
                    id: pid,
                    qty: qty,
                    size: sizes,
                    color: colors,
                    size_qty: size_qty,
                    size_price: size_price,
                    size_key: size_key,
                    keys: keys,
                    values: values,
                    prices: prices,
                },
                success: function (data) {
                    if (data == "digital") {
                        toastr.error("Already Added To Cart");
                    } else if (data == 0) {
                        toastr.error("Out Of Stock");
                    } else if (data[3]) {
                        toastr.error(lang.minimum_qty_error + " " + data[4]);
                    } else {
                        $("#cart-count").html(data[0]);
                        $("#cart-count1").html(data[0]);
                        $(".cart-popup").load(mainurl + "/carts/view");
                        $("#cart-items").load(mainurl + "/carts/view");
                        toastr.success("Successfully Added To Cart");
                    }
                },
            });
        });
    </script>
@endsection
