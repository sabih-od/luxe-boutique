@extends('layouts.front')

@section('content')
{{--    @includeIf('partials.global.common-header')--}}

    <!-- breadcrumb -->

    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Products') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Products') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="productsort-sec">
                        <div class="row">
                            <div class="col-lg-3">
                                <h2>Products</h2>
                            </div>
                            <div class="col-lg-9">
                                <div class="productsort-filter">
                                    <form action="" method="GET">
                                        <span>
                                            <h4>Filter By Price:</h4>
                                        </span>
                                        <span>
                                            <input type="text" placeholder="$00.00" name="min"
                                                   value="<?=isset($_GET['min']) ? $_GET['min'] : ''?>">
                                            <small>To</small>
                                            <input type="text" placeholder="$00.00" name="max"
                                                   value="<?=isset($_GET['max']) ? $_GET['max'] : ''?>">
                                        </span>
                                        <button class="filter-btn btn btn-primary mt-3 mb-4"
                                                type="submit">{{ __('Search') }}</button>

                                    </form>
                                    <div class="d-flex">
                                        <form method="GET" id="price_wise">
                                            <select name="sort" id="price_wise">
                                                <option value="date_desc">Latest Product</option>
                                                <option value="date_asc">Oldest Product</option>
                                                <option value="price_asc">Lowest Price</option>
                                                <option value="price_desc">Highest Price</option>

                                            </select>

                                        </form>
                                        {{--                                        <a href="#" class="latestpro">Latest Products</a>--}}
                                        <div id="btnContainer"></div>
                                        <button class="btn " onclick="gridView()">
                                            <i class="fas fa-th-large" id="grid-btn"></i>
                                        </button>
                                        <button class="btn active" onclick="listView()">
                                            <i class="fas fa-bars" id="list-btn"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="review-banner">
                                    <img src="{{asset("assets/images/banner01.jpg")}}" alt="">
                                    <div class="media">

                                        <img
                                            src="{{ $vendor->photo ? asset($vendor->photo):asset('assets/images/'.$gs->user_image) }}"
                                            class="mr-3" alt="...">

                                        {{--<img src="{{asset("assets/images/clientImg01.jpg")}}" class="mr-3" alt="...">--}}
                                        <div class="media-body">

                                            <h5 class="mt-0">{{$vendor->name}}</h5>

                                            {{--<h5 class="mt-0">Vendor</h5>--}}
                                            <p>100% Positive Seller Ratings</p>
                                            <span>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-12">
                            <div id="sidebar" class="widget-title-bordered-full">
                                <div class="dashbaord-sidebar-close d-xl-none">
                                    <i class="fas fa-times"></i>
                                </div>
                                <form id="catalogForm"
                                      action="{{ route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')]) }}"
                                      method="GET">

                                    <div id="woocommerce_product_categories-4"
                                         class="widget woocommerce widget_product_categories widget-toggle">
                                        <h2 class="widget-title">{{ __('Product categories') }}</h2>

                                        <ul class="product-categories">
                                            @foreach (App\Models\Category::where('language_id',$langg->id)->where('status',1)->where('name', '!=', 'Printify')->get() as $category)
                                                <li class="cat-item cat-parent">
                                                    <a href="{{route('front.category', $category->slug)}}"
                                                       class="category-link" id="cat">{{ $category->name }} <span class="count"></span></a>

                                                    @if($category->subs->count() > 0)
                                                        <span class="has-child"></span>
                                                        <ul class="children">
                                                            @foreach (App\Models\Subcategory::where('category_id',$category->id)->get() as $subcategory)
                                                                <li class="cat-item cat-parent">
                                                                    <a href="{{route('front.category', [$category->slug, $subcategory->slug])}}"
                                                                       class="category-link {{ isset($subcat) ? ($subcat->id == $subcategory->id ? 'active' : '') : '' }}">{{$subcategory->name}}
                                                                        <span class="count"></span></a>


                                                                    @if($subcategory->childs->count()!=0)
                                                                        <span class="has-child"></span>
                                                                        <ul class="children">
                                                                            @foreach (DB::table('childcategories')->where('subcategory_id',$subcategory->id)->get() as $key => $childelement)
                                                                                <li class="cat-item ">
                                                                                    <a href="{{route('front.category', [$category->slug, $subcategory->slug, $childelement->slug])}}"
                                                                                       class="category-link {{ isset($childcat) ? ($childcat->id == $childelement->id ? 'active' : '') : '' }}"> {{$childelement->name}}
                                                                                        <span class="count"></span></a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>

                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>

