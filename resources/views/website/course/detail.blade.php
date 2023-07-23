@extends('website.master')
<style>

  .btn-floating-action {
    position: absolute;
    top:-4px;
    left: 34px; /* Adjust this value as needed to position the button */
    z-index: 1;
  }
    </style>
@section('body')

    <section>
        <div class="container-fluid  mx-5 mb-5">
            <div class="row mx-5">
                <div class="col-lg-8">
                    <div class="border rounded bg-white">
                        {{-- <img class="img-fluid w-100 rounded-top " src="{{ asset($course->image) }}" alt="blog-image"
                            style=" height:480px; object-fit: cover"> --}}
                       @if ($selected_material)
                       <video id="my-video" class="video-js" controls preload="auto" height="480"
                       poster="{{ asset($selected_material->thumbnail_image) }}" data-setup='{"fluid": true}'>
                       <source src="{{ asset($selected_material->video) }}" type="video/mp4">
                       {{-- <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" > --}}

                       <p class="vjs-no-js">
                           To view this video please enable JavaScript, and consider upgrading to a web browser that
                           <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                       </p>
                   </video>
                       @endif
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
                </div>
                @if (count($course_materials) > 0)
                    <div class="col-lg-4">
                        <!-- Sidebar -->
                        <div class="bg-white px-2 ">
                            <!-- Search Widget -->
                            @foreach ($course_materials as $item)
                                {{-- <div class="mb-2 card">
                                    <img class="img card-img rounded-top " src="" alt="blog-image"
                                    style=" object-fit: cover;">

                                </div> --}}
                                <div class="card mb-3" style="background-color: {{$selected_material&&$selected_material->id==$item->id?"rgba(0, 255, 0, .1)":"rgba(0, 0, 0, .03)"}}  ">
                                    <div class="m-2">
                                        <div class="row">
                                            <div class="col-5">
                                                <img class="img w-100 rounded" src="{{ asset($item->thumbnail_image) }}"
                                                    alt=""
                                                    style="object-fit: cover;background-color: rgba(34, 36, 38, .1); height: 100px;">
                                                    <input type="checkbox" class=" form-check-input btn-floating-action" value="" style="height: 24px;width:24px;">
                                            </div>
                                            <div class="col-7">
                                                <div class="">
                                                    <p style="font-size: 16px">{{$item->title }}</p>
                                                    <a href="{{route('course-detail', ['id' => $course->id, 'material_id'=>$item->id])}}" class="">See this</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- /blog-single -->

@endsection
