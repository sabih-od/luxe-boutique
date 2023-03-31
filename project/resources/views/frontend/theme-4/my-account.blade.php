@extends('layouts.theme-4.app')
@section('content')
    <section class="blogSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blgCont">
                        <ul>
                            <li><a href="javascript:;">Home</a></li>
                            <li><a href="javascript:;">My account</a></li>
                        </ul>
                        <h3>My account</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="accSec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="accForm">
                        <h2>Login</h2>
                        <form action="{{ route('user.login.submit') }}" id="signInForm" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username or email address <span>*</span></label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                       aria-describedby="emailHelp" placeholder="Enter email" required>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                       placeholder="Password" required>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" class="btn">Log in</button>
                            <br>
                            <a href="{{ route('user.forgot') }}">Lost your password?</a>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="accForm">
                        <h2>Register</h2>
                        <form action="{{route('user-register-submit')}}" id="registerform" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Full Name<em>*</em></label>
                                <input type="text" name="name" class="form-control" placeholder="{{ __('Full Name') }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label>Email Address<em>*</em></label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="{{ __('Email Address') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Password<em>*</em></label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="{{ __('Password') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Re-enter password<em>*</em></label>
                                <input type="password" name="password_confirmation" class="form-control"
                                       placeholder="{{ __('Confirm Password') }}" required>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Shop Name <span>*</span></label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="shop_name"
                                               aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone Number <span>*</span></label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
                                    </div>

{{--                                    <label for="exampleInputPassword1">Choose Subscription Pack <span>*</span></label>--}}
{{--                                    <div class="tab-container">--}}
{{--                                        <div class="tab-navigation">--}}
{{--                                            <select id="select-box">--}}
{{--                                                <option value="1">Basic</option>--}}
{{--                                                <option value="2">Plus</option>--}}
{{--                                                <option value="3">Premium</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}

{{--                                        <div id="tab-1" class="tab-content-1">--}}
{{--                                            <h4><i>$1,000.00 /month</i></h4>--}}
{{--                                            <h5>Basic</h5>--}}
{{--                                        </div>--}}
{{--                                        <div id="tab-2" class="tab-content-1">--}}
{{--                                            <h4><i>$2,000.00 /month</i></h4>--}}
{{--                                            <h5>Plus</h5>--}}
{{--                                        </div>--}}
{{--                                        <div id="tab-3" class="tab-content-1">--}}
{{--                                            <h4><i>$5,000.00 /month</i></h4>--}}
{{--                                            <h5>Premium</h5>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="vendor" id="user" value="0"
                                               data-toggle="collapse" data-target="#collapseOne" checked>
                                        <label class="form-check-label" for="user">I am a customer</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="vendor" id="vendor" value="1"
                                               data-toggle="collapse" data-target="#collapseOne">
                                        <label class="form-check-label" for="vendor">I am a vendor</label>
                                    </div>
                                </div>
                            </div>

                            <p>Your personal data will be used to support your experience throughout this website, to
                                manage access to your account, and for other purposes described in our <a
                                    href="">privacy policy.</a>
                            </p>
                            <button type="submit" class="btn">Register</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
