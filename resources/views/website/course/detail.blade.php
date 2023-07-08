@extends('website.master')

@section('body')

    <section class="page-title overlay"
        style="background-image: url({{ asset('/') }}website/images/background/category.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white font-weight-bold">{{ $course->title }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Course Single</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- blog single -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 py-100">
                    <div class="border rounded bg-white">
                        <img class="img-fluid w-100 rounded-top " src="{{ asset($course->image) }}" alt="blog-image"
                            style=" height:200px; object-fit: cover">
                        <div class="p-4">
                            <h3>{{ $course->title }}</h3>
                            <ul class="list-inline d-block pb-4 border-bottom mb-3">
                                <li class="list-inline-item text-color">Trainer Name:{{ $course->teacher->name }}</li>
                                <li class="list-inline-item text-color">Course Starting
                                    Date:{{ $course->starting_date }}</li>
                                <li class="list-inline-item text-color">Course Category:{{ $course->category->name }}
                                </li>
                            </ul>
                            <div>{!! $course->description !!}</div>
                        </div>
                    </div>
                    <div class="py-4 border-bottom mb-100">
                        <div class="row">
                            <div class="col-lg-5 mb-4 mb-lg-0">
                                <!-- share-icon -->
                                <div class="d-flex">
                                    <span class="font-weight-light mt-2 mr-3">Share:</span>
                                    <ul class="list-inline d-inline-block">
                                        <li class="list-inline-item">
                                            <a class="share-icon bg-facebook" href="#">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="share-icon bg-twitter" href="#">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="share-icon bg-linkedin" href="#">
                                                <i class="ti-linkedin"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="share-icon bg-google" href="#">
                                                <i class="ti-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <!-- tags -->
                                <div class="d-flex">
                                    <span class="font-weight-light mt-2 mr-3">Tags:</span>
                                    <ul class="list-inline tag-list">
                                        <li class="list-inline-item">
                                            <a href="#">Business</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">Marketing</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">Finance</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- comments -->
                    <div>

                        <!-- comment item -->

                        <!-- comment form -->
                        <div>

                            @if ($is_enrolled == 0)
                                <form action="{{ route('course-enroll', ['id' => $course->id]) }}" method="POST"
                                    class="row">
                                    @csrf
                                    @if (!Session::has('student_id'))
                                        <h4>Enroll Form:</h4>
                                        <p class="mb-30">Required fields are marked *</p>
                                        <div class="col-lg-12">
                                            <label>Full Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control mb-30" id="user-name" name="name"
                                                placeholder="Your name here">
                                            <span
                                                class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Email Address<span class="text-danger">*</span></label>
                                            <input type="email" id="user-email" name="email" class="form-control mb-30"
                                                placeholder="Your email address here">
                                            <span
                                                class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Mobile Number<span class="text-danger">*</span></label>
                                            <input type="number" id="user-mobile" name="mobile" class="form-control mb-30"
                                                placeholder="Your mobile number here">
                                            <span
                                                class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                                        </div>
                                    @endif

                                    <div class="col-12">
                                        <button class="btn btn-sm btn-primary" type="submit" value="send">Confirm
                                            Enroll</button>
                                    </div>
                                </form>
                            @else
                                <button type="button" class="btn {{$enroll_status=='approved'?'btn-success':($enroll_status=='rejected'?'btn-danger':'btn-warning' )}} disabled">{{$enroll_status}}</button>
                            @endif
                        </div>
                    </div>
                </div>
                @if (count($course_materials)>0)
                <div class="col-lg-4">
                    <!-- Sidebar -->
                    <div class="bg-white px-2 py-100">
                        <!-- Search Widget -->
                        @foreach ($course_materials as $item)

                        <div class="mb-2">
                            <video id="my-video" class="video-js" controls preload="auto" height="264"
                                poster="{{ asset($item->thumbnail_image) }}" data-setup='{"fluid": true}'>
                                <source src="{{ asset($item->video) }}" type="video/mp4">
                                {{-- <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" > --}}

                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>
                        </div>
                        @endforeach
                        <!-- Widget Recent Post -->

                        <!-- Widget Tags -->
                        {{-- <div class="mb-50">
                            <h4 class="mb-3">Tags</h4>
                            <ul class="list-inline tag-list">
                                <li class="list-inline-item">
                                    <a href="#">Business</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Marketing</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Finance</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Consultancy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Market Analysis</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Rvenenue</a>
                                </li>
                            </ul>
                        </div> --}}

                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- /blog-single -->

@endsection
