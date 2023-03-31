<div class="row">
    @forelse($prods as $product)
        <div class="col-md-4">
            <div class="proCard wow fadeInUp" data-wow-delay="0.75s">
                <a href="{{ route('front.product', $product->slug ?? '#') }}{{ route('front.product', $product->slug ?? '#') }}" class="imgWrap">
                    <img
                        src="{{ $product->thumbnail ? asset('assets/images/thumbnails/'.$product->thumbnail) : asset('assets/images/noimage.png') }}"
                        alt="product">
                </a>
                <div class="content">
                    <a href="{{ route('front.product', $product->slug ?? '#') }}">
                        <h3>{{ $product->showName() }}</h3>
                    </a>
                    <a href="{{ route('front.product', $product->slug ?? '#') }}">{{ ($product->type == 'Merchandise' ? $product->previous_price . ' - ' : '') }}{{ $product->showPrice() }}</a>
                    <span>
                        @for($x = 1; $x < 6; $x++)
                            <i class="fas fa-star"
                               style="color: {{ $product->ratings->avg('rating') >= $x ? '' : '#000' }}"></i>
                        @endfor
                                            <small>{{ App\Models\Rating::ratingCount($product->id) }}</small>
                                        </span>
                </div>
                <div class="amzngSt">
                    {{--                                        <img src="{{ $vendor->photo ? asset('assets/images/users/') . '/' . $vendor->photo : asset('assets/vendor/images/user.png') }}" class="img-fluid" alt="img">--}}
                    <a href="{{ route('front.vendor', str_replace(' ', '-', $product->user->shop_name)) }}">
                        <h6>{{ $product->user->shop_name }}</h6></a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <h1 class="text-center">No Products Found</h1>
        </div>
    @endforelse

</div>
{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {!! $prods->links() !!}
</div>
