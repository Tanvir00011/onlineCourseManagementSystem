@extends('teacher.master')

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
                            {{-- <th>Enroll  Status</th> --}}
                            {{-- <th>Action</th> --}}
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($enrolls as $enroll)
                            <tr class="{{$enroll->enroll_status == 'approved' ? '' : 'bg-warning text-white'}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$enroll->course_title}}</td>
                                <td>{{$enroll->student_name}}</td>
                                <td>{{$enroll->enroll_date}}</td>
                                {{-- <td class="d-flex">
                                    <a href="{{route('admin.student-detail',['id'=>$enroll->student_id])}}" class="btn btn-info btn-sm mr-1">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                </td> --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

