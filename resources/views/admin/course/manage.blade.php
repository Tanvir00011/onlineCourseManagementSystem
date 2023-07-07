@extends('admin.master')
@section('title')
    Course Manage
@endsection
@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Course Info</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <h4 class="text-center text-success">{{session('message')}}</h4>
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Starting Date</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($courses as $course)
                            <tr class="{{$course->status == 1 ? '' : 'bg-warning text-white'}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->starting_date}}</td>
                                <td>{{$course->price}}</td>
                                <td>{{$course->status ==1 ? 'published' : 'Unpublished'}}</td>
                                <td class="d-flex">
                                    <a href="{{route('admin.course-detail',['id'=>$course->id])}}" class="btn btn-info btn-sm mr-1">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{route('admin.update-course-status',['id'=>$course->id])}}" class="btn btn-success btn-sm mr-1">
                                        <i class="fa fa-arrow-circle-up"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

