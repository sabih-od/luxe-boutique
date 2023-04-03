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
                                <h4 class="widget-title down-line mb-30">{{ __('Become A Mentor') }}
                                </h4>
                                <div class="edit-info-area">
                                    <div class="body">
                                        <div class="edit-info-area-form">
                                            <div class="gocover"
                                                 style="background: url({{ asset('assets/images/'.$gs->loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                                            </div>
                                            <form id="userMentorForm" action="{{route('user-become-a-mentor')}}"
                                                  method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-4">
                                                    <div class="col-lg-6">
                                                        <input name="name" type="text"
                                                               class="input-field form-control border"
                                                               placeholder="{{ __('Full Name') }}" required=""
                                                               value="{{ $user->name }}">
                                                        @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input name="email" type="email"
                                                               class="input-field form-control border"
                                                               placeholder="{{ __('Email Address') }}" required=""
                                                               value="{{ $user->email }}" readonly>
                                                        @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-12">
                                                        <input name="phone" type="text"
                                                               class="input-field form-control border"
                                                               placeholder="{{ __('Phone Number') }}" required=""
                                                               value="{{ $user->phone }}">
                                                        @error('phone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-12">
                                                        <textarea class="input-field form-control border" name="about_me"
                                                                  placeholder="{{ __('About Me') }}" cols="30" rows="10"
                                                                  required>{{ $user->address }}</textarea>
                                                        @error('about_me')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-12">
                                                        <p class="text-dark font-weight-bold">Upload Documents <small>(You can choose multiple files at once)</small></p>
                                                        <input type="file" name="documents[]" id="upload_documents" multiple>
                                                        @error('documents')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-links">
                                                    <button class="submit-btn btn btn-primary"
                                                            type="submit">{{ __('Become A Mentor') }}</button>
                                                </div>
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
    </div>
    <!--==================== Blog Section End ====================-->
    {{--@includeIf('partials.global.common-footer')--}}
{{--    @include('layouts.theme-2.footer')--}}
@endsection
@section('script')
@endsection
