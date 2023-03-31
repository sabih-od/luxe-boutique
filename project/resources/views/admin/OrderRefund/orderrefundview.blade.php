@extends('layouts.admin')

@section('content')
    <input type="hidden" id="headerdata" value="{{ __("VENDOR") }}">
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __("Order Refund") }}</h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
                        </li>
                        <li>
                            <a href="javascript:;">{{ __("Vendors") }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-vendor-index') }}">{{ __("Vendors List") }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-area">
            <div class="row">
                <div class="col-lg-12">

{{--                    <div class="heading-area">--}}
{{--                        <h4 class="title">--}}
{{--                            {{ __("Vendor Registration") }} :--}}
{{--                        </h4>--}}
{{--                        <div class="action-list">--}}
{{--                            <select class="process select1 vdroplinks {{ $gs->reg_vendor == 1 ? 'drop-success' : 'drop-danger' }}">--}}
{{--                                <option data-val="1" value="{{route('admin-gs-status',['reg_vendor',1])}}" {{ $gs->reg_vendor == 1 ? 'selected' : '' }}>{{ __("Activated") }}</option>--}}
{{--                                <option data-val="0" value="{{route('admin-gs-status',['reg_vendor',0])}}" {{ $gs->reg_vendor == 0 ? 'selected' : '' }}>{{ __("Deactivated") }}</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}


{{--                    </div>--}}


                    <div class="mr-table allproduct">
                        @include('alerts.admin.form-success')
                        <div class="table-responsive">
                            <table id="orderrefundtable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ __("Product Name") }}</th>
                                    <th>{{ __("User Email") }}</th>
                                    <th>{{ __("Amount") }}</th>
                                    <th>{{ __("Status") }}</th>
                                    <th>{{ __("Options") }}</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- The Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Refund Status Update</h4>
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
                                                <input type='hidden' name='orderrefund_id' id='orderrefund_id'>
                                                {{csrf_field()}}

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ __("Product Name") }} </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="email" class="input-field" name="product_name" id="product_name"readonly>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ __("Customer Email") }} </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="email" class="input-field" name="customer_email="id="customer_email"readonly>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ __("Amount") }} </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="input-field" name="amount" placeholder="{{ __("Shop Name") }}" id="amount">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">
                                                            <h4 class="heading">{{ __("Status") }} </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <select name="status"id="status"class="input-field">
                                                            <option value="Pending">Pending</option>
                                                            <option value="Approve">Approve</option>
                                                            <option value="Cancel">Cancel</option>
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="left-area">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <button class="addProductSubmit-btn" type="submit">{{ __("Submit") }}</button>
                                                    </div>
                                                </div>

                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>

@endsection
@section('scripts')

    {{-- DATA TABLE --}}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        (function($) {
            "use strict";

            var table = $('#orderrefundtable').DataTable({
                ordering: false,
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin-orderrefund-datatables') }}',
                columns: [
                    { data: 'product', name: 'email' },
                    { data: 'customer_email', name: 'customer_email' },
                    { data: 'refund_amount', name: 'refund_amount' },
                    { data: 'status', searchable: false, orderable: false},
                    { data: 'action', searchable: false, orderable: false }
                ],
                language : {
                    processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                },
                drawCallback : function( settings ) {
                    $('.select').niceSelect();
                }
            });

            $('.select1').niceSelect();


        })(jQuery);

    </script>


    <script type="text/javascript">

        (function($) {
            "use strict";

            $(document).on('click','.verify',function(){
                if(admin_loader == 1)
                {
                    $('.submit-loader').show();
                }
                $('#verify-modal .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
                    if(status == "success")
                    {
                        if(admin_loader == 1)
                        {
                            $('.submit-loader').hide();
                        }
                    }
                });
            });


        })(jQuery);

    </script>


    <script type="text/javascript">

        (function($) {
            "use strict";

            $(document).on('click','.add-subs',function(){
                if(admin_loader == 1)
                {
                    $('.submit-loader').show();
                }
                $('#ad-subscription-modal .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
                    if(status == "success")
                    {
                        if(admin_loader == 1)
                        {
                            $('.submit-loader').hide();
                        }
                    }
                });
            });

        })(jQuery);

        $(document).on("click", '.edit', function(e){
            e.preventDefault();
            const id = $(this).data("id");
            $.ajax({
                url: '{{route('admin-order-refund-edit')}}',
                type: "post",
                dataType: "json",
                data: {id: id},
                success:function(data){
                    console.log(data);
                    $('#orderrefund_id').val(data.id);
                    $('#amount').val(data.refund_amount);
                    $('#status').val(data.status);
                    $('#customer_email').val(data.order.customer_email);
                    $('#product_name').val(data.product.name);
                }
            });
        });



        //  Start update form code
        $("#orderrefundupdate").on('submit', function(e) {

            e.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: '{{route('admin-order-refund-update')}}',
                type: "post",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                 $('#editModal').modal('hide');
                    window.location.reload();
                  $.notify(response.success,'success');

                }
            });
        });
        //  End update form code

    </script>


    {{-- DATA TABLE --}}

@endsection
