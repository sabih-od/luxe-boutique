<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>{{$gs->title}}</title>

    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))

        <meta property="og:title" content="{{$blog->title}}"/>
        <meta property="og:description"
              content="{{ $blog->meta_description != null ? $blog->meta_description : strip_tags($blog->meta_description) }}"/>
        <meta property="og:image" content="{{asset('assets/images/blogs/'.$blog->photo)}}"/>
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
        <title>{{$gs->title}}</title>

    @elseif(isset($productt))

        <meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): '' }}">
        <meta name="description"
              content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}">
        <meta property="og:title" content="{{$productt->name}}"/>
        <meta property="og:description"
              content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}"/>
        <meta property="og:image" content="{{asset('assets/images/thumbnails/'.$productt->thumbnail)}}"/>
        <meta name="author" content="GeniusOcean">
        <title>{{substr($productt->name, 0,11)."-"}}{{$gs->title}}</title>

    @else
        <meta property="og:title" content="{{$gs->title}}"/>
        <meta property="og:image" content="{{asset('assets/images/'.$gs->logo)}}"/>
        <meta name="keywords" content="{{ $seo->meta_keys }}">
        <meta name="author" content="GeniusOcean">
        <title>{{$gs->title}}</title>
    @endif

    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
          integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
          integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('assets/theme-3/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme-3/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme-3/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme-3/css/responsive.css') }}">

    @if(!empty($seo->google_analytics))
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());
            gtag('config', '{{ $seo->google_analytics }}');
        </script>
    @endif
    @if(!empty($seo->facebook_pixel))
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ $seo->facebook_pixel }}');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id={{ $seo->facebook_pixel }}&ev=PageView&noscript=1"/>
        </noscript>
    @endif

    @yield('css')
</head>

<body class="homeBody">
<header>
    <div class="headpart-1">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-3">
                    <div class="navHead-1">
                        <ul>
{{--                            <li><a href="{{ route('user.login') }}">Login</a></li>--}}
                            <li><a href="#">Login</a></li>
{{--                            <li><a href="{{ route('vendor.register') }}">Sign Up As Vendor</a></li>--}}
                            <li><a href="#">Sign Up As Vendor</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navHeadLink-1">
                        <ul>
                            <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="headpart-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="navHead-2">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/'.$gs->logo) }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="navHead-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn dropBtn dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">All Categories
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">All Categories</a>
                                    <a class="dropdown-item" href="#">Uncategorized</a>
                                    <a class="dropdown-item" href="#">Electronics</a>
                                    <a class="dropdown-item" href="#">Fashion</a>
                                    <a class="dropdown-item" href="#">Health & Beauty</a>
                                    <a class="dropdown-item" href="#">Home & Garden</a>
                                    <a class="dropdown-item" href="#">Sports</a>
                                    <a class="dropdown-item" href="#">Collectibles & Arts</a>
                                    <a class="dropdown-item" href="#">Deals</a>
                                    <a class="dropdown-item" href="#">Subscription</a>
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                            <button class="btn searchBtn" type="submit"><i class="fal fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navHeadLink">
                        <a href="javascript:;">
                            <span><i class="fal fa-phone-alt"></i></span>
                            <div class="NavText">
                                <h5>Call Us</h5>
                                <h4>{{ $ps->phone }}</h4>
                            </div>
                        </a>
                        <a href="javascript:;">
                            <span class="conter"><i class="fal fa-shopping-bag"></i></span>
                            <div class="NavText">
                                <h5>My Cart</h5>
                                <h4>$0.00</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navhead-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navigation">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="javascript:;"><i class="fal fa-bars"></i> All Categories</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav  align-items-center" id="menu-wrapper">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Shop</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Our Blogs</a>
                                    </li>
                                    <li class="nav-item">
{{--                                        <a class="nav-link" href="{{ url('/about') }}">About Us</a>--}}
                                        <a class="nav-link" href="#">About Us</a>
                                    </li>
                                    <li class="nav-item">
{{--                                        <a class="nav-link" href="{{ route('front.contact') }}">Contact Us</a>--}}
                                        <a class="nav-link" href="#">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="foo-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="subscribeCont">
                        <h1>Want to know more about our upcoming deals?</h1>
                        <p>Drop your emails and stay in the loop to know more<br>about our weekly discounts.</p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">

                    <div class="subscribeCont">
                        <form>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter Your Email Address"
                                       aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="themeBtn" type="button">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foo-2">
        <div class="container">
            <div class="row">
                <div class="col-md-2 ">
                    <div class="foCont">
                        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/'.$gs->logo) }}" class="img-fluid" alt=""></a>
                        <p>IMA USA Shop Blogs</p>
                        <div class="fIcons">
                            <a href="javascript:;"><i class="fab fa-facebook faceBook"></i></a>
                            <a href="javascript:;"><i class="fab fa-twitter twittEr"></i></a>
                            <a href="javascript:;"><i class="fab fa-youtube youTube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="foCont">
                        <h3>Sell :</h3>
                        <ul>
                            <li><a href="#">START SELLING</a></li>
                            <li><a href="#">Learn to Sell</a></li>
                            <li><a href="#">Affiliates</a></li>
                        </ul>

                        <h3>Tools & apps :</h3>
                        <ul>
                            <li><a href="#">Developers</a></li>
                            <li><a href="#">Security Center</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">

                    <div class="foCont">
                        <h3>Vendor Quick Links :</h3>
                        <ul>
                            <li><a href="#">BUYER’S POLICY</a></li>
                            <li><a href="#">SELLER’S POLICY</a></li>
                            <li><a href="#">RETURN POLICY</a></li>
                            <li><a href="#">QUESTIONNAIRE FOR SELLERS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">

                    <div class="foCont">
                        <h3>About IMA USA Shop :</h3>
                        <ul>
                            <li><a href="#">COMPANY INFO</a></li>
                            <li><a href="#">NEWS</a></li>
                            <li><a href="#">INVESTORS</a></li>
                            <li><a href="#">CAREERS</a></li>
                            <li><a href="#">GOVERNMENT RELATIONS</a></li>
                            <li><a href="#">POLICIES</a></li>
                            <li><a href="#">VERIFIED RIGHTS OWNER PROGRAM</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">

                    <div class="foCont">
                        <h3>Help & Contact :</h3>
                        <ul>
                            <li><a href="#">SELLER INFORMATION CENTER</a></li>
                            <li><a href="#">CONTACT US</a></li>
                        </ul>


                        <h3>Community :</h3>
                        <ul>
                            <li><a href="#">ANNOUNCEMENTS</a></li>
                            <li><a href="#">DISCUSSION BOARDS</a></li>
                            <li><a href="#">IMA USA SHOP GIVING WORKS</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="foo-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-4">
                    <div class="copyCont">
                        <p>{{ $gs->copyright }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="copyCont">
                        <ul>
                            <li><a href="term-and-condition.php">Term And Conditions</a></li>
                            <li><a href="privacy-policy.php">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fooDiv">
        <a href="javascript:;" class="fBtn" id="upPage"><i class="fal fa-long-arrow-up"></i></a>
    </div>
</footer>

<script src="{{ asset('assets/theme-3//js/app.min.js') }}"></script>
<script src="{{ asset('assets/theme-3//js/wow.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplex-noise/2.4.0/simplex-noise.min.js"></script>
<script src="{{ asset('assets/theme-3//js/lightbox.js') }}"></script>
<script src="{{ asset('assets/theme-3//js/function.js') }}"></script>
</body>

</html>
