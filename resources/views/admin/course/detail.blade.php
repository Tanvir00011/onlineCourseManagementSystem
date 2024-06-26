@extends('admin.master')
@section('title')
    Course Details
@endsection
@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Course Detail Info</h4>

                    <table  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <h4 class="text-center text-success">{{session('message')}}</h4>
                        <tr>
                            <th>Course ID</th>
                            <td>{{$course->id}}</td>
                        </tr>
                        <tr>
                            <th>Course Title</th>
                            <td>{{$course->title}}</td>
                        </tr>
                        <tr>
                            <th>Course Category</th>
                            <td>{{$course->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Teacher Info</th>
                            <td>{{$course->teacher->name.'('.$course->teacher->mobile.')'}}</td>
                        </tr>
                        <tr>
                            <th>Course Description</th>
                            <td>{{$course->description}}</td>
                        </tr>
                        <tr>
                            <th>Course Date</th>
                            <td>{{$course->starting_date}}</td>
                        </tr>
                        <tr>
                            <th>Course Price</th>
                            <td>{{$course->price}}</td>
                        </tr>
                        <tr>
                            <th>Course Image</th>
                            <td><img src="{{asset($course->image)}}" alt="" height="100" width="120"></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{$course->status == 1 ? 'Published' : 'Unpublished'}}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection



