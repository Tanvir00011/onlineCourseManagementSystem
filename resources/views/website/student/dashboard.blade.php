@extends('website.master')

@section('title')
    Student Profile
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3" >
                    <div class="card card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="{{ route('my-dashboard') }}">My Dashboard</a></li>
                            {{-- <li class="list-group-item"><a class="text-secondary" href="{{ route('my-profile') }}">My
                                    Profile</a></li> --}}
                            <li class="list-group-item"><a class="text-secondary" href="{{ route('my-course') }}">My Course</a></li>
                            <li class="list-group-item"><a class="text-secondary"
                                    href="{{ route('student-logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 d-flex">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Approved Course</p>
                                                        <h4 class="mb-0">{{$approved_course}}</h4>
                                                    </div>
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title  bg-success">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Pending Course</p>
                                                        <h4 class="mb-0">{{$pending_course}}</h4>
                                                    </div>
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title  bg-warning">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Reject Course</p>
                                                        <h4 class="mb-0">{{$rejected_course}}</h4>
                                                    </div>
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title  bg-danger">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
