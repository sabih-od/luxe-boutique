@if($ps->third_left_banner==1)
    <!--==================== Newsleter Section Start ====================-->
    <div class="full-row bg-dark py-30">
        <div class="container">
            <div class="row mx-auto">
                <div class="col-lg-5 col-md-6 mx-auto">
                    <div class="d-flex align-items-center h-100">
                        <h4 class="text-white mb-0 text-uppercase">{{ __('Sign up to Newsletter') }}</h4>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12">
                    <form action="{{route('front.subscribe')}}"
                          class="subscribe-form subscribeform  position-relative md-mt-20" method="POST">
                        @csrf
                        <input class="form-control rounded-pill mb-0" type="text" placeholder="Enter your email"
                               aria-label="Address" name="email">
                        <button type="submit"
                                class="btn btn-secondary rounded-right-pill text-white">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--==================== Newsleter Section End ====================-->
@endif
<!--==================== Footer Section Start ====================-->
<footer class="full-row bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget mb-5">
                    <div class="footer-logo mb-4">
                        <a href="{{ route('front.index') }}"><img class="lazy"
                                                                  data-src="{{ asset('assets/images/'.$gs->logo) }}"
                                                                  alt="Image not found!"/></a>
                    </div>
                    <div class="widget-ecommerce-contact">
                        @if($ps->phone != null)
                            <span
                                class="font-medium font-500 text-dark">{{ __('Got Questions ? Call us 24/7!') }}</span>
                            <div class="text-dark h4 font-400 "><a href="tel:(616) 888-6116" class="text-dark">{{ $ps->phone }}</a></div>
                        @endif
                        @if($ps->street != null)
                            <span class="h6 text-secondary mt-2">{{ __('Address :') }}</span>
                            <div class="text-general">{{ $ps->street }}</div>
                        @endif
                        @if($ps->email != null)
                            <span class="h6 text-secondary mt-2">{{ __('Email :') }}</span>
                            <div class="text-general"><a href="mailto:admin@imausashop.com" class="text-dark">{{ $ps->email }}</a></div>
                        @endif
                    </div>
                </div>
                <div class="footer-widget media-widget mb-5">
                    @foreach(DB::table('social_links')->where('user_id',0)->where('status',1)->get() as $key => $link)
                        <a href="{{ $link->link }}"><i class="{{ $link->icon }}"></i></a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget category-widget mb-5">
                    <h3 class="widget-title mb-4 xs-mx-none">{{ __('Sell :') }}</h3>
                    <ul>
                        @if($ps->home == 1)
                            <li>
                                <a href="{{ route('front.startSelling') }}">{{ __('START SELLING') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('front.learnToSell') }}">{{ __('LEARN TO SELL') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.affiliates') }}">{{ __('AFFILIATES') }}</a>
                        </li>
                    </ul>
                    <h3 class="widget-title mb-4 xs-mx-none">{{ __('Tools & apps :') }}</h3>
                    <ul>
                        @if($ps->home == 1)
                            <li>
                                <a href="{{ route('front.developers') }}">{{ __('DEVELOPERS') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('front.securityCenter') }}">{{ __('SECURITY CENTER') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.siteMap') }}">{{ __('SITE MAP') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer-widget category-widget mb-5">
                    <h3 class="widget-title mb-4 xs-mx-none">{{ __('Vendor Quick Links :') }}</h3>
                    <ul>
                        @if($ps->home == 1)
                            <li>
                                <a href="{{ route('front.buyersPolicy') }}">{{ __('BUYER’S POLICY') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('front.sellersPolicy') }}">{{ __('SELLER’S POLICY') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.returnPolicy') }}">{{ __('RETURN POLICY') }}</a>
                        </li>
                         <li>
                            <a href="{{ route('front.questionnaireForSellers') }}">{{ __('QUESTIONNAIRE FOR SELLERS') }}</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-lg-2 col-md-6">
                <div class="footer-widget category-widget mb-5">
                    <h3 class="widget-title mb-4 xs-mx-none">{{ __('About IMA USA Shop:') }}</h3>
                    <ul>
                        @if($ps->home == 1)
                            <li>
                                <a href="{{ route('front.companyInfo') }}">{{ __('COMPANY INFO') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('front.news') }}">{{ __('NEWS') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.investors') }}">{{ __('INVESTORS') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.careers') }}">{{ __('CAREERS') }}</a>
                        </li>
                        <li>
                           <a href="{{ route('front.governmentRelations') }}">{{ __('GOVERNMENT RELATIONS') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.policies') }}">{{ __('POLICIES') }}</a>
                        </li>
                        <li>
                           <a href="{{ route('front.verifiedRightsOwnerProgram') }}">{{ __('VERIFIED RIGHTS OWNER PROGRAM') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget category-widget mb-5">
                    <h3 class="widget-title mb-4 xs-mx-none">{{ __('Help & Contact :') }}</h3>
                    <ul>
                        @if($ps->home == 1)
                            <li>
                                <a href="{{ route('front.sellerInformationCenter') }}">{{ __('SELLER INFORMATION CENTER') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('front.contactUs') }}">{{ __('CONTACT US') }}</a>
                        </li>
                    </ul>
                    <h3 class="widget-title mb-4 xs-mx-none">{{ __('Community :') }}</h3>
                    <ul>
                        @if($ps->home == 1)
                            <li>
                                <a href="{{ route('front.announcements') }}">{{ __('ANNOUNCEMENTS') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('front.discussionBoards') }}">{{ __('DISCUSSION BOARDS') }}</a>
                        </li>
                            <li>
                            <a href="{{ route('front.imaUsaShopGivingWorks') }}">{{ __('IMA USA SHOP GIVING WORKS') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
{{--            <div class="col-lg-7 col-md-6">--}}
{{--                <div class="footer-widget category-widget mb-5">--}}
{{--                    <h3 class="widget-title mb-4 text-center">{{ __('Additional Links') }}</h3>--}}
{{--                    <ul class="additional-links">--}}


{{--                        @foreach(DB::table('pages')->where('language_id',$langg->id)->where('footer','=',1)->get() as $data)--}}

{{--                            <li><a href="{{ route('front.vendor',$data->slug) }}">{{ $data->title }}</a></li>--}}

{{--                        @endforeach--}}

{{--                        <li><a href="{{ route('front.affiliates') }}">Affiliates</a></li>--}}


{{--                        <li><a href="{{ route('front.announcements') }}">Announcements</a></li>--}}

{{--                        <li><a href="{{ route('front.buyersPolicy') }}">Buyers Policy</a></li>--}}

{{--                        <li><a href="{{ route('front.careers') }}">Careers</a></li>--}}

{{--                        <li><a href="{{ route('front.companyInfo') }}">Company Info</a></li>--}}

{{--                        <li><a href="{{ route('front.contactUs') }}">Contact Us</a></li>--}}

{{--                        <li><a href="{{ route('front.developers') }}">Developers</a></li>--}}

{{--                        <li><a href="{{ route('front.discussionBoards') }}">Discussion Boards</a></li>--}}

{{--                        <li><a href="{{ route('front.governmentRelations') }}">Government Relations</a></li>--}}

{{--                        <li><a href="{{ route('front.imaUsaShopGivingWorks') }}">Ima Usa Shop Giving Works</a></li>--}}

{{--                        <li><a href="{{ route('front.investors') }}">Investors</a></li>--}}

{{--                        <li><a href="{{ route('front.learnToSell') }}">Learn To Sell</a></li>--}}

{{--                        <li><a href="{{ route('front.news') }}">News</a></li>--}}

{{--                        <li><a href="{{ route('front.policies') }}">Policies</a></li>--}}

{{--                        <li><a href="{{ route('front.questionnaireForSellers') }}">Questionnaire For Sellers</a></li>--}}

{{--                        <li><a href="{{ route('front.returnPolicy') }}">Return Policy</a></li>--}}

{{--                        <li><a href="{{ route('front.securityCenter') }}">Security Center</a></li>--}}

{{--                        <li><a href="{{ route('front.sellerInformationCenter') }}">Seller Information Center</a></li>--}}

{{--                        <li><a href="{{ route('front.sellersPolicy') }}">Sellers Policy</a></li>--}}

{{--                        <li><a href="{{ route('front.siteMap') }}">Site Map</a></li>--}}

{{--                        <li><a href="{{ route('front.startSelling') }}">Start Selling</a></li>--}}

{{--                        <li><a href="{{ route('front.verifiedRightsOwnerProgram') }}">Verified Rights Owner Program</a>--}}
{{--                        </li>--}}


{{--                        --}}{{--                        @foreach (DB::table('categories')->where('language_id',$langg->id)->get()->take(6) as $cate)--}}
{{--                        --}}{{--                            <li>--}}
{{--                        --}}{{--                                <a href="{{route('front.category', $cate->slug)}}{{!empty(request()->input('search')) ? '?search='.request()->input('search') : ''}}">{{ $cate->name }}</a>--}}
{{--                        --}}{{--                            </li>--}}
{{--                        --}}{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
            {{--            <div class="col-lg-3 col-md-6">--}}
            {{--                <div class="footer-widget widget-nav mb-5">--}}
            {{--                    <h3 class="widget-title mb-4">{{ __('Recent Post') }}</h3>--}}
            {{--                    <ul>--}}
            {{--                        @foreach (DB::table('blogs')->where('language_id',$langg->id)->latest()->limit(3)->get() as $footer_blog)--}}
            {{--                            <li>--}}
            {{--                                <div class="post">--}}
            {{--                                    <div class="post-img">--}}
            {{--                                        <img class="lozad lazy"--}}
            {{--                                             data-src="{{ asset('assets/images/blogs/'.$footer_blog->photo) }}" alt="">--}}
            {{--                                    </div>--}}
            {{--                                    <div class="post-details">--}}
            {{--                                        <a href="{{ route('front.blogshow',$footer_blog->slug) }}">--}}
            {{--                                            <h4 class="post-title">--}}
            {{--                                                {{mb_strlen($footer_blog->title,'UTF-8') > 45 ? mb_substr($footer_blog->title,0,45,'UTF-8')." .." : $footer_blog->title}}--}}
            {{--                                            </h4>--}}
            {{--                                        </a>--}}
            {{--                                        <p class="date">--}}
            {{--                                            {{ date('M d - Y',(strtotime($footer_blog->created_at))) }}--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}

            {{--                        @endforeach--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
</footer>
<!--==================== Footer Section End ====================-->

<!--==================== Copyright Section Start ====================-->

<div class="container">

    <div class="mx-auto text-center py-3">
        <span class="sm-mb-10 d-block">{{ $gs->copyright }}</span>
    </div>


</div>
<!--==================== Copyright Section End ====================-->

@if(isset($visited))

    @if($gs->is_cookie == 1)
        <div class="cookie-bar-wrap show">
            <div class="container d-flex justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="row justify-content-center">
                        <div class="cookie-bar">
                            <div class="cookie-bar-text">
                                {{ __('The website uses cookies to ensure you get the best experience on our website.') }}
                            </div>
                            <div class="cookie-bar-action">
                                <button class="btn btn-primary btn-accept">
                                    {{ __('GOT IT!') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif


<!--==================== Copyright Section End ====================-->

<!-- Scroll to top -->
<a href="#" class="scroller text-white" id="scroll"><i class="fa fa-angle-up"></i></a>
