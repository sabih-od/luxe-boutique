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
    <link rel="stylesheet" href="{{ asset('assets/theme-4/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme-4/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme-4/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/theme-4/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.min.css') }}">

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
    <div class="headpart-2">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-2">
                    <div class="navHead-2">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/'.$gs->logo) }}" class="img-fluid logo" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="navHead-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn dropBtn dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">All
                                </button>
                                <div class="dropdown-menu">
                                    @foreach (App\Models\Category::where('language_id',$langg->id)->where('status',1)->get() as $category)
                                        <a href="{{route('front.category', $category->slug)}}{{!empty(request()->input('search')) ? '?search='.request()->input('search') : ''}}"
                                           class="dropdown-item">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                            <button class="btn searchBtn" type="submit">Search</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="navHeadLink">
                        <ul>
                            <li><a href="javascript:;"><i class="fal fa-heart"></i></a></li>
                            <li><a href="{{url('/carts')}}"><i class="fal fa-shopping-bag"></i></a></li>
                            <li><a href="{{ route('user.login') }}"><i class="fal fa-user"></i></i><span>log in<br>Register</span></a>
                            </li>
                        </ul>
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
                            <!-- <a class="navbar-brand" href="javascript:;"><i class="fal fa-bars"></i> All Categories</a> -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav  align-items-center" id="menu-wrapper">
                                    <li class="nav-item">
                                        <a class="nav-link nav-Cat" href="javascript:;"><i class="fal fa-bars"></i> Shop
                                            By Department</a>
                                        <ul class="">
                                            @foreach (App\Models\Category::where('language_id',$langg->id)->where('status',1)->get() as $category)
                                                <li>
                                                    <a href="{{route('front.category', $category->slug)}}{{!empty(request()->input('search')) ? '?search='.request()->input('search') : ''}}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/shop')}}">Shop</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/about')}}">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav  align-items-center" id="menu-wrapper">
                                    <li class="nav-item">
                                        <a class="nav-link nav-Dol" href="#">US Dollar <i
                                                class="far fa-angle-down"></i></a>
                                        <ul class="subMenu">

                                            <li><a href="#">US Dollar</a></li>
                                            <li><a href="#">European Euro</a></li>
                                        </ul>
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
    <div class="foo-2">
        <div class="container">
            <div class="row justify-content-evenly">
                <div class="col-md-3 offset-md-1">
                    <div class="foCont fImg">
                        <a href="javascript:;">
                            <img src="{{ asset('assets/images/'.$gs->logo) }}" class="img-fluid fLogo" alt="">
                        </a>
                        <p>Now your favorite products are just one tap away. Enjoy a better experience and improved
                            services by downloading our app now!</p>
                        <p>Moreover, you can also subscribe to our newsletter to stay updated about our upcoming
                            discounts and sales.</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="foCont">
                        <h3>References</h3>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{url('/shop')}}">Shop</a></li>
                            <li><a href="{{url('/about')}}">About Us</a></li>
                            <li><a href="{{url('/contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="foCont">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="{{url('/terms')}}">Terms & services</a></li>
                            <li><a href="{{url('/privacy')}}">Privacy Policy</a></li>
                            <li><a href="{{url('/return-policy')}}">Return Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="foCont">
                        <h3>Gallery</h3>
                        <ul class="galist">
                            <li>
                                <a href="{{ asset('assets/theme-4/images/ct-1.png') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/theme-4/images/ct-1.png') }}" class="img-fluid fooImg"
                                         alt="">
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('assets/theme-4/images/ct-2.png') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/theme-4/images/ct-2.png') }}" class="img-fluid fooImg"
                                         alt="">
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('assets/theme-4/images/ct-3.png') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/theme-4/images/ct-3.png') }}" class="img-fluid fooImg"
                                         alt="">
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('assets/theme-4/images/ct-4.png') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/theme-4/images/ct-4.png') }}" class="img-fluid fooImg"
                                         alt="">
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('assets/theme-4/images/ct-5.png') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/theme-4/images/ct-5.png') }}" class="img-fluid fooImg"
                                         alt="">
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('assets/theme-4/images/ct-6.png') }}" data-lightbox="roadtrip">
                                    <img src="{{ asset('assets/theme-4/images/ct-6.png') }}" class="img-fluid fooImg"
                                         alt="">
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="foo-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-12">
                    <div class="copyCont">
                        <p>{{ $gs->copyright }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fooDiv">
        <a href="javascript:;" class="fBtn" id="upPage"><i class="far fa-chevron-up"></i></a>
    </div>
</footer>


<script src="{{ asset('assets/theme-4/js/app.min.js') }}"></script>
<script src="{{ asset('assets/theme-4/js/wow.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplex-noise/2.4.0/simplex-noise.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="{{ asset('assets/theme-4/js/lightbox.js') }}"></script>
<script src="{{ asset('assets/theme-4/js/function.js') }}"></script>
<script src="{{ asset('assets/front/js/toastr.min.js') }}"></script>

<script>
    let baseURL = "<?php echo e(url('/')); ?>";
    // LOGIN FORM
    $("#signInForm").on('submit', function (e) {
        e.preventDefault();
        $('#signInForm button.btn').prop('disabled', true);
        $.ajax({
            method: "POST",
            url: $(this).prop('action'),
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if ((data.errors)) {
                    for (var error in data.errors) {
                        toastr.error(data.errors[error]);
                        break;
                    }
                } else {
                    toastr.success('Redirecting to dashboard...');
                    window.location = data;
                }
                $('#signInForm button.btn').removeAttr('disabled')
            }
        });
    });
    // LOGIN FORM ENDS

    // REGISTER FORM START
    $("#registerform").on("submit", function (e) {
        e.preventDefault();
        $('#registerform button.btn').prop('disabled', true);
        $.ajax({
            method: "POST",
            url: $(this).prop("action"),
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    window.location = baseURL + "/user/dashboard";
                } else {
                    if (data.errors) {
                        for (var error in data.errors) {
                            toastr.error(data.errors[error]);
                            break;
                        }
                    } else {
                        toastr.success(data);
                    }
                }
                $('#registerform button.btn').removeAttr('disabled')
            },
        });
    });
    // REGISTER FORM ENDS
</script>

@php
    echo Toastr::message();
@endphp
@yield('script')
</body>

</html>
