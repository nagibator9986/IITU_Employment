@extends('layouts.jobLayout')

@section('content')


    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('https://lh3.googleusercontent.com/proxy/YOwftYUeYb6YSDXnkiGcnAM4h1xrOgY68lkp_TC2exm6F1Al-O7XauW4-0btddxhprO0VMK4P0ZHNsbIvMIGMrUYsy-VgzwWHR5hi7tsvJUNwrvKZonOIDJ-lvXxgzPIOg');"
             id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">{{$job->name}}</h1>
                </div>
            </div>
        </div>
    </section>
{{--    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"--}}
{{--             id="home-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-7">--}}
{{--                    <h1 class="text-white font-weight-bold"></h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1004px-Google_%22G%22_Logo.svg.png" alt="Free Website Template By Free-Template.co" width="100" height="100 ">
                        </div>
                        <div>
                            <h2>{{$job->name}}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{$job->user->name}}</span>
                                <span class="m-2"><span class="icon-room mr-2"></span>{{$job->city}} </span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">{{$job->schedule}}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6">
                            @if(Auth::user())
                                @if($apps)
                                    <td>{{$apps->status ==0 ? 'Your summary has been sent out' : 'Congratulation you are hired'}}</td>
{{--                                    {!! Form::label ( '') !!}--}}
                                    {!! Form::open(['method'=>'DELETE', 'action'=>['ApplicationController@destroy', $apps->id]]) !!}
                                    {!! Form::submit ('Cancel send', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['method'=>'POST', 'action'=>'ApplicationController@store']) !!}
                                    {!! Form::hidden ('job_id', $job->id,  ['class'=>'form-control']) !!}
                                    {!! Form::hidden ('user_id', Auth::user()->id,  ['class'=>'form-control']) !!}
                                    {!! Form::submit ('Apply Now', ['class'=>'btn btn-block btn-primary btn-md']) !!}
                                    {!! Form::close() !!}
                                @endif
                            @else
                                <a href="{{ url('/login') }}" class="btn btn-block btn-primary btn-md">Apply Now</a>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <figure class="mb-5"><img src="images/sq_img_1.jpg" alt="Free Website Template by Free-Template.co"
                                                  class="img-fluid rounded"></figure>
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Job
                            Description</h3>
                        <p>{{$job->description}}</p>

                    </div>
                    <div class="mb-5">
                        <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-rocket mr-3"></span>Responsibilities</h3>

                        <ul class="list-unstyled m-0 p-0">
                            <li class="d-flex align-items-start mb-2">
                                <span class="icon-check_circle mr-2 text-muted"></span>
                                <span>{{$job->responsibilities}}</span>
                            </li>
                            @foreach($job->specialty as $specialty)
                            <li class="d-flex align-items-start mb-2">
                                <span class="icon-check_circle mr-2 text-muted"></span>
                                <span>{{$specialty->name}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>




                </div>
                <div class="col-lg-4">
                    <div class="bg-light p-3 border rounded mb-4">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                        <ul class="list-unstyled pl-3 mb-0">
                            <li class="mb-2"><strong class="text-black">Published: </strong> {{$job->created_at->diffForHumans()}}</li>
                            <li class="mb-2"><strong class="text-black">Vacancy: </strong>  20</li>
                            <li class="mb-2"><strong class="text-black">Employment Status: </strong> {{$job->schedule}}</li>
                            <li class="mb-2"><strong class="text-black">Job Location: </strong> {{$job->city}}</li>
                            <li class="mb-2"><strong class="text-black">Salary:</strong> ${{$job->salary1}}KZT - {{$job->salary2}}KZT</li>
                        </ul>
                    </div>

                    <div class="bg-light p-3 border rounded">
                        <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Share</h3>
                        <div class="px-3">
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                            <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">


        <div class="container">
            <div class="row mb-5">
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Search Trending</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Web Developers</a></li>
                        <li><a href="#">Python</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">CSS3</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Company</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Support</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Contact Us</h3>
                    <div class="footer-social">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>


            <footer class="site-footer">


        <div class="container">
            <div class="row mb-5">
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Search Trending</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Web Developers</a></li>
                        <li><a href="#">Python</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">CSS3</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Company</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Resources</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Support</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <h3>Contact Us</h3>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/profile.php?id=100025202350452"><span class="icon-facebook"></span></a>
                        <a href="https://www.instagram.com/brutal_mhmm/"><span class="icon-instagram"></span></a>
                        <a class="vk fa fa-vk" href="https://vk.com/id535350832" title="VK.com" target="_blank"><span>vk</span></a>
                        <span class="iconify" data-icon="ei-sc-telegram" data-inline="false"></span>

                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-12">
                </div>
            </div>
        </div>
    </footer>

    </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>

    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>

    <script src="js/custom.js"></script>
    </footer>
@endsection
