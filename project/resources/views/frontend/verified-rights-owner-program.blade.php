@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Verified right owner program') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active"
                                aria-current="page">{{ __('Verified right owner program') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    <section class="affiliatesSec my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>VERIFIED RIGHTS OWNER PROGRAM</h2>
                    <h3>IMA USA Shop Policies and Regulations</h3>
                    <p>The rules and regulations at the IMA USA shop are based on our previous experience of how we can
                        protect our customers while they surf through our site. To make sure that you are staying safe
                        while using our site, please keep in mind the following regulations;</p>
                    <h3>Prohibit from selling restricted items</h3>
                    <p>At IMA USA Shop, we don’t allow the buying and selling of rated-x products, drugs, and other
                        inappropriate products. Any seller that will be found while exchanging any such item would be
                        suspended from our site and would not be able to operate anymor</p>
                    <h3>Rules for the buyers</h3>
                    <p>We respect the feedback of our clients. However, it is necessary for our customers to be liable
                        to guidelines and policies and refrain from using phrases that promote
                        hatred/discrimination.</p>
                    <h3>Money-back policy</h3>
                    <p>Our selling policies include the guarantee of refunding the money in case of any mishap; however,
                        IMA USA Shop reserves all the right to disclaim the money-back policy if the issues are found
                        inconsiderable.</p>
                    <h3>Shipping Policy</h3>
                    <p><a href="{{ route('front.verifiedRightsOwnerProgram') }}" class="text-dark">https://imausashop.com/</a>
                        is committed to excellence and the full
                        satisfaction of our customers. <a href="{{ route('front.verifiedRightsOwnerProgram') }}"
                                                          class="text-dark">https://imausashop.com/</a> proudly offers
                        shipping services. Be assured we are doing everything in our power to get your order to you as
                        soon as possible. Please consider any holidays that might impact delivery times.
                        <a href="{{ route('front.verifiedRightsOwnerProgram') }}" class="text-dark">https://imausashop.com/</a>
                        also offers same-day dispatch.</p>
                    <p>1. SHIPPING All orders for our products are processed and shipped out in 4-10 business days.
                        Orders are not shipped or delivered on weekends or holidays. If we are experiencing a high
                        volume of orders, shipments may be delayed by a few days. Please allow additional days in
                        transit for delivery. If there is a significant delay in the shipment of your order, we will
                        contact you via email.</p>
                    <p>2. WRONG ADDRESS DISCLAIMER It is the responsibility of the customers to make sure that the
                        shipping address entered is correct. We do our best to speed up processing and shipping time, so
                        there is always a small window to correct an incorrect shipping address. Please contact us
                        immediately if you believe you have provided an incorrect shipping address.</p>
                    <p>3. UNDELIVERABLE ORDERS Orders that are returned to us as undeliverable because of incorrect
                        shipping information are subject to a restocking fee to be determined by us.</p>
                    <p>4. LOST/STOLEN PACKAGES <a href="{{ route('front.verifiedRightsOwnerProgram') }}" class="text-dark">https://imausashop.com/</a>
                        is not responsible for
                        lost or stolen packages. If your tracking information states that your package was delivered to
                        your address and you have not received it, please report it to the local authorities.</p>
                    <p>5. RETURN REQUEST DAYS <a href="{{ route('front.verifiedRightsOwnerProgram') }}" class="text-dark">https://imausashop.com/</a>
                        allows you to return
                        its item (s) within a period of 7 days. Kindly be advised that the item (s) should be returned
                        unopened and unused.</p>
                    <p>6. OUT OF STOCK ITEM PROCESS <a href="{{ route('front.verifiedRightsOwnerProgram') }}"
                                                       class="text-dark">https://imausashop.com/</a> has the following
                        options in the event there are items that are out of stock
                        <a href="{{ route('front.verifiedRightsOwnerProgram') }}" class="text-dark">https://imausashop.com/</a>
                        Wait for all items to be in stock before
                        dispatching.</p>
                    <p>7. IMPORT DUTY AND TAXES When dealing with <a href="{{ route('front.verifiedRightsOwnerProgram') }}"
                                                                     class="text-dark">https://imausashop.com/</a>
                        you have the following options when it comes to taxes as well as import duties: You have the
                        option to decide whether you want to pre-pay taxes.</p>
                    <p>
                        8. ACCEPTANCE By accessing our site and placing an order, you have willingly accepted the terms
                        of this Shipping Policy.</p>
                    <p>
                        9. CONTACT INFORMATION In the event you have any questions or comments, please reach us via the
                        following contacts: Phone – 616-633-0999</p>
                </div>
            </div>
        </div>
    </section>


    @includeIf('partials.global.common-footer')
@endsection
