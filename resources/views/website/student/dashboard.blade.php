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
                            <li class="list-group-item"><a class="text-secondary" href="{{ route('my-profile') }}">My
                                    Profile</a></li>
                            <li class="list-group-item"><a class="text-secondary" href="">My Course</a></li>
                            <li class="list-group-item"><a class="text-secondary" href="">Change password</a></li>
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
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Published Course</p>
                                                        <h4 class="mb-0">{{"2"}}</h4>
                                                    </div>
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Unpublished Course</p>
                                                        <h4 class="mb-0">{{"1"}}</h4>
                                                    </div>
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
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
