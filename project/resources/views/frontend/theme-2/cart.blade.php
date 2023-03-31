@extends('layouts.theme-2.app')
@section('body-class', 'Cart')
@section('content')
    <!-- Begin: Main Slider -->
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/inrbnr1.png') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">CheckOut</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <!-- Begin: Step 1 -->
    <div class="checkOutStyle">
        <div class="container">
            {{--            {{ Session::forget('cart') }}--}}
            @if(Session::has('cart'))
                <div class="row">
                    <div class="col-md-12 p-sm-0">
                        <div class="title">
                            <h2>Confirm Your Purchase</h2>
                        </div>
                    </div>
                </div>
                @foreach($products as $product)
                    <div class="row cartItemCard">
                        <div class="col-md-1">
                            <a href="{{ route('front.product', $product['item']['slug']) }}">
                                <img
                                    src="{{ $product['item']['photo'] ? asset('assets/images/products/'.$product['item']['photo']) : asset('assets/images/noimage.png') }}"
                                    alt="Product Image">
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('front.product', $product['item']['slug']) }}">
                                <h4 class="text-dark">{{ mb_strlen($product['item']['name'],'UTF-8') > 35 ? mb_substr($product['item']['name'],0,35,'UTF-8').'...' : $product['item']['name']}}</h4>
                                @if(!empty($product['size']))
                                    <div class="d-flex mt-2 ml-1">
                                        <b class="text-dark mr-2">{{ __('Size') }}:</b>
                                        <span class="text-dark font-weight-bold">{{ $product['size'] }}</span>
                                    </div>
                                @endif
                                @if(!empty($product['color']))
                                    <div class="d-flex mt-2 ml-1">
                                        <b class="text-dark mr-2">{{ __('Color') }}:</b>
                                        <span id="color-bar"
                                              style="border: 10px solid #{{$product['color'] == "" ? "white" : $product['color']}}; width: 20px; height: 20px; border-radius: 50%"></span>
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="col-md-2">
                            <strong
                                class="price">{{ App\Models\Product::convertPrice($product['item_price']) }}</strong>
                        </div>
                        <div class="col-md-2">
                            <div class="proCounter">
                                <input type="hidden" class="prodid" value="{{$product['item']['id']}}">
                                <input type="hidden" class="itemid"
                                       value="{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}">
                                <input type="hidden" class="size_qty" value="{{$product['size_qty']}}">
                                <input type="hidden" class="size_price" value="{{$product['size_price']}}">
                                <input type="hidden" class="minimum_qty"
                                       value="{{ $product['item']['minimum_qty'] == null ? '0' : $product['item']['minimum_qty'] }}">
                                <span class="minus">-</span>
                                <input
                                    data-id="{{$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])}}"
                                    type="text"
                                    class="input-text qty text input-quantity" name="quantity[]"
                                    value="{{ $product['qty'] }}" title="Qty" size="4">
                                <span class="plus quantity-up">+</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <strong
                                class="price">{{ App\Models\Product::convertPrice($product['item_price'] * $product['qty']) }}</strong>
                        </div>
                        <div class="col-md-1">
                            <a href="#" class="remove cart-remove delete"
                               data-class="cremove{{ $product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values']) }}"
                               data-href="{{ route('product.cart.remove',$product['item']['id'].$product['size'].$product['color'].str_replace(str_split(' ,'),'',$product['values'])) }}"><i
                                    class="far fa-trash-alt"></i></a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-md-12 p-sm-0">
                        <div class="title text-center">
                            <h2>There's no product in the cart.</h2>
{{--                            <a href="{{ url('/real-item-marketplace') }}" class="themeBtn mt-4">Shop Now</a>--}}
                            <a href="{{ route('front.category', 'real-items') }}" class="themeBtn mt-4">Shop Now</a>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    @if(Session::has('cart'))
                        <a href="{{ route('front.checkout') }}"
                           class="themeBtn btn-block text-center">{{ __('Proceed to checkout') }}</a>
                    @endif
{{--                    <ul class="shipping-billing-col">--}}
{{--                        <li>--}}
{{--                            <p><i class="fas fa-map-marker-alt"></i> Lorem Ipsum 123 Street, USA 2345 <a href=""--}}
{{--                                                                                                         class="edit">edit</a>--}}
{{--                            </p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <p><i class="fas fa-phone"></i> <a href="tel:1234567890">(123) 456-7890</a> <a href="#"--}}
{{--                                                                                                           class="edit">edit</a>--}}
{{--                            </p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <p><i class="fas fa-envelope"></i><a--}}
{{--                                    href="mailto:info@yourdomain.com">info@yourdomain.com</a><a href="#" class="edit">edit</a>--}}
{{--                            </p>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- END: Step 1 -->
@endsection

@section('script')
    <script>
        var mainurl = "<?php echo e(url('/')); ?>";

        // Remove Product From Cart
        $(document).on("click", ".cart-remove", function () {
            var $selector = $(this).data("class");
            $("." + $selector).hide();
            $.get($(this).data("href"), function (data) {
                window.location.reload();
            });
        });

        // Add quantity in the cart
        $('.plus').click(function () {
            var pid = $(this).parent().find('.prodid').val();
            var itemid = $(this).parent().find(".itemid").val();
            var size_qty = $(this).parent().find(".size_qty").val();
            var size_price = $(this).parent().find(".size_price").val();

            $.ajax({
                type: "GET",
                url: mainurl + "/addbyone",
                data: {
                    id: pid,
                    itemid: itemid,
                    size_qty: size_qty,
                    size_price: size_price,
                },
                success: function (data) {
                    $(".gocover").hide();
                    if (data == 0) {
                        toastr.error(lang.cart_out);
                    } else {
                        $.get(mainurl + "/carts", function (response) {
                            // $(".load_cart").html(response);
                            window.location.reload();
                        });
                    }
                },
            });
        });

        // Remove Quantity from cart
        $('.minus').click(function () {
            var pid = $(this).parent().find(".prodid").val();
            var itemid = $(this).parent().find(".itemid").val();
            var size_qty = $(this).parent().find(".size_qty").val();
            var size_price = $(this).parent().find(".size_price").val();
            var qty = parseInt($("#qty" + itemid).val());
            var minimum_qty = $(this).parent().find(".minimum_qty").val();

            $(".gocover").show();

            if (qty < 1) {
                $("#qty" + itemid).val("1");
                $(".gocover").hide();
                return false;
            } else if (qty < minimum_qty) {
                return false;
            } else {
                $(".gocover").show();

                $("#qty" + itemid).val(qty);
                $.ajax({
                    type: "GET",
                    url: mainurl + "/reducebyone",
                    data: {
                        id: pid,
                        itemid: itemid,
                        size_qty: size_qty,
                        size_price: size_price,
                    },
                    success: function (data) {
                        if (data.qty >= 1) {
                            $.get(mainurl + "/carts", function (response) {
                                // $(".load_cart").html(response);
                                window.location.reload();
                            });
                        } else {
                            return false;
                        }
                    },
                });
            }
        });
    </script>
@endsection
