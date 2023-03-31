@extends('layouts.theme-4.app')
@section('content')

    <section class="shopInner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blgCont">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="javascript:;">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-md-12 p-0">
                    <h1 class="banHeading">Shop</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="treSec treInner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="inBanPara text-center">
                        <p>Get your hands on innumerable everyday products, accessories, gadget equipment, apparel, and
                            more
                            sourced from the number one retailers of the State.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($prods as $product)
                    <div class="col-md-3">
                        <div class="enSCard">
                            <div class="encHead">
                                <a href="{{ route('front.product', $product->slug ?? '#') }}">
                                    <img
                                        src="{{ $product->thumbnail ? asset('assets/images/thumbnails/'.$product->thumbnail) : asset('assets/images/noimage.png') }}"
                                        class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="adminDiv">
                                <ul>
                                    <li><a href="javascript:;"><i class="fal fa-shopping-bag"></i></a></li>
                                    <li><a href="javascript:;"><i class="fal fa-eye"></i></a></li>
                                    <li><a href="javascript:;"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="javascript:;"><i class="far fa-chart-bar"></i></a></li>
                                </ul>
                                <a href="javascript:;">Admin</a>
                            </div>
                            <div class="encBody">
                                <a href="{{ route('front.product', $product->slug ?? '#') }}">
                                    <h4>{{ $product->showName() }}</h4>
                                </a>
                                <div class="encbInner">
                                    <h5>{{ ($product->type == 'Merchandise' ? $product->previous_price . ' - ' : '') }}{{ $product->showPrice() }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h1 class="text-center">No Products Found</h1>
                    </div>
                @endforelse
                {{-- Pagination --}}

            </div>
        </div>
                <div class="d-flex justify-content-center mt-5">
                    {!! $prods->links() !!}
                </div>
    </section>

@endsection
