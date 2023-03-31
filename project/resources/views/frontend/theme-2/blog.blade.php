@extends('layouts.theme-2.app')
@section('content')
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/inrbnr1.png') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">Blog</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="blogSection blogPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="secHeading wow fadeInUp" data-wow-delay="0.5s">Blog</h2>
                </div>
                @forelse($blogs as $blog)
                    <div class="col-md-4">
                        <div class="blogCard wow fadeInUp" data-wow-delay="0.7s">
                            <a href="{{ route('front.blogshow',$blog->slug) }}" class="imgWrap">
                                <img src="{{ $blog->photo ? asset('assets/images/blogs/'.$blog->photo):asset('assets/images/noimage.png')}}" alt="">
                            </a>
                            <div class="content">
                                <div class="topWrap">
                                    <div class="dateWrap">
                                        <h3>{{ date('d',(strtotime($blog->created_at))) }}<span>{{ date('F',(strtotime($blog->created_at))) }}</span></h3>
                                    </div>
                                    <ul>
                                        <li><a href="{{ route('front.blogshow',$blog->slug) }}">By Admin</a></li>
{{--                                        <li class="ml-auto"><a href="#"><i class="fas fa-heart"></i>125</a></li>--}}
{{--                                        <li><a href="#"><i class="fal fa-comment-alt-dots"></i>05</a></li>--}}
                                    </ul>
                                </div>
                                <p>{{ mb_strlen($blog->title,'UTF-8') > 45 ? mb_substr($blog->title,0,45,'UTF-8')."..":$blog->title }}</p>
                                <a href="{{ route('front.blogshow',$blog->slug) }}">Read More
                                    <div class="fal fa-chevron-right"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Blogs Found</p>
                @endforelse
                <div class="col-lg-12 mt-3">
                    <div class="d-flex justify-content-center align-items-center pt-3" id="custom-pagination">
                        <div class="pagination-style-one">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{ $blogs->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
