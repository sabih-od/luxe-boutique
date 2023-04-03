@extends('layouts.front')
@section('content')
    @includeIf('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Printify Products') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Printify Products') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    {{-- There are two product page. you have to give condition here --}}
    <div class="full-row">
        <div class="container">
            <div class="row">
                @includeIf('partials.catalog.catalog')
                <div class="col-xl-9">
                    <div class="mb-4 d-xl-none">
                        <button class="dashboard-sidebar-btn btn bg-primary rounded">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    @includeIf('frontend.category')
                    <div class="showing-products pt-30 pb-50 border-2 border-bottom border-light" id="ajaxContent">
                        <div
                            class="row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1 product-style-1 e-title-hover-primary e-image-bg-light e-hover-image-zoom e-info-center">
                            @foreach(json_decode($printifyProducts)->data as $product)
                                <div class="col">
                                    <div class="product type-product">
                                        <div class="product-wrapper">
                                            <div class="product-image">
                                                <a href="{{ route('front.printify.product.details', $product->id ?? '#') }}"
                                                   class="woocommerce-LoopProduct-link">
                                                    <img class="lazy"
                                                         data-src="{{ $product->images ? $product->images[0]->src : asset   ('assets/images/noimage.png') }}"
                                                         alt="Product Image">
                                                </a>
{{--                                                @if (round($product->offPercentage() )>0)--}}
{{--                                                    <div class="on-sale">- {{ round($product->offPercentage() )}}%</div>--}}
{{--                                                @endif--}}
{{--                                                <div class="hover-area">--}}
{{--                                                    @if($product->product_type == "affiliate")--}}
{{--                                                        <div class="cart-button buynow">--}}
{{--                                                            <a class="add-to-cart-quick button add_to_cart_button"--}}
{{--                                                               href="javascript:;"--}}
{{--                                                               data-href="{{ route('product.cart.quickadd',$product->id) }}"--}}
{{--                                                               data-bs-toggle="tooltip" data-bs-placement="right"--}}
{{--                                                               title=""--}}
{{--                                                               data-bs-original-title="{{ __('Buy Now') }}"--}}
{{--                                                               aria-label="{{ __('Buy Now') }}"></a>--}}
{{--                                                        </div>--}}
{{--                                                    @else--}}
{{--                                                        @if($product->emptyStock())--}}
{{--                                                            <div class="closed">--}}
{{--                                                                <a class="cart-out-of-stock button add_to_cart_button"--}}
{{--                                                                   href="#"--}}
{{--                                                                   title="{{ __('Out Of Stock') }}"><i--}}
{{--                                                                        class="flaticon-cancel flat-mini mx-auto"></i></a>--}}
{{--                                                            </div>--}}
{{--                                                        @else--}}
{{--                                                            <div class="cart-button">--}}
{{--                                                                <a href="javascript:;"--}}
{{--                                                                   data-href="{{ route('product.cart.add',$product->id) }}"--}}
{{--                                                                   class="add-cart button add_to_cart_button"--}}
{{--                                                                   data-bs-toggle="tooltip"--}}
{{--                                                                   data-bs-placement="right" title=""--}}
{{--                                                                   data-bs-original-title="{{ __('Add To Cart') }}"--}}
{{--                                                                   aria-label="{{ __('Add To Cart') }}"></a>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="cart-button buynow">--}}
{{--                                                                <a class="add-to-cart-quick button add_to_cart_button"--}}
{{--                                                                   href="javascript:;"--}}
{{--                                                                   data-href="{{ route('product.cart.quickadd',$product->id) }}"--}}
{{--                                                                   data-bs-toggle="tooltip" data-bs-placement="right"--}}
{{--                                                                   title=""--}}
{{--                                                                   data-bs-original-title="{{ __('Buy Now') }}"--}}
{{--                                                                   aria-label="{{ __('Buy Now') }}"></a>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}
{{--                                                    @endif--}}
{{--                                                    @if(Auth::check())--}}
{{--                                                        <div class="wishlist-button">--}}
{{--                                                            <a class="add_to_wishlist  new button add_to_cart_button"--}}
{{--                                                               id="add-to-wish"--}}
{{--                                                               href="javascript:;"--}}
{{--                                                               data-href="{{ route('user-wishlist-add',$product->id) }}"--}}
{{--                                                               data-bs-toggle="tooltip" data-bs-placement="right"--}}
{{--                                                               title=""--}}
{{--                                                               data-bs-original-title="Add to Wishlist"--}}
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
{{--                                                        <a class="compare button button add_to_cart_button"--}}
{{--                                                           data-href="{{ route('product.compare.add',$product->id) }}"--}}
{{--                                                           href="javascrit:;" data-bs-toggle="tooltip"--}}
{{--                                                           data-bs-placement="right"--}}
{{--                                                           title="" data-bs-original-title="Compare"--}}
{{--                                                           aria-label="Compare">{{ __('Compare') }}</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-title">
                                                    <a href="{{ route('front.printify.product.details', $product->id ?? '#') }}">{{ mb_strlen($product->title, 'UTF-8') > 50 ? mb_substr($product->title, 0, 50, 'UTF-8') . '...' : $product->title }}</a>
                                                </h3>
                                                <div class="product-price">
                                                    <div class="price">
                                                        <ins>$ {{ $product->variants[0]->price / 100 }}</ins>
                                                        {{--                                                        <del>{{ $product->showPreviousPrice() }}</del>--}}
                                                    </div>
                                                </div>
                                                {{--                                                <div class="shipping-feed-back">--}}
                                                {{--                                                    <div class="star-rating">--}}
                                                {{--                                                        <div class="rating-wrap">--}}
                                                {{--                                                            --}}{{--                                                        <p><i class="fas fa-star"></i><span> {{ App\Models\Rating::ratings($product->id) }} ({{ App\Models\Rating::ratingCount($product->id) }})</span>--}}
                                                {{--                                                            --}}{{--                                                        </p>--}}
                                                {{--                                                        </div>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{--                        @includeIf('partials.product.product-different-view')--}}
                    </div>
                    {{--                    @include('frontend.pagination.product')--}}
                </div>
                {{--                @else--}}
                {{--                <div class="col-lg-9">--}}
                {{--                    <div class="card">--}}
                {{--                        <div class="card-body">--}}
                {{--                            <div class="page-center">--}}
                {{--                                <h4 class="text-center">{{ __('No Product Found.') }}</h4>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                @endif--}}
            </div>
        </div>
    </div>
    {{-- @includeIf('partials.product.grid') --}}
    {{--@includeIf('partials.global.common-footer')--}}
@endsection
@section('script')
    <script>

        let check_view = '';
        $(document).on('click', '.check_view', function () {
            check_view = $(this).attr('data-shopview');
            filter();
            $('.check_view').removeClass('active');
            $(this).addClass('active');


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
@endsection
