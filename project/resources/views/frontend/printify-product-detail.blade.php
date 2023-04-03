@extends('layouts.front')

@section('content')
      {{--@includeIf('partials.global.common-header')--}}
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Product Details') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Product Details') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    {{--    Product Details--}}
    <div class="full-row pb-0">
        <div class="container">
            <div class="row single-product-wrapper">
                <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-images overflow-hidden">
                        <div class="images-inner">
                            <div
                                class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;">
                                <figure class="woocommerce-product-gallery__wrapper">
                                    <div class="bg-light">
                                        <img id="single-image-zoom"
                                             src="{{ filter_var($product->images[0]->src, FILTER_VALIDATE_URL) ? $product->images[0]->src : $product->images[0]->src }}"
                                             alt="Thumb Image"
                                             data-zoom-image="{{ filter_var($product->images[0]->src, FILTER_VALIDATE_URL) ? $product->images[0]->src : $product->images[0]->src }}"/>
                                    </div>

                                    <div id="gallery_09" class="product-slide-thumb">
                                        <div class="owl-carousel four-carousel dot-disable nav-arrow-middle owl-mx-5">
                                            @foreach($product->images as $gal)
                                                <div class="item">
                                                    <a class="active"
                                                       href="{{ $gal->src }}"
                                                       data-image="{{ $gal->src }}"
                                                       data-zoom-image="{{ $gal->src }}">
                                                        <img src="{{ $gal->src }}"
                                                             alt="Thumb Image"/>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5 col-md-8">
                    <div class="summary entry-summary">
                        <div class="summary-inner">
                            <div class="entry-breadcrumbs w-100">
                                <nav class="breadcrumb-divider-slash" aria-label="breadcrumb">
                                    <ol class="breadcrumb pro-bread">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('front.index')}}">{{__('Home')}}</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Printify</a>
                                        </li>
                                        {{--                                        @if($productt->subcategory_id != null)--}}
                                        {{--                                            <li class="breadcrumb-item">--}}
                                        {{--                                                <a href="{{ route('front.category',[$productt->category->slug, $productt->subcategory->slug]) }}">--}}
                                        {{--                                                    {{$productt->subcategory->name}}--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </li>--}}
                                        {{--                                        @endif--}}
                                        {{--                                        @if($productt->childcategory_id != null)--}}
                                        {{--                                            <li class="breadcrumb-item">--}}
                                        {{--                                                <a href="{{ route('front.category',[ $productt->category->slug,$productt->subcategory->slug,$productt->childcategory->slug]) }}">--}}
                                        {{--                                                    {{$productt->childcategory->name}}--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </li>--}}
                                        {{--                                        @endif--}}

                                    </ol>
                                </nav>
                            </div>
                            <h1 class="product_title entry-title">{{ $product->title }}</h1>
                            <div class="pro-details">
                                <div class="pro-info">
                                    {{--                                    <div class="woocommerce-product-rating">--}}
                                    {{--                                        <div class="fancy-star-rating">--}}
                                    {{--                                            <div class="rating-wrap"><span class="fancy-rating good">{{ App\Models\Rating::ratings($productt->id) }} ★</span>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <div class="rating-counts-wrap">--}}
                                    {{--                                                <a href="#reviews" class="bigbazar-rating-review-link" rel="nofollow"> <span--}}
                                    {{--                                                        class="rating-counts"> ({{ App\Models\Rating::ratingCount($productt->id) }}) </span>--}}
                                    {{--                                                </a>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    <p class="price">
                                        <span class="woocommerce-Price-amount amount mr-4">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol"
                                                      id="sizeprice">$ {{ $product->variants[0]->price / 100 }}</span>
                                            </bdi>
                                        </span>
                                        {{--                                        <del class="ml-3"><small>{{ $productt->showPreviousPrice() }}</small></del>--}}
                                        {{--                                 <span class="on-sale"><span>{{ round((int)$productt->offPercentage() )}}</span>% Off</span>--}}
                                        {{--                                        <span class="on-sale"><span>{{ round((int)$productt->offPercentage() )}}</span>% Off</span>--}}
                                    </p>

                                    {{--                                    @if($productt->type == 'Physical')--}}
                                    {{--                                        @if($productt->emptyStock())--}}
                                    {{--                                            <div class="stock-availability out-stock">{{ ('Out Of Stock') }}</div>--}}
                                    {{--                                        @else--}}
                                    {{--                                            <div--}}
                                    {{--                                                class="stock-availability in-stock text-bold">{{ $gs->show_stock == 0 ? '' : $productt->stock }} {{ ('In Stock') }}</div>--}}
                                    {{--                                        @endif--}}
                                    {{--                                    @endif--}}

                                    {{-- PRODUCT OTHER DETAILS SECTION --}}
                                    {{--                                    <div class="product-offers">--}}
                                    {{--                                        <ul class="product-offers-list">--}}
                                    {{--                                            @if($productt->ship != null)--}}
                                    {{--                                                <li class="product-offer-item"><span--}}
                                    {{--                                                        class="h6">{{ __('Estimated Shipping Time:') }}</span> {{ $productt->ship }}--}}
                                    {{--                                                </li>--}}
                                    {{--                                            @endif--}}
                                    {{--                                            @if( $productt->sku != null )--}}
                                    {{--                                                <li class="product-offer-item product-id{{ $productt->product_type == 'affiliate' ? 'mt-4' : '' }}">--}}
                                    {{--                                                    <span--}}
                                    {{--                                                        class="h6">{{ __('Product SKU:') }} </span> {{ $productt->sku }}--}}
                                    {{--                                                </li>--}}
                                    {{--                                            @endif--}}
                                    {{--                                            --}}{{-- PRODUCT LICENSE SECTION --}}
                                    {{--                                            @if($productt->type == 'License')--}}
                                    {{--                                                @if($productt->platform != null)--}}
                                    {{--                                                    <li class="product-offer-item license-id"><span--}}
                                    {{--                                                            class="h6">{{ __('Platform:') }}</span> {{ $productt->platform }}--}}
                                    {{--                                                    </li>--}}
                                    {{--                                                @endif--}}
                                    {{--                                                @if($productt->region != null)--}}
                                    {{--                                                    <li class="product-offer-item license-id"><span--}}
                                    {{--                                                            class="h6">{{ __('Region:') }}</span> {{ $productt->region }}--}}
                                    {{--                                                    </li>--}}
                                    {{--                                                @endif--}}
                                    {{--                                                @if($productt->licence_type != null)--}}
                                    {{--                                                    <li class="product-offer-item license-id"><span--}}
                                    {{--                                                            class="h6"> {{ __('License Type:') }}</span> {{ $productt->licence_type }}--}}
                                    {{--                                                    </li>--}}
                                    {{--                                                @endif--}}
                                    {{--                                            @endif--}}
                                    {{--                                            --}}{{-- PRODUCT LICENSE SECTION ENDS--}}
                                    {{--                                        </ul>--}}
                                    {{--                                    </div>--}}
                                </div>
                                {{-- PRODUCT OTHER DETAILS SECTION ENDS --}}
                            </div>
                            {{-- Product Option Section --}}
                            @forelse($product->options as $key => $option)
                                <div class="product-{{$option->type}}">
                                    <p class="title">{{ $option->name }} : </p>
                                    <ul class="{{ $option->type }}-list">
                                        @foreach($option->values as $key => $value)
                                            <li class="{{ $key == 0 ? 'active' : '' }} {{ $option->type == 'color' ? 'show-colors' : '' }}"
                                                data-key="{{ str_replace(' ', '', $value->id) }}">
                                                @if($option->type == 'color')
                                                    <span class="box" data-color="{{ $value->colors[0] }}"
                                                          style="background-color: {{ $value->colors[0] }}">
{{--                                                    <input type="hidden" class="size"--}}
{{--                                                           value="{{ $productt->size[$key] }}">--}}
{{--                                                    <input type="hidden" class="size_qty"--}}
{{--                                                           value="{{ $productt->size_qty[$key] }}">--}}
{{--                                                    <input type="hidden" class="size_key" value="{{$key}}">--}}
{{--                                                    <input type="hidden" class="size_price"--}}
{{--                                                           value="{{ round($productt->size_price[$key] * $curr->value,2) }}">--}}
                                                    </span>
                                                @else
                                                    <span class="box">{{ $value->title }}</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @empty
                            @endforelse
                            {{-- Product Option Section --}}
                        </div>
                        <div class="d-flex flex-wrap mt-3">
                            {{-- PRODUCT QUANTITY SECTION ENDS --}}
                            <ul>
                                <li class="addtocart m-1">
                                    <a href="javascript:;" id="addcrt">{{ __('Add to Cart')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    Product Details--}}

    <!--==================== Product Description Section Start ====================-->
    {{--    <div class="full-row">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row justify-content-between">--}}
    {{--                <div class="col-lg-8">--}}
    {{--                    <div class="section-head border-bottom">--}}
    {{--                        <div class="woocommerce-tabs wc-tabs-wrapper ps-0">--}}
    {{--                            <ul class="nav nav-pills wc-tabs" id="pills-tab-one" role="tablist">--}}
    {{--                                <li class="nav-item" role="presentation">--}}
    {{--                                    <a class="nav-link active" id="pills-description-one-tab" data-bs-toggle="pill"--}}
    {{--                                       href="#pills-description-one" role="tab" aria-controls="pills-description-one"--}}
    {{--                                       aria-selected="true">{{ __('Description') }}</a>--}}
    {{--                                </li>--}}
    {{--                                <li class="nav-item" role="presentation">--}}
    {{--                                    <a class="nav-link" id="pills-information-one-tab" data-bs-toggle="pill"--}}
    {{--                                       href="#pills-information-one" role="tab" aria-controls="pills-information-one"--}}
    {{--                                       aria-selected="true">{{ __('Buy / Return Policy') }}</a>--}}
    {{--                                </li>--}}
    {{--                                <li class="nav-item" role="presentation">--}}
    {{--                                    <a class="nav-link" id="pills-reviews-one-tab" data-bs-toggle="pill"--}}
    {{--                                       href="#pills-reviews-one" role="tab" aria-controls="pills-reviews-one"--}}
    {{--                                       aria-selected="true">{{ __('Reviews') }}</a>--}}
    {{--                                </li>--}}
    {{--                                @if($gs->is_comment == 1)--}}
    {{--                                    <li class="nav-item" role="presentation">--}}
    {{--                                        <a class="nav-link" id="pills-comment-one-tab" data-bs-toggle="pill"--}}
    {{--                                           href="#pills-comment-one" role="tab" aria-controls="pills-comment-one"--}}
    {{--                                           aria-selected="true">{{ __('Comments') }}</a>--}}
    {{--                                    </li>--}}
    {{--                                @endif--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="woocommerce-tabs wc-tabs-wrapper ps-0 mt-0">--}}
    {{--                        <div class="tab-content" id="pills-tabContent-one">--}}
    {{--                            <div--}}
    {{--                                class="tab-pane fade show active woocommerce-Tabs-panel woocommerce-Tabs-panel--description mb-5 mt-4"--}}
    {{--                                id="pills-description-one" role="tabpanel" aria-labelledby="pills-description-one-tab">--}}
    {{--                                {!! clean($productt->details , array('Attr.EnableID' => true)) !!}--}}
    {{--                            </div>--}}
    {{--                            <div class="tab-pane fade mb-5" id="pills-information-one" role="tabpanel"--}}
    {{--                                 aria-labelledby="pills-information-one-tab">--}}
    {{--                                <div class="row">--}}
    {{--                                    <div class="col-8">--}}
    {{--                                        {!! clean($productt->policy , array('Attr.EnableID' => true)) !!}--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            --}}{{-- Comment Section --}}
    {{--                            @if($gs->is_comment == 1)--}}
    {{--                                <div class="tab-pane fade" id="pills-comment-one" role="tabpanel"--}}
    {{--                                     aria-labelledby="pills-comment-one-tab">--}}
    {{--                                    @include('partials.product-details.comment-replies')--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                            <div class="tab-pane fade" id="pills-reviews-one" role="tabpanel"--}}
    {{--                                 aria-labelledby="pills-reviews-one-tab">--}}
    {{--                                @include('partials.product-details.reviews')--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            @if($productt->user_id != 0 && $productt->user->products->count() > 0)--}}
    {{--                <div class="col-lg-3">--}}

    {{--                    <div class="section-head border-bottom d-flex justify-content-between align-items-center">--}}
    {{--                        <div class="d-flex section-head-side-title">--}}
    {{--                            <h5 class="font-700 text-dark mb-0">{{ __("Seller's Product") }}</h5>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div--}}
    {{--                        class="product-style-2 owl-carousel owl-nav-hover-primary nav-top-right single-carousel dot-disable product-list e-bg-white">--}}

    {{--                        @foreach($productt->user->products->take(9)->chunk(3) as $chunk)--}}

    {{--                            <div class="item">--}}
    {{--                                <div class="row row-cols-1">--}}
    {{--                                    @foreach($chunk as $prod)--}}

    {{--                                        <div class="col mb-1">--}}
    {{--                                            <div class="product type-product">--}}
    {{--                                                <div class="product-wrapper">--}}
    {{--                                                    <div class="product-image">--}}
    {{--                                                        <a href="{{ route('front.product', $prod['slug']) }}"--}}
    {{--                                                           class="woocommerce-LoopProduct-link"><img class="lazy"--}}
    {{--                                                                                                     data-src="{{ $prod['photo'] ? asset('assets/images/products/'.$prod['photo'] ):asset('assets/images/noimage.png') }}"--}}
    {{--                                                                                                     alt="Product Image"></a>--}}
    {{--                                                        <div class="wishlist-view">--}}
    {{--                                                            <div class="quickview-button">--}}
    {{--                                                                <a class="quickview-btn"--}}
    {{--                                                                   href="{{ route('front.product', $prod['slug']) }}"--}}
    {{--                                                                   data-bs-toggle="tooltip" data-bs-placement="top"--}}
    {{--                                                                   title="" data-bs-original-title="Quick View"--}}
    {{--                                                                   aria-label="Quick View">{{ __('Quick View') }}</a>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="whishlist-button">--}}
    {{--                                                                <a class="add_to_wishlist" href="#"--}}
    {{--                                                                   data-bs-toggle="tooltip" data-bs-placement="top"--}}
    {{--                                                                   title="" data-bs-original-title="Add to Wishlist"--}}
    {{--                                                                   aria-label="Add to Wishlist">{{ __('Wishlist') }}</a>--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                    <div class="product-info">--}}
    {{--                                                        <h3 class="product-title"><a--}}
    {{--                                                                href="{{ route('front.product', $prod['slug']) }}">{{ App\Models\Product::whereId($prod['id'])->first()->showName() }}</a>--}}
    {{--                                                        </h3>--}}
    {{--                                                        <div class="product-price">--}}
    {{--                                                            <div class="price">--}}
    {{--                                                                <ins>{{ App\Models\Product::whereId($prod['id'])->first()->showPrice() }}</ins>--}}
    {{--                                                                <del>{{ App\Models\Product::whereId($prod['id'])->first()->showPreviousPrice() }}</del>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="on-sale">--}}
    {{--                                                                <span>{{ round((int)App\Models\Product::whereId($prod['id'])->first()->offPercentage())}}</span><span>% off</span>--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
    {{--                                                        <div class="shipping-feed-back">--}}
    {{--                                                            <div class="star-rating">--}}
    {{--                                                                <div class="rating-wrap">--}}
    {{--                                                                    <p>--}}
    {{--                                                                        <i class="fas fa-star"></i><span> {{ App\Models\Rating::ratings($prod['id']) }}</span>--}}
    {{--                                                                    </p>--}}
    {{--                                                                </div>--}}
    {{--                                                                <div class="rating-counts-wrap">--}}
    {{--                                                                    <p>--}}
    {{--                                                                        ({{ App\Models\Rating::ratingCount($prod['id']) }}--}}
    {{--                                                                        )</p>--}}
    {{--                                                                </div>--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    @endforeach--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        @endforeach--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    </div>--}}
    <!--==================== Product Description Section End ====================-->

    <!--==================== Related Products Section Start ====================-->
    {{--    <div class="full-row pt-0">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-12">--}}
    {{--                    <div class="section-head border-bottom d-flex justify-content-between align-items-end mb-2">--}}
    {{--                        <div class="d-flex section-head-side-title">--}}
    {{--                            <h4 class="font-600 text-dark mb-0">{{ __('Related Products') }}</h4>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-12">--}}
    {{--                    <div class="products product-style-1 owl-mx-5">--}}
    {{--                        <div--}}
    {{--                            class="five-carousel owl-carousel nav-top-right e-title-hover-primary e-image-bg-light e-hover-image-zoom e-info-center">--}}
    {{--                            @foreach (DB::table('products')->where('type',$productt->type)->where('product_type',$productt->product_type)->where('language_id',Session::has('language') ? Session::get('language') : 1)->take(12)->get() as $item)--}}
    {{--                                <div class="item">--}}
    {{--                                    <div class="product type-product">--}}
    {{--                                        <div class="product-wrapper">--}}
    {{--                                            <div class="product-image">--}}
    {{--                                                <a href="{{ route('front.product', $item->slug) }}"--}}
    {{--                                                   class="woocommerce-LoopProduct-link"><img class="lazy"--}}
    {{--                                                                                             data-src="{{ $item->photo ? asset('assets/images/products/'.$item->photo):asset('assets/images/noimage.png')}}"--}}
    {{--                                                                                             alt="Product Image"></a>--}}
    {{--                                                <div class="on-sale">--}}
    {{--                                                    -{{ round(App\Models\Product::find($item->id)->offPercentage()),2}}%--}}
    {{--                                                </div>--}}
    {{--                                                <div class="hover-area">--}}
    {{--                                                    @if($item->product_type == "affiliate")--}}
    {{--                                                        <div class="cart-button">--}}
    {{--                                                            <a href="javascript:;"--}}
    {{--                                                               data-href="{{ $item->affiliate_link }}"--}}
    {{--                                                               class="button add_to_cart_button affilate-btn"--}}
    {{--                                                               data-bs-toggle="tooltip" data-bs-placement="right"--}}
    {{--                                                               title="" data-bs-original-title="{{ __('Add To Cart') }}"--}}
    {{--                                                               aria-label="{{ __('Add To Cart') }}"></a>--}}
    {{--                                                        </div>--}}
    {{--                                                    @else--}}
    {{--                                                        @if(App\Models\Product::where('id',$item->id)->first()->emptyStock())--}}
    {{--                                                            <div class="closed">--}}
    {{--                                                                <a class="cart-out-of-stock button add_to_cart_button"--}}
    {{--                                                                   href="#" title="{{ __('Out Of Stock') }}"><i--}}
    {{--                                                                        class="flaticon-cancel flat-mini mx-auto"></i></a>--}}
    {{--                                                            </div>--}}
    {{--                                                        @else--}}
    {{--                                                            <div class="cart-button">--}}
    {{--                                                                <a href="javascript:;"--}}
    {{--                                                                   data-href="{{ route('product.cart.add',$item->id) }}"--}}
    {{--                                                                   class="add-cart button add_to_cart_button"--}}
    {{--                                                                   data-bs-toggle="tooltip" data-bs-placement="right"--}}
    {{--                                                                   title=""--}}
    {{--                                                                   data-bs-original-title="{{ __('Add To Cart') }}"--}}
    {{--                                                                   aria-label="{{ __('Add To Cart') }}"></a>--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="closed">--}}
    {{--                                                                <a class="button add_to_cart_button add-to-cart-quick"--}}
    {{--                                                                   href="javascript:;" data-bs-toggle="tooltip"--}}
    {{--                                                                   data-href="{{ route('product.cart.quickadd',$item->id) }}"--}}
    {{--                                                                   data-bs-placement="right" title="{{ __('Buy Now') }}"--}}
    {{--                                                                   data-bs-original-title="{{ __('Buy Now') }}"><i--}}
    {{--                                                                        class="flaticon-shopping-cart-1 flat-mini mx-auto"></i></a>--}}
    {{--                                                            </div>--}}
    {{--                                                        @endif--}}
    {{--                                                    @endif--}}
    {{--                                                    @if(Auth::check())--}}
    {{--                                                        <div class="wishlist-button">--}}
    {{--                                                            <a class="add_to_wishlist  new button add_to_cart_button"--}}
    {{--                                                               id="add-to-wish" href="javascript:;"--}}
    {{--                                                               data-href="{{ route('user-wishlist-add',$item->id) }}"--}}
    {{--                                                               data-bs-toggle="tooltip" data-bs-placement="right"--}}
    {{--                                                               title="" data-bs-original-title="Add to Wishlist"--}}
    {{--                                                               aria-label="Add to Wishlist">{{ __('Wishlist') }}</a>--}}
    {{--                                                        </div>--}}
    {{--                                                    @else--}}
    {{--                                                        <div class="wishlist-button">--}}
    {{--                                                            <a class="add_to_wishlist button add_to_cart_button"--}}
    {{--                                                               href="{{ route('user.login') }}" data-bs-toggle="tooltip"--}}
    {{--                                                               data-bs-placement="right" title=""--}}
    {{--                                                               data-bs-original-title="Add to Wishlist"--}}
    {{--                                                               aria-label="Add to Wishlist">{{ __('Wishlist') }}</a>--}}
    {{--                                                        </div>--}}
    {{--                                                    @endif--}}
    {{--                                                    <div class="compare-button">--}}
    {{--                                                        <a class="compare button add_to_cart_button"--}}
    {{--                                                           data-href="{{ route('product.compare.add',$item->id) }}"--}}
    {{--                                                           href="javascrit:;" data-bs-toggle="tooltip"--}}
    {{--                                                           data-bs-placement="right" title=""--}}
    {{--                                                           data-bs-original-title="Compare"--}}
    {{--                                                           aria-label="Compare">{{ __('Compare') }}</a>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="product-info">--}}
    {{--                                                <h3 class="product-title"><a--}}
    {{--                                                        href="{{ route('front.product', $item->slug) }}">{{ App\Models\Product::find($item->id)->showName()}}</a>--}}
    {{--                                                </h3>--}}
    {{--                                                <div class="product-price">--}}
    {{--                                                    <div class="price">--}}
    {{--                                                        <ins>{{ App\Models\Product::find($item->id)->showPrice()}}</ins>--}}
    {{--                                                        <del>{{ App\Models\Product::find($item->id)->showPreviousPrice() }}</del>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="shipping-feed-back">--}}
    {{--                                                    <div class="star-rating">--}}
    {{--                                                        <div class="rating-wrap">--}}
    {{--                                                            <p><i class="fas fa-star"></i><span> {{ App\Models\Rating::ratings($item->id) }} ({{ App\Models\Rating::ratingCount($item->id) }})</span>--}}
    {{--                                                            </p>--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @endforeach--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!--==================== Related Products Section End ====================-->

    {{--@includeIf('partials.global.common-footer')--}}
@endsection

@section('script')

    <script src="{{ asset('assets/front/js/jquery.elevatezoom.js') }}"></script>

    <!-- Initializing the slider -->


    <script type="text/javascript">
        lazy();
        var sizeArray = [];
        var colorArray = [];
        var variantPrice = new Array(2);

        (function ($) {
            "use strict";

            //initiate the plugin and pass the id of the div containing gallery images
            $("#single-image-zoom").elevateZoom({
                gallery: 'gallery_09',
                zoomType: "inner",
                cursor: "crosshair",
                galleryActiveClass: 'active',
                imageCrossfade: true,
                loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
            });
            //pass the images to Fancybox
            $("#single-image-zoom").bind("click", function (e) {
                var ez = $('#single-image-zoom').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                return false;
            });

            $(document).on("submit", "#emailreply", function () {
                var token = $(this).find('input[name=_token]').val();
                var subject = $(this).find('input[name=subject]').val();
                var message = $(this).find('textarea[name=message]').val();
                var email = $(this).find('input[name=email]').val();
                var name = $(this).find('input[name=name]').val();
                var user_id = $(this).find('input[name=user_id]').val();
                $('#eml').prop('disabled', true);
                $('#subj').prop('disabled', true);
                $('#msg').prop('disabled', true);
                $('#emlsub').prop('disabled', true);
                $.ajax({
                    type: 'post',
                    url: "{{URL::to('/user/user/contact')}}",
                    data: {
                        '_token': token,
                        'subject': subject,
                        'message': message,
                        'email': email,
                        'name': name,
                        'user_id': user_id
                    },
                    success: function (data) {
                        $('#eml').prop('disabled', false);
                        $('#subj').prop('disabled', false);
                        $('#msg').prop('disabled', false);
                        $('#subj').val('');
                        $('#msg').val('');
                        $('#emlsub').prop('disabled', false);
                        if (data == 0)
                            toastr.error("Email Not Found");
                        else
                            toastr.success("Message Sent");
                        $('#vendorform').modal('hide');
                    }
                });
                return false;
            });

            $(document).ready(function () {
                // Add product variants to respective array
                @foreach($product->options as $option)
                    @foreach($option->values as $value)
                    @if($option->type == 'size')
                    sizeArray['{{ $value->title }}'] = {{ $value->id }};
                @elseif($option->type == 'color')
                    colorArray['{{ $value->colors[0] }}'] = {{ $value->id }};
                @endif
                @endforeach
                @endforeach

                // Add prices for respective variant
                @foreach($product->variants as $variant)
                if (!variantPrice[{{ $variant->options[0] }}]) {
                    variantPrice[{{ $variant->options[0] }}] = [];
                }
                variantPrice[{{ $variant->options[0] }}][{{ $variant->options[1] }}] = {{ $variant->price }};
                @endforeach

                // Change active to size box
                $('.product-size .size-list .box').on('click', function () {
                    var parent = $(this).parent();
                    $('.product-size .size-list li').removeClass('active');
                    parent.addClass('active');

                    var selectedSize = $('.size-list .active').data('key');
                    var selectedColor = $('.color-list .active').data('key');

                    $('#sizeprice').html('$ ' + variantPrice[selectedSize][selectedColor] / 100);
                });

                // Change active to color box
                $('.product-color .color-list .box').on('click', function (e) {
                    e.preventDefault();
                    var parent = $(this).parent();
                    $('.product-size .color-list li').removeClass('active');
                    parent.addClass('active');
                })
            });

        })(jQuery);
    </script>
@endsection
