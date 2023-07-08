@extends('website.master')

@section('title')
@endsection

@section('body')
    <!-- service -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- course item -->
                @foreach ($courses as $course)
                    <!-- service item -->
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card text-center">
                            <div class="card-img-wrapper overlay-rounded-top">
                                <img class="card-img-top rounded-0" src="{{ asset($course->image) }}" alt="service-image"
                                    height="250" style="object-fit: cover"/>
                            </div>
                            <div class="card-body p-0">
                                <h4 class="card-title pt-3 px-3" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                                    {{ $course->title }}</h4>
                                <p class="card-text mx-2 mb-0">Starting Date : {{ $course->starting_date }}</p>
                                <a href="{{ route('course-detail', ['id' => $course->id]) }}"
                                    class="btn btn-secondary translateY-25">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /service -->
@endsection
