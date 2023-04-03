@extends('layouts.front')
@section('content')
      {{--@includeIf('partials.global.common-header')--}}

    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Start selling') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Start selling') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->

    {{--    <section class="startSellSec innerBanner mt-5">--}}
    {{--        <div class="container">--}}
    {{--            <h2>Start Selling</h2>--}}
    {{--            <div class="row align-items-center justify-content-center">--}}
    {{--                <div class="col-md-12">--}}

    {{--                </div>--}}
    {{--                <div class="col-md-8">--}}
    {{--                    <figure>--}}
    {{--                        <img src="images/start1.jpg" alt="">--}}
    {{--                    </figure>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h3>START SELLING WITH IMA USA SHOP</h3>--}}
    {{--                    <p>“At IMA USA Shop, growth and comfort co-exist.”</p>--}}
    {{--                    <p>Your customers are eager to surf through your rich product-full market. Make yourself a part of--}}
    {{--                        this impactful e-commerce shopping site, and provide your customers with the best</p>--}}
    {{--                </div>--}}

    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <section class="valueSec">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <div class="box">--}}
    {{--                        <i class="far fa-star"></i>--}}
    {{--                        <div class="contentBox">--}}
    {{--                            <h3>True Value for Products</h3>--}}
    {{--                            <p>At IMA USA Shop, we discourage any hidden charges. Through our platform, we make sure you--}}
    {{--                                are getting the real value for the money you invest into your products</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <div class="box blueBox">--}}
    {{--                        <i class="far fa-star"></i>--}}
    {{--                        <div class="contentBox">--}}
    {{--                            <h3>Promotional Tools</h3>--}}
    {{--                            <p>Rendering your services at IMA USA Shop can help you in excelling your business. Reach--}}
    {{--                                the right audience and sell what you’ve got!</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--                <div class="col-md-4">--}}
    {{--                    <div class="box">--}}
    {{--                        <i class="far fa-star"></i>--}}
    {{--                        <div class="contentBox">--}}
    {{--                            <h3>Seamless Payments</h3>--}}
    {{--                            <p>The payment options that we offer are all reliable ones so that receiving payments on our--}}
    {{--                                site becomes easier for all of the sellers. Manage your money with us!</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <section class="sellingSection">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row align-items-center">--}}
    {{--                <div class="col-md-6 grySec">--}}
    {{--                    <h2>Want to kick start your selling business at IMA USA Shop?</h2>--}}
    {{--                    <p>Your dream business is now a reality; sign up as a seller now and start excelling in your--}}
    {{--                        business. Play with all the tools and make the most out of IMA USA Shop.</p>--}}
    {{--                    <a href="" class="themeBtn ">learn more</a>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6">--}}
    {{--                    <figure>--}}
    {{--                        <img src="images/start2.jpg" alt="">--}}
    {{--                    </figure>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <section class="faqSection  mb-5">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12 wow fadeInLeft" data-wow-delay="0.5s">--}}
    {{--                    <div class="faqHead">--}}
    {{--                        <h2 class="headOne">Frequently Asked Questions</h2>--}}
    {{--                    </div>--}}
    {{--                    <div id="accordion">--}}
    {{--                        <div class="card">--}}
    {{--                            <div id="headingOne">--}}
    {{--                                <h5 class="mb-0">--}}
    {{--                                    <button class="btn btn-link collapsed" data-toggle="collapse"--}}
    {{--                                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
    {{--                                        Q. How much would it take me to sell at IMA USA Shop?--}}
    {{--                                        <i class="fas fa-plus"></i>--}}
    {{--                                    </button>--}}
    {{--                                </h5>--}}
    {{--                            </div>--}}
    {{--                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"--}}
    {{--                                 data-parent="#accordion">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p>Ans. At IMA USA Shop, we never hide what we charge from our customers. After you--}}
    {{--                                        make a sale, we take on just a small profit percentage from our customers as--}}
    {{--                                        commission fees. Except that, you are liable to keep all your earnings.</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="card">--}}
    {{--                            <div id="headingTwo">--}}
    {{--                                <h5 class="mb-0">--}}
    {{--                                    <button class="btn btn-link collapsed" data-toggle="collapse"--}}
    {{--                                            data-target="#collapseTwo" aria-expanded="false"--}}
    {{--                                            aria-controls="collapseTwo">--}}
    {{--                                        Q. Can I sell locally-made products on IMA USA Shop?--}}
    {{--                                        <i class="fas fa-plus"></i>--}}
    {{--                                    </button>--}}
    {{--                                </h5>--}}
    {{--                            </div>--}}
    {{--                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"--}}
    {{--                                 data-parent="#accordion">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p>Ans. Yes, you can! We encourage all the sellers to offer US-based products to the--}}
    {{--                                        customers. However, we also provide a platform to sell international products--}}
    {{--                                        too.. </p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}


    {{--                        <div class="card">--}}
    {{--                            <div id="headingthre">--}}
    {{--                                <h5 class="mb-0">--}}
    {{--                                    <button class="btn btn-link collapsed" data-toggle="collapse"--}}
    {{--                                            data-target="#collapsethre" aria-expanded="false"--}}
    {{--                                            aria-controls="collapsethre">--}}
    {{--                                        Q. What are the shipping costs at IMA USA Shop?--}}
    {{--                                        <i class="fas fa-plus"></i>--}}
    {{--                                    </button>--}}
    {{--                                </h5>--}}
    {{--                            </div>--}}
    {{--                            <div id="collapsethre" class="collapse" aria-labelledby="headingthre"--}}
    {{--                                 data-parent="#accordion">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p>Ans. The shipping charges for each order differ; to know more about the options--}}
    {{--                                        that are available for shipping, please visit this page.</p>--}}

    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="card">--}}
    {{--                            <div id="headingfour">--}}
    {{--                                <h5 class="mb-0">--}}
    {{--                                    <button class="btn btn-link collapsed" data-toggle="collapse"--}}
    {{--                                            data-target="#collapsefour" aria-expanded="false"--}}
    {{--                                            aria-controls="collapsefour">--}}
    {{--                                        Q. What products can I sell on IMA USA Shop?--}}
    {{--                                        <i class="fas fa-plus"></i>--}}
    {{--                                    </button>--}}
    {{--                                </h5>--}}
    {{--                            </div>--}}
    {{--                            <div id="collapsefour" class="collapse" aria-labelledby="headingfour"--}}
    {{--                                 data-parent="#accordion">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p>Ans. We allow our customers to sell everything they want to except rated-X--}}
    {{--                                        products and drugs. We offer the following categories on our site: Cellphones,--}}
    {{--                                        video games, computers, accessories for electronic appliances, smart home--}}
    {{--                                        devices, footwear, men’s and women’s clothing, watches, jewelry, beauty--}}
    {{--                                        products, makeup, and fragrances.</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="card">--}}
    {{--                            <div id="headingfive">--}}
    {{--                                <h5 class="mb-0">--}}
    {{--                                    <button class="btn btn-link collapsed" data-toggle="collapse"--}}
    {{--                                            data-target="#collapsefive" aria-expanded="false"--}}
    {{--                                            aria-controls="collapsefive">--}}
    {{--                                        Q. How can I get myself registered as a seller on IMA USA Shop?--}}
    {{--                                        <i class="fas fa-plus"></i>--}}
    {{--                                    </button>--}}
    {{--                                </h5>--}}
    {{--                            </div>--}}
    {{--                            <div id="collapsefive" class="collapse" aria-labelledby="headingfive"--}}
    {{--                                 data-parent="#accordion">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p>Ans. We keep welcoming new sellers to our site. Fill up the questionnaire now,--}}
    {{--                                        and start your selling journey now.</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}


    {{--                        <div class="card">--}}
    {{--                            <div id="headingsix">--}}
    {{--                                <h5 class="mb-0">--}}
    {{--                                    <button class="btn btn-link collapsed" data-toggle="collapse"--}}
    {{--                                            data-target="#collapsesix" aria-expanded="false"--}}
    {{--                                            aria-controls="collapsesix">--}}
    {{--                                        What is the fee for sessions?--}}
    {{--                                        <i class="fas fa-plus"></i>--}}
    {{--                                    </button>--}}
    {{--                                </h5>--}}
    {{--                            </div>--}}
    {{--                            <div id="collapsesix" class="collapse" aria-labelledby="headingsix"--}}
    {{--                                 data-parent="#accordion">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p>Fees vary based on the type of service you are seeking (for example family vs--}}
    {{--                                        individual session). Please contact me directly to discuss payment and next--}}
    {{--                                        steps. At this time, I do not accept insurance. You may be able to get--}}
    {{--                                        reimbursed by your insurance provider for out-of-netwrok services, in which case--}}
    {{--                                        I will be happy to provide you with a superbill; however, you will need to--}}
    {{--                                        verify your benefits beforehand. </p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="card">--}}
    {{--                            <div id="headingseven">--}}
    {{--                                <h5 class="mb-0">--}}
    {{--                                    <button class="btn btn-link collapsed" data-toggle="collapse"--}}
    {{--                                            data-target="#collapseseven" aria-expanded="false"--}}
    {{--                                            aria-controls="collapseseven">--}}
    {{--                                        Good Faith Estimate--}}
    {{--                                        <i class="fas fa-plus"></i>--}}
    {{--                                    </button>--}}
    {{--                                </h5>--}}
    {{--                            </div>--}}
    {{--                            <div id="collapseseven" class="collapse" aria-labelledby="headingseven"--}}
    {{--                                 data-parent="#accordion">--}}
    {{--                                <div class="card-body">--}}
    {{--                                    <p>You have the right to receive a “Good Faith Estimate” explaining how much your--}}
    {{--                                        medical and mental health care will cost. Under the law, health care providers--}}
    {{--                                        need to give patients who don’t have insurance or who are not using insurance an--}}
    {{--                                        estimate of the expected charges for medical services, including psychotherapy--}}
    {{--                                        services. </p>--}}
    {{--                                    <p>You have the right to receive a Good Faith Estimate for the total expected cost--}}
    {{--                                        of any non-emergency healthcare services, including psychotherapy services. </p>--}}
    {{--                                    <p>You can ask your healthcare provider, and any other provider you choose, for a--}}
    {{--                                        Good Faith Estimate before you schedule a service. </p>--}}
    {{--                                    <p>For questions or more information about your right to a good faith estimate,--}}
    {{--                                        visit <a href="https://www.cms.gov/nosurprises" target="_blank">https://www.cms.gov/nosurprises</a>--}}
    {{--                                    </p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--    </section>--}}
    <section class="shopselling-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <article>
                        <img src="images/cart.png" alt="" class="w-20">
                        <h3>START SELLING WITH US</h3>
                        <h5>“Growth and comfort coexist at IMA USA Store.”</h5>
                        <p>Customers are ready to browse your vibrant, product-filled bazaar. Join this influential
                            e-commerce platform and provide your consumers with the best by joining.</p>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="detail-box">
                        <img src="images/iconic01.png" alt="">
                        <h4>True Value for Products</h4>
                        <p>At IMA USA Shop, we discourage any hidden charges.
                            Through our platform, we make sure you are getting the real value for the money you invest
                            into your products</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="detail-box">
                        <img src="images/iconic02.png" alt="">
                        <h4>Promotional Tools</h4>
                        <p>Rendering your services at IMA USA Shop can help you in excelling your business. Reach the
                            right audience and sell what you’ve got!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="detail-box">
                        <img src="images/iconic03.png" alt="">
                        <h4>Seamless Payments</h4>
                        <p>The payment options that we offer are all reliable ones so that receiving payments on our
                            site becomes easier for all of the sellers. Manage your money with us!</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-sm-12 col-12">
                    <article>
                        <h4><strong>Growth and comfort coexist at IMA USA Store.</strong></h4>
                        <p>Customers are ready to browse your vibrant, product-filled bazaar. Join this influential
                            e-commerce platform and provide your consumers with the best by joining.</p>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="sellingbox">
                        <h3>Real Cost of Goods</h3>
                        <p>Any hidden fees are discouraged at the IMA USA Store. We ensure that you receive the actual
                            value for the money you spend on your items through our platform.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="sellingbox">
                        <h3>Resources Promotion</h3>
                        <p>Offering your services to the IMA USA Store can aid in the expansion of your business. Get in
                            front of the right audience to sell your goods!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="sellingbox">
                        <h3>Seamless Transactions</h3>
                        <p>We provide a variety of reliable payment methods so that all of the vendors on our site can
                            receive money more efficiently. Use us to manage your finances!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="sellingbox">
                        <h3>Want to launch your selling venture at the IMA USA Shop?</h3>
                        <p>Your dream company is now a reality; register as a seller right away, and you may start
                            succeeding in business. Use IMA USA Shop to its fullest potential using all the tools.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <h4>Learn to Sell </h4>
                    <h3>How to sell at IMA USA Shop?</h3>
                    <h5>Register/Sign Up and List Products </h5>
                    <p>You only need to fill out a brief questionnaire to sell at the IMA USA Store. Wait for us to
                        contact you after listing all the products you are willing to sell.</p>
                    <h5>Deliver your goods</h5>
                    <p>Feel free to begin your selling endeavors once you've registered as a vendor on our site. Take
                        orders, ship them to your consumers, and get going.</p>
                    <h5>Take payments</h5>
                    <p>Selling is typically done to make money. Start taking payments from your customers using the
                        simple payment options offered.</p>
                    <h4>Affiliates </h4>
                    <h3>IMA USA Shop Affiliate Program</h3>
                    <p>Our most recent initiative, the IMA USA Store Affiliate Program, allows users to make money. We
                        give you the opportunity to earn money quickly by adding links to our merchandise and content to
                        each of your personal accounts.</p>
                    <h5>Requirements for the IMA USA Store Affiliate Program</h5>
                    <p>To be eligible to participate in our IMA USA Shop affiliate program, you must fulfill the
                        following requirements:</p>
                    <ul>
                        <li>• Be at least 18 years old in your country.</li>
                        <li>• Create a public profile for yourself; include the URL of your website.</li>
                        <li> • Give IMA USA Store complete rights to the goods you are linking to in your content.</li>
                    </ul>
                    <h4 class="mt-4">The websites listed below are ones we discourage from using with our affiliate
                        program:</h4>
                    <p> 1. All the websites that provide bonuses for making purchases through particular links.</p>
                    <p>2. All advertising platforms.</p>
                    <p>3. All websites are specifically designed to promote the IMA USA Store.</p>
                    <p>4. Any websites that require a password.</p>
                    <p>5. All of the websites that discuss sensitive topics like politics, religion, or other
                        issues.</p>
                    <p>Please be aware that IMA USA Store maintains the right to revoke any affiliate program entry if
                        the terms of the program are broken.</p>
                    <p>The terms and conditions in this Affiliate Policy can be changed at any time, with or without
                        notice, from IMA USA Store.</p>
                    <h3>Privacy Policy for IMA USA SHOP</h3>
                    <p>Access to IMA USA SHOP may be found at https://testv13.demowebsitelinks.com/IMA-USA-Shop, and
                        maintaining visitor privacy is one of our top objectives. As a result, this Privacy Policy paper
                        details the data we have gathered and recorded, as well as how we intend to utilize it.</p>
                    <p>Our online actions are the only ones covered by this privacy policy. That applies to users of our
                        website in terms of the data they disclose and gather. Any information gathered offline or
                        through sources other than this website is not covered by this policy.</p>
                    <h5>How we use the data you provide</h5>
                    <p>We make use of the data we gather in a variety of ways, such as:</p>
                    <p>Supplying, running, and maintaining our website</p>
                    <p>Enhance, customize, and broaden our website</p>
                    <p>Recognize and examine how you are using our website.</p>
                    <p>Create new goods, services, features, and capabilities.</p>
                    <h5>Privacy Policy of Third Parties</h5>
                    <p>The privacy policy of IMA USA SHOP does not cover other advertisers or websites. As a result, we
                        suggest that you review the individual Privacy Policies of these third-party ad servers for more
                        information. It might also contain information about their procedures and guidelines for
                        rejecting particular choices.</p>
                    <p>With your browser's settings, you can choose to disable cookies. Further in-depth information
                        about cookie management with particular web browsers can be found on the web pages for the
                        various browsers.</p>
                    <h3>Terms and Conditions </h3>
                    <p>Access IMA USA SHOP from https://testv13.demowebsitelinks.com/IMA-USA-Shop </p>
                    <p>The terms "Client," "You," and "You are" refer to the user who accesses this website and agrees
                        to be bound by the terms and conditions of the company, as well as all agreements. The
                        terminology used in these Terms and Conditions, Privacy Statement, and Disclaimer Notice, as
                        well as all Agreements, is as follows: Our company is referred to as "The Company," "Ourselves,"
                        "We," "Our," and "Us." The terms "Party," "Parties," or "Us" shall collectively refer to the
                        Client and Us. All terms refer to the offer, acceptance, and consideration of payment necessary
                        to carry out the process of providing our assistance to the client in the most suitable way for
                        the specific purpose of meeting the client's needs in relation to the provision of the company's
                        stated services, in agreement with and subject to, the applicable law of the USA. </p>
                    <h5>Cookies</h5>
                    <p>We use cookies in our operations. By accessing IMA USA SHOP, you accept that cookies will be used
                        in accordance with the privacy policies of IMA USA SHOP.</p>
                    <p>Cookies are used by the majority of interactive websites to allow us to retrieve user information
                        for each visit. Cookies help our website's visitors by enabling the functionality of some
                        features in order to make their experience more convenient. Cookies may also be used by some of
                        our affiliate and advertising partners.</p>
                    <h5>License</h5>
                    <p>All content on IMA USA Shop is the exclusive property of IMA USA SHOP and its licensors unless
                        otherwise noted. The ownership of every intellectual property is reserved. According to the
                        limitations set forth in these terms and conditions, you may access this from IMA USA SHOP for
                        private use.</p>
                    <h4>You cannot: </h4>
                    <p>Copy IMA USA SHOP's material.</p>
                    <p>Sell, rent, or grant a sublicense for IMA USA SHOP's content.</p>
                    <p>Redistributing IMA USA SHOP's material is not allowed.</p>
                    <p>Republish content from IMA USA SHOP.</p>
                    <p>IMA USA SHOP reserves the right to review all of the Comments and to remove any Comments which
                        are considered to be improper, offensive, or that otherwise violate the policy.</p>
                    <h4>Article Liability</h4>
                    <p>Any content on your website is not our responsibility. You acknowledge that you will defend us
                        against all allegations made on your website. No link(s) should be visible on any website that
                        could be construed as offensive, explicit, or illegal or that violates, supports the violation
                        of, or infringes upon, the rights of any third party.</p>
                    <h5>The Reserved Rights</h5>
                    <p>We have the right to ask you to take down any link to our website or all links. You agree that
                        upon request, all links to our website will be immediately removed. Also, we reserve the right
                        to at any time change these terms and conditions as well as its linking policy. You agree to be
                        governed by and comply with these linking terms and conditions by consistently linking to our
                        website.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="faqs-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-sm-12">
                    <div class="heading">
                        <h3>Want To Kick Start Your Selling Business At IMA USA Shop?</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-sm-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                       aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i class="more-less glyphicon far fa-angle-down"></i>
                                        <span>How much would it take me to sell at IMA USA Shop?</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingOne" style="">
                                <div class="panel-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's </p>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                           aria-controls="collapseTwo">
                                            <i class="more-less glyphicon far fa-angle-down"></i>
                                            Can I sell locally-made products on IMA USA Shop?
                                        </a>
                                    </h4>
                                </div>

                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                                           aria-controls="collapseThree">
                                            <i class="more-less glyphicon far fa-angle-down"></i>
                                            What are the shipping costs at IMA USA Shop?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingfour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapsefour" aria-expanded="false"
                                           aria-controls="collapsefour">
                                            <i class="more-less glyphicon far fa-angle-down"></i>
                                            What products can I sell on IMA USA Shop?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsefour" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingfour">
                                    <div class="panel-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingfive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapsefive" aria-expanded="false"
                                           aria-controls="collapsefive">
                                            <i class="more-less glyphicon far fa-angle-down"></i>
                                            How can I get myself registered as a seller on IMA USA Shop?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsefive" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingfive">
                                    <div class="panel-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingsix">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapsesix" aria-expanded="false"
                                           aria-controls="collapsesix">
                                            <i class="more-less glyphicon far fa-angle-down"></i>
                                            What is the fee for sessions?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapsesix" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingsix">
                                    <div class="panel-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingseven">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                           data-parent="#accordion" href="#collapseseven" aria-expanded="false"
                                           aria-controls="collapseseven">
                                            <i class="more-less glyphicon far fa-angle-down"></i>
                                            Good Faith Estimate
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseseven" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingseven">
                                    <div class="panel-body">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--@includeIf('partials.global.common-footer')--}}
@endsection
