@extends('layouts.load')
@section('content')

    <div class="content-area">
        <div class="add-product-content1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            @include('alerts.admin.form-error')
{{--                            <form id="geniusformdata" action="{{ route('admin-vendor-edit',$data->id) }}" method="POST" enctype="multipart/form-data">--}}
{{--                                {{csrf_field()}}--}}
                            @foreach($subs as $sub)
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Title") }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="title" placeholder="{{ __("Package Title") }}" value="{{ $sub->title }}" disabled="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Price") }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="price" placeholder="{{ __("Price") }}" required="" value="{{ $sub->currency_sign . $sub->price }}" disabled="">
                                    </div>
                                </div>




{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-4">--}}
{{--                                        <div class="left-area">--}}
{{--                                            <h4 class="heading">{{ __("Days") }} *</h4>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4">--}}
{{--                                        <input type="text" class="input-field" name="days" placeholder="{{ __("Days") }}" required="" value="{{ $sub->days }}" disabled="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Allowed Products") }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="allowed_products" placeholder="{{ __("Allowed Products") }}" required="" value="{{ $sub->allowed_products }}" disabled="">
                                    </div>
                                </div>

{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-4">--}}
{{--                                        <div class="left-area">--}}
{{--                                            <h4 class="heading">{{ __("Details") }} *</h4>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-4">--}}
{{--                                        <input type="text" class="input-field" name="details" placeholder="{{ __("Details") }}" required="" value="{{ substr($sub->details, 0, 300) }}" disabled="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Payment Method") }} *</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="allowed_products" placeholder="{{ __("Payment Method") }}" required="" value="{{ $sub->method }}" disabled="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Tax ID") }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="txnid" placeholder="{{ __("Tax ID") }}" required="" value="{{ $sub->txnid }}" disabled="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Charge ID") }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="charge_id" placeholder="{{ __("Charge ID") }}" required="" value="{{ $sub->charge_id }}" disabled="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Package Buy Date") }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="created_at" placeholder="{{ __("Package Buy Date") }}" required="" value="{{ $sub->created_at }}" disabled="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Status") }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="status" placeholder="{{ __("Status") }}" required="" value="{{ $sub->status }}" disabled="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Total Price") }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="total_price" placeholder="{{ __("Total Price") }}" required="" value="{{ $sub->currency_sign . $sub->total_price }}" disabled="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __("Payout Time") }} </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="input-field" name="payout_time" placeholder="{{ __("Payout Time") }}" required="" value="{{ $sub->payout_time }}" disabled="">
                                    </div>
                                </div>
                            @endforeach

{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-4">--}}
{{--                                        <div class="left-area">--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-7">--}}
{{--                                        <button class="addProductSubmit-btn" type="submit">{{ __("Submit") }}</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </form>--}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            //btn_vendor_packages
            // alert('ready');
            $('#modal1').find('.modal-title').html('Vendor Package');
            // $('#btn_vendor_packages').on('click', function () {
            //     console.log($('#modal1').find('.modal-title'));
            // });
        });

    </script>
@endsection
