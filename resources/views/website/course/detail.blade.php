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
                    <div class="p-5 rounded box-shadow">
                        <form action="#" class="row">
                            <div class="col-12">
                                <h3>Contact Form</h3>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="">
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required="">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control p-2" name="message" id="message" placeholder="Your Message Here..." required="" style="height: 150px;"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" value="send">Submit Now</button>
                            </div>
                        </form>
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
    </section>

    <!-- /blog-single -->
    <script>
        function handleComplete(checkbox) {
            var requestData = {
                checked: checkbox.checked,
                id: checkbox.value,
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
