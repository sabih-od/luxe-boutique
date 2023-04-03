@extends('layouts.front')
@section('content')
   {{--@includeIf('partials.global.common-header')--}}
    {{--    @include('layouts.theme-2.menu')--}}
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Pricing Plans') }}

                    </h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('user-dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Pricing Plans') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <!--==================== Blog Section Start ====================-->
    <div class="full-row">
        <div class="container">
            <div class="mb-4 d-xl-none">
                <button class="dashboard-sidebar-btn btn bg-primary rounded">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    @include('partials.user.dashboard-sidebar')
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget border-0 p-40 widget_categories bg-light account-info">

                                <h4 class="widget-title down-line mb-30">{{ __('Current Package Details') }}

                                </h4>
                                <div class="pack-details">
                                    <div class="row">

                                        <div class="col-lg-4">
                                            <h5 class="title">
                                                {{ __('Plan:') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="value">
                                                {{$subs->title}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5 class="title">
                                                {{ __('Price:') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="value">
                                                {{ round($subs->price * $curr->value ,2) }}{{$curr->sign}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5 class="title">
                                                {{ __('Durations:') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="value">
                                                {{$subs->days}} {{ __('Day(s)') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5 class="title">
                                                {{ __('Product(s) Allowed:') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="value">
                                                {{ $subs->allowed_products == 0 ? 'Unlimited':  $subs->allowed_products}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5 class="title">
                                                {{ __('Upload Up To:') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="value">
                                                {{ $subs->total_price == 0 ? 'Unlimited':  $subs->total_price}}{{$curr->sign}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h5 class="title">
                                                {{ __('Payout Time:') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="value">
                                                {{ $subs->payout_time == 0 ? '0':  $subs->payout_time}}
                                            </p>
                                        </div>
                                    </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--==================== Blog Section End ====================-->



{{--@includeIf('partials.global.common-footer')--}}
    {{--    @include('layouts.theme-2.footer')--}}

@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('assets/front/js/payvalid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/paymin.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/payform.js') }}"></script>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script type="text/javascript">

{{--        (function ($) {--}}
{{--            "use strict";--}}

{{--            $('#method').on('change', function () {--}}
{{--                var val = $(this).find(':selected').attr('data-val');--}}
{{--                var form = $(this).find(':selected').attr('data-form');--}}
{{--                var show = $(this).find(':selected').attr('data-show');--}}
{{--                var href = $(this).find(':selected').attr('data-href');--}}

{{--                if (show == "yes") {--}}
{{--                    $('#payments').removeClass('d-none');--}}
{{--                } else {--}}
{{--                    $('#payments').addClass('d-none');--}}
{{--                }--}}

{{--                if (val == 'paystack') {--}}
{{--                    $('.pay-form').prop('id', 'paystack');--}}
{{--                } else if (val == 'voguepay') {--}}
{{--                    $('.pay-form').prop('id', 'voguepay');--}}
{{--                } else if (val == 'mercadopago') {--}}
{{--                    $('.pay-form').prop('id', 'mercadopago');--}}
{{--                } else if (val == '2checkout') {--}}
{{--                    $('.pay-form').prop('id', 'twocheckout');--}}
{{--                } else {--}}
{{--                    $('.pay-form').prop('id', 'subscribe-form');--}}
{{--                }--}}


{{--                $('#payments').load(href);--}}
{{--                $('.pay-form').attr('action', form);--}}
{{--            });--}}


{{--            $(document).on('submit', '#paystack', function () {--}}
{{--                var val = $('#sub').val();--}}
{{--                alert('test');--}}
{{--                if (val == 0) {--}}
{{--                    if ($('#shop-name').length > 0) {--}}

{{--                        $.get('{{ route('user.shop.check').'?shop_name=' }}' + $('#shop-name').val(), function (data, status) {--}}
{{--                            if ((data.errors)) {--}}

{{--                                $('.alert-danger').show();--}}
{{--                                $('.alert-danger ul').html('');--}}
{{--                                for (var error in data.errors) {--}}
{{--                                    $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');--}}
{{--                                    $('#sub').val('0');--}}
{{--                                    $('#ck').val('1');--}}
{{--                                }--}}
{{--                            } else {--}}
{{--                                $('#ck').val('0');--}}
{{--                            }--}}
{{--                        });--}}

{{--                    }--}}

{{--                    setTimeout(function () {--}}
{{--                        if ($('#ck').val() == '0') {--}}

{{--                            var total = {{ $subs->price }};--}}
{{--                            total = Math.round(total);--}}

{{--                            var handler = PaystackPop.setup({--}}
{{--                                key: '{{ $paystack["key"] }}',--}}
{{--                                email: '{{ Auth::user()->email }}',--}}
{{--                                amount: total * 100,--}}
{{--                                currency: "{{ $curr->name }}",--}}
{{--                                ref: '' + Math.floor((Math.random() * 1000000000) + 1),--}}
{{--                                callback: function (response) {--}}
{{--                                    $('#ref_id').val(response.reference);--}}
{{--                                    $('#sub').val('1');--}}
{{--                                    $('#final-btn').click();--}}
{{--                                },--}}
{{--                                onClose: function () {--}}
{{--                                    window.location.reload();--}}
{{--                                }--}}
{{--                            });--}}
{{--                            handler.openIframe();--}}
{{--                            return false;--}}
{{--                        }--}}

{{--                    }, 1000);--}}
{{--                    return false;--}}
{{--                } else {--}}
{{--                    return true;--}}
{{--                }--}}
{{--            });--}}

{{--        })(jQuery);--}}

    </script>

@endsection




