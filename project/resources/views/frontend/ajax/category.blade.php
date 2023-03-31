@if (count($prods) > 0)
    @if($gs->active_theme == 1)
        <div class="col-lg-12">
            @include('partials.product.product-different-view')
        </div>
    @else
        @include('frontend.theme-2.ajax.product-view')
    @endif
@else
    <div class="col-lg-12">
        <div class="page-center">
            <h4 class="text-center">{{ __('No Product Found.') }}</h4>
        </div>
    </div>
@endif

@if($gs->active_theme == 1)
    <script>
        lazy()

        $('[data-toggle="tooltip"]').tooltip({});

        $('[rel-toggle="tooltip"]').tooltip();

        $('[data-toggle="tooltip"]').on('click', function () {
            $(this).tooltip('hide');
        })


        $('[rel-toggle="tooltip"]').on('click', function () {
            $(this).tooltip('hide');
        })

        // Tooltip Section Ends
    </script>
@endif
