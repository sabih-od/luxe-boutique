@extends('layouts.theme-2.app')
@section('body-class', 'realItem')
@section('content')
    <!-- Begin: Main Slider -->
    <section class="marktSearch">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="">
                        <input type="text" placeholder="Search">
                        <input type="text" placeholder="Grade">
                        <input type="text" placeholder="Subject">
                        <input type="text" placeholder="Price">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="main-slider inrBaner1">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/realbg.png') }}" alt="img">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">Real Items Marketplace</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard</p>
                        <a href="#" class="themeBtn">View Categories &gt;</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="virtualPage realMarkt">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="accordion">
                        <div class="card">
                            <div id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                        MARKETPLACE
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapsed" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <input type="radio" id="marketplace_physical" name="marketplace[]"
                                                   value="Physical" class="marketplace_filter" checked>
                                            <label for="marketplace_physical">Real Items</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="marketplace_digital" name="marketplace[]"
                                                   value="Digital" class="marketplace_filter">
                                            <label for="marketplace_digital">Virtual</label>
                                        </li>
                                        <li>
                                            <input type="radio" id="marketplace_merchandise" name="marketplace[]"
                                                   value="Merchandise" class="marketplace_filter">
                                            <label for="marketplace_merchandise">Custom Merchandise</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                        CATEGORIES
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapsed" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        @forelse($cat as $category)
                                            <li>
                                                <input type="checkbox" id="category_{{ $category->id }}"
                                                       name="category[]"
                                                       value="{{ $category->id }}" class="category_filter">
                                                <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                                            </li>
                                        @empty
                                            <p>No Categories Found</p>
                                        @endforelse
                                    </ul>

                                    {{-- <a href="#" class="readMore">+ much more</a>--}}
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                        PRICE
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapsed" aria-labelledby="headingThree"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="price_500" name="price[]" value="500"
                                                   class="price_filter">
                                            <label for="price_500"> < $500</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="price_250" name="price[]" value="250"
                                                   class="price_filter">
                                            <label for="price_250"> < $250</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="price_100" name="price[]" value="100"
                                                   class="price_filter">
                                            <label for="price_100"> < $100</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="price_50" name="price[]" value="50"
                                                   class="price_filter">
                                            <label for="price_50"> < $50</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="price_20" name="price[]" value="20"
                                                   class="price_filter">
                                            <label for="price_20"> < $20</label>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                        LOCATIONS
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapsed" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        @forelse($states as $state)
                                            <li>
                                                <input type="checkbox" id="state_{{ $state->state }}"
                                                       name="state[]"
                                                       value="{{ $state->state }}" class="state_filter">
                                                <label for="state_{{ $state->state }}">{{ $state->state }}</label>
                                            </li>
                                        @empty
                                            <p>No States Found</p>
                                        @endforelse
                                    </ul>

                                    {{-- <a href="#" class="readMore">+ much more</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9" id="ajaxContent">
                    @include('frontend.theme-2.ajax.product-view')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        // When filter changes
        $('.marketplace_filter, .category_filter, .price_filter, .state_filter').on('change', function () {
            filter();
        })

        function filter() {
            let filterlink = '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?active=1';

            $('.marketplace_filter').each(function () {
                if ($(this).is(':checked')) {
                    // if (filterlink == '') {
                    //     filterlink += '?' + $(this).attr('name') + '=' + $(this).val();
                    // } else {
                        filterlink += '&' + $(this).attr('name') + '=' + $(this).val();
                    // }
                }
            });

            $('.category_filter').each(function () {
                if ($(this).is(':checked')) {
                    if (filterlink == '') {
                        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $(this).attr('name') + '=' + $(this).val();
                    } else {
                        filterlink += '&' + $(this).attr('name') + '=' + $(this).val();
                    }
                }
            });

            $('.price_filter').each(function () {
                if ($(this).is(':checked')) {
                    if (filterlink == '') {
                        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $(this).attr('name') + '=' + $(this).val();
                    } else {
                        filterlink += '&' + $(this).attr('name') + '=' + $(this).val();
                    }
                }
            });

            $('.state_filter').each(function () {
                if ($(this).is(':checked')) {
                    if (filterlink == '') {
                        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $(this).attr('name') + '=' + $(this).val();
                    } else {
                        filterlink += '&' + $(this).attr('name') + '=' + $(this).val();
                    }
                }
            });
            console.log('filterlink: ', filterlink);

            $("#ajaxContent").load(encodeURI(filterlink), function (data) {
                // add query string to pagination
                // addToPagination();
                // $(".ajax-loader").fadeOut(1000);
            });
        }
    </script>
@endsection
