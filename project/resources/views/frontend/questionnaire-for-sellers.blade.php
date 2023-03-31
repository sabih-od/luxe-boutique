@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Questionnaire for Sellers') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">{{ __('Questionnaire for Sellers') }}</li>
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
{{--                    <h2>Questionnaire for Sellers</h2>--}}
{{--                    <h3>Fill the Form</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="formSec col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="first">Name of the Seller</label>--}}
{{--                        <input type="text" class="form-control" placeholder="" id="first">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="formSec col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="last">Name of the Business</label>--}}
{{--                        <input type="text" class="form-control" placeholder="" id="last">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="formSec col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="first">Country of Residence</label>--}}
{{--                        <input type="text" class="form-control" placeholder="" id="first">--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="formSec col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="last">State</label>--}}
{{--                        <input type="text" class="form-control" placeholder="" id="last">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="formSec col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="first">Contact No</label>--}}
{{--                        <input type="text" class="form-control" placeholder="" id="first">--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="formSec col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="last">Email</label>--}}
{{--                        <input type="text" class="form-control" placeholder="" id="last">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class=" checkBox col-md-12">--}}
{{--                    <h6>Are you interested in selling US-Based products or international products?</h6>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">--}}
{{--                        <label class="form-check-label" for="defaultCheck1">--}}
{{--                            International Products--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">--}}
{{--                        <label class="form-check-label" for="defaultCheck2">--}}
{{--                            US-based products--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <h6>Product Categories that you are interested in selling:</h6>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">--}}
{{--                        <label class="form-check-label" for="defaultCheck3">--}}
{{--                            Cellphones and Accessories--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">--}}
{{--                        <label class="form-check-label" for="defaultCheck4">--}}
{{--                            Cameras and Accessories--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">--}}
{{--                        <label class="form-check-label" for="defaultCheck5">--}}
{{--                            Watches--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck6">--}}
{{--                        <label class="form-check-label" for="defaultCheck6">--}}
{{--                            Smart Home Devices--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck7">--}}
{{--                        <label class="form-check-label" for="defaultCheck7">--}}
{{--                            Men’s Clothing--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck8">--}}
{{--                        <label class="form-check-label" for="defaultCheck8">--}}
{{--                            Jewelry--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck9">--}}
{{--                        <label class="form-check-label" for="defaultCheck9">--}}
{{--                            Video Games and Consoles--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck10">--}}
{{--                        <label class="form-check-label" for="defaultCheck10">--}}
{{--                            Women’s Clothing--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck11">--}}
{{--                        <label class="form-check-label" for="defaultCheck11">--}}
{{--                            Beauty--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck12">--}}
{{--                        <label class="form-check-label" for="defaultCheck12">--}}
{{--                            Computer and Accessories--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck13">--}}
{{--                        <label class="form-check-label" for="defaultCheck13">--}}
{{--                            Makeup and Fragrances--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck14">--}}
{{--                        <label class="form-check-label" for="defaultCheck14">--}}
{{--                            Footwear--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class=" newSec col-md-12">--}}
{{--                    <h5>Please keep the following terms and conditions in your mind before you sign up as a seller:</h5>--}}
{{--                    <hr>--}}
{{--                    <p>1) Being a seller, you are liable to pay a particular part of your profit as our commission fees.--}}
{{--                        Please keep in mind that these charges are irreversible.</p>--}}
{{--                    <p>2) In case of any bad reviews for your products, we will consider the views of our customers and--}}
{{--                        remove them from our site.</p>--}}
{{--                    <p>3) In case of any bad reviews, the seller is going to offer a refund to the customer. However,--}}
{{--                        10% of the selling fee will not be returned.</p>--}}
{{--                    <p>I agree to all the clauses stated above and agree to sign up as a seller at IMA USA Shop.</p>--}}
{{--                </div>--}}
{{--                <div class="formSec col-md-12">--}}
{{--                    <div class="form-group">--}}

{{--                        <input type="text" class="form-control" placeholder="" id="first">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="formSec col-md-6">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Signature:</label>--}}
{{--                        <div type="signature" class="form-control" placeholder="" id="first"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="formSec col-md-4">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Date</label>--}}
{{--                        <input type="date" class="form-control" placeholder="" id="first">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="questionnnaire-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h3 class="mb-5">Fill The Form</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12">
                    <input type="text" placeholder="Name of the Seller" class="form-control">
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <input type="text" placeholder="Name of the Business" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12">
                    <input type="text" placeholder="Country of Residence" class="form-control">
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <input type="text" placeholder="Contact No" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12">
                    <input type="text" placeholder="State" class="form-control">
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <p>Are You Interested In Selling US-Based Products Or International Products?</p>
                    <div class="new">
                        <form>
                            <div class="form-group">
                                <input type="checkbox" id="html">
                                <label for="html">International Products</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css">
                                <label for="css">US-based products</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <p>Are You Interested In Selling US-Based Products Or International Products?</p>
                    <div class="new checklist">
                        <form>
                            <div class="form-group">
                                <input type="checkbox" id="html1">
                                <label for="html1"> Cellphones and Accessories</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css2">
                                <label for="css2">Cameras and Accessories</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="html3">
                                <label for="html3"> Watches</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css4">
                                <label for="css4">Smart Home Devices</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="html5">
                                <label for="html5">Men’s Clothing</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css6">
                                <label for="css6">Jewelry</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="html7">
                                <label for="html7">Video Games and Consoles</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css8">
                                <label for="css8">Women’s Clothing</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css9">
                                <label for="css9"> Beauty</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css10">
                                <label for="css10"> Computer and Accessories</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css11">
                                <label for="css11">Makeup and Fragrances</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="css12">
                                <label for="css12">Footwear</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <article>
                        <h3>Please Keep The Following Terms And Conditions In Your Mind Before You Sign Up As A Seller:</h3>
                        <p>1) Being a seller, you are liable to pay a particular part of your profit as our commission fees. Please keep in mind that these charges are irreversible.</p>
                        <p>2) In case of any bad reviews for your products, we will consider the views of our customers and remove them from our site.</p>
                        <p>3) In case of any bad reviews, the seller is going to offer a refund to the customer. However, 10% of the selling fee will not be returned.</p>
                        <p>I agree to all the clauses stated above and agree to sign up as a seller at IMA USA Shop.</p>
                        <div class="date-signature">
                            <span>
                              <h5>Signature:</h5>
                            </span>
                            <span>
                                <form action="">
                                    <label for="">Date</label>
                                    <input type="text" placeholder="MM/DD/YYYY" class="form-control">
                                    <i class="far fa-calendar"></i>
                                </form>
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    @includeIf('partials.global.common-footer')
@endsection
