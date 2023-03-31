@extends('layouts.front')
@section('content')
@include('partials.global.common-header')
<!-- breadcrumb -->
<div class="full-row bg-light overlay-dark py-5" style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
    <div class="container">
        <div class="row text-center text-white">
            <div class="col-12">
                <h3 class="mb-2 text-white">{{ __('AFFILIATES') }}</h3>
            </div>
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('AFFILIATES') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->


{{--    <section class="affiliatesSec">--}}
{{--        <div class="container">--}}
{{--            <div class="row mt-5">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h2>AFFILIATES</h2>--}}
{{--                    <h3>IMA USA Shop Affiliate Program</h3>--}}
{{--                    <p>Sign up now, and start earning as an IMA USA affiliate.</p>--}}
{{--                    <h3>IMA USA Shop Affiliate Program</h3>--}}
{{--                    <p>IMA USA Shop Affiliate program is our new launch that offers our users a chance to earn commissions. We offer you an easy way to earn money right away by featuring links to our products and content on your personalized accounts</p>--}}
{{--                    <h3>Eligibility Criteria for IMA USA Shop Affiliate Program</h3>--}}
{{--                    <p>To be able to enroll in our IMA USA Shop affiliate program, you must: • Reach the age of majority in your country (18+). • Have your own public profile – a website URL should be provided. • Give full rights to IMA USA Shop for the products you are linking to your content.</p>--}}
{{--                    <p>Following are the sites that we discourage for our affiliate program:</p>--}}

{{--                    <p>1. All the sites that offer rewards on buying products from specific links.</p>--}}
{{--                    <p>2. All the ad platforms.</p>--}}
{{--                    <p>3. All the sites are</p>--}}
{{--                    <p>precisely made just to promote IMA USA Shop.</p>--}}
{{--                    <p>4. All the password-protected sites.</p>--}}
{{--                    <p>5. All the sites include political, religious, or other delicate matters.</p>--}}

{{--                    <p>Please note that IMA USA Shop reserves all the right to suspend any entry for the affiliate program in case of a violation of the program’s conditions. IMA USA Shop reserves all the right to modify the terms and conditions that this Affiliate Policy contain</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
<section class="affilates-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="heading">
                    <h3>IMA USA Shop Affiliate Program</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="affilates-item">
                    <h6>IMA USA Shop Affiliate Program</h6>
                    <h5>Sign up now, & start earning as an IMA USA <br> affiliate.</h5>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="affilates-item">
                    <h6>IMA USA Shop Affiliate Program</h6>
                    <p>IMA USA Shop Affiliate program is our new launch that offers our users a chance to earn commissions. We offer you an easy way to earn money right away by featuring links to our products and content on your personalized accounts</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12 col-sm-12 col-12">
                <article>
                    <h3>Eligibility Criteria For IMA USA Shop Affiliate Program</h3>
                    <p>To be able to enroll in our IMA USA Shop affiliate program, you must: • Reach the age of majority in your country (18+). • Have your own public profile – a website URL should be provided. • Give full rights to IMA USA Shop for the products you are linking to your content.</p>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="affiliate-program">
                    <h5>Following are the sites that we discourage for our affiliate program:</h5>
                    <ul>
                        <li>1. All the sites that offer rewards on buying products from specific links.</li>
                        <li>2. All the ad platforms.</li>
                        <li>3. All the sites are precisely made just to promote IMA USA Shop.</li>
                        <li>4. All the password-protected sites.</li>
                        <li>5. All the sites include political, religious, or other delicate matters.</li>
                    </ul>
                </div>
                <p>Please note that IMA USA Shop reserves all the right to suspend any entry for the affiliate program in case of a violation of the program’s conditions. IMA USA Shop reserves all the right to modify the terms and conditions that this Affiliate Policy contain</p>
            </div>
        </div>
    </div>
</section>
@includeIf('partials.global.common-footer')
@endsection
