@extends('website.master')
<style>
    .btn-floating-action {
        position: absolute;
        top: -4px;
        left: 34px;
        /* Adjust this value as needed to position the button */
        z-index: 1;
    }

    .btn-floating-center {
        position: absolute;
        transform: translate(-50%, -50%);
        margin-right: -50%;
        top: 50%;
        left: 50%;
        background-color: 'black';
        /* Adjust this value as needed to position the button */
        z-index: 1;
    }

    .icon-container {
        height: 40px;
        width: 72px;
        background-color: rgba(34, 36, 38, 0.5);
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px solid white;
        border-radius: 8px
    }

    circle-progress::part(base) {
        width: 50px;
        height: auto;
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
                                    To view this video please enable JavaScript, and consider upgrading to a web browser
                                    that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>
                        @endif

                        {{-- <circle-progress value="50" max="100"></circle-progress> --}}
                        <div class="p-4">
                            <h3> {{ $course->title }}</h3>
                            <ul class="list-inline d-block pb-4 border-bottom mb-3">
                                <li class="list-inline-item text-color">Trainer Name: {{ $course->teacher->name }}</li>
                                <li class="list-inline-item text-color">Course Starting
                                    Date:{{ $course->starting_date }}</li>
                                <li class="list-inline-item text-color">Course Category: {{ $course->category->name }}
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
                            <!-- Button trigger modal -->
                            @if ($course_completed_percentage == 100)
                                <button type="button" class="btn btn-warning   btn-sm rounded-sm w-100 mb-3"
                                    data-toggle="modal" data-target="#reviewModal">
                                    {{$previous_review?'Edit':'Write'}} Review </button>
                            @endif

                            <div class="progress mb-3 rounded-sm">
                                <div class="progress-bar rounded-sm" role="progressbar"
                                    style="width: {{ $course_completed_percentage }}%;"
                                    aria-valuenow="{{ $course_completed_percentage }}" aria-valuemin="0"
                                    aria-valuemax="100">{{ $course_completed_percentage }}%</div>
                            </div>


                            <!-- Search Widget -->
                            @foreach ($course_materials as $item)
                                <div class="card mb-3"
                                    style="background-color: {{ $selected_material && $selected_material->id == $item->id ? 'rgba(0, 255, 0, .1)' : 'rgba(0, 0, 0, .03)' }}  ">
                                    <div class="m-2">
                                        <div class="row">
                                            <div class="col-5">
                                                <img class="img w-100 rounded" src="{{ asset($item->thumbnail_image) }}"
                                                    style="object-fit: cover;background-color: rgba(34, 36, 38, .1); height: 100px;">
                                                <input type="checkbox" class=" form-check-input btn-floating-action"
                                                    value="{{ $item->id }}" onclick="handleComplete(this)"
                                                    {{ $item->is_complete ? 'checked' : '' }}
                                                    style="height: 24px;width:24px;">

                                                <div class=" btn-floating-center">
                                                    <a class="icon-container"
                                                        href="{{ route('course-detail', ['id' => $course->id, 'material_id' => $item->id]) }}">
                                                        <i class="fa-solid fa-play fa-3"
                                                            style="font-size: 20px; color: white"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="">
                                                    <p style="font-size: 16px">{{ $item->title }}</p>
                                                    <a href="{{ route('course-detail', ['id' => $course->id, 'material_id' => $item->id]) }}"
                                                        class="">See this</a>
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
        <!-- Modal -->
        <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog"
            aria-labelledby="reviewModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{$previous_review?'Edit':'Write'}} review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control p-2" name="message" id="review_text" placeholder="Your Message Here..."
                            style="height: 150px;" required>{{$previous_review}}</textarea>
                            <div id="review_text_error" class="text-danger float-right" style="margin-top: -15px;"> </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm rounded-sm"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success btn-sm rounded-sm" onclick="handleWriteReview()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /blog-single -->
    <script>
        function handleComplete(checkbox) {
            var requestData = {
                checked: checkbox.checked,
                id: checkbox.value,
                enroll_id: {{ $enroll_id }}
            };

            // Make the AJAX POST request
            $.ajax({
                type: 'POST',
                url: '{{ route('handle-course-material-is-complete') }}', // Replace 'ajax.getData' with your defined route name
                data: requestData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include the CSRF token in the request headers
                },
                success: function(response) {
                    location.reload();
                    console.log('Data sent successfully!');
                    console.log(response); // The response from the server, if any
                },
                error: function(xhr, status, error) {
                    console.error('Error occurred:');
                    console.error(error); // Show the error details
                }
            });

        };

        function handleWriteReview() {
            var requestData = {
                review_text: $('#review_text').val(),
                course_id: {{ $course->id }}
            };
            if(!requestData?.review_text){
                $('#review_text_error').text('This field is required')
                return;
            }
            $('#review_text_error').text('')
            // Make the AJAX POST request
            $('#reviewModal').modal('hide');
            $.ajax({
                type: 'POST',
                url: '{{ route('handle-write-review') }}', // Replace 'ajax.getData' with your defined route name
                data: requestData,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include the CSRF token in the request headers
                },
                success: function(response) {
                    alert('Review added successfully')
                    location.reload();
                    console.log('Data sent successfully!');
                    console.log(response); // The response from the server, if any
                },
                error: function(xhr, status, error) {
                    console.error('Error occurred:');
                    console.error(error); // Show the error details
                }
            });

        };
    </script>


@endsection
