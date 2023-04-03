@extends('layouts.front')
@section('content')
      {{--@includeIf('partials.global.common-header')--}}
    {{--    @include('layouts.theme-2.menu')--}}
    <!-- breadcrumb -->
    <div class="full-row bg-light overlay-dark py-5"
         style="background-image: url({{ $gs->breadcrumb_banner ? asset('assets/images/'.$gs->breadcrumb_banner):asset('assets/images/noimage.png') }}); background-position: center center; background-size: cover;">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h3 class="mb-2 text-white">{{ __('Become A Mentor') }}</h3>
                </div>
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-inline-flex bg-transparent p-0">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('user-dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Become A Mentor') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <!--==================== Blog Section Start ====================-->
    <div class="full-row">
        <div class="container">
            <div class="mb-4 d-xl-none">
                <button class="dashboard-sidebar-btn btn bg-primary rounded">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    @include('partials.user.dashboard-sidebar')
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget border-0 p-40 widget_categories bg-light account-info">
                                <h4 class="widget-title down-line mb-30">{{ __('Session Requests') }}
                                </h4>
                                <div class="edit-info-area">
                                    <div class="body">
                                        <div class="edit-info-area-form">
                                            <div class="gocover"
                                                 style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                                            </div>
                                            <table id="session-request-table" class="table table-bordered">
                                                <thead>
                                                <tr style="text-align: center">
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Message</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                                </thead>
                                                <tbody>

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
    </div>
    </div>
    <!--==================== Blog Section End ====================-->
    {{--@includeIf('partials.global.common-footer')--}}
    {{--    @include('layouts.theme-2.footer')--}}
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var mentorsTable = $('#session-request-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('user-mentor-sessions-datatables') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'message', name: 'message'},
                    // {data: 'action', name: 'action'}
                ]
            });
        })
    </script>
@endsection
