@extends('website.master')

@section('title')
    Student Profile
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a class="text-secondary" href="{{ route('my-dashboard') }}">My
                                    Dashboard</a></li>
                            {{-- <li class="list-group-item"><a  href="{{ route('my-profile') }}">My
                                    Profile</a></li> --}}
                            <li class="list-group-item"><a href="">My Course</a></li>
                            <li class="list-group-item"><a class="text-secondary"
                                    href="{{ route('student-logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">My Course</h4>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <h4 class="text-center text-success">{{ session('message') }}</h4>
                                        <thead>
                                            <tr class="text-center">
                                                <th>SL NO</th>
                                                <th>Course Name</th>
                                                <th>Enroll Status</th>
                                                <th>Enroll Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach ($allEnrolledCourse as $item)
                                                <tr
                                                    class="text-center {{ $item->enroll_status == 'approved' ? '' : 'bg-warning text-white' }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->course->title }}</td>
                                                    <td>{{ $item->enroll_status }}</td>
                                                    <td>{{ $item->enroll_date }}</td>
                                                    <td class="text-center"> <a
                                                            href="{{ route('course-detail', ['id' => $item->course_id]) }}"
                                                            class=""> <i class="fa fa-eye"></i>
                                                        </a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div>
    </section>
@endsection