{{--                                    <div id="bigbazar-price-filter-list-1"--}}
{{--                                         class="widget bigbazar_widget_price_filter_list widget_layered_nav widget-toggle mx-3">--}}
{{--                                        <h2 class="widget-title">{{ __('Filter by Price') }}</h2>--}}
{{--                                        <ul class="price-filter-list">--}}
{{--                                            <div class="price-range-block">--}}
{{--                                                <div id="slider-range" class="price-filter-range" name="rangeInput"></div>--}}
{{--                                                <div class="livecount">--}}
{{--                                                    $ <input type="number" name="min" oninput="" id="min_price" class="price-range-field"/>--}}
{{--                                                    <span>--}}
{{--                            {{ __('To') }}--}}
{{--                        </span>--}}
{{--                                                    $ <input type="number" name="max" oninput="" id="max_price" class="price-range-field"/>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <button class="filter-btn btn btn-primary mt-3 mb-4" type="submit">{{ __('Search') }}</button>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}

                                </form>


                                {{--        @if ((!empty($cat) && !empty(json_decode($cat->attributes, true))) || (!empty($subcat) && !empty(json_decode($subcat->attributes, true))) || (!empty($childcat) && !empty(json_decode($childcat->attributes, true))))--}}
                                {{--            <form id="attrForm"--}}
                                {{--                  action="{{ route('front.category',[Request::route('category'),Request::route('subcategory'),Request::route('childcategory')]) }}"--}}
                                {{--                  method="post">--}}

                                {{--                @if (!empty($cat) && !empty(json_decode($cat->attributes, true)))--}}
                                {{--                    @foreach ($cat->attributes as $key => $attr)--}}

                                {{--                        <div id="bigbazar-attributes-filter-{{$attr->name}}"--}}
                                {{--                             class="widget woocommerce bigbazar-attributes-filter widget_layered_nav widget-toggle">--}}
                                {{--                            <h2 class="widget-title">{{$attr->name}}</h2>--}}
                                {{--                            <ul class="swatch-filter-pa_color">--}}
                                {{--                                @if (!empty($attr->attribute_options))--}}
                                {{--                                    @foreach ($attr->attribute_options as $key => $option)--}}
                                {{--                                        <div class="form-check ml-0 pl-0">--}}
                                {{--                                            <input name="{{$attr->input_name}}[]"--}}
                                {{--                                                   class="form-check-input attribute-input" type="checkbox"--}}
                                {{--                                                   id="{{$attr->input_name}}{{$option->id}}" value="{{$option->name}}">--}}
                                {{--                                            <label class="form-check-label"--}}
                                {{--                                                   for="{{$attr->input_name}}{{$option->id}}">{{$option->name}}</label>--}}
                                {{--                                        </div>--}}
                                {{--                                    @endforeach--}}
                                {{--                                @endif--}}
                                {{--                            </ul>--}}
                                {{--                        </div>--}}
                                {{--                    @endforeach--}}
                                {{--                @endif--}}

                                {{--                @if (!empty($subcat) && !empty(json_decode($subcat->attributes, true)))--}}
                                {{--                    @foreach ($subcat->attributes as $key => $attr)--}}
                                {{--                        <div id="bigbazar-attributes-filter-{{$attr->name}}"--}}
                                {{--                             class="widget woocommerce bigbazar-attributes-filter widget_layered_nav widget-toggle">--}}
                                {{--                            <h2 class="widget-title">{{$attr->name}}</h2>--}}
                                {{--                            <ul class="swatch-filter-pa_color">--}}
                                {{--                                @if (!empty($attr->attribute_options))--}}
                                {{--                                    @foreach ($attr->attribute_options as $key => $option)--}}
                                {{--                                        <div class="form-check ml-0 pl-0">--}}
                                {{--                                            <input name="{{$attr->input_name}}[]"--}}
                                {{--                                                   class="form-check-input attribute-input" type="checkbox"--}}
                                {{--                                                   id="{{$attr->input_name}}{{$option->id}}" value="{{$option->name}}">--}}
                                {{--                                            <label class="form-check-label"--}}
                                {{--                                                   for="{{$attr->input_name}}{{$option->id}}">{{$option->name}}</label>--}}
                                {{--                                        </div>--}}
                                {{--                                    @endforeach--}}
                                {{--                                @endif--}}
                                {{--                            </ul>--}}
                                {{--                        </div>--}}
                                {{--                    @endforeach--}}
                                {{--                @endif--}}

                                {{--                @if (!empty($childcat) && !empty(json_decode($childcat->attributes, true)))--}}
                                {{--                    @foreach ($childcat->attributes as $key => $attr)--}}
                                {{--                        <div id="bigbazar-attributes-filter-{{$attr->name}}"--}}
                                {{--                             class="widget woocommerce bigbazar-attributes-filter widget_layered_nav widget-toggle px-3">--}}
                                {{--                            <h2 class="widget-title">{{$attr->name}}</h2>--}}
                                {{--                            <ul class="swatch-filter-pa_color">--}}
                                {{--                                @if (!empty($attr->attribute_options))--}}
                                {{--                                    @foreach ($attr->attribute_options as $key => $option)--}}
                                {{--                                        <div class="form-check ml-0 pl-0">--}}
                                {{--                                            <input name="{{$attr->input_name}}[]"--}}
                                {{--                                                   class="form-check-input attribute-input" type="checkbox"--}}
                                {{--                                                   id="{{$attr->input_name}}{{$option->id}}" value="{{$option->name}}">--}}
                                {{--                                            <label class="form-check-label"--}}
                                {{--                                                   for="{{$attr->input_name}}{{$option->id}}">{{$option->name}}</label>--}}
                                {{--                                        </div>--}}
                                {{--                                    @endforeach--}}
                                {{--                                @endif--}}
                                {{--                            </ul>--}}
                                {{--                        </div>--}}
                                {{--                    @endforeach--}}
                                {{--                @endif--}}
                                {{--            </form>--}}
                                {{--        @endif--}}
                                <div class="row mx-0">
{{--                                    <div class="col-12">--}}
{{--                                        <div class="section-head border-bottom d-flex justify-content-between align-items-center">--}}
{{--                                            <div class="d-flex section-head-side-title">--}}
{{--                                                <h5 class="font-700 text-dark mb-0">{{ __('Recent Product') }}</h5>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-12">
                                        <div
                                            class="product-style-2 owl-carousel owl-nav-hover-primary nav-top-right single-carousel dot-disable product-list e-bg-white">

                                            {{--                    @foreach (array_chunk($latest_products->toArray(),3) as $item)--}}
                                            {{--                        <div class="item">--}}
                                            {{--                            <div class="row row-cols-1">--}}
                                            {{--                                @foreach ($item as $prod)--}}
                                            {{--                                    <div class="col mb-1">--}}
                                            {{--                                        <div class="product type-product">--}}
                                            {{--                                            <div class="product-wrapper">--}}
                                            {{--                                                <div class="product-image">--}}
                                            {{--                                                    <a href="{{ route('front.product', $prod['slug']) }}"--}}
                                            {{--                                                       class="woocommerce-LoopProduct-link"><img class="lazy"--}}
                                            {{--                                                                                                 data-src="{{ $prod['thumbnail'] ? asset('assets/images/thumbnails/'.$prod['thumbnail'] ):asset('assets/images/noimage.png') }}"--}}
                                            {{--                                                                                                 alt="Product Image"></a>--}}
                                            {{--                                                    <div class="wishlist-view">--}}
                                            {{--                                                        <div class="quickview-button">--}}
                                            {{--                                                            <a class="quickview-btn"--}}
                                            {{--                                                               href="{{ route('front.product', $prod['slug']) }}"--}}
                                            {{--                                                               data-bs-toggle="tooltip" data-bs-placement="top" title=""--}}
                                            {{--                                                               data-bs-original-title="Quick View"--}}
                                            {{--                                                               aria-label="Quick View">{{ __('Quick View') }}</a>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                        <div class="whishlist-button">--}}
                                            {{--                                                            <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip"--}}
                                            {{--                                                               data-bs-placement="top" title=""--}}
                                            {{--                                                               data-bs-original-title="Add to Wishlist"--}}
                                            {{--                                                               aria-label="Add to Wishlist">{{ __('Wishlist') }}</a>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div class="product-info">--}}
                                            {{--                                                    <h3 class="product-title"><a--}}
                                            {{--                                                            href="{{ route('front.product', $prod['slug']) }}">{{ App\Models\Product::whereId($prod['id'])->first()->showName() }}</a>--}}
                                            {{--                                                    </h3>--}}
                                            {{--                                                    <div class="product-price">--}}
                                            {{--                                                        <div class="price">--}}
                                            {{--                                                            <ins>{{ App\Models\Product::whereId($prod['id'])->first()->showPrice() }}</ins>--}}
                                            {{--                                                            <del>{{ App\Models\Product::whereId($prod['id'])->first()->showPreviousPrice() }}</del>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                        <div class="on-sale">--}}
                                            {{--                                                            <span>{{ round(App\Models\Product::whereId($prod['id'])->first()->offPercentage())}}</span><span>% off</span>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                    <div class="shipping-feed-back">--}}
                                            {{--                                                        <div class="star-rating">--}}
                                            {{--                                                            <div class="rating-wrap">--}}
                                            {{--                                                                <p>--}}
                                            {{--                                                                    <i class="fas fa-star"></i><span> {{ App\Models\Rating::ratings($prod['id']) }}</span>--}}
                                            {{--                                                                </p>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                            <div class="rating-counts-wrap">--}}
                                            {{--                                                                <p>({{ App\Models\Rating::ratingCount($prod['id']) }}--}}
                                            {{--                                                                    )</p>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}
                                            {{--                                    </div>--}}
                                            {{--                                @endforeach--}}
                                            {{--                            </div>--}}
                                            {{--                        </div>--}}
                                            {{--                    @endforeach--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-9 col-12">
                            <div class="row justify-content-center productRows">

                                @forelse($vendor_product as $vendor_products)

                                    <div class="col-lg-4 list-group">
                                        <div class="product-item">
                                            <a href="{{ route('front.product', $vendor_products->slug ?? '#') }}">
                                                <figure>
                                                    <img
                                                        src="{{asset('assets/images/products/'.$vendor_products->photo) }}"
                                                        alt="Thumb Image"/>

                                                </figure>
                                                <article>

                                                    <h5>{{$vendor_products->showPrice()}}
                                                        <del
                                                            style="font-size: 17px;">{{$vendor_products->showPreviousPrice()}}</del>
                                                    </h5>

                                                    <p>{{$vendor_products->name}}</p>
                                                </article>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    Vendor Product Not Found
                                @endforelse

                            </div>

                            <div class="d-flex justify-content-center align-items-center pt-3" id="custom-pagination">
                                <div class="pagination-style-one">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">

                                            {{ $vendor_product->appends(request()->query())->links()}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3">
                    <div class="selling-products">
                        <div class="categories-list">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading17">
                                        <h4 class="panel-title">
                                            <button role="button" data-bs-toggle="collapse" data-parent="#accordion"
                                                    data-bs-target="#collapse17" aria-expanded="true" aria-controls="collapse17"
                                                    class="collapsed">
                                                <i class="more-less glyphicon fas fa-chevron-down"></i>
                                                <span>To Selling Product </span>
                                            </button>
                                        </h4>
                                    </div>
                                    <div id="collapse17" class="panel-collapse collapse show" role="tabpanel"
                                         aria-labelledby="heading17" style="">
                                        <div class="panel-body">
                                            {{--                                            @dd($top_selling_product->take(9)->chunk(3));--}}

                                            @forelse($top_selling_product as $chunk)
                                                <div class="media mt-4">
                                                    <img src=" {{ str_contains($chunk['photo'], 'https://images-api.printify.com')
                                                  ? $chunk['photo']
                                                  : asset('assets/images/products/'.$chunk['photo']) }}
                                                        " class="mr-3" style="width:40%;margin-right: 20px;" alt="...">
                                                    {{--                                                    <img src="{{asset("assets/images/sellingproducts/selling01.png")}}"--}}
                                                    {{--                                                         class="mr-3" alt="...">--}}
                                                    <div class="media-body">
                                                        {{--                                                    <p>Physical Product Title <br>--}}
                                                        {{--                                                        Title will Be</p>--}}
                                                        {{--                                                    <h5 class="mt-0">$13</h5>--}}
                                                        <p>{{$chunk->name}}</p>
                                                        <h5 class="mt-0">{{$chunk->showPrice()}}</h5>
                                                    </div>
                                                </div>

                                            @empty
                                                <p>Not Found Top Selling Product</p>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading17">
                                        <h4 class="panel-title">
                                            <button role="button" data-bs-toggle="collapse" data-parent="#accordion"
                                                    data-bs-target="#collapse18" aria-expanded="true" aria-controls="collapse18"
                                                    class="collapsed">
                                                <i class="more-less glyphicon fas fa-chevron-down"></i>
                                                <span>Recent Product</span>
                                            </button>
                                        </h4>
                                    </div>
                                    <div id="collapse18" class="panel-collapse collapse show" role="tabpanel"
                                         aria-labelledby="heading18">
                                        <div class="panel-body">
                                            @forelse($recent_vendor_product as $recent_product)


                                                <div class="media mt-4">
                                                    <img src="{{ str_contains($recent_product['photo'], 'https://images-api.printify.com')
                                                  ? $chunk['photo']
                                                  : asset('assets/images/products/'.$recent_product['photo']) }}" class="mr-3" style="width:40%;margin-right: 20px;"alt="...">
                                                    {{--                                                    <img src="{{asset("assets/images/sellingproducts/selling01.png")}}"--}}
                                                    {{--                                                         class="mr-3" alt="...">--}}
                                                    <div class="media-body">
                                                        <p>{{$recent_product->name}}</p>

                                                        <h5 class="mt-0">{{$recent_product->showPrice()}}</h5>
                                                        {{--                                                    <p>Physical Product Title <br>--}}
                                                        {{--                                                        Title will Be</p>--}}
                                                        {{--                                                    <h5 class="mt-0">$13</h5>--}}
                                                    </div>
                                                </div>
                                            @empty
                                                <p>Not Found Recent Product</p>
                                            @endforelse

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="selling-products review-list mt-5">
                        <div class="categories-list">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading19">
                                        <h4 class="panel-title">
                                            <button role="button" data-bs-toggle="collapse" data-parent="#accordion"
                                                    data-bs-target="#collapse19" aria-expanded="true" aria-controls="collapse19"
                                                    class="">
                                                <i class="more-less glyphicon fas fa-chevron-down"></i>
                                                <span>To Selling Product </span>
                                            </button>
                                        </h4>
                                    </div>
                                    <div id="collapse19" class="panel-collapse collapse show" role="tabpanel"
                                         aria-labelledby="heading19">
                                        <div class="panel-body">
                                            <div class="media mt-4">
                                                <img src="{{asset("assets/images/sellingproducts/review01.png")}}"
                                                     class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h5>Vendor</h5>
                                                    <p>100% Positive Seller Ratings</p>
                                                    <span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <img src="{{asset("assets/images/sellingproducts/review02.png")}}"
                                                     class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h5>Vendor</h5>
                                                    <p>100% Positive Seller Ratings</p>
                                                    <span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="media mt-4">
                                                <img src="{{asset("assets/images/sellingproducts/review03.png")}}"
                                                     class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <div class="media-body">
                                                        <h5>Vendor</h5>
                                                        <p>100% Positive Seller Ratings</p>
                                                        <span>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
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
    {{--@includeIf('partials.global.common-footer')--}}
@endsection

@section('script')
    <script>
        // grid or list show
        // Get the elements with class="column"

        // Declare a loop variable
        var i;

        // List View
        function listView() {
            let elements = document.querySelectorAll(".list-group");
            elements.forEach((e) => {
                $(e).removeAttr('class');
                $(e).attr('class', 'col-md-10 list-group');
            })
            // for (i = 0; i < elements.length; i++) {
            //     elements[i].removeClass();
            //     elements[i].removeAttr('class');
            //     elements[i].attr('class', 'col-md-6');
            //     // $('#item')[0].className = '';
            //     // elements[i].addClass('col-md-6');
            // }
        }

        // Grid View
        function gridView() {
            let elements = document.querySelectorAll(".list-group");
            elements.forEach((e) => {
                $(e).removeAttr('class');
                $(e).attr('class', 'col-md-4 list-group');
            })
        }

        /* Optional: Add active class to the current button (highlight it) */
        var container = document.getElementById("btnContainer");
        var btns = container.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }

        let check_view = '';
        $(document).on('click', '.check_view', function () {
            check_view = $(this).attr('data-shopview');
            filter();

        });


        // when dynamic attribute changes
        $(".attribute-input, #sortby, #pageby").on('change', function () {
            $(".ajax-loader").show();
            filter();
        });


        function filter() {
            let filterlink = '';

            if ($("#prod_name").val() != '') {
                if (filterlink == '') {
                    filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?search=' + $("#prod_name").val();
                } else {
                    filterlink += '&search=' + $("#prod_name").val();
                }
            }


            $(".attribute-input").each(function () {
                if ($(this).is(':checked')) {

                    if (filterlink == '') {
                        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $(this).attr('name') + '=' + $(this).val();
                    } else {
                        filterlink += '&' + encodeURI($(this).attr('name')) + '=' + $(this).val();

                    }
                }
            });

            if ($("#sortby").val() != '') {
                if (filterlink == '') {
                    filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $("#sortby").attr('name') + '=' + $("#sortby").val();
                } else {
                    filterlink += '&' + $("#sortby").attr('name') + '=' + $("#sortby").val();
                }
            }


            if ($("#min_price").val() != '') {
                if (filterlink == '') {
                    filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $("#min_price").attr('name') + '=' + $("#min_price").val();
                } else {
                    filterlink += '&' + $("#min_price").attr('name') + '=' + $("#min_price").val();
                }
            }

            if ($("#max_price").val() != '') {
                if (filterlink == '') {
                    filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $("#max_price").attr('name') + '=' + $("#max_price").val();
                } else {
                    filterlink += '&' + $("#max_price").attr('name') + '=' + $("#max_price").val();
                }
            }


            if ($("#pageby").val() != '') {
                if (filterlink == '') {
                    filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $("#pageby").attr('name') + '=' + $("#pageby").val();
                } else {
                    filterlink += '&' + $("#pageby").attr('name') + '=' + $("#pageby").val();
                }
            }

            if (check_view) {

                filterlink += '&view_check=' + check_view;
            }
            $("#ajaxContent").load(encodeURI(filterlink), function (data) {
                // add query string to pagination
                addToPagination();
                $(".ajax-loader").fadeOut(1000);
            });
        }

        //   append parameters to pagination links
        function addToPagination() {


            // add to attributes in pagination links
            $('ul.pagination li a').each(function () {
                let url = $(this).attr('href');
                let queryString = '?' + url.split('?')[1]; // "?page=1234...."

                let urlParams = new URLSearchParams(queryString);
                let page = urlParams.get('page'); // value of 'page' parameter

                let fullUrl = '{{route('front.category', [Request::route('category'),Request::route('subcategory'),Request::route('childcategory')])}}?page=' + page + '&search=' + '{{urlencode(request()->input('search'))}}';

                $(".attribute-input").each(function () {
                    if ($(this).is(':checked')) {
                        fullUrl += '&' + encodeURI($(this).attr('name')) + '=' + encodeURI($(this).val());
                    }
                });

                if ($("#sortby").val() != '') {
                    fullUrl += '&sort=' + encodeURI($("#sortby").val());
                }

                if ($("#min_price").val() != '') {
                    fullUrl += '&min=' + encodeURI($("#min_price").val());
                }

                if ($("#max_price").val() != '') {
                    fullUrl += '&max=' + encodeURI($("#max_price").val());
                }

                if ($("#pageby").val() != '') {
                    fullUrl += '&pageby=' + encodeURI($("#pageby").val());
                }


                $(this).attr('href', fullUrl);
            });
        }

    </script>

    <script type="text/javascript">

        (function ($) {
            "use strict";

            $(function () {
                $("#slider-range").slider({
                    range: true,
                    orientation: "horizontal",
                    min: {{ $gs->min_price }},
                    max: {{ $gs->max_price }},
                    values: [{{ isset($_GET['min']) ? $_GET['min'] : $gs->min_price }}, {{ isset($_GET['max']) ? $_GET['max'] : $gs->max_price }}],
                    step: 1,

                    slide: function (event, ui) {
                        if (ui.values[0] == ui.values[1]) {
                            return false;
                        }

                        $("#min_price").val(ui.values[0]);
                        $("#max_price").val(ui.values[1]);
                    }
                });

                $("#min_price").val($("#slider-range").slider("values", 0));
                $("#max_price").val($("#slider-range").slider("values", 1));

            });

        })(jQuery);

    </script>


    <script>
        $(document).on('change', '#price_wise', function () {
            $(this).parents('form:first').submit();
        });
    </script>
@endsection


