@extends('layouts.front')
@section('content')
    {{--@includeIf('partials.global.common-header')--}}
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Inner Banner') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Inner Banner') }}</li>
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
    {{--                    <h2>Buyer’s Policy</h2>--}}
    {{--                    <h3>BUYER POLICY WITH IMA USA SHOP</h3>--}}
    {{--                    <p>At <a href="{{ route('front.buyersPolicy') }}" class="text-dark">https://imausashop.com/</a>, we maintain a safe, reliable, and fair--}}
    {{--                        marketplace for both the buyers and the sellers.<br> Being a buyer at IMA USA Shop, we request--}}
    {{--                        you understand the policies that we offer before you trade in. Please note that at IMA USA Shop,--}}
    {{--                        you are not buying from us but several other sellers around the world.</p>--}}
    {{--                    <p>The policies at IMA USA SHOP are purposive to:</p>--}}
    {{--                    <p>– Ensure the safety of our buyers and sellers</p>--}}
    {{--                    <p>– Make certain of a fair marketplace for our visitors</p>--}}
    {{--                    <p>– Protect the rights of buyers and sellers</p>--}}
    {{--                    <p>– Eliminate scams and other risks</p>--}}
    {{--                    <p>Following are the conditions that we permit in case of returns of the products: – The product--}}
    {{--                        that you are willing to return should have original tags, a user manual, and a warranty--}}
    {{--                        card.</p>--}}
    {{--                    <p>– The product must be returned in an undamaged condition. Do not put any stickers or tape on the--}}
    {{--                        packaging boxes.</p>--}}
    {{--                    <p>Please note that the order number and the tracking number should be submitted along with your--}}
    {{--                        return package.</p>--}}
    {{--                    <p>The buyers at IMA USA Shop are liable to understand that:</p>--}}
    {{--                    <p>1) At IMA USA Shop, we highly discourage the profiles that use fake contact information. There--}}
    {{--                        are a lot of times when buyers need to be connected to the seller, and therefore correct contact--}}
    {{--                        information is required.</p>--}}
    {{--                    <p>2) Request the seller for the cancellation of the order. Only a seller is allowed to cancel--}}
    {{--                        transactions and orders. Please consider that the cancellation of the order should not be based--}}
    {{--                        on discriminatory purposes.</p>--}}
    {{--                    <p>3) Each seller you are ordering from has different returning policies. Therefore, before you--}}
    {{--                        trade, please clear the return terms.</p>--}}
    {{--                    <p>4) Your reviews keep our website going; however, we do not accept any hateful comments that--}}
    {{--                        include obscene language or imagery or any other content that violates the content policy.</p>--}}
    {{--                    <p>5) The use of false shop review scores is highly discouraged.</p>--}}
    {{--                    <p>At IMA USA SHOP, some of the following issues are not regarded. Some of these are:</p>--}}
    {{--                    <p>– In the case of returns of items, any items that have been already worn, torn, or the receipt of--}}
    {{--                        the order is misplaced are not considered.</p>--}}
    {{--                    <p>– Any delivery issues after the agreement between the seller and buyer are not considered.</p>--}}
    {{--                    <p>In case of any violation of the rules, IMA USA Shop</p>--}}
    {{--                    <p>reserves all the right to take strict action against your buying profile.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="sitemap-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h3 class="mb-5">Buyer’s Policy</h3>
                    <div class="box-styles">
                        <h4>Buyer Policy with IMA USA Shop</h4>
                        <strong>At https://imausashop.com/, we maintain a safe, reliable, and fair marketplace for both
                            the buyers and the sellers.</strong>
                        <strong>Being a buyer at IMA USA Shop, we request you understand the policies that we offer
                            before you trade in. Please note that at IMA USA Shop, you are not buying from us but
                            several other sellers around the world.</strong>
                        <p>The policies at IMA USA SHOP are purposive to:</p>
                        <p>– Ensure the safety of our buyers and sellers</p>
                        <p>– Make certain of a fair marketplace for our visitors</p>
                        <p>
                            – Protect the rights of buyers and sellers
                        </p>
                        <p>– Eliminate scams and other risks
                        </p>
                        <h4>Following are the conditions that we permit in case of returns of the products: – The
                            product that you are willing to return should have original tags, a user manual, and a
                            warranty card.</h4>
                        <p>– The product must be returned in an undamaged condition. Do not put any stickers or tape on
                            the
                            packaging boxes.
                        </p>
                        <p>
                            Please note that the order number and the tracking number should be submitted along with
                            your return package.
                        </p>
                        <p>The buyers at IMA USA Shop are liable to understand that:
                        </p>
                        <p>1) At IMA USA Shop, we highly discourage the profiles that use fake contact information.
                            There are a lot of times when buyers need to be connected to the seller, and therefore
                            correct contact information is required.</p>
                        <p>2) Request the seller for the cancellation of the order. Only a seller is allowed to cancel
                            transactions and orders. Please consider that the cancellation of the order should not be
                            based on discriminatory purposes.</p>
                        <p>3) Each seller you are ordering from has different returning policies. Therefore, before you
                            trade, please clear the return terms.</p>
                        <p>4) Your reviews keep our website going; however, we do not accept any hateful comments that
                            include obscene language or imagery or any other content that violates the content policy.
                        </p>
                        <p>5) The use of false shop review scores is highly discouraged.
                        </p>
                        <p>At IMA USA SHOP, some of the following issues are not regarded. Some of these are:
                        </p>
                        <p>– In the case of returns of items, any items that have been already worn, torn, or the
                            receipt of the order is misplaced are not considered.
                        </p>
                        <p>– Any delivery issues after the agreement between the seller and buyer are not considered.
                        </p>
                        <p>In case of any violation of the rules, IMA USA Shop
                        </p>
                        <p>reserves all the right to take strict action against your buying profile.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--@includeIf('partials.global.common-footer')--}}
@endsection
