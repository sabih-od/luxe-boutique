@extends('layouts.front')
@section('content')
    @include('partials.global.common-header')
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Policies') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Policies') }}</li>
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
    {{--                    <h2>POLICIES</h2>--}}
    {{--                    <h3>IMA USA Shop Policies and Regulations</h3>--}}
    {{--                    <p>The rules and regulations at the IMA USA shop are based on our previous experience of how we can--}}
    {{--                        protect our customers while they surf through our site. To make sure that you are staying safe--}}
    {{--                        while using our site, please keep in mind the following regulations;</p>--}}
    {{--                    <h3>Prohibit from selling restricted items</h3>--}}
    {{--                    <p>At IMA USA Shop, we want all of our buyers and sellers to feel safe. One way we do this is to--}}
    {{--                        discourage any attempt for restricted and underage sales and purchases of rated-x products,--}}
    {{--                        drugs, alcohol, smoking or vaping products and paraphernalia, aerosol paint, firearms , and any--}}
    {{--                        parts or products related to these and other illegal or age restricted items. Selling of these--}}
    {{--                        products would increase liabilities, fines, lawsuits and go against legal requirements for--}}
    {{--                        online buyers and sellers. We restrict these items in order to protect our sellers and decrease--}}
    {{--                        illegal activity so those selling and buying feel safe on our site. Due to this, any seller that--}}
    {{--                        will be found exchanging any such item would be suspended from our site and would be open to--}}
    {{--                        such legal consequences.</p>--}}
    {{--                    <h3>Rules for the buyers</h3>--}}
    {{--                    <p>We respect the feedback of our clients. However, it is necessary for our customers to be liable--}}
    {{--                        to guidelines and policies and refrain from using phrases that promote--}}
    {{--                        hatred/discrimination.</p>--}}
    {{--                    <h3>Discrimination and protection for users</h3>--}}
    {{--                    <p>Discriminating against others or providing written, graphic, transmitted materials or speech to--}}
    {{--                        incite hatred, violence, or offences, toward persons or characteristics, including sexual--}}
    {{--                        orientation, race, color, religion, ethinc origin, or disability, including the encouragement of--}}
    {{--                        these actions through the selling of products, presenting, and promoting of such, and performing--}}
    {{--                        actions or activities to cause the stiring or representation of these prohibited offenses is--}}
    {{--                        prohibited and is cause for suspension or termination from the site..</p>--}}
    {{--                    <h3>ISP Policies <br>--}}
    {{--                        Definitions</h3>--}}
    {{--                    <p>The definitions below apply to IMA USA Shop’s acceptable policies. We reserve the right to update--}}
    {{--                        and change these definitions and policies at any time. Restricted Items – Underage Sales –--}}
    {{--                        includes the purchasing and selling of any products that are age restricted. – Rated X products--}}
    {{--                        – magazines, photos, written, audio and video content, files, art and graphic descriptions, data--}}
    {{--                        or other content inappropriate to minors. – Smoking and Vaping products – includes any products--}}
    {{--                        being presented for inhalation that is age restricted and it’s paraphernalia used with such--}}
    {{--                        items. – Aerosol paint – a product that is unsafe to ship and also age-restricted due to misuse--}}
    {{--                        and inhalation. – Firearms – This includes any firearm or items used on or for, any part of,--}}
    {{--                        component of, or ammunition for these products. – Illegal or age restricted items – this varies--}}
    {{--                        by state, but to keep our site safe, we restrict anything that is deemed inappropriate for--}}
    {{--                        purchase by age or illegal to sell/buy.</p>--}}
    {{--                    <h3>Money-back policy</h3>--}}
    {{--                    <p>Our selling policies include the guarantee of refunding the money in case of any mishap; however,--}}
    {{--                        IMA USA Shop reserves all the right to disclaim the money-back policy if the issues are found--}}
    {{--                        inconsiderable.</p>--}}
    {{--                    <h3>Shipping Policy</h3>--}}
    {{--                    <p><a href="{{ route('front.policies') }}" class="text-dark">https://imausashop.com/</a>--}}
    {{--                        is committed to excellence and the full--}}
    {{--                        satisfaction of our customers. <a href="{{ route('front.policies') }}"--}}
    {{--                                                          class="text-dark">https://imausashop.com/</a> proudly offers--}}
    {{--                        shipping services. Be assured we are doing everything in our power to get your order to you as--}}
    {{--                        soon as possible. Please consider any holidays that might impact delivery times.--}}
    {{--                        <a href="{{ route('front.policies') }}" class="text-dark">https://imausashop.com/</a>--}}
    {{--                        also offers same-day dispatch.</p>--}}
    {{--                    <p>1. SHIPPING All orders for our products are processed and shipped out in 4-10 business days.--}}
    {{--                        Orders are not shipped or delivered on weekends or holidays. If we are experiencing a high--}}
    {{--                        volume of orders, shipments may be delayed by a few days. Please allow additional days in--}}
    {{--                        transit for delivery. If there is a significant delay in the shipment of your order, we will--}}
    {{--                        contact you via email.</p>--}}
    {{--                    <p>2. WRONG ADDRESS DISCLAIMER It is the responsibility of the customers to make sure that the--}}
    {{--                        shipping address entered is correct. We do our best to speed up processing and shipping time, so--}}
    {{--                        there is always a small window to correct an incorrect shipping address. Please contact us--}}
    {{--                        immediately if you believe you have provided an incorrect shipping address.</p>--}}
    {{--                    <p>3. UNDELIVERABLE ORDERS Orders that are returned to us as undeliverable because of incorrect--}}
    {{--                        shipping information are subject to a restocking fee to be determined by us.</p>--}}
    {{--                    <p>4. LOST/STOLEN PACKAGES <a href="{{ route('front.policies') }}" class="text-dark">https://imausashop.com/</a>--}}
    {{--                        is not responsible for--}}
    {{--                        lost or stolen packages. If your tracking information states that your package was delivered to--}}
    {{--                        your address and you have not received it, please report it to the local authorities.</p>--}}
    {{--                    <p>5. RETURN REQUEST DAYS <a href="{{ route('front.policies') }}" class="text-dark">https://imausashop.com/</a>--}}
    {{--                        allows you to return--}}
    {{--                        its item (s) within a period of 7 days. Kindly be advised that the item (s) should be returned--}}
    {{--                        unopened and unused.</p>--}}
    {{--                    <p>6. OUT OF STOCK ITEM PROCESS <a href="{{ route('front.policies') }}"--}}
    {{--                                                       class="text-dark">https://imausashop.com/</a> has the following--}}
    {{--                        options in the event there are items that are out of stock--}}
    {{--                        <a href="{{ route('front.policies') }}" class="text-dark">https://imausashop.com/</a>--}}
    {{--                        Wait for all items to be in stock before--}}
    {{--                        dispatching.</p>--}}
    {{--                    <p>7. IMPORT DUTY AND TAXES When dealing with <a href="{{ route('front.policies') }}"--}}
    {{--                                                                     class="text-dark">https://imausashop.com/</a>--}}
    {{--                        you have the following options when it comes to taxes as well as import duties: You have the--}}
    {{--                        option to decide whether you want to pre-pay taxes.</p>--}}
    {{--                    <p>--}}
    {{--                        8. ACCEPTANCE By accessing our site and placing an order, you have willingly accepted the terms--}}
    {{--                        of this Shipping Policy.</p>--}}
    {{--                    <p>--}}
    {{--                        9. CONTACT INFORMATION In the event you have any questions or comments, please reach us via the--}}
    {{--                        following contacts: Phone – 616-633-0999</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="sitemap-sec">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="box-styles">
                        <h4>BUYER'S POLICY</h4>
                        <p>At IMA USA Shop https://testv13.demowebsitelinks.com/IMA-USA-Shop/, we are committed to
                            providing our customers with the best possible online shopping experience. Our buyer policy
                            outlines our guidelines for purchasing products from our online store, including refunds,
                            returns, and exchanges. By purchasing from our store, you agree to our buyer policy.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Ordering Products</h4>
                        <p>When you place an order on IMA USA Shop, you agree to provide accurate and complete
                            information about yourself, including your name, billing address, shipping address, and
                            payment information. We have the right to cancel any order that we suspect to be fraudulent
                            or unauthorized.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Payment</h4>
                        <p>We accept major credit cards and PayPal as payment for our products. You will be charged the
                            total amount of your order at the time of purchase. All prices listed on our website are in
                            US dollars.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Shipping </h4>
                        <p>We strive to ship your order as quickly as possible. Most orders are shipped within 24 to 48
                            hours of being placed. Shipping times may vary depending on your location and the shipping
                            method you choose. Please refer to our Shipping Policy for more information.</p>
                    </div>
                    <div class="box-styles">
                        <h4>Returns and Refunds</h4>
                        <p>Your utmost satisfaction with your purchase is our goal. If you do not like your purchase for
                            any reason, you have 30 days from the date of purchase to return it for a full refund,
                            excluding shipping charges. For additional details, please refer to our return policy.</p>
                        <h4>Exchanges</h4>
                        <p>If you receive a defective or damaged product, you may exchange it for a new one. Please
                            refer to our Exchange Policy for more information.</p>
                        <h4>Customer Service</h4>
                        <p>Our customer representative team is available to answer any questions or queries you may
                            have. You can contact us via email or phone during business hours. </p>
                        <p>Customers at the IMA USA Shop should be aware of the following:</p>
                        <div class="points">
                            <ul>
                                <li> • At IMA USA Shop, we strongly disapprove of accounts that use false contact
                                    information. Due to the frequent need to connect buyers and sellers, accurate
                                    contact information is essential.
                                </li>
                                <li> • Request the cancellation of the order from the merchant. Transactions and orders
                                    can only be canceled by a seller. Please keep in mind that there should be no
                                    discriminatory motives behind the cancellation of the order.
                                </li>
                                <li> • The return policies of the sellers from whom you are purchasing vary. As a
                                    result, make sure you understand the return policies before trading.
                                </li>
                                <li> • Your reviews assist us in maintaining our website, but we have the right to
                                    remove any critical feedback that is abusive, vulgar, or otherwise in violation of
                                    our content policy.
                                </li>
                                <li> • Using fictitious shop review ratings is strongly discouraged.
                                </li>
                            </ul>
                            <p>
                                Thank you for choosing IMA USA Shop for your online shopping needs. We appreciate your
                                business and hope your shopping experience with us is smooth and pleasant.
                            </p>
                        </div>
                    </div>
                    <div class="box-styles">
                        <h3>SELLER'S POLICY</h3>
                        <p>We uphold a secure, trustworthy, and equitable marketplace for buyers and sellers at
                            https://testv13.demowebsitelinks.com/IMA-USA-Shop/. </p>
                        <p>We anticipate you to refrain from adding any content to IMA USA SHOP as a merchant if
                            there
                            are:</p>
                        <ul>
                            <li>1) Any words or images that are hateful or offensive.</li>
                            <li> 2) Any material covered by the anti-discrimination policy.</li>
                            <li> 3) Any content that violates the users' safety or contains threats.</li>
                            <li> 4) Any information that is untrue or deceptive.</li>
                            <li>5) Any false advertising and promotions.</li>
                            <li> 6) Any material that rates X items.</li>
                        </ul>
                    </div>
                    <div class="box-styles">
                        <p>In order to guarantee that IMA USA Shop is a secure environment for everyone, all sellers
                            must:</p>
                        <ul>
                            <li> • Include all the correct information, including contact and product details. To
                                keep
                                customers informed of changes, it is vital to update the information periodically.
                            </li>
                            <li> • Do not misuse the IMA USA Shop features.</li>
                            <li> • Avoid engaging in any behavior that violates the rights of the clients.</li>
                            <li> • Avoid engaging in any actions that violate the rights of other merchants. We
                                strongly
                                oppose artificially boosting website traffic. Avoid writing unfavorable reviews of
                                the
                                profiles of other vendors or engaging in any other behavior that might harm the
                                writer.
                            </li>
                            <li> • Remember that any price increases for the product after submitting your order
                                should
                                be removed.
                            </li>
                        </ul>
                    </div>
                    <div class="box-styles">
                        <p>Positive product reviews are severely discouraged at IMA USA Shop to increase sales.</p>
                        <ul>
                            <li>• As a vendor, you are not allowed to post positive reviews for your goods. In
                                addition,
                                reviewing goods from other merchants is not permitted.
                            </li>
                            <li> • You are not allowed to submit only positive reviews about yourself.</li>
                            <li> • Giving incentives for writing favorable product reviews is strongly
                                discouraged.
                            </li>
                        </ul>
                        <p>In the event of any rule violations, IMA USA Shop reserves the right to take severe
                            action
                            against your selling profile.</p>
                    </div>
                    <div class="box-styles">
                        <h5>RETURN POLICY</h5>
                        <p>Your purchases from https://testv13.demowebsitelinks.com/IMA-USA-Shop/ will be up to par
                            with
                            industry standards and satisfy all of your requirements, thanks to IMA USA Shop's
                            guarantee
                            policy. In addition, we promise that you will be completely satisfied with our return
                            policy.</p>
                        <h5>Return and Exchanges </h5>
                        <ul class="mt-4">
                            <li> • If you have any issues with the product(s) you've purchased, you have 30 days to
                                exchange or return the item(s).
                            </li>
                            <li>• The IMA USA Shop only accepts returns and exchanges on brand-new and unworn items
                                with
                                all tags attached and original packaging.
                            </li>
                            <li> • Due to sanitary concerns, IMA USA Shop does not accept returns or exchanges for
                                undergarments or face masks. However, we offer returns and exchanges if any product
                                has
                                manufacturing faults.
                            </li>
                        </ul>
                    </div>
                    <div class="box-styles">
                        <h5>Return and Exchanges within the United States</h5>
                        <p>Your purchases from https://testv13.demowebsitelinks.com/IMA-USA-Shop/ will be up to par
                            with
                            industry standards and satisfy all of your requirements, thanks to IMA USA Shop's
                            guarantee
                            policy. In addition, we promise that you will be completely satisfied with our return
                            policy.</p>
                        <h5>Return and Exchanges </h5>
                        <ul class="mt-4">
                            <li> • If you have any issues with the product(s) you've purchased, you have 30 days to
                                exchange or return the item(s).
                            </li>
                            <li>• The IMA USA Shop only accepts returns and exchanges on brand-new and unworn items
                                with
                                all tags attached and original packaging.
                            </li>
                            <li> • Due to sanitary concerns, IMA USA Shop does not accept returns or exchanges for
                                undergarments or face masks. However, we offer returns and exchanges if any product
                                has
                                manufacturing faults.
                            </li>
                        </ul>
                        <h5 class="mt-4">Return and Exchanges within the United States</h5>
                        <ul class="mt-4">
                            <li>• Free exchanges and returns are available for every order placed within the US.
                            </li>
                            <li>• Customers can visit our Fast and Easy Return Center to manage their exchange or
                                return
                                requests and print the postage label.
                            </li>
                        </ul>
                        <h5 class="mt-4">Return Policies </h5>
                        <ul>
                            <li> • In case of a return, the total cost of the item(s) will be deposited back into
                                the
                                account previously used to make the transaction.
                            </li>
                            <li> • The returns may take up to 14 business days to process.</li>
                        </ul>
                        <h5 class="mt-4">Exchange Policies </h5>
                        <p>Please note that inventories may have an impact on exchanges. You will receive a refund
                            if
                            the items are not available.</p>
                        <h5>• Exchanges for product(s) of equal value</h5>
                        <p>No additional fees or refunds would be assessed in the event of an exchange for
                            product(s) of
                            equal value.</p>
                        <h5>• Exchanges for the product(s) of lesser value</h5>
                        <p>If you exchange a product(s) for one of lesser value, the difference in the amount will
                            be
                            credited to the original account used to make the purchase or to your PayPal account.
                            Please
                            note that it may take 14 business days for the amount to appear in your account. </p>
                        <h5>• Exchanges for item(s) of greater value</h5>
                        <p>If you exchange an item for an item(s) of greater value, the difference will be charged
                            to
                            the account you used to make the original transaction. If the initial purchase was made
                            using PayPal, you must return the item before ordering a replacement (s). </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @includeIf('partials.global.common-footer')
@endsection
