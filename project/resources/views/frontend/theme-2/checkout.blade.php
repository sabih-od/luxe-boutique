@extends('layouts.theme-2.app')
@section('body-class', '')
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

    <!-- Begin: Step 2 -->
    <div class="checkOutStyle">
        <div class="container">
            <form class="row formStyle checkoutform" id="" action="" method="POST">
                <div class="col-md-12">
                    <div class="title inner">
                        <h2>Billing Address</h2>
                        <h4>Fill the form below to complete your purchase</h4>
                        <p class="checkout-subheading"><span>Already Registered?</span> Click here to <a
                                href="login.php" data-toggle="modal" data-target="#signIn">Login now</a></p>
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="col-md-12">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="customer_name"
                           value="{{ Auth::check() ? Auth::user()->name : '' }}" {{ Auth::check() ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6">
                    <label>email address</label>
                    <input type="email" class="form-control" name="customer_email"
                           value="{{ Auth::check() ? Auth::user()->email : '' }}" {{ Auth::check() ? 'readonly' : '' }}>
                </div>
                <div class="col-md-6">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="customer_phone"
                           value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                </div>
                @if(!Auth::check())
                    <div class="col-md-12">
                        <div class="checkbox">
                            <input type="checkbox" id="box-1" name="pass_check">
                            <label for="box-1">Create an account for later use</label>
                        </div>
                    </div>
                    <div class="col-md-12" id="password_fields">
                        <div class="row">
                            <div class="col-md-6">
                                <label>password</label>
                                <input type="text" class="form-control" name="personal_pass">
                            </div>
                            <div class="col-md-6">
                                <label>confirm password</label>
                                <input type="text" class="form-control" name="personal_confirm">
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <input type="hidden" name="shipping" value="shipto">
                </div>
                <div class="col-md-12">
                    <label>address</label>
                    <input type="text" class="form-control" name="customer_address"
                           value="{{ Auth::check() ? Auth::user()->address : '' }}">
                </div>
                <div class="col-md-6">
                    <label>Country</label>
                    <select name="customer_country" id="country" class="form-control">
                        @include('includes.countries')
                    </select>
                </div>
                <div class="col-md-6">
                    <label>State/Province</label>
                    <input type="text" class="form-control" name="customer_state"
                           value="{{ Auth::check() ? Auth::user()->state : '' }}">
                </div>
                <div class="col-md-6">
                    <label>city</label>
                    <input type="text" class="form-control" name="customer_city"
                           value="{{ Auth::check() ? Auth::user()->city : '' }}">
                </div>
                <div class="col-md-6">
                    <label>Zip/Postal code</label>
                    <input type="text" class="form-control" name="customer_zip"
                           value="{{ Auth::check() ? Auth::user()->zip : '' }}">
                </div>

                <div class="col-md-12">
                    <div class="checkbox">
                        <input type="checkbox" id="ship_address" name="shipping_address_checked">
                        <label for="ship_address">Ship to a different address? </label>
                    </div>
                </div>

                <div class="row text-left w-100" id="shipping_address_form">
                    <div class="col-md-12">
                        <label for="shipping_address">ADDRESS</label>
                        <input type="text" class="form-control" name="shipping_address">
                    </div>
                    <div class="col-md-6">
                        <label for="">COUNTRY</label>
                        <select name="shipping_country" id="s_country"
                                class="form-control requiredField ">
                            @include('includes.countries')
                        </select>
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">CITY</label>
                        <input type="text" name="shipping_city" id="s_city"
                               class="form-control requiredField "
                               value="">
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">ZIP/POSTAL CODE</label>
                        <input type="text" name="shipping_zip" id="s_zip_code"
                               class="form-control requiredField "
                               value="">
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                    <div class="col-md-6">
                        <label for="">STATE/PROVINCE</label>
                        <input type="text" name="shipping_state" id="s_state"
                               class="form-control requiredField "
                               value="">
                        <small class="text-danger errorField" style="display: none"></small>
                    </div>
                </div>
                <input type="hidden" id="shipping-cost" name="shipping_cost" value="0">
                <input type="hidden" id="packing-cost" name="packing_cost" value="0">
                <input type="hidden" id="shipping-title" name="shipping_title" value="0">
                <input type="hidden" id="packing-title" name="packing_title" value="0">
                <input type="hidden" name="dp" value="{{$digital}}">
                <input type="hidden" id="input_tax" name="tax" value="">
                <input type="hidden" id="input_tax_type" name="tax_type" value="">
                <input type="hidden" name="totalQty" value="{{$totalQty}}">
                <input type="hidden" name="vendor_shipping_id" value="{{ $vendor_shipping_id }}">
                <input type="hidden" name="vendor_packing_id" value="{{ $vendor_packing_id }}">
                <input type="hidden" name="currency_sign" value="{{ $curr->sign }}">
                <input type="hidden" name="currency_name" value="{{ $curr->name }}">
                <input type="hidden" name="currency_value" value="{{ $curr->value }}">
                <input type="hidden" name="method" value="Cash On Delivery">
                @php
                    @endphp
                @if(Session::has('coupon_total'))
                    <input type="hidden" name="total" id="grandtotal"
                           value="{{round($totalPrice * $curr->value,2)}}">
                    <input type="hidden" id="tgrandtotal" value="{{ $totalPrice }}">
                @elseif(Session::has('coupon_total1'))
                    <input type="hidden" name="total" id="grandtotal"
                           value="{{ preg_replace("/[^0-9,.]/", "", Session::get('coupon_total1') ) }}">
                    <input type="hidden" id="tgrandtotal"
                           value="{{ preg_replace("/[^0-9,.]/", "", Session::get('coupon_total1') ) }}">
                @else
                    <input type="hidden" name="total" id="grandtotal"
                           value="{{round($totalPrice * $curr->value,2)}}">
                    <input type="hidden" id="tgrandtotal" value="{{round($totalPrice * $curr->value,2)}}">
                @endif
                <input type="hidden" id="original_tax" value="0">
                <input type="hidden" id="wallet-price" name="wallet_price" value="0">
                <input type="hidden" id="ttotal"
                       value="{{ Session::has('cart') ? App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0' }}">
                <input type="hidden" name="coupon_code" id="coupon_code"
                       value="{{ Session::has('coupon_code') ? Session::get('coupon_code') : '' }}">
                <input type="hidden" name="coupon_discount" id="coupon_discount"
                       value="{{ Session::has('coupon') ? Session::get('coupon') : '' }}">
                <input type="hidden" name="coupon_id" id="coupon_id"
                       value="{{ Session::has('coupon') ? Session::get('coupon_id') : '' }}">
                <input type="hidden" name="user_id" id="user_id"
                       value="{{ Auth::guard('web')->check() ? Auth::guard('web')->user()->id : '' }}">
                <div class="col-md-12 mt-4">
                    <button class="themeBtn btn-block" type="submit">proceed to checkout</button>
                </div>
            </form>

            @if(Session::has('cart'))
                <div class="col-md-12 title my-5 text-center">
                    <h2>Order Summary</h2>
                </div>
                <div class="col-md-12 order-summery">
                    <div class="row no-gutters">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Subtotal (3 items)</span>
                            <strong>{{ Session::has('cart') ? App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0.00' }}</strong>
                            <input type="hidden" id="ttotal"
                                   value="{{ Session::has('cart') ? App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0' }}">
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Shipping fee</span>
                            <strong>USD 5.00</strong>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 d-none align-items-center justify-content-between" id="discount-bar">
                            <span>Discounts</span>
                            <strong id="discount_amount"></strong>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12">
                            <form action="#" id="check-coupon-form" class="w-100">
                                <div class="applyCoupon">
                                    <input type="text" class="form-control" placeholder="Enter Voucher Code"
                                           id="code">
                                    <button class="btnStyle themeBtn btn-block" type="submit">Apply</button>
                                </div>
                            </form>
                        </div>
                        <hr class="w-100">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <span>Total</span>
                            <strong
                                id="grand_total">{{ Session::has('cart') ? App\Models\Product::convertPrice(Session::get('cart')->totalPrice) : '0.00' }}</strong>
                        </div>
                        <hr class="w-100">
                    </div>
                </div>
            @endif

            @if(Session::has('cart'))
                <div class="col-md-12 title my-5 text-center d-none">
                    <h2>Payment Info</h2>
                </div>
                <div class="col-md-12 order-summery d-none">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="nav flex-column" role="tablist"
                                 aria-orientation="vertical">
                                @foreach($gateways as $gt)
                                    @if($gt->type == 'manual')
                                        @if($digital == 0)
                                            <a class="nav-link payment" data-val=""
                                               data-show="{{$gt->showForm()}}"
                                               data-form="{{ $gt->showCheckoutLink() }}"
                                               data-href="{{ route('front.load.payment',['slug1' => $gt->showKeyword(),'slug2' => $gt->id]) }}"
                                               id="v-pills-tab{{ $gt->id }}-tab"
                                               data-toggle="pill"
                                               href="#v-pills-tab{{ $gt->id }}" role="tab"
                                               aria-controls="v-pills-tab{{ $gt->id }}"
                                               aria-selected="false">
                                                <div class="icon">
                                                    <span class="radio"></span>
                                                </div>
                                                <p>
                                                    {{ $gt->title }}
                                                    @if($gt->subtitle != null)
                                                        <small>
                                                            {{ $gt->subtitle }}
                                                        </small>
                                                    @endif
                                                </p>
                                            </a>
                                        @endif
                                    @else
                                        <a class="nav-link payment"
                                           data-val="{{ $gt->keyword }}"
                                           data-show="{{$gt->showForm()}}"
                                           data-form="{{ $gt->showCheckoutLink() }}"
                                           data-href="{{ route('front.load.payment',['slug1' => $gt->showKeyword(),'slug2' => $gt->id]) }}"
                                           id="v-pills-tab{{ $gt->id }}-tab"
                                           data-toggle="pill"
                                           href="#v-pills-tab{{ $gt->id }}" role="tab"
                                           aria-controls="v-pills-tab{{ $gt->id }}"
                                           aria-selected="false">
                                            <div class="icon">
                                                <span class="radio"></span>
                                            </div>
                                            <p>
                                                {{ $gt->name }}
                                                @if($gt->information != null)
                                                    <small>
                                                        {{ $gt->getAutoDataText() }}
                                                    </small>
                                                @endif
                                            </p>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- END: Step 2 -->
@endsection

@section('script')
    <script>
        $(function () {
            var mainurl = "<?php echo e(url('/')); ?>";

            // Get Selected payment gateway URL
            $('a.payment:first').addClass('active');
            $('.checkoutform').attr('action', $('a.payment:first').attr('data-form'));
            $($('a.payment:first').attr('href')).load($('a.payment:first').data('href'));

            // Hide Password and shipping Fields
            $('#password_fields').hide();
            $('#shipping_address_form').hide();

            //show password fields when create account is checked
            $('input[name="pass_check"]').on('click', function () {
                if ($(this).prop('checked')) {
                    $('#password_fields').fadeIn();
                } else {
                    $('#password_fields').hide();
                }
            });

            // Show shipping fields when ship to a diffent address is checked
            $('input[name="shipping_address_checked"]').on('click', function () {
                if ($(this).prop('checked')) {
                    $('#shipping_address_form').fadeIn();
                } else {
                    $('#shipping_address_form').hide();
                }
            });

            // Validate Coupon
            $("#check-coupon-form").on('submit', function (e) {
                e.preventDefault();

                var val = $("#code").val();
                var total = $("#total").val();
                var ship = 0;

                $.ajax({
                    type: "GET",
                    url: mainurl + "/carts/coupon/check",
                    data: {code: val, total: total, shipping_cost: ship},
                    success: function (data) {
                        if (data == 0) {
                            toastr.error('{{__('Coupon not found')}}');
                            $("#code").val("");
                        } else if (data == 2) {
                            toastr.error('{{__('Coupon already have been taken')}}');
                            $("#code").val("");
                        } else {
                            console.log(data)
                            // $("#check-coupon-form").toggle();
                            $("#discount-bar").removeClass('d-none');
                            $("#discount-bar").addClass('d-flex');

                            {{--if (pos == 0) {--}}
                            {{--    $('.total-cost-dum #total-cost').html('{{ $curr->sign }}' + data[0]);--}}
                            {{--    $('#discount_amount').html('{{ $curr->sign }}' + data[2]);--}}
                            {{--} else {--}}
                            {{--    $('.total-cost-dum #total-cost').html(data[0] + '{{ $curr->sign }}');--}}
                            {{--    $('#discount_amount').html(data[2] + '{{ $curr->sign }}');--}}
                            {{--}--}}

                            $('#grandtotal').val(data[0]);
                            $('#grand_total').html(data[0]);
                            $('#tgrandtotal').val(data[0]);
                            $('#coupon_code').val(data[1]);
                            $('#coupon_discount').val(data[2]);
                            $('#discount_amount').html(data[2] + '$');
                            if (data[4] != 0) {
                                $('.dpercent').html('(' + data[4] + ')');
                            } else {
                                $('.dpercent').html('');
                            }

                            var ttotal = data[6] + parseFloat(mship) + parseFloat(mpack);
                            ttotal = parseFloat(ttotal);
                            if (ttotal % 1 != 0) {
                                ttotal = ttotal.toFixed(2);
                            }

                            if (pos == 0) {
                                $('#final-cost').html('{{ $curr->sign }}' + ttotal)
                            } else {
                                $('#final-cost').html(ttotal + '{{ $curr->sign }}')
                            }
                            toastr.success("Coupon Activated");
                            $("#code").val("");
                        }
                    }
                });
                return false;
            });
        });
    </script>
@endsection

