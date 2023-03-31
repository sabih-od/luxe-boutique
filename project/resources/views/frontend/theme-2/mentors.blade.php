@extends('layouts.theme-2.app')
@section('content')
    <!-- Begin: Main Slider -->
    <div class="main-slider inrBaner">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/inrbnr1.png') }}" alt="">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">SLP Mentors</h2>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/theme-2/images/bgshape.png') }}" alt="" class="bgShape">
    </div>
    <!-- END: Main Slider -->

    <section class="aboutSec merchandisePage">
        <div class="container">
            <h2 class="secHeading wow fadeInUp" data-wow-delay="0.3s">SLP Mentors</h2>

            <div class="row">
                @forelse($mentors as $mentor)
                    <div class="col-md-3">
                        <div class="proCard userCard wow fadeInUp" data-wow-delay="0.75s">
                            <a href="#" data-toggle="modal" data-target="#book-mentor-modal-{{ $mentor->id }}" class="imgWrap">
                                <img
                                    src="{{ !empty($mentor->user->photo) ? asset('assets/images/users/' . $mentor->user->photo) : asset('assets/theme-2/images/person.jpg') }}"
                                    alt="user">
                            </a>
                            <div class="content">
                                <h3>{{ $mentor->name }}</h3>
                                <p>{{ $mentor->about_me }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">No Mentor Found!</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{--    <section class="mentors container-fluid">--}}
    {{--        <h3 class="text-center mb-4">Mentors</h3>--}}
    {{--        <table id="mentors-table" class="table table-bordered">--}}
    {{--            <thead>--}}
    {{--            <tr style="text-align: center">--}}
    {{--                <th>S.No</th>--}}
    {{--                <th>Name</th>--}}
    {{--                <th>Email</th>--}}
    {{--                <th>Phone</th>--}}
    {{--                <th>About</th>--}}
    {{--                <th>Action</th>--}}
    {{--            </tr>--}}
    {{--            </thead>--}}
    {{--            <tbody>--}}

    {{--            </tbody>--}}
    {{--        </table>--}}
    {{--    </section>--}}

        @foreach($mentors as $mentor)
            <div class="modal fade accountAccesSec" id="book-mentor-modal-{{ $mentor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="whitebg">
                                    <h2 class="text-capitalize">Book a session with {{ $mentor->name }}</h2>
                                    <form action="{{route('submit-mentor-session-form')}}" id="bookSessionForm" method="post"
                                          class="formStyle form-row">
                                        @csrf
                                        <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">
                                        <div class="alert alert-dismissible w-100 text-left" style="display: none">
                                            <span></span>
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                        <div class="input-group">
                                            <label>Full Name<em>*</em></label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="{{ __('Full Name') }}"
                                                   required>
                                        </div>
                                        <div class="input-group">
                                            <label>Email Address<em>*</em></label>
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="{{ __('Email Address') }}" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Phone Number<em>*</em></label>
                                            <input type="tel" name="phone" class="form-control"
                                                   placeholder="{{ __('Phone Number') }}" required>
                                        </div>
                                        <div class="input-group">
                                            <label>Message<em>*</em></label>
                                            <textarea class="form-control" name="message" id="message" rows="10" required></textarea>
                                        </div>
                                        <div class="input-group justify-content-md-end">
                                            <button class="themeBtn" type="submit">Book A Session</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
@endsection
@section('scripts')
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            var mentorsTable = $('#mentors-table').DataTable({--}}
    {{--                processing: true,--}}
    {{--                serverSide: true,--}}
    {{--                ajax: '{{ route('front.slpMentorsDataTable') }}',--}}
    {{--                columns: [--}}
    {{--                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},--}}
    {{--                    {data: 'name', name: 'name'},--}}
    {{--                    {data: 'email', name: 'email'},--}}
    {{--                    {data: 'phone', name: 'phone'},--}}
    {{--                    {data: 'about_me', name: 'about'},--}}
    {{--                    {data: 'action', name: 'action'}--}}
    {{--                ]--}}
    {{--            });--}}
    {{--        })--}}
    {{--    </script>--}}
@endsection
