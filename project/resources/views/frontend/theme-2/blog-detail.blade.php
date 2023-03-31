@extends('layouts.theme-2.app')
@section('content')
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/inrbnr1.png') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">{{ $blog->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="blogDetail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blogdtlpgContent">
                        <figure>
                            <img src="{{ asset('assets/images/blogs/'.$blog->photo) }}" class="img-fluid" alt="img">
                        </figure>
                        <ul>
                            <li><a href="#"><i class="fas fa-user"></i>{{ __('By Admin') }}</a></li>
                            <li><a href="#"><i class="fas fa-clock"></i>{{ date('F d, Y',(strtotime($blog->created_at))) }}</a></li>
                            <li><a href="#"><i class="fas fa-eye"></i>{{ $blog->views }} {{ __('View(s)') }}</a></li>
{{--                            <li><a href="#"><i class="fas fa-heart"></i></a></li>--}}
{{--                            <li><a href="#comment"><i class="far fa-comment"></i>369 Comment</a></li>--}}
                        </ul>
{{--                        <h5>Liked by <strong>armanroki</strong> and <strong>1,993 others</strong></h5>--}}
                        <hr>
                        <h6 class="trainingHead">{{ $blog->title }}</h6>
                        {!! clean($blog->details , array('Attr.EnableID' => true)) !!}
                    </div>
{{--                    <div class="reviewBox reviewAny">--}}
{{--                        <figure>--}}
{{--                            <img src="images/review1.jpg" class="img-fluid" alt="img">--}}
{{--                        </figure>--}}
{{--                        <div class="reviewLst">--}}
{{--                            <div class="anyContent">--}}
{{--                                <h5>Anny Smith</h5>--}}
{{--                                <div>--}}
{{--                                    <span class="timeOne"><i class="fal fa-calendar-alt"></i>04-08-2022</span>--}}
{{--                                    <span class="timeOne"><i class="fal fa-clock"></i>04-08-2022</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <span>Color Family:Black</span>--}}
{{--                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum--}}
{{--                                has been the industry's standard dummy text ever since the 1500s, when an unknown--}}
{{--                                printer took a galley of type and scrambled it to make a type specimen book.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="reviewBox reviewAny">--}}
{{--                        <figure>--}}
{{--                            <img src="images/review2.jpg" class="img-fluid" alt="img">--}}
{{--                        </figure>--}}
{{--                        <div class="reviewLst">--}}
{{--                            <div class="anyContent">--}}
{{--                                <h5>Anny Smith</h5>--}}
{{--                                <div>--}}
{{--                                    <span class="timeOne"><i class="fal fa-calendar-alt"></i>04-08-2022</span>--}}
{{--                                    <span class="timeOne"><i class="fal fa-clock"></i>04-08-2022</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <span>Color Family:Black</span>--}}
{{--                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum--}}
{{--                                has been the industry's standard dummy text ever since the 1500s, when an unknown--}}
{{--                                printer took a galley of type and scrambled it to make a type specimen book.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="reviewBox reviewAny">--}}
{{--                        <figure>--}}
{{--                            <img src="images/review3.jpg" class="img-fluid" alt="img">--}}
{{--                        </figure>--}}
{{--                        <div class="reviewLst">--}}
{{--                            <div class="anyContent">--}}
{{--                                <h5>Anny Smith</h5>--}}
{{--                                <div>--}}
{{--                                    <span class="timeOne"><i class="fal fa-calendar-alt"></i>04-08-2022</span>--}}
{{--                                    <span class="timeOne"><i class="fal fa-clock"></i>04-08-2022</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <span>Color Family:Black</span>--}}
{{--                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum--}}
{{--                                has been the industry's standard dummy text ever since the 1500s, when an unknown--}}
{{--                                printer took a galley of type and scrambled it to make a type specimen book.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="comentBox" id="comment">--}}
{{--                        <h2 class="trainingHead">Comment</h2>--}}
{{--                        <form action="">--}}
{{--                            <textarea placeholder="Comment"></textarea>--}}
{{--                            <button class="themeBtn">Post Now</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
