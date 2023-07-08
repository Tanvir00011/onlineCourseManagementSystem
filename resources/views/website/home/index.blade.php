@extends('website.master')

@section('title')
    System
@endsection

@section('body')
    <section>
        <div class="position-relative">
            <div class="hero-slider-item py-160"
                style="background-image: url({{ asset('/') }}website/images/banner/21421.jpg);"
                data-text="Consultation">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-content float-right">
                                <p class="text-dark mb-150"></p>
                                <p class="text-dark mb-50"></p>
                                <h4 class="text-uppercase mb-1" data-duration-in=".5" data-animation-in="fadeInLeft"
                                    data-delay-in=".1">&nbsp;</h4>
                                <h1 class="font-weight-bold mb-3" data-duration-in=".5" data-animation-in="fadeInLeft"
                                    data-delay-in=".5">
                                    &nbsp;</h1>
                                <p class="text-dark mb-50 font-weight-bold" data-duration-in=".5"
                                    data-animation-in="fadeInLeft" data-delay-in=".9" style="height: 100px;">
                                    {{-- Lorem
                                    ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    <br> incididunt ut labore et dolore magna aliqua. --}}
                                </p>
                                {{-- <a data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in="1.3"
                                    href="about.html" class="btn btn-outline text-uppercase">more details</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- service -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- service-item -->
                <div class="col-sm-3">
                    <div class="mb-4 card px-2 py-5 text-center">
                        <i class="h2 text-primary d-inline-block mb-20 fa-solid fa-cloud-arrow-up"></i>
                        <h4>Free Update</h4>
                        <P>Lorem ipsum dolor amet consecte tur adipisicing elit sed done eius mod tempor enim ad minim</P>
                    </div>
                </div>
                <!-- service-item -->
                <div class="col-sm-3">
                    <div class="mb-4 card px-2 py-5 text-center">
                        <i class="h2 text-primary d-inline-block mb-20 fa-sharp fa-solid fa-hand-holding-heart"></i>
                        <h4>Friendly $ Full Support</h4>
                        <P>Lorem ipsum dolor amet consecte tur adipisicing elit sed done eius mod tempor enim ad minim</P>
                    </div>
                </div>
                <!-- service-item -->
                <div class="col-sm-3">
                    <div class="mb-4 card px-2 py-5 text-center">

                        <i class="h2 text-primary d-inline-block mb-20 fa-solid fa-code"></i>
                        <h4>Clean Code</h4>
                        <P>Lorem ipsum dolor amet consecte tur adipisicing elit sed done eius mod tempor enim ad minim</P>
                    </div>
                </div>
                <!-- service-item -->
                <div class="col-sm-3">
                    <div class="mb-4 card px-2 py-5 text-center">
                        <i class="h2 text-primary d-inline-block mb-20 fa-brands fa-free-code-camp"></i>
                        <h4>Free Resources</h4>
                        <P>Lorem ipsum dolor amet consecte tur adipisicing elit sed done eius mod tempor enim ad minim</P>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /service -->

    <!-- service -->
    <section class="section bg-info">
        <div class="container">
            <div class="row ">
                <div class="col-12 text-center">
                    <h5 class="section-title-sm">UpComing Course</h5>
                    <h2 class="section-title section-title-border">Our UpComing Course</h2>
                </div>
                @foreach ($courses as $course)
                    <!-- service item -->
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card text-center">
                            <div class="card-img-wrapper overlay-rounded-top">
                                <img class="card-img-top rounded-0" src="{{ asset($course->image) }}" alt="service-image"
                                    height="250" style="object-fit: cover">
                            </div>
                            <div class="card-body p-0">
                                <h4 class="card-title pt-3">{{ $course->title }}</h4>
                                <p class="card-text mx-2 mb-0">Starting Date: {{ $course->starting_date }}</p>
                                <a href="{{ route('course-detail', ['id' => $course->id]) }}"
                                    class="btn btn-secondary translateY-25">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- service item -->
                @endforeach
            </div>
        </div>
    </section>

    <!-- testimonial -->
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h5 class="section-title-sm">Students Feedback</h5>
                    <h2 class="section-title section-title-border"> What Student Say </h2>
                </div>
                <div class="col-lg-5 col-md-5 pr-0 align-self-center">
                    <img class="img-fluid w-100" src="{{ asset('/') }}website/images/client.png" alt="clients-image">
                </div>
                <div class="col-lg-7 col-md-7 align-self-center pl-0">
                    <div class="testimonial-slider p-5">
                        <!-- slider item -->
                        <div class="outline-0">
                            <i class="testimonial-icon ti-quote-left"></i>
                            <p class="text-dark">Lorem ipsum dolor sit amet constur adipisicing elit sed eiusmtempor incid
                                sed dolore magna aliqu enim minim veniam quis nostrud exercittion ullamco labo ris nisi
                                aliquip excepteur.</p>
                            <h4 class="font-weight-normal">Julia Robertson</h4>
                            <h6 class="font-secondary text-color">Happy Clients</h6>
                        </div>
                        <!-- slider item -->
                        <div class="outline-0">
                            <i class="testimonial-icon ti-quote-left"></i>
                            <p class="text-dark">Lorem ipsum dolor sit amet constur adipisicing elit sed eiusmtempor incid
                                sed dolore magna aliqu enim minim veniam quis nostrud exercittion ullamco labo ris nisi
                                aliquip excepteur.</p>
                            <h4 class="font-weight-normal">Julia Robertson</h4>
                            <h6 class="font-secondary text-color">Happy Clients</h6>
                        </div>
                        <!-- slider item -->
                        <div class="outline-0">
                            <i class="testimonial-icon ti-quote-left"></i>
                            <p class="text-dark">Lorem ipsum dolor sit amet constur adipisicing elit sed eiusmtempor incid
                                sed dolore magna aliqu enim minim veniam quis nostrud exercittion ullamco labo ris nisi
                                aliquip excepteur.</p>
                            <h4 class="font-weight-normal">Julia Robertson</h4>
                            <h6 class="font-secondary text-color">Happy Clients</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /testimonial -->
@endsection
