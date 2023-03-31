@extends('layouts.theme-2.app')
@section('content')
    <!-- Begin: Main Slider -->
    <div class="main-slider">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/banner.jpg') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s"><span>Welcome To</span>Expressive SLP</h2>
                        <p class="wow fadeInLeft" data-wow-delay="0.8s">Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                        <a href="#" class="themeBtn wow fadeInLeft" data-wow-delay="1s">READ MORE ></a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="aboutSec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <figure class="wow fadeInLeft" data-wow-delay="0.5s">
                        <img src="{{ asset('assets/theme-2/images/aboutImg.jpg') }}" class="rounded-circle" alt="">
                    </figure>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInRight" data-wow-delay="0.5s">
                        <h2 class="secHeading"><span>About Us</span>Expressive SLP</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam,
                            eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo. Nemo enim ipsam
                            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                            dolores eos qui ratione
                            voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                            consectetur, adipisci
                            velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam
                            quaerat voluptatem. Ut
                            enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam</p>
                        <a href="#" class="themeBtn">READ MORE ></a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgLogo.png') }}" class="bgLogo" alt="">
    </section>

    <section class="trainingSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="secHeading wow fadeInUp" data-wow-delay="0.3s">Training Program</h2>
                </div>
                <div class="col-md-6">
                    <div class="trainingCard wow fadeInUp" data-wow-delay="0.7s">
                        <img src="{{ asset('assets/theme-2/images/program1.jpg') }}" alt="">
                        <div class="content">
                            <h3>SLP and SLP Graduate <br> Student Mentorship Program</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="trainingCard wow fadeInUp" data-wow-delay="1s">
                        <img src="{{ asset('assets/theme-2/images/program1.jpg') }}" alt="">
                        <div class="content">
                            <h3>Live Trainings</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ctaSection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h2 class="secHeading wow fadeInUp" data-wow-delay="0.5s">Schedule an Appointment</h2>
                    <p class=" wow fadeInUp" data-wow-delay="0.8s">Call our office at <a href="tel:+(702) 565-8346">(702)
                            565-8346</a> to schedule an appointment or with any questions you may have.</p>
                    <a href="#" class="themeBtn  wow fadeInUp" data-wow-delay="1s">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="secHeading wow fadeInUp" data-wow-delay="0.5s">Our Products</h2>
                </div>
                <div class="col-md-12">
                    <div class="productSlider">
                        @forelse($products as $product)
                            <div class="proCard wow fadeInUp" data-wow-delay="0.75s">
                                <a href="{{ route('front.product', $product->slug ?? '#') }}" class="imgWrap">
                                    <img
                                        src="{{ $product->thumbnail ? asset('assets/images/thumbnails/'.$product->thumbnail) : asset('assets/images/noimage.png') }}"
                                        alt="product Image">
                                </a>
                                <div class="content">
                                    <h3>
                                        <a href="{{ route('front.product', $product->slug ?? '#') }}">{{ $product->showName() }}</a>
                                    </h3>
                                    <span>
                                        @for($x = 1; $x < 6; $x++)
                                            <i class="fas fa-star"
                                               style="color: {{ $product->ratings->avg('rating') >= $x ? '' : '#000' }}"></i>
                                        @endfor
                                    </span>
                                    <a href="#">{{ $product->showPrice() }}</a>
                                    <ul>
                                        <li><a href="#"><i class="fal fa-shopping-cart"></i></a></li>
                                        <li><a href="#"><i class="fal fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <a href="#" class="themeBtn wow fadeInUp" data-wow-delay="0.5s">Show All</a>
                </div>
            </div>
        </div>
    </section>

    <section class="marketSec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="secHeading wow fadeInUp" data-wow-delay="0.5s">Marketplace</h2>
                </div>
                <div class="col-md-6">
                    <div class="marketCard wow fadeInUp" data-wow-delay="0.8s">
                        <img src="{{ asset('assets/theme-2/images/market01.jpg') }}" alt="">
                        <a href="#" class="themeBtn">Virtual Marketplace</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="marketCard wow fadeInUp" data-wow-delay="1.2s">
                        <img src="{{ asset('assets/theme-2/images/market02.jpg') }}" alt="">
                        <a href="#" class="themeBtn">Real Items Marketplace</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="aboutSec parentSec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <figure class="wow fadeInLeft" data-wow-delay="0.5s">
                        <img src="{{ asset('assets/theme-2/images/img.jpg') }}" class="img-fluid" alt="">
                    </figure>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInRight" data-wow-delay="0.5s">
                        <h2 class="secHeading">Parents Of Children With Special Needs</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam,
                            eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                            explicabo. Nemo enim ipsam
                            voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                            dolores eos qui ratione
                            voluptatem sequi nesciunt.</p>
                        <ul>
                            <li>15 Years of work</li>
                            <li>Official education</li>
                            <li>Market Place</li>
                            <li>10 Teachers</li>
                        </ul>
                        <a href="#" class="themeBtn">READ MORE ></a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgLogo.png') }}" class="bgLogo" alt="">
    </section>


    <section class="newsLtrSec">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6 col-md-7 col-sm-12">
                    <div class="wrapper wow fadeInUp" data-wow-delay="0.5s">
                        <h2 class="secHeading">Sign Up For Our Newsletter</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium,
                            totam rem aperiam, eaque ipsa quae ab illo et quasi architecto beatae vitae dicta sunt
                            explicabo.</p>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" placeholder="Email address" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="themeBtn" type="submit">SUbscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @if($ps->blog==1)
        <section class="blogSection">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mb-5">
                        <h2 class="secHeading wow fadeInUp" data-wow-delay="0.5s">Marketplace</h2>
                    </div>
                    @forelse($blogs as $blog)
                        <div class="col-md-4">
                            <div class="blogCard wow fadeInUp" data-wow-delay="0.7s">
                                <a href="{{ route('front.blogshow',$blog->slug) }}" class="imgWrap">
                                    <img src="{{ asset('assets/images/blogs/'.$blog->photo) }}" alt="Blog Image">
                                </a>
                                <div class="content">
                                    <div class="topWrap">
                                        <div class="dateWrap">
                                            <h3>{{ date('d',strtotime($blog->created_at)) }}
                                                <span>{{ date('M',strtotime($blog->created_at)) }}</span></h3>
                                        </div>
                                        <ul>
                                            <li><a href="#">By Admin</a></li>
                                            <li class="ml-auto"><a href="#"><i class="fas fa-heart"></i>125</a></li>
                                            <li><a href="#"><i class="fal fa-comment-alt-dots"></i>05</a></li>
                                        </ul>
                                    </div>
                                    <p>{{ mb_strlen($blog->title,'UTF-8') > 200 ? mb_substr($blog->title,0,200,'UTF-8')."...":$blog->title }} </p>
                                    <a href="{{ route('front.blogshow',$blog->slug) }}">Read More
                                        <div class="fal fa-chevron-right"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-center">No Blogs Found</h3>
                    @endforelse
                    <div class="col-md-12 text-center mt-5">
                        <a href="blog.php" class="themeBtn">Show All</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
