@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Seller’s policy') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Seller’s policy') }}</li>
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
    {{--                    <h2>Seller’s Policy</h2>--}}
    {{--                    <h3>Seller’s Policy</h3>--}}
    {{--                    <p>At <a href="{{ route('front.sellersPolicy') }}" class="text-dark">https://imausashop.com/</a>, we--}}
    {{--                        maintain a safe, reliable, and fair marketplace for both the buyers and the sellers.</p>--}}
    {{--                    <p>As a seller at IMA USA SHOP, we expect you to refrain from uploading any content that has:</p>--}}
    {{--                    <p>Any hateful or derogatory language or image.</p>--}}
    {{--                    <p>Any content that is subjected to anti-discrimination policy</p>--}}
    {{--                    <p>Any content that includes threats or violates the safety of the users.</p>--}}
    {{--                    <p>Any content that is misleading or false.</p>--}}
    {{--                    <p>Any fake promotions and advertising.</p>--}}
    {{--                    <p>Any content that includes rates X products</p>--}}
    {{--                    <p>To make sure that IMA USA Shop is a safe place for everyone, all sellers must:</p>--}}
    {{--                    <p>Add all the accurate information, whether it is contact information or product information. It is--}}
    {{--                        necessary to update the information from time to time in order to keep customers updated about--}}
    {{--                        the changes.</p>--}}
    {{--                    <p>Refrain from misusing the features that IMA USA Shop provides.</p>--}}
    {{--                    <p>Not carry out any activity that abuses the rights of the customers.</p>--}}
    {{--                    <p>Not carry out any activity that abuses the rights of other sellers. We highly discourage bringing--}}
    {{--                        web traffic falsely to the site. Avoid giving out negative reviews of other sellers’ profiles or--}}
    {{--                        any other activity that could defame the writer</p>--}}
    {{--                    <p>Keep in mind that an increase in the prices of the product after the order is placed should be--}}
    {{--                        omitted.</p>--}}
    {{--                    <h4>Reviews and Feedback</h4>--}}
    {{--                    <p>Inflating customers by writing good reviews about your products is highly discouraged at IMA USA--}}
    {{--                        Shop.</p>--}}
    {{--                    <p>As a seller, you are not allowed to write positive reviews for your products. Also, you are not--}}
    {{--                        permitted to review the products of other sellers too.</p>--}}
    {{--                    <p>Posting only the reviews that fall in your favor is not allowed.</p>--}}
    {{--                    <p>Offering incentives for dropping good reviews about the product is highly discouraged.</p>--}}
    {{--                    <p>In case of any violation of the rules, IMA USA Shop reserves all the right to take strict action--}}
    {{--                        against your selling profile.</p>--}}
    {{--                    <h4>Selling Accounts on IMA USA Shop</h4>--}}
    {{--                    <p>At IMA USA Shop, you are only allowed to maintain only one selling profile for each region. A--}}
    {{--                        second selling profile is only allowed to a seller in case of any other legitimate business. The--}}
    {{--                        conditions of a legitimate business include:</p>--}}
    {{--                    <p>You own more than one business and need a separate account for each of them because of the--}}
    {{--                        difference in niches.</p>--}}
    {{--                    <p>You manufacture products for more than two companies and require different selling profiles.</p>--}}
    {{--                    <h4>Violation of the marketplace</h4>--}}
    {{--                    <p>It has been observed that a lot of the sellers on IMA USA Shop violate the features of IMA USA--}}
    {{--                        Shop and divert their customers to other mediums or websites. It is highly discouraged to--}}
    {{--                        provide links or contact any other external site.</p>--}}
    {{--                    <h4>FAQS for sellers</h4>--}}
    {{--                    <h4>1 Can I transfer my seller account?</h4>--}}
    {{--                    <p>Ans. In general, seller accounts are not transferable. Every seller on IMA USA Shop should have a--}}
    {{--                        distinct profile that defines their own business. If the ownership of the business is changing,--}}
    {{--                        you have to build a new profile; however, if just the person managing the profile is changing,--}}
    {{--                        then users can be added to the account.</p>--}}
    {{--                    <h4>1 Can I redefine my return policy?</h4>--}}
    {{--                    <p>Ans. Yes, you can. As a seller, you reserve all rights to alter your return policy. However, you--}}
    {{--                        are required to keep your customers informed about the changes in your return policy.</p>--}}
    {{--                    <h4>1 Is there any restriction on the products that I offer?</h4>--}}
    {{--                    <p>Ans. At IMA USA Shop, you are free to offer any product you want. However, we discourage all the--}}
    {{--                        drugs and rated x products.</p>--}}
    {{--                    <h4>1 Can I contact the buyer personally?</h4>--}}
    {{--                    <p>Ans. We highly discourage contacting buyers on any external links or mediums. At IMA USA Shop, we--}}
    {{--                        provide all the features that are needed in swift communication to make sure that you have an--}}
    {{--                        easy selling process.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="seller-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="box-styles">
                        <h4>Seller’s Policy</h4>
                        <p>At https://imausashop.com/, we maintain a safe, reliable, and fair marketplace for both the
                            buyers and the sellers.</p>
                        <p>As a seller at IMA USA SHOP, we expect you to refrain from uploading any content that
                            has:</p>
                        <p>Any hateful or derogatory language or image.</p>
                        <p>Any content that is subjected to anti-discrimination policy</p>
                        <p>Any content that includes threats or violates the safety of the users.</p>
                        <p>Any content that is misleading or false.</p>
                        <p>Any fake promotions and advertising.</p>
                        <p>Any content that includes rates X products</p>
                        <p>To make sure that IMA USA Shop is a safe place for everyone, all sellers must:</p>
                        <p>Add all the accurate information, whether it is contact information or product information.
                            It is necessary to update the information from time to time in order to keep customers
                            updated about the changes.</p>
                        <p>Refrain from misusing the features that IMA USA Shop provides.</p>
                        <p>Not carry out any activity that abuses the rights of the customers.</p>
                        <p>Not carry out any activity that abuses the rights of other sellers. We highly discourage
                            bringing web traffic falsely to the site. Avoid giving out negative reviews of other
                            sellers’ profiles or any other activity that could defame the writer</p>
                        <p>Keep in mind that an increase in the prices of the product after the order is placed should
                            be omitted.
                            selling profile.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Reviews And Feedback</h4>
                        <p>Inflating customers by writing good reviews about your products is highly discouraged at IMA
                            USA Shop.</p>
                        <p>As a seller, you are not allowed to write positive reviews for your products. Also, you are
                            not permitted to review the products of other sellers too.
                        </p>
                        <p>Posting only the reviews that fall in your favor is not allowed.</p>
                        <p>Offering incentives for dropping good reviews about the product is highly discouraged.</p>
                        <p>In case of any violation of the rules, IMA USA Shop reserves all the right to take strict
                            action against your selling profile.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Selling Accounts On IMA USA Shop</h4>
                        <p>At IMA USA Shop, you are only allowed to maintain only one selling profile for each region. A
                            second selling profile is only allowed to a seller in case of any other legitimate business.
                            The conditions of a legitimate business include:</p>
                        <p>You own more than one business and need a separate account for each of them because of the
                            difference in niches.</p>
                        <p>You manufacture products for more than two companies and require different selling
                            profiles.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Violation Of The Marketplace</h4>
                        <p>It has been observed that a lot of the sellers on IMA USA Shop violate the features of IMA
                            USA Shop and divert their customers to other mediums or websites. It is highly discouraged
                            to provide links or contact any other external site.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeIf('partials.global.common-footer')
@endsection
