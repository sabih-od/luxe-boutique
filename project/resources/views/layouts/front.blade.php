<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <meta name="description" content="GeniusCart-New - Multivendor Ecommerce system">--}}
{{--    <meta name="author" content="GeniusOcean">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    @if(isset($page->meta_tag) && isset($page->meta_description))--}}

{{--        <meta name="keywords" content="{{ $page->meta_tag }}">--}}
{{--        <meta name="description" content="{{ $page->meta_description }}">--}}
{{--        <title>{{$gs->title}}</title>--}}

{{--    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))--}}

{{--        <meta property="og:title" content="{{$blog->title}}"/>--}}
{{--        <meta property="og:description"--}}
{{--              content="{{ $blog->meta_description != null ? $blog->meta_description : strip_tags($blog->meta_description) }}"/>--}}
{{--        <meta property="og:image" content="{{asset('assets/images/blogs/'.$blog->photo)}}"/>--}}
{{--        <meta name="keywords" content="{{ $blog->meta_tag }}">--}}
{{--        <meta name="description" content="{{ $blog->meta_description }}">--}}
{{--        <title>{{$gs->title}}</title>--}}

{{--    @elseif(isset($productt))--}}

{{--        <meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): '' }}">--}}
{{--        <meta name="description"--}}
{{--              content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}">--}}
{{--        <meta property="og:title" content="{{$productt->name}}"/>--}}
{{--        <meta property="og:description"--}}
{{--              content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}"/>--}}
{{--        <meta property="og:image" content="{{asset('assets/images/thumbnails/'.$productt->thumbnail)}}"/>--}}
{{--        <meta name="author" content="GeniusOcean">--}}
{{--        <title>{{substr($productt->name, 0,11)."-"}}{{$gs->title}}</title>--}}

{{--    @else--}}

{{--        <meta property="og:title" content="{{$gs->title}}"/>--}}
{{--        <meta property="og:image" content="{{asset('assets/images/'.$gs->logo)}}"/>--}}
{{--        <meta name="keywords" content="{{ $seo->meta_keys }}">--}}
{{--        <meta name="author" content="GeniusOcean">--}}
{{--        <title>{{$gs->title}}</title>--}}

{{--    @endif--}}

{{--    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>--}}
{{--    <!-- Google Font -->--}}
{{--    @if ($default_font->font_value)--}}
{{--        <link--}}
{{--            href="https://fonts.googleapis.com/css?family={{ $default_font->font_value }}:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"--}}
{{--            rel="stylesheet">--}}
{{--    @else--}}
{{--        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap"--}}
{{--              rel="stylesheet">--}}
{{--    @endif--}}
{{--    <link--}}
{{--        rel="stylesheet"--}}
{{--        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"--}}
{{--    />--}}
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery.fancybox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/slick.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/slick-theme.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/custom.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/slider.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

{{--    @if ($default_font->font_family)--}}
{{--        <link rel="stylesheet" id="colorr"--}}
{{--              href="{{ asset('assets/front/css/font.php?font_familly='.$default_font->font_family) }}">--}}
{{--    @else--}}
{{--        <link rel="stylesheet" id="colorr" href="{{ asset('assets/front/css/font.php?font_familly='."Open Sans") }}">--}}
{{--    @endif--}}

{{--    @if(!empty($seo->google_analytics))--}}
{{--        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $seo->google_analytics }}"></script>--}}
{{--        <script>--}}
{{--            window.dataLayer = window.dataLayer || [];--}}

{{--            function gtag() {--}}
{{--                dataLayer.push(arguments);--}}
{{--            }--}}

{{--            gtag('js', new Date());--}}

{{--            gtag('config', '{{ $seo->google_analytics }}');--}}
{{--        </script>--}}
{{--    @endif--}}
{{--    @if(!empty($seo->facebook_pixel))--}}
{{--        <script>--}}
{{--            !function (f, b, e, v, n, t, s) {--}}
{{--                if (f.fbq) return;--}}
{{--                n = f.fbq = function () {--}}
{{--                    n.callMethod ?--}}
{{--                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)--}}
{{--                };--}}
{{--                if (!f._fbq) f._fbq = n;--}}
{{--                n.push = n;--}}
{{--                n.loaded = !0;--}}
{{--                n.version = '2.0';--}}
{{--                n.queue = [];--}}
{{--                t = b.createElement(e);--}}
{{--                t.async = !0;--}}
{{--                t.src = v;--}}
{{--                s = b.getElementsByTagName(e)[0];--}}
{{--                s.parentNode.insertBefore(t, s)--}}
{{--            }(window, document, 'script',--}}
{{--                'https://connect.facebook.net/en_US/fbevents.js');--}}
{{--            fbq('init', '{{ $seo->facebook_pixel }}');--}}
{{--            fbq('track', 'PageView');--}}
{{--        </script>--}}
{{--        <noscript>--}}
{{--            <img height="1" width="1" style="display:none"--}}
{{--                 src="https://www.facebook.com/tr?id={{ $seo->facebook_pixel }}&ev=PageView&noscript=1"/>--}}
{{--        </noscript>--}}
{{--    @endif--}}


    @yield('css')
</head>
<body>
<header>
    <!-- <div class="topBar">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-3">
                    <p>Free Shipping For Items Over $1000</p>
                </div>
                <div class="col-md-3">
                    <ul class="socialLinks">
                    <li><a href="#search"><i class="far fa-search"></i></a></li>
                        <li><a href=""><i class="fal fa-shopping-cart"></i></a></li>

                        <li><a href=""><i class="far fa-user"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg p-0">
            <a class="navbar-brand d-none" href="{{route('front.index')}}">
                <img src="{{asset('assets/front/images/footerlogo.webp')}}" alt="img">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('front.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.about')}}">About us</a>
                    </li>
                    <li class="nav-item centerImg">
                        <a class="navbar-brand" href="{{route('front.index')}}">
                            <img src="{{asset('assets/front/images/footerlogo.webp')}}" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{route('front.shop')}}">Shop<i class="fas fa-caret-down"></i></a>
{{--                        <div class="subMenu">--}}
{{--                            <div>--}}
{{--                                <ul>--}}
{{--                                    @foreach ($categories as $key => $category)--}}
{{--                                        <li>--}}
{{--                                            <a href="{{ route('front.categories', ['id' => $category->id]) }}">--}}
{{--                                                <figure>--}}
{{--                                                    <img src="{{ asset('assets/front/images/women.png') }}" class="img-fluid" alt="img">--}}
{{--                                                </figure>--}}
{{--                                                {{ $category->name }}--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        @if (($key + 1) % 6 == 0)--}}
{{--                                </ul><ul>--}}
{{--                                    @endif--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('front.contactUs')}}">Contact Us</a>
                    </li>
                </ul>
                <div class="shopbasket">
                    <a class="nav-link" href="#"><i class="fal fa-shopping-cart"></i></a>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- END: Header -->

<!-- PreLoader CSS -->
<!-- <div class="preLoader black">
    <img src="images/logo.png" alt="">
</div>
<div class="preLoader white"></div> -->

    @yield('content')

<!-- Begin: Footer -->
<footer>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-3" data-aos="fade-up-right">
                <a href="#" class="d-block text-center"><img src="{{asset('assets/front/images/footerlogo.webp')}}" alt="footer logo"></a>
            </div>
            <div class="col-md-5" data-aos="fade-right">
                <h3>Quick Links :</h3>
                <ul class="links">
                    <li><a href="{{route('front.about')}}">About </a></li>
                    <li><a href="{{route('front.shop')}}">Shop</a></li>
                    <li><a href="{{route('front.contactUs')}}">Contact</a></li>
                </ul>
            </div>
            <!--                 <div class="col-md-2" data-aos="fade-left">-->
            <!--                     <h3>Quick Links::</h3>-->
            <!--                     <ul class="contactInfo">-->
            <!--                         <li><a href="">Men’s-->
            <!---->
            <!---->
            <!--                             </a></li>-->
            <!--                         <li><a href=""> Jewelry</a></li>-->
            <!--                         <li><a href="">Revive Skincare</a></li>-->
            <!--                         <li><a href="contact.php">Contact us</a></li>-->
            <!--                     </ul>-->
            <!--                 </div>-->
            <div class="col-md-4" data-aos="fade-right">
                <h3>SIGN UP AND SAVE</h3>
                <p>Subscribe to get special offers, free giveaways,
                    and once-in-a-lifetime deals.</p>

                <form class="footForm">
                    <input type="text" class="form-control" placeholder="Enter Your email">
                    <i class="fal fa-envelope"></i>
                </form>
                <ul class="socialLinks">
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row copyRight">
            <div class="col-md-4">
                <img src="{{asset('assets/front/images/cards.webp')}}" alt="">
            </div>
            <div class="col-md-4 text-right">
                <p>Copyright© 2023. All rights reserved.</p>
            </div>
            <div class="col-md-4 text-right">
                <p>Luxeboutiquellc@hotmail.com</p>
            </div>
        </div>
    </div>
    <div class="chat">
        <a href=""><i class="fas fa-comments"></i></a>
    </div>
</footer>
<!-- END: Footer -->

<div id="search">
    <button class="close" type="button">×</button>
    <form>
        <input placeholder="SEARCH" type="search" value="">
        <div class="srch-btn">
            <a href="#" class="themeBtn">Search</a>
        </div>
    </form>
</div>

{{--    <div id="search">--}}
{{--        <button class="close" type="button">×</button>--}}
{{--        <form action="{{ route('front.category') }}" method="GET" autocomplete="off" enctype="multipart/form-data">--}}
{{--            <div class="autocomplete searchContainer" style="width:300px;">--}}
{{--                <input placeholder="SEARCH" type="search" name="search" id="search-input"--}}
{{--                       value="{{!empty(request()->input('search')) ? request()->input('search') : ''}}">--}}
{{--            </div>--}}
{{--            <div class="srch-btn">--}}
{{--                <button type="submit" class="themeBtn">Search</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}
<script>


    var mainurl = "{{ url('/') }}";
    var gs = {!! json_encode(DB::table('generalsettings')->where('id','=',1)->first(['is_loader','decimal_separator','thousand_separator','is_cookie','is_talkto','talkto'])) !!};
    var ps_category = {{ $ps->category }};

    var lang = {
        'days': '{{ __('Days') }}',
        'hrs': '{{ __('Hrs') }}',
        'min': '{{ __('Min') }}',
        'sec': '{{ __('Sec') }}',
        'cart_already': '{{ __('Already Added To Card.') }}',
        'cart_out': '{{ __('Out Of Stock') }}',
        'cart_success': '{{ __('Successfully Added To Cart.') }}',
        'cart_empty': '{{ __('Cart is empty.') }}',
        'coupon_found': '{{ __('Coupon Found.') }}',
        'no_coupon': '{{ __('No Coupon Found.') }}',
        'already_coupon': '{{ __('Coupon Already Applied.') }}',
        'enter_coupon': '{{ __('Enter Coupon First') }}',
        'minimum_qty_error': '{{ __('Minimum Quantity is:') }}',
        'affiliate_link_copy': '{{ __('Affiliate Link Copied Successfully') }}'
    };

</script>
<!-- Include Scripts -->
<script src="{{asset('assets/front/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/front/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/front/js/slick.min.js')}}"></script>
<script src="{{asset('assets/front/js/aos.js')}}"></script>
<script src="{{asset('assets/front/js/gsap.js')}}"></script>
<script src="{{asset('assets/front/js/scrollTrigger.js')}}"></script>
<script src="{{asset('assets/front/js/custom.min.js')}}"></script>

@yield('zoom')
<script src="{{ asset('assets/front/js/paraxify.js') }}"></script>
<script src="{{ asset('assets/front/js/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/front/js/custom.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
{{--<script>--}}
{{--    lazy();--}}

{{--    function lazy() {--}}
{{--        $(".lazy").Lazy({--}}
{{--            scrollDirection: 'vertical',--}}
{{--            effect: "fadeIn",--}}
{{--            effectTime: 1000,--}}
{{--            threshold: 0,--}}
{{--            visibleOnly: false,--}}
{{--            onError: function (element) {--}}
{{--                console.log('error loading ' + element.data('src'));--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}


{{--    $('a[href="#search"]').on('click', function (event) {--}}
{{--        console.log('working')--}}
{{--        event.preventDefault();--}}
{{--        $('#search').addClass('open');--}}
{{--        $('#search > form > input[type="search"]').focus();--}}
{{--    });--}}

{{--    $('#search, #search button.close').on('click keyup', function (event) {--}}
{{--        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {--}}
{{--            $(this).removeClass('open');--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        $('#search-input').on('input', function() {--}}
{{--            var query = $(this).val();--}}

{{--            $.ajax({--}}
{{--                url: '{{ route("front.autocomplete.search") }}',--}}
{{--                type: 'GET',--}}
{{--                data: { q: query },--}}
{{--                dataType: 'json',--}}
{{--                success: function(response) {--}}
{{--                    var suggestions = response.map(function(item) {--}}
{{--                        return item.name;--}}
{{--                    });--}}

{{--                    $('#search-input').autocomplete({--}}
{{--                        source: suggestions--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

@php
    echo Toastr::message();
@endphp
@yield('script')

@if(Session::has('success'))
    <script>
        toastr.success('{{ \Illuminate\Support\Facades\Session::get('success') }}')
    </script>
@endif
@if(Session::has('unsuccess'))
    <script>
        toastr.error('{{ \Illuminate\Support\Facades\Session::get('unsuccess') }}')
    </script>
@endif


</body>
</html>
