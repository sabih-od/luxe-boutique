@extends('layouts.admin')

@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Tickets') }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Messages') }}</a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __('Tickets') }}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="product-area">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mr-table allproduct">

                        @include('alerts.admin.form-success')

                        <div class="table-responsive">
                            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                <tr>
{{--                                    <th>{{ __('Name') }}</th>--}}
                                    <th>{{ __('Subject') }}</th>
                                    <th>{{ __('Message') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Options') }}</th>

                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- DELETE MODAL --}}

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header d-block text-center">
                    <h4 class="modal-title d-inline-block">{{ __('Confirm Delete') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p class="text-center">{{ __('You are about to delete this Ticket. Every messages under this Ticket will be deleted.') }}</p>
                    <p class="text-center">{{ __('Do you want to proceed?') }}</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <form action="" class="d-inline delete-form" method="POST">
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- DELETE MODAL ENDS --}}


    {{-- MESSAGE MODAL --}}
    <div class="sub-categori">
        <div class="modal" id="vendorform" tabindex="-1" role="dialog" aria-labelledby="vendorformLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="vendorformLabel">{{ __('Send Message') }}</h5>
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
                                                    <input type="email" class="input-field eml-val" id="eml1" name="to" placeholder="{{ __('Email') }} *" value="" required="">
                                                </li>
                                                <li>
                                                    <input type="text" class="input-field" id="subj1" name="subject" placeholder="{{ __('Subject') }} *" required="">
                                                </li>
                                                <li>
                                                    <textarea class="input-field textarea" name="message" id="msg1" placeholder="{{ __('Your Message') }} *" required=""></textarea>
                                                </li>
                                                <input type="hidden" name="type" value="Ticket">
                                            </ul>
                                            <button class="submit-btn" id="emlsub1" type="submit">{{ __('Send Message') }}</button>
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

    <!-- The Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Message Detail</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="content-area">
                        <div class="add-product-content1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-description">
                                        <div class="body-area">
                                            @include('alerts.admin.form-error')
                                            <form id="orderrefundupdate">
{{--                                                <input type='hidden' name='orderrefund_id' id='orderrefund_id'>--}}
                                                {{csrf_field()}}

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ __("Subject") }} </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <span id="subject"></span>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ __("Message") }} </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <span id="message"></span>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ __("Type") }} </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <span id="type"></span>
                                                    </div>
                                                </div>



{{--                                                <div class="row">--}}
{{--                                                    <div class="col-lg-4">--}}
{{--                                                        <div class="left-area">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-lg-7">--}}
{{--                                                        <button class="addProductSubmit-btn" type="submit">{{ __("Submit") }}</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

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
    </div>


@endsection



@section('scripts')

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        (function($) {
            "use strict";

            var table = $('#geniustable').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin-user-message-datatable') }}',
                columns: [
                    // { data: 'name', name: 'name' },
                    { data: 'subject', name: 'subject' },
                    { data: 'message', name: 'message' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', searchable: false, orderable: false }

                ],
                language: {
                    processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                },
                drawCallback : function( settings ) {
                    $('.select').niceSelect();
                }
            });


            {{--$(function() {--}}
            {{--    $(".btn-area").append('<div class="col-sm-4 table-contents">'+--}}
            {{--        '<a class="add-btn" href="javascript:;" data-toggle="modal" data-target="#vendorform"><i class="fas fa-envelope"></i> {{ __('Add Ticket') }}</a>'+'</div>');--}}
            {{--});--}}

            $(document).on("click", '.edit', function(e){
                e.preventDefault();
                const id = $(this).data("id");
                $.ajax({
                    url: '{{route('Messagedetail')}}',
                    type: "post",
                    dataType: "json",
                    data: {id: id},
                    success:function(data){
                        console.log(data);
                        // $('#orderrefund_id').val(data.id);
                        $('#subject').text(data.subject);
                        $('#message').text(data.message);
                        $('#type').text(data.type);
                    }
                });
            });
        })(jQuery);

    </script>


@endsection
