@extends('layouts.vendor')
@section('content')

    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Payment Details') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('vendor.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Payment Details') }} </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('alerts.admin.form-both')
                            <form id="vendor-payment-details-form" class="form-horizontal" action="{{route('vendor-payment-store')}}"
                                  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="item form-group">
                                    <label class="control-label col-sm-4" for="name">{{ __('Payment Method') }} *
                                    </label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="methods" id="withmethod" required>
                                            <option value="">{{ __('Select Withdraw Method') }}</option>
                                            <option value="Stripe" {{ !is_null($paymentDetails) ? (($paymentDetails->method_name = 'Stripe') ? 'selected' : '') : '' }}>{{ __('Stripe') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="stripe" style="display: none;">
                                    <div class="item form-group">
                                        <label class="control-label col-sm-12"
                                               for="name">{{ __('Stripe Publishable Key') }} *
                                        </label>
                                        <div class="col-sm-12">
                                            <input name="stripe_publishable_key"
                                                   placeholder="{{ __('Enter Stripe Publishable Key') }}"
                                                   class="form-control"
                                                   value="{{ $paymentDetails->publishable_key ?? old('stripe_publishable_key') }}" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-sm-12"
                                               for="name">{{ __('Stripe Secret Key') }} *
                                        </label>
                                        <div class="col-sm-12">
                                            <input name="stripe_secret_key"
                                                   placeholder="{{ __('Enter Stripe Secret Key') }}"
                                                   class="form-control"
                                                   value="{{ $paymentDetails->secret_key ?? old('stripe_secret_key') }}" type="text">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="add-product-footer">
                                    <button name="addProduct_btn" type="submit"
                                            class="mybtn1">{{ __('Add Payment Method') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        (function ($) {
            "use strict";
            if($("#withmethod").val() == 'Stripe'){
                $("#stripe").show();
                $("#stripe").find('input, select').attr('required', true);
            }

            $("#withmethod").change(function () {
                var method = $(this).val();
                if (method == "Stripe") {
                    $("#stripe").show();
                    $("#stripe").find('input, select').attr('required', true);
                }
                if (method != "Stripe") {
                    $("#stripe").hide();
                    $("#stripe").find('input, select').attr('required', false);
                }
                if (method == "") {
                    $("#stripe").hide();
                }
            });

        })(jQuery);

    </script>
@endsection
