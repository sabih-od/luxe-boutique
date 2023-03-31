@extends('layouts.theme-2.app')
@section('body-class', 'Vendor Page')
@section('content')
    <!-- Begin: Main Slider -->
    <section class="marktSearch itemProducts">
        <div class="container">
            <!-- <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="">
                        <input type="text" placeholder="Search">
                        <input type="text" placeholder="Grade">
                        <input type="text" placeholder="Subject">
                        <input type="text" placeholder="Price">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div> -->
        </div>
    </section>

    {{--    {{ dd($vendor) }}--}}
    <section class="profileSec">
        <div class="container">
            <div class="row align-items-end justify-content-between">
                <div class="col-md-5">
                    <div class="userBox">
                        <img
                            src="{{ $vendor->photo ? asset('assets/images/users/') . '/' . $vendor->photo : asset('assets/vendor/images/user.png') }}"
                            class="img-fluid" alt="img">
                        <div class="userContent">
                            <h4>{{ $vendor->name }}</h4>
                            <p>68% positive Seller Ratings</p>
                        </div>
                    </div>

                    <div class="profileList">
                        <ul>
                            <li><a href="{{ route('front.vendor.virtual.product', str_replace(' ', '-', $vendor->shop_name)) }}" class="themeBtn">Virtual Products</a></li>
                            <li><a href="{{ route('front.vendor.product', str_replace(' ', '-', $vendor->shop_name)) }}"
                                   class="themeBtn">Real Iteam Products</a></li>
                            <li><a href="{{ route('front.vendor', str_replace(' ', '-', $vendor->shop_name)) }}"
                                   class="themeBtn active">Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="selerSearch">
                        <form>
                            <input type="text" placeholder="Search">
                            <a href="#"><i class="far fa-search"></i></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="descpContent aboutBio">
                        <h2>About Bio</h2>
                        <p>{!! $vendor->shop_details !!}</p>
                    </div>
                    <div class="descpContent reviewContent">
                        <h2>Reviews</h2>
                        <ul>
                            <li>
                                @for($x = 1; $x < 6 ; $x++)
                                    @if($x <= $vendor->ratings->avg('rating'))
                                        <img src="{{ asset('assets/theme-2/images/badge.jpg') }}" class="img-fluid"
                                             alt="img" style="filter: none">
                                    @else
                                        <img src="{{ asset('assets/theme-2/images/badge.jpg') }}" class="img-fluid"
                                             alt="img">
                                    @endif
                                @endfor
                                <span>{{ round($vendor->ratings->avg('rating'), 1) }}</span>
                            </li>
                        </ul>
{{--                        <p>Based on {{ \App\Models\Rating::vendorRatingCount($vendor->id) }} reviews</p>--}}
                        <h6>Ratings</h6>
                    </div>
                    <div class="progresContent">
                        <ul>
                            @for($x = 5; $x > 0; $x--)
                                <li>
                                    <span>{{ $x }} stars</span>
                                    <div class="progress">
                                        <div class="progress-bar"
                                             style="width: {{ (count($vendor->ratings->where('rating', $x)) > 0) ? $percentage = count($vendor->ratings->where('rating', $x)) / count($vendor->ratings) * 100 : 0 }}%"></div>
                                    </div>
                                    <span>{{ count($vendor->ratings->where('rating', $x)) }}</span>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <div class="descpContent reviewContent">
                        <h2 class="mb-5">Product Ratings and Reviews</h2>
                    </div>
                    @forelse($ratings as $rating)
                        <div class="reviewBox">
                            <figure>
                                <img
                                    src="{{ $rating->user->photo ? asset('assets/images/users/'.$rating->user->photo):asset('assets/images/'.$gs->user_image) }}"
                                    class="img-fluid" alt="img">
                            </figure>
                            <div class="reviewLst">
                                <h5>{{ $rating->user->name }}</h5>
                                {{--                                <span>Color Family:Black</span>--}}
                                <ul>
                                    <li>
                                        @for($x = 1; $x <= $rating->rating; $x++)
                                            <img src="{{ asset('assets/theme-2/images/badge.jpg') }}" class="img-fluid"
                                                 alt="img">
                                        @endfor
                                    </li>
                                </ul>
                                <p>{{ $rating->review }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="reviewBox">
                            <h5>No Reviews Found</h5>
                            @endforelse
                        </div>
                </div>
            </div>
    </section>
@endsection
