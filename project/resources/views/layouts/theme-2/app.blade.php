<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

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

    <!-- Google Font -->
    @if ($default_font->font_value)
        <link
            href="https://fonts.googleapis.com/css?family={{ $default_font->font_value }}:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap"
              rel="stylesheet">
    @endif

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/theme-2/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/theme-2/css/fontawesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/theme-2/css/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/theme-2/css/jquery.fancybox.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/theme-2/css/slick.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/theme-2/css/slick-theme.min.css') }}"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.css"/>
    <link rel="stylesheet" href="{{ asset('assets/theme-2/css/custom.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/theme-2/css/responsive.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

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
<body class="@yield('body-class')'">

@include('layouts/theme-2/menu')

@yield('content');

@include('layouts/theme-2/footer')


<div class="modal fade accountAccesSec" id="signIn" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="whitebg">
                        <h2><span>Welcome back!</span>Sign in to your account</h2>
                        <form action="{{ route('user.login.submit') }}" class="formStyle form-row" id="signInForm"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="alert alert-dismissible w-100 text-left" style="display: none">
                                <span></span>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            <div class="input-group">
                                <label for="username">{{ __('Email address') }}<em>*</em></label>
                                <input type="email" class="form-control" name="email" id="username"
                                       placeholder="{{ __('Type Email Address') }}" required>
                            </div>
                            <div class="input-group">
                                <label for="password">{{ __('Password') }}<em>*</em></label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="{{ __('Type Password') }}" required>
                            </div>
                            <div class="input-group justify-content-sm-between align-items-sm-center">
                                <button class="themeBtn" type="submit">{{ __('Log in') }}</button>
                                <a href="#" data-dismiss="modal" class="forgetPass" data-toggle="modal"
                                   data-target="#resetPassword">Forgot my password</a>
                            </div>
                        </form>
                        <div class="or"><span>or</span></div>
                        <p>Don’t have an account? <a href="register.php" data-dismiss="modal" data-toggle="modal"
                                                     data-target="#register">Sign
                                Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade accountAccesSec" id="register" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="whitebg">
                        <h2>Create an account</h2>
                        <form action="{{route('user-register-submit')}}" id="registerform" method="post"
                              class="formStyle form-row">
                            @csrf
                            <div class="alert alert-dismissible w-100 text-left" style="display: none">
                                <span></span>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            <div class="input-group">
                                <label>Full Name<em>*</em></label>
                                <input type="text" name="name" class="form-control" placeholder="{{ __('Full Name') }}"
                                       required>
                            </div>
                            <div class="input-group">
                                <label>Email Address<em>*</em></label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="{{ __('Email Address') }}" required>
                            </div>
                            <div class="input-group">
                                <label>Password<em>*</em></label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="{{ __('Password') }}" required>
                            </div>
                            <div class="input-group">
                                <label>Re-enter password<em>*</em></label>
                                <input type="password" name="password_confirmation" class="form-control"
                                       placeholder="{{ __('Confirm Password') }}" required>
                            </div>
                            <Label>Sign me up as:</Label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vendor" id="user" value="0" checked>
                                <label class="form-check-label" for="user">User</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vendor" id="vendor" value="1">
                                <label class="form-check-label" for="vendor">Vendor</label>
                            </div>
                            <div class="input-group justify-content-md-end">
                                <button class="themeBtn" type="submit">Sign Up</button>
                            </div>
                        </form>
                        <div class="or"><span>or</span></div>
                        <p>Already have an account?
                            <a href="#" data-dismiss="modal" data-toggle="modal"
                               data-target="#signIn">SignIn</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade accountAccesSec" id="resetPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="whitebg">
                        <h2>Reset Password</h2>
                        @include('includes.admin.form-login')
                        <form id="forgotform" action="{{route('user.forgot.submit')}}" class="formStyle form-row"
                              method="POST">
                            @csrf
                            <div class="input-group">
                                <label>{{ __('Email address') }}<em>*</em></label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="{{ __('Enter Email Address') }}" id="reg_email" required>
                            </div>
                            <div class="input-group justify-content-md-end">
                                <button class="themeBtn" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/theme-2/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/theme-2/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/theme-2/js/popper.min.js') }}"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.3/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ asset('assets/theme-2/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('assets/theme-2/js/slick.min.js') }}"></script>

