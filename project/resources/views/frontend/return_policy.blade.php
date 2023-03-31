@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Return policy') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Return policy') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->


    {{--    <section class="affiliatesSec my-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>return-policy</h2>--}}
    {{--                    <h3>return-policy</h3>--}}
    {{--                    <p>IMA USA Shop’s guarantee policy ensures that your purchases through--}}
    {{--                        <a href="{{ route('front.returnPolicy') }}" class="text-dark">https://imausashop.com/</a> meet--}}
    {{--                        the highest standards and fulfill all--}}
    {{--                        your needs. In addition, our return policy is 100% satisfaction guaranteed.</p>--}}
    {{--                    <h4>Exchanges and Return</h4>--}}
    {{--                    <p>In case of any concerns related to the bought product(s), you can exchange or return the--}}
    {{--                        respective product(s) within the time period of 30 days.</p>--}}
    {{--                    <p>IMA USA Shop only accepts the return and exchanges of the product(s) that are in selling--}}
    {{--                        condition, unworn with tags attached along with the original packaging.</p>--}}
    {{--                    <p>Please note that IMA USA Shop doesn’t accept returns and exchanges for undergarments and face--}}
    {{--                        masks due to hygiene purposes. However, in case of any manufacturing defects, we accept returns--}}
    {{--                        and exchanges of such products.</p>--}}

    {{--                    <h4>Exchanges and Returns within the United States</h4>--}}
    {{--                    <p>For each order placed within the US, you can avail of 100% free exchanges or returns.</p>--}}
    {{--                    <p>Visit our Fast and Easy Return Center in order to process your exchanges or return requests and--}}
    {{--                        print your shipping label to proceed.</p>--}}
    {{--                    <h4>Exchanges and Returns from other countries</h4>--}}
    {{--                    <p>In order to proceed with the return and exchanges from other countries, print out the return and--}}
    {{--                        exchanges form and send it along with the respective product(s).</p>--}}
    {{--                    <p>Please note that the shipping cost is non-refundable and is to be paid by the customer only. For--}}
    {{--                        exchanges, the customer needs to pay for the return shipping. However, IMA USA Shop will pay for--}}
    {{--                        the new item to be shipped to the customer.</p>--}}
    {{--                    <h4>Policies for Returns</h4>--}}
    {{--                    <p>In the case of returns, the total amount of the product(s) will be credited back to your account--}}
    {{--                        that was used to carry off the transaction before.</p>--}}
    {{--                    <p>Please note that the returns may take up to 14 business days.</p>--}}
    {{--                    <h4>Policies for Exchanges</h4>--}}
    {{--                    <p>Please note that the exchanges are subject to inventory. If the items are unavailable, the money--}}
    {{--                        will be refunded.</p>--}}
    {{--                    <h4>Exchanges for the product(s) worth the same amount:</h4>--}}
    {{--                    <p>In the case of exchanging product(s) that are worth the same amount, no additional charges or--}}
    {{--                        refund would be applied.</p>--}}
    {{--                    <h4>Exchanges for the product(s) with a lesser amount:</h4>--}}
    {{--                    <p>In the case of exchanging product(s) with a lesser amount, the difference will be credited back--}}
    {{--                        to the account that was used to carry off the transaction before or to your PayPal account.--}}
    {{--                        Please note that this reflection of the amount can take up to 14 business days.</p>--}}
    {{--                    <h4>Exchanges for the product(s) with a greater amount:</h4>--}}
    {{--                    <p>In case of exchanging product(s) with a greater amount, the difference will be charged to the--}}
    {{--                        account that was used to carry off the transaction before. If the original transaction was--}}
    {{--                        carried off through PayPal, then you will have to return the item in order to order a new--}}
    {{--                        product(s).</p>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="sitemap-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="box-styles">
                        <h4>Return-Policy</h4>
                        <p>IMA USA Shop’s guarantee policy ensures that your purchases through https://imausashop.com/
                            meet the highest standards and fulfill all your needs. In addition, our return policy is
                            100% satisfaction guaranteed.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Exchanges And Return</h4>
                        <p>In case of any concerns related to the bought product(s), you can exchange or return the
                            respective product(s) within the time period of 30 days.</p>
                        <p>IMA USA Shop only accepts the return and exchanges of the product(s) that are in selling
                            condition, unworn with tags attached along with the original packaging.</p>
                        <p>Please note that IMA USA Shop doesn’t accept returns and exchanges for undergarments and face
                            masks due to hygiene purposes. However, in case of any manufacturing defects, we accept
                            returns and exchanges of such products.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Exchanges And Returns Within The United States</h4>
                        <p>For each order placed within the US, you can avail of 100% free exchanges or returns.</p>
                        <p>Visit our Fast and Easy Return Center in order to process your exchanges or return requests
                            and print your shipping label to proceed.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Exchanges And Returns From Other Countries</h4>
                        <p>In order to proceed with the return and exchanges from other countries, print out the return
                            and exchanges form and send it along with the respective product(s).</p>
                        <p>Please note that the shipping cost is non-refundable and is to be paid by the customer only.
                            For exchanges, the customer needs to pay for the return shipping. However, IMA USA Shop will
                            pay for the new item to be shipped to the customer.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Policies For Returns</h4>
                        <p>In the case of returns, the total amount of the product(s) will be credited back to your
                            account that was used to carry off the transaction before.</p>
                        <p>Please note that the returns may take up to 14 business days.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Policies For Exchanges</h4>
                        <p>Please note that the exchanges are subject to inventory. If the items are unavailable, the
                            money will be refunded.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Exchanges For The Product(S) Worth The Same Amount:</h4>
                        <p>In the case of exchanging product(s) that are worth the same amount, no additional charges or
                            refund would be applied.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Exchanges For The Product(S) With A Lesser Amount:</h4>
                        <p>In the case of exchanging product(s) with a lesser amount, the difference will be credited
                            back to the account that was used to carry off the transaction before or to your PayPal
                            account. Please note that this reflection of the amount can take up to 14 business days.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Exchanges For The Product(S) With A Greater Amount:</h4>
                        <p>In case of exchanging product(s) with a greater amount, the difference will be charged to the
                            account that was used to carry off the transaction before. If the original transaction was
                            carried off through PayPal, then you will have to return the item in order to order a new
                            product(s).</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeIf('partials.global.common-footer')
@endsection
