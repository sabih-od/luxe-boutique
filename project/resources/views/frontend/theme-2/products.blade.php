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
                                        @foreach (App\Models\Category::where('language_id',$langg->id)->where('status',1)->get() as $category)
                                            <li>
                                                <a href="{{route('front.category', $category->slug)}}{{!empty(request()->input('search')) ? '?search='.request()->input('search') : ''}}"
                                                   class="category-link" id="cat">{{ $category->name }} <span
                                                        class="count"></span></a>
                                            </li>
                                        @endforeach
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
                                        @foreach ($subCategories as $subcategory)
                                            <li>
                                                <input type="checkbox" id="sub_category_{{ $subcategory->id }}"
                                                       name="sub_category[]"
                                                       value="{{ $subcategory->id }}" class="sub_category_filter">
                                                <label
                                                    for="sub_category_{{ $subcategory->id }}">{{ $subcategory->name }}</label>
                                            </li>
                                            @if($subcategory->childs->count()!=0)
                                                <ul class="ml-4">
                                                    @forelse($subcategory->childs as $childCategories)
                                                        <li>
                                                            <input type="checkbox"
                                                                   id="child_category_{{ $childCategories->id }}"
                                                                   name="child_category[]"
                                                                   value="{{ $childCategories->id }}"
                                                                   class="child_category_filter">
                                                            <label
                                                                for="child_category_{{ $childCategories->id }}">{{ $childCategories->name }}</label>
                                                        </li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            @endif
                                        @endforeach
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
                                        {{--                                        @forelse($states as $state)--}}
                                        {{--                                            <li>--}}
                                        {{--                                                <input type="checkbox" id="state_{{ $state->state }}"--}}
                                        {{--                                                       name="state[]"--}}
                                        {{--                                                       value="{{ $state->state }}" class="state_filter">--}}
                                        {{--                                                <label for="state_{{ $state->state }}">{{ $state->state }}</label>--}}
                                        {{--                                            </li>--}}
                                        {{--                                        @empty--}}
                                        {{--                                            <p>No States Found</p>--}}
                                        {{--                                        @endforelse--}}
                                    </ul>

                                    {{-- <a href="#" class="readMore">+ much more</a>--}}
                                </div>
                            </div>
                        </div>

                        @if(\Illuminate\Support\Facades\Request::segment(2) != 'custom-merchandise')
                        <div class="card">
                            <div id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse" data-toggle="collapse"
                                            data-target="#collapseAge" aria-expanded="false"
                                            aria-controls="collapseAge">
                                        Age Group
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseAge" class="collapsed" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <input name="age[]" class="age_filter" type="checkbox"
                                                   id="age-0-3" value="0-3">
                                            <label for="age-0-3">0 - 3</label>
                                        </li>
                                        <li>
                                            <input name="age[]" class="age_filter" type="checkbox"
                                                   id="age-preschool" value="preschool">
                                            <label for="age-preschool">Preschool</label>
                                        </li>
                                        <li>
                                            <input name="age[]" class="age_filter" type="checkbox"
                                                   id="age-elementary" value="elementary">
                                            <label for="age-elementary">Elementary</label>
                                        </li>
                                        <li>
                                            <input name="age[]" class="age_filter" type="checkbox"
                                                   id="age-middle" value="middle">
                                            <label for="age-middle">Middle</label>
                                        </li>
                                        <li>
                                            <input name="age[]" class="age_filter" type="checkbox"
                                                   id="age-high-school" value="high-school">
                                            <label for="age-high-school">High School</label>
                                        </li>
                                        <li>
                                            <input name="age[]" class="age_filter" type="checkbox"
                                                   id="age-adult" value="adult">
                                            <label for="age-adult">Adult</label>
                                        </li>
                                        <li>
                                            <input name="age[]" class="age_filter" type="checkbox"
                                                   id="age-all-ages" value="all-ages">
                                            <label for="age-all-ages">All Ages</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
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
        $('.marketplace_filter, .sub_category_filter, .child_category_filter, .price_filter, .state_filter, .age_filter').on('change', function () {
            filter();
        })

        function filter() {
            let filterlink = '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?active=1&category[]=' + {{ $selectedCategory->id }};

            $('.marketplace_filter').each(function () {
                if ($(this).is(':checked')) {
                    // if (filterlink == '') {
                    //     filterlink += '?' + $(this).attr('name') + '=' + $(this).val();
                    // } else {
                    filterlink += '&' + $(this).attr('name') + '=' + $(this).val();
                    // }
                }
            });

            $('.sub_category_filter').each(function () {
                if ($(this).is(':checked')) {
                    if (filterlink == '') {
                        filterlink += '{{route('front.category', [Request::route('category'), Request::route('subcategory'), Request::route('childcategory')])}}' + '?' + $(this).attr('name') + '=' + $(this).val();
                    } else {
                        filterlink += '&' + $(this).attr('name') + '=' + $(this).val();
                    }
                }
            });

            $('.child_category_filter').each(function () {
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

            $('.age_filter').each(function () {
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