<script src="{{ asset('assets/theme-2/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/front/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/theme-2/js/custom.min.js') }}"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.4/signature_pad.js"
        integrity="sha512-j36pYCzm3upwGd6JGq6xpdthtxcUtSf5yQJSsgnqjAsXtFT84WH8NQy9vqkv4qTV9hK782TwuHUTSwo2hRF+/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    let baseURL = "<?php echo e(url('/')); ?>";
    // LOGIN FORM
    $("#signInForm").on('submit', function (e) {
        e.preventDefault();
        $('button.themeBtn').prop('disabled', true);
        $('.alert').removeClass('alert-danger alert-success');
        $('.alert').addClass('alert-info');
        $('.alert span').html('Authenticating...');
        $('.alert-info').show();
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
                    $('.alert').removeClass('alert-info');
                    $('.alert').addClass('alert-danger');
                    for (var error in data.errors) {
                        $('.alert-danger span').html(data.errors[error]);
                        break;
                    }
                } else {
                    $('.alert').removeClass('alert-info');
                    $('.alert').addClass('alert-success');
                    window.location = data;
                }
                $('button.themeBtn').removeAttr('disabled')
            }
        });
    });
    // LOGIN FORM ENDS

    // REGISTER FORM START
    $("#registerform").on("submit", function (e) {
        e.preventDefault();
        $('button.themeBtn').prop('disabled', true);
        $('.alert').removeClass('alert-danger alert-success');
        $('.alert').addClass('alert-info');
        $('.alert span').html('Processing...');
        $('.alert-info').show();
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
                    $('.alert').removeClass('alert-info');
                    if (data.errors) {
                        $('.alert').addClass('alert-danger d-flex');
                        for (var error in data.errors) {
                            $('.alert-danger span').html(data.errors[error]);
                            break;
                        }
                    } else {
                        $('.alert').addClass('alert-success d-flex');
                        $('.alert-success span').html(data);
                    }
                }
                $('button.themeBtn').removeAttr('disabled')
                $(".refresh_code").click();
            },
        });
    });
    // REGISTER FORM ENDS

    // Forgot Password Form
    $("#forgotform").on("submit", function (e) {
        e.preventDefault();
        var $this = $(this).parent();
        $this.find("button.themeBtn").prop("disabled", true);
        $this.find(".alert-info").show();
        $this.find(".alert-info p").html($(".authdata").val());
        $.ajax({
            method: "POST",
            url: $(this).prop("action"),
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.errors) {
                    $this.find(".alert-success").hide();
                    $this.find(".alert-info").hide();
                    $this.find(".alert-danger").show();
                    $this.find(".alert-danger ul").html("");
                    for (var error in data.errors) {
                        $this.find(".alert-danger p").html(data.errors[error]);
                    }
                } else {
                    $this.find(".alert-info").hide();
                    $this.find(".alert-danger").hide();
                    $this.find(".alert-success").show();
                    $this.find(".alert-success p").html(data);
                    $this.find("input[type=email]").val("");
                }
                $this.find("button.themeBtn").prop("disabled", false);
            },
        });
    });
    // Forgot Password Form Ends
</script>

@if(session()->has('success'))
    <script type="text/javascript">  toastr.success('{{ session('success')}}');</script>
@endif
@if(session()->has('error'))
    <script type="text/javascript"> toastr.error('{{ session('error')}}');</script>
@endif
@yield('script')
@yield('scripts')
@yield('js')
</body>
</html>
