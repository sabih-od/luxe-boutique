@extends('layouts.vendor')
@section('styles')
@endsection
@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Merchandise Order Request Details') }} <a class="add-btn"
                                                                                         href="{{ url()->previous() }}"><i
                                class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('vendor.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('vendor.merchandise.request') }}">{{ __('Merchandise Order Request') }}</a>
                        </li>
                        <li>
                            <a href="#">{{ __('Order Details') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="order-table-wrap">
            @include('alerts.admin.form-both')
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-box">
                        <div class="heading-area">
                            <h4 class="title">
                                {{ __('Order Details') }}
                            </h4>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th width="20%">{{ __('Customer Name') }}</th>
                                    <td>:</td>
                                    <td>{{$request->customer_name}}</td>
                                </tr>
                                <tr>
                                    <th width="20%">{{ __('Customer Email') }}</th>
                                    <td>:</td>
                                    <td>{{$request->customer_email}}</td>
                                </tr>
                                <tr>
                                    <th width="20%">{{ __('Customer Phone') }}</th>
                                    <td>:</td>
                                    <td>{{$request->customer_phone}}</td>
                                </tr>
                                <tr>
                                    <th width="20%">{{ __('Additional Information') }}</th>
                                    <td>:</td>
                                    <td>{{$request->additional_information ?? ''}}</td>
                                </tr>
                                <tr>
                                    <th width="20%">{{ __('Note') }}</th>
                                    <td>:</td>
                                    <td>{{$request->notes ?? ''}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="title pl-4 font-weight-bold my-4">{{ __('User Attachments') }}</h4>
                        <div class="footer-area">
                            <div class="row">
                                @forelse(json_decode($request->user_media) as $media)
                                    <div class="col-md-3">
                                        <img src="{{ asset('assets/images/merchandise-request/' . $media) }}"
                                             alt="User Media" class="img-fluid">
                                    </div>
                                @empty
                                    <p>No attachments found</p>
                                @endforelse
                            </div>
                            {{--                            <a href="{{ route('vendor-order-invoice',$order->order_number) }}" class="mybtn1"><i--}}
                            {{--                                    class="fas fa-eye"></i> {{ __('View Invoice') }}</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content Area End -->

    {{-- MESSAGE MODAL --}}
    <div class="sub-categori">
        <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vendorformLabel">{{ __('Send Email') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-form">
                                        <form id="emailreply">
                                            {{csrf_field()}}
                                            <ul>
                                                <li>
                                                    <input type="email" class="input-field eml-val" id="eml" name="to"
                                                           placeholder="{{ __('Email') }} *" value="" required="">
                                                </li>
                                                <li>
                                                    <input type="text" class="input-field" id="subj" name="subject"
                                                           placeholder="{{ __('Subject') }} *" required="">
                                                </li>
                                                <li>
                                                    <textarea class="input-field textarea" name="message" id="msg"
                                                              placeholder="{{ __('Your Message') }} *"
                                                              required=""></textarea>
                                                </li>
                                            </ul>
                                            <button class="submit-btn" id="emlsub"
                                                    type="submit">{{ __('Send Email') }}</button>
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




@endsection


@section('scripts')

    <script type="text/javascript">

        (function ($) {
            "use strict";

            $('#example2').dataTable({
                "ordering": false,
                'lengthChange': false,
                'searching': false,
                'ordering': false,
                'info': false,
                'autoWidth': false,
                'responsive': true
            });

        })(jQuery);

    </script>

    <script type="text/javascript">

        (function ($) {
            "use strict";

            $(document).on('click', '#license', function (e) {
                var id = $(this).parent().find('input[type=hidden]').val();
                var key = $(this).parent().parent().find('input[type=hidden]').val();
                $('#key').html(id);
                $('#license-key').val(key);
            });
            $(document).on('click', '#license-edit', function (e) {
                $(this).hide();
                $('#edit-license').show();
                $('#license-cancel').show();
            });
            $(document).on('click', '#license-cancel', function (e) {
                $(this).hide();
                $('#edit-license').hide();
                $('#license-edit').show();
            });

            @if(Session::has('license'))

            $.notify('{{  Session::get('license')  }}', 'success');

            @endif

        })(jQuery);

    </script>

@endsection
