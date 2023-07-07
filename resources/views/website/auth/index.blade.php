@extends('website.master')

@section('title')
    Login/Registration page
@endsection

@section('body')
    <section class="page-title overlay"
        style="background-image: url({{ asset('/') }}website/images/background/5172658.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white font-weight-bold">Login / Registration Page</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Home</a>
                        </li>
                        <li>Login / Registration Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="signup  d-flex">
                        <div class="row">
                            <div class="col-md-5 signup-greeting overlay"
                                style="background-image: url({{ asset('/') }}website/images/background/6310507.jpg);">
                                <img src="{{ asset('/') }}website/images/logo4.png" alt="logo">
                                <h4>Welcome!</h4>
                                <p>Please Login To Continue.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="signup-form">
                                    <form action="{{ route('student-login') }}" method="post" class="row">
                                        @csrf
                                        <div class="col-12">
                                            <h4>Login</h4>
                                            <p class="float-sm-right text-danger">{{ session('message') }}</p>
                                        </div>
                                        <div class="col-12">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="col-12">
                                            <input type="password" class="form-control" id="pass" name="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-primary btn-sm">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="signup">
                        <div class="row">
                            <div class="col-md-5 signup-greeting overlay"
                                style="background-image: url({{ asset('/') }}website/images/background/6310507.jpg);">
                                <img src="{{ asset('/') }}website/images/logo4.png" alt="logo">
                                <h4>Welcome!</h4>
                                <p>Please Signup To Continue.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="signup-form">
                                    <form action="{{ route('student-register') }}" method="post" class="row">
                                        @csrf
                                        <div class="col-12">
                                            <h4>Sign Up</h4>
                                            <p class="float-sm-right"></p>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name">
                                        </div>
                                        <div class="col-12">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="col-12">
                                            <input type="password" class="form-control" id="pass" name="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="col-12">
                                            <input type="number" class="form-control" id="re-pass" name="mobile"
                                                placeholder="Mobile Number">
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary btn-sm">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
