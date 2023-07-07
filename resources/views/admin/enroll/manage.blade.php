@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Enrolled Student</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <h4 class="text-center text-success">{{session('message')}}</h4>
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Course Name</th>
                            <th>Student Name</th>
                            <th>Enroll Date</th>
                            <th>Enroll  Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($enrolls as $enroll)
                            <tr class="{{$enroll->enroll_status == 'approved' ? '' : 'bg-warning text-white'}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$enroll->course->title}}</td>
                                <td>{{$enroll->student->name}}</td>
                                <td>{{$enroll->enroll_date}}</td>
                                <td>{{$enroll->enroll_status }}</td>
                                <td class="d-flex">
                                    {{-- <a href="{{route('admin.student-detail',['id'=>$enroll->student_id])}}" class="btn btn-info btn-sm mr-1">
                                        <i class="fa fa-book-open"></i>
                                    </a> --}}
                                    <a href="{{route('admin.update-enroll-status',['id'=>$enroll->id])}}" class="btn btn-success btn-sm mr-1">
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

