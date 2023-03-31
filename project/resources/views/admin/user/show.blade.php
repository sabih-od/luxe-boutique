@extends('layouts.admin')

@section('styles')

<style type="text/css">
    .table-responsive {
    overflow-x: hidden;
}
table#example2 {
    margin-left: 10px;
}
    .field_error{
        color:red;
    }

</style>


@endsection

@section('content')

                    <div class="content-area">
                        <div class="mr-breadcrumb">
                            <div class="row">
                                <div class="col-lg-12">
                                        <h4 class="heading">{{ __("Customer Details") }} <a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __("Back") }}</a></h4>
                                        <ul class="links">
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin-user-index') }}">{{ __("Customers") }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin-user-show',$data->id) }}">{{ __("Details") }}</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                            <div class="add-product-content1 customar-details-area add-product-content2">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="product-description">
                                            <div class="body-area">
                                            <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="user-image">
                                                            @if($data->is_provider == 1)
                                                            <img src="{{ $data->photo ? asset($data->photo):asset('assets/images/'.$gs->user_image)}}" alt="No Image">
                                                            @else
                                                            <img src="{{ $data->photo ? asset('assets/images/users/'.$data->photo):asset('assets/images/'.$gs->user_image)}}" alt="No Image">
                                                            @endif
                                                                <a href="javascript:;" class="mybtn1 send" data-email="{{ $data->email }}" data-toggle="modal" data-target="#adminsent_to_email_vendor_form">{{ __("Send Email") }}</a>

                                                                <a href="javascript:;" class="mybtn1 send" data-email="{{ $data->email }}" data-toggle="modal" data-target="#vendorform">{{ __("Send Message") }}</a>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="table-responsive show-table">
                                                        <table class="table">
                                                        <tr>
                                                            <th>{{ __("ID#") }}</th>
                                                            <td>{{$data->id}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __("Name") }}</th>
                                                            <td>{{$data->name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __("Email") }}</th>
                                                            <td>{{$data->email}}</td>
                                                        </tr>
                                                        <tr>
                                                                <th>{{ __("Phone") }}</th>
                                                                <td>{{$data->phone}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __("Address") }}</th>
                                                                <td>{{$data->address}}</td>
                                                            </tr>

                                                        </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="table-responsive show-table">
                                                    <table class="table">

                                                            @if($data->city != null)
                                                            <tr>
                                                                <th>{{ __("City") }}</th>
                                                                <td>{{$data->city}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($data->fax != null)
                                                            <tr>
                                                                <th>{{ __("Fax") }}</th>
                                                                <td>{{$data->fax}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($data->zip != null)
                                                            <tr>
                                                                <th>{{ __("Zip Code") }}</th>
                                                                <td>{{$data->zip}}</td>
                                                            </tr>
                                                            @endif
                                                            <tr>
                                                                <th>{{ __("Joined") }}</th>
                                                                <td>{{$data->created_at->diffForHumans()}}</td>
                                                            </tr>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-table-wrap">
                                                <div class="order-details-table">
                                                    <div class="mr-table">
                                                        <h4 class="title">{{ __("Products Ordered") }}</h4>
                                                        <div class="table-responsive">
                                                                <table id="example2" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{ __("Order ID") }}</th>
                                                                            <th>{{ __("Purchase Date") }}</th>
                                                                            <th>{{ __("Amount") }}</th>
                                                                            <th>{{ __("Status") }}</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($data->orders as $order)
                                                                        <tr>
            <td><a href="{{ route('admin-order-invoice',$order->id) }}">{{sprintf("%'.08d", $order->id)}}</a></td>
                                                                            <td>{{ date('Y-m-d h:i:s a',strtotime($order->created_at)) }}</td>
                                                                            <td>{{ \PriceHelper::showOrderCurrencyPrice(($order->pay_amount * $order->currency_value),$order->currency_sign) }}</td>
                                                                            <td>{{ $order->status }}</td>
                                                                            <td>
                                                                                <a href=" {{ route('admin-order-show',$order->id) }}" class="view-details">
                                                                                    <i class="fas fa-check"></i>{{ __("Details") }}
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

{{-- MESSAGE MODAL --}}
<div class="sub-categori">
    <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vendorformLabel">{{ __("Send Message") }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <form id="emailreply1">
                                    {{csrf_field()}}
                                    <ul>
                                        <li>
                                            <input type="email" class="input-field eml-val" id="eml1" name="to" placeholder="{{ __("Email") }} *" value="" required="">
                                        </li>
                                        <li>
                                            <input type="text" class="input-field" id="subj1" name="subject" placeholder="{{ __("Subject") }} *" required="">
                                        </li>
                                        <li>
                                            <textarea class="input-field textarea" name="message" id="msg1" placeholder="{{ __("Your Message") }} *" required=""></textarea>
                                        </li>
                                    </ul>
                                    <button class="submit-btn" id="emlsub1" type="submit">{{ __("Send Message") }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

{{-- MESSAGE MODAL ENDS --}}

    {{-- Admin Sent to email Vendor --}}

                    <div class="sub-categori">
                        <div class="modal" id="adminsent_to_email_vendor_form" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="vendorformLabel">{{ __("Send Email") }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid p-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="contact-form">
                                                        <form id="adminsentemailtovendor">
                                                            {{csrf_field()}}
                                                               <div>
                                                                    <input type="email" class="input-field eml-val"  name="vendor_email" placeholder="{{ __("Email") }} *" value="">

                                                               </div>

                                                            <div>
                                                             <input type="text" class="input-field" name="vendor_subject" placeholder="{{ __("Subject") }} *">
                                                               </div>

                                                            <span id="vendor_subject_error" class="field_error mb-5"></span>

                                                            <div>
                                                            <textarea class="input-field textarea mt-3" name="vendor_message" placeholder="{{ __("Your Message") }} *"></textarea>
                                                               </div>
                                                            <span id="vendor_message_error" class="field_error mb-5"></span>

{{--                                                            <ul>--}}
{{--                                                                <li>--}}
{{--                                                                    <input type="email" class="input-field eml-val"  name="vendor_email" placeholder="{{ __("Email") }} *" value="">--}}
{{--                                                                </li>--}}

{{--                                                                <li>--}}
{{--                                                                    <input type="text" class="input-field" name="vendor_subject" placeholder="{{ __("Subject") }} *">--}}
{{--                                                                    <span id="vendor_subject_error" class="field_error"></span>--}}

{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <textarea class="input-field textarea" name="vendor_message" placeholder="{{ __("Your Message") }} *"></textarea>--}}

{{--                                                                    <span id="vendor_message_error" class="field_error"></span>--}}

{{--                                                                </li>--}}

{{--                                                            </ul>--}}


                                                            <button class="submit-btn mt-2" id="emlsub1" type="submit">{{ __("Email Message") }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Admin Sent to email Vendor --}}


@endsection

@section('scripts')

<script type="text/javascript">

(function($) {
		"use strict";

$('#example2').dataTable( {
  "ordering": false,
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false,
      'responsive'  : true
} );

})(jQuery);




</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // start email form code
        $("#adminsentemailtovendor").on("submit", function(e) {


            e.preventDefault();
            $.ajax({
                url: '{{route('admin_sent_to_email_vendor')}}',
                type: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,

                success: function(response) {

                    if(response.error){
                        $.each(response.error,function(key,val){
                            $('#'+key+'_error').html(val[0]);
                        });

                    }else{
                        toastr.success(response.success);

                        $('.modal').modal('hide');
                        $("#adminsentemailtovendor").trigger("reset");

                    }
                }
            });
        });
// End email form code


    });

</script>
@endsection
