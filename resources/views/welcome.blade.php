@extends('layouts.app')

@section('content')
    <section class="home-section section-hero overlay bg-image" style="background-image: url('images/Employees-together.jpg');" id="home-section">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">
                        <h1 class="text-white font-weight-bold">IITU-Students employment</h1>
                        <p>Find your dream jobs in our powerful career.</p>
                    </div>
                    <form href="{{ url('/search') }}" method="get" class="search-jobs-form">
                        <div class="row mb-5">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Job title, keywords...">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <select name="city" class="form-control">
                                    <option>Anywhere</option>
                                    <option>San Francisco</option>
                                    <option>Palo Alto</option>
                                    <option>New York</option>
                                    <option>Manhattan</option>
                                    <option>Ontario</option>
                                    <option>Toronto</option>
                                    <option>Kansas</option>
                                    <option>Mountain View</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <select name="schedule" class="form-control">
                                    <option>Part Time</option>
                                    <option>Full Time</option>
                                    <option>Freelancer</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>

    <section class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{count ( $jobs )}} Job Listed</h2>
                </div>
            </div>

            <div class="mb-5">
                @if($jobs)
                    @foreach($jobs as $job)
                        <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
                        <div class="col-md-2">
                            <a href="{{ url('/details/' .$job->id) }}"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Dropbox_Icon.svg/1101px-Dropbox_Icon.svg.png" alt="Image" class="img-fluid" width="100" height="100"></a>
                        </div>
                        <div class="col-md-4">
                            <span class="badge badge-primary px-2 py-1 mb-3">{{$job->schedule}}</span>
                            <h2><a href="job-single.html">{{$job->name}}</a> </h2>
                            <p class="meta">Publisher: <strong>{{$job->user->name}}</strong>
                                looking for:
                                <strong>@foreach($job->specialty as $specialty)
                                            {{$specialty->name}}
                                        @endforeach
                                </strong>
                            </p>
                        </div>
                        <div class="col-md-3 text-left">
                            <h3>{{$job->city}}</h3>
                            <span class="meta">{{$job->country}}</span>
                        </div>
                            <div class="col-md-3 text-md-right">
                                <strong class="text-black">{{$job->salary1}} &mdash;{{$job->salary2}} KZT</strong>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>


            <div class="row pagination-wrap">

                <div class="col-md-6 text-center text-md-left">
                    <div class="custom-pagination ml-auto">
                        <a href="#" class="prev">Previous</a>
                        <div class="d-inline-block">
                            <a href="#" class="active">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                        </div>
                        <a href="#" class="next">Next</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="site-section py-4 mb-5 border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center mt-4 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <h2 class="section-title mb-2">Our Candidates Work In Company</h2>
                            <p class="lead">Porro error reiciendis commodi beatae omnis similique voluptate rerum ipsam fugit mollitia ipsum facilis expedita tempora suscipit iste</p>
                        </div>
                    </div>


                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="images/logo_mailchimp.svg" alt="Image" class="img-fluid logo-1">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="images/logo_paypal.svg" alt="Image" class="img-fluid logo-2">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="images/logo_stripe.svg" alt="Image" class="img-fluid logo-3">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="images/logo_visa.svg" alt="Image" class="img-fluid logo-4">
                </div>
            </div>
        </div>
    </section>















    <section class="bg-light pt-5 testimony-full">

        <div class="owl-carousel single-carousel">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <img class="img-fluid mx-auto" src="https://buki.kz/data/files/users/15402287428317.jpg" alt="Image">
                        <blockquote>
                            <p>&ldquo;Muchas gracias amigo , Этот сайт помог найти мне работу моей мечты , где я каждый день тружусь на благо поисковой сети google , спасибо IITU CAREERS &rdquo;</p>
                            <p><cite> &mdash;Orazaly Karl , google web-developer</cite></p>
                        </blockquote>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <img class="img-fluid mx-auto" src="https://sun9-72.userapi.com/c854220/v854220162/139e07/6iXuX16bHJI.jpg" alt="Image">
                        <blockquote>
                            <p>&ldquo;Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae.&rdquo;</p>
                            <p><cite> &mdash; Fazylzhan Zheten</cite></p>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">Looking For A Job?</h2>
                    <p class="mb-0 text-white lead">We are working to find your future job</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="#" class="btn btn-warning btn-block btn-lg">Sign Up</a>
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

@endsection
