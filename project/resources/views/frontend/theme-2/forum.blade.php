@extends('layouts.theme-2.app')
@section('content')
    <!-- Begin: Main Slider -->
    <div class="main-slider fourmPage">
        <img class="img-fluid w-100" src="{{ asset('assets/theme-2/images/forumbg.jpg') }}" alt="img">
        <div class="carousel-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="wow fadeInLeft" data-wow-delay="0.5s">Welcome to the Forums</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Main Slider -->

    <section class="virtualPage realMarkt">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="forumLst">
                        <div id="accordion">
                            <div class="card">
                                <div id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="themeBtn btn-block" data-dismiss="modal" data-toggle="modal"
                                                data-target="#discussion">New Discussion
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapsed" aria-labelledby="headingOne"
                                     data-parent="#accordion">
                                    <div class="card-body">
                                        <span><i class="far fa-comment"></i>All Discussion</span>
                                        <ul>
                                            @forelse($categories as $category)
                                                <li>
                                                    <a href="#">{{ $category->name }}</a>
                                                </li>
                                            @empty
                                                <li>No Categories Found</li>
                                            @endforelse
                                        </ul>
                                        <!-- <a href="#" class="readMore">+ much more</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    @forelse($discussions as $discussion)
                        <div class="reviewBox forumRevew">
                            <figure>
                                <img src="{{ asset('assets/theme-2/images/forumimg.png') }}" class="img-fluid"
                                     alt="img">
                            </figure>
                            <div class="reviewLst">
                                <div class="populRate">
                                    <h5><a href="forums-detail.php">{{ $discussion->title }}<span>PHP</span></a></h5>
                                    <a href="#">2 Comment<i class="far fa-comment"></i></a>
                                </div>

                                <span>Posted By: Admin 2 days ago</span>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries.</p>
                            </div>
                        </div>
                    @empty
                        <p>No Open Discussion Found</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>






    <!-- <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
            </div>
        </div>
    </section> -->

    <div class="modal fade accountAccesSec" id="discussion" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="whitebg">
                            <h2>Start A New Discussion</h2>
                            <form action="" class="formStyle form-row">
                                <div class="input-group">
                                    <label>Topic Name<em>*</em></label>
                                    <input type="text" class="form-control" placeholder="Topic Name">
                                </div>
                                <div class="input-group">
                                    <label>Select Discussion Category<em>*</em></label>
                                    <select>
                                        <option>Select Discussion Category</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label>What would you like to start the discussion about?<em>*</em></label>
                                    <textarea name="text" class="form-control"
                                              placeholder="What would you like to start the discussion about?"
                                              rows="10"></textarea>
                                </div>
                                <div class="input-group">
                                    <label>Upload file<em>*</em></label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="input-group justify-content-md-end">
                                    <button class="themeBtn">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
