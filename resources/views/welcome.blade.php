<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wastewise — Waste Management and Recycling Website Template</title>
    <link rel="icon" href="{{ asset('images/icon.webp') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Wastewise — Waste Management and Recycling Website Template" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('css/plugins.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" >
    <!-- Icon fonts: prefer local, fallback to CDN if missing -->
    @php
        $faLocal = file_exists(public_path('css/fontawesome.min.css')) &&
                   file_exists(public_path('css/brands.min.css')) &&
                   file_exists(public_path('css/solid.min.css'));
        $icoLocal = file_exists(public_path('css/icofont.min.css'));
    @endphp
    @if($faLocal)
        <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/brands.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/solid.min.css') }}" rel="stylesheet" type="text/css">
    @else
        <!-- Fallback to CDN without SRI to avoid integrity mismatch -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css">
    @endif
    @if($icoLocal)
        <link href="{{ asset('css/icofont.min.css') }}" rel="stylesheet" type="text/css">
    @else
        <!-- Working Icofont CDN fallback -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icofont@1.0.1/icofont.min.css">
    @endif
    <!-- color scheme -->
    <link id="colors" href="{{ asset('css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css" >

</head>

<body>
    <div id="wrapper">
        <a href="#" id="back-to-top"></a>

        <!-- preloader begin -->
        <div id="de-loader"></div>
        <!-- preloader end -->

        <!-- header begin -->
        <header class="transparent">
            <div id="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between xs-hide">
                                <div class="d-flex">
                                    <div class="topbar-widget me-3"><a href="#"><i class="icofont-clock-time"></i>Monday - Friday 08.00 - 18.00</a></div>
                                    <div class="topbar-widget me-3"><a href="#"><i class="icofont-envelope"></i>contact@wastewise.com</a></div>
                                    <div class="topbar-widget me-3"><a href="#"><i class="icofont-phone"></i>+1 123 456 789</a></div>
                                </div>

                                <div class="d-flex">
                                    <div class="social-icons">
                                        <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter fa-lg"></i></a>
                                        <a href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
                                        <a href="#"><i class="fa-brands fa-pinterest fa-lg"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="index.html">
                                        <img class="logo-main" src="{{ asset('images/logo-white.webp') }}" alt="" >
                                        <img class="logo-mobile" src="{{ asset('images/logo-white.webp') }}" alt="" >
                                    </a>
                                </div>
                                <!-- logo end -->
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainemenu begin -->
                                <ul id="mainmenu">
                                    <li><a class="menu-item" href="index.html">Home</a>
                                        <ul>
                                            <li><a href="index.html">Homepage 1</a></li>
                                            <li><a href="homepage-2.html">Homepage 2</a></li>
                                            <li><a href="homepage-3.html">Homepage 3</a></li>
                                            <li><a href="homepage-4.html">Homepage 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="menu-item" href="services.html">Services</a>
                                        <ul>
                                            <li><a href="services.html">All Services Style 1</a></li>
                                            <li><a href="services-2.html">All Services Style 2</a></li>
                                            <li><a href="service-single.html">Service Single</a></li>
                                            <li><a href="pricing-table.html">Pricing Table</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                        </ul>
                                    </li>
                                    {{-- <li><a class="menu-item" href="projects.html">Projects</a></li> --}}
                                    <li><a class="menu-item" href="#">Company</a>
                                        <ul>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="gallery.html">Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="menu-item" href="blog.html">Kajian</a></li>
                                    <li><a class="menu-item" href="contact.html">Contact</a></li>
                                </ul>
                                <!-- mainmenu end -->
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    <a href="{{ url('/login') }}" class="btn-main">Login</a>
                                    <span id="menu-btn"></span>
                                </div>

                                <div id="btn-extra">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
        <!-- content begin -->
        <div class="no-bottom no-top" id="content">

            <div id="top"></div>

            <section id="section-intro" class="text-light no-top no-bottom relative overflow-hidden z-1000">

                <div class="v-center relative">
                    <div class="abs bottom-10 z-1000 w-100">
                        <div class="container">
                            <div class="row g-4 align-items-center justify-content-between">

                                <div class="col-lg-5">
                                    <h1>Efficient Waste Management For a Greener World</h1>
                                </div>

                                <div class="col-lg-4">
                                    <p class="lead">Delivering smart waste solutions for homes, businesses & industries to keeping communities clean and protecting the environment every day.</p>
                                    <a class="btn-main btn-line" href="projects.html">View Projects</a>
                                </div>
                            </div>

                            </div>
                        </div>

                    <div class="swiper wow scaleIn">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url({{ asset('images/slider/3.jpg') }})">
                                <div class="sw-overlay op-1"></div>
                            </div>
                        </div>
                        <!-- Slides -->

                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url({{ asset('images/slider/4.jpg') }})">
                                <div class="sw-overlay op-1"></div>
                            </div>
                        </div>
                        <!-- Slides -->

                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url({{ asset('images/slider/5.jpg') }})">
                                <div class="sw-overlay op-1"></div>
                            </div>
                        </div>
                        <!-- Slides -->

                      </div>

                    </div>
                </div>

            </section>

            <section aria-label="section" class="pt-4 pb-4 bg-color">
                <div class="wow fadeInRight d-flex">
                  <div class="de-marquee-list relative wow">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Waste Collection</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Commercial Recycling</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Dumpster Rental</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Waste Management</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Organic Waste</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Waste Consulting</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                  </div>
                </div>
            </section>

            <section class="bg-dark p-0">
                <div class="container-fluid">
                    <div class="row g-0">
                        <!-- service item begin -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".0s">
                                <img src="{{ asset('images/services/1.webp') }}" class="hover-scale-1-1 w-100 wow scaleIn" alt="">
                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="mb-3">Delivering smart waste solutions for homes, businesses & industries to keeping communities clean and protecting the environment every day.</div>
                                    <a class="btn-line" href="service-single.html">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs abs-centered z-2 mt-3 w-100 text-center hover-op-0">
                                    <h4 class="mb-3">Waste Collection</h4>
                                </div>
                                <div class="gradient-trans-dark-bottom abs w-100 h-80 bottom-0"></div>
                            </div>
                        </div>
                        <!-- service item end -->

                        <!-- service item begin -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".3s">
                                <img src="{{ asset('images/services/2.webp') }}" class="hover-scale-1-1 w-100 wow scaleIn" alt="">
                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="mb-3">Delivering smart waste solutions for homes, businesses & industries to keeping communities clean and protecting the environment every day.</div>
                                    <a class="btn-line" href="service-single.html">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs abs-centered z-2 mt-3 w-100 text-center hover-op-0">
                                    <h4 class="mb-3">Commercial Recycling</h4>
                                </div>
                                <div class="gradient-trans-dark-bottom abs w-100 h-80 bottom-0"></div>
                            </div>
                        </div>
                        <!-- service item end -->

                        <!-- service item begin -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".6s">
                                <img src="{{ asset('images/services/3.webp') }}" class="hover-scale-1-1 w-100 wow scaleIn" alt="">
                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="mb-3">Delivering smart waste solutions for homes, businesses & industries to keeping communities clean and protecting the environment every day.</div>
                                    <a class="btn-line" href="service-single.html">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs abs-centered z-2 mt-3 w-100 text-center hover-op-0">
                                    <h4 class="mb-3">Dumpster Rental</h4>
                                </div>
                                <div class="gradient-trans-dark-bottom abs w-100 h-80 bottom-0"></div>
                            </div>
                        </div>
                        <!-- service item end -->

                        <!-- service item begin -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".9s">
                                <img src="{{ asset('images/services/4.webp') }}" class="hover-scale-1-1 w-100 wow scaleIn" alt="">
                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="mb-3">Delivering smart waste solutions for homes, businesses & industries to keeping communities clean and protecting the environment every day.</div>
                                    <a class="btn-line" href="service-single.html">View Details</a>
                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs abs-centered z-2 mt-3 w-100 text-center hover-op-0">
                                    <h4 class="mb-3">Organic Waste</h4>
                                </div>
                                <div class="gradient-trans-dark-bottom abs w-100 h-80 bottom-0"></div>
                            </div>
                        </div>
                        <!-- service item end -->

                    </div>
                </div>
            </section>


            <section>
                <div class="container">
                    <div class="row g-4 align-items-end justify-content-between">
                        <div class="col-lg-5">
                            <div class="subtitle">How It Works</div>
                            <h2>A Simple Process For All Your Waste Management Needs</h2>
                        </div>

                        <div class="col-lg-4">
                            <p class="lead">Delivering smart waste solutions for homes, businesses & industries to keeping communities clean and protecting the environment every day.</p>
                        </div>
                    </div>

                    <div class="spacer-single"></div>

                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6">
                            <div class="wow zoomIn overflow-hidden">
                                <img src="{{ asset('images/misc/2.webp') }}" class="w-100 wow scaleIn" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="px-4 py-2">
                                        <img src="{{ asset('images/icons/phones.png') }}" class="w-70px mb-4 wow scaleIn" alt="">
                                        <h4>Request & Pickup</h4>
                                        <p>Waste pickups are scheduled and collected from homes, businesses, or job sites.</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="px-4 py-2">
                                        <img src="{{ asset('images/icons/lorry.png') }}" class="w-70px mb-4 wow scaleIn" alt="">
                                        <h4>Transportation</h4>
                                        <p>Waste is safely transported in specialized vehicles to treatment or disposal facilities.</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="px-4 py-2">
                                        <img src="{{ asset('images/icons/recycle-bin.png') }}" class="w-70px mb-4 wow scaleIn" alt="">
                                        <h4>Sorting & Processing</h4>
                                        <p>Waste is sorted into types and processed for recycling, composting, or disposal.</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="px-4 py-2">
                                        <img src="{{ asset('images/icons/recycle.png') }}" class="w-70px mb-4 wow scaleIn" alt="">
                                        <h4>Disposal or Recycling</h4>
                                        <p>Recyclables are reused, organics composted, and the rest safely disposed of or incinerated.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


            <section class="pt-100 bg-dark text-light">
                <div class="container">
                    <div class="row g-4 mb-sm-30">
                        <div class="col-md-3 col-6">
                            <div class="de_count text-center pl-50 fs-15 wow fadeInRight" data-wow-delay=".0s">
                                <h2 class="fs-48 mb-2"><span class="timer fs-40" data-to="28950" data-speed="3000">0</span><span class="id-color">+</span></h2>
                                Happy Customers
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="de_count text-center pl-50 fs-15 wow fadeInRight" data-wow-delay=".2s">
                                <h2 class="fs-48 mb-2"><span class="timer fs-40" data-to="240" data-speed="3000">0</span><span class="id-color">+</span></h2>
                                Pickup Points
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="de_count text-center pl-50 fs-15 wow fadeInRight" data-wow-delay=".4s">
                                <h2 class="fs-48 mb-2"><span class="timer fs-40" data-to="158" data-speed="3000">0</span><span class="id-color">+</span></h2>
                                Skilled Workers
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="de_count text-center pl-50 fs-15 wow fadeInRight" data-wow-delay=".6s">
                                <h2 class="fs-48 mb-2"><span class="timer fs-40" data-to="20" data-speed="3000">0</span><span class="id-color">+</span></h2>
                                Countries
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spacer-double"></div>

            </section>


            <section class="p-0">
                <div class="container relative z-1000 mt-min-100">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bg-color-2 jarallax text-light p-lg-5 p-4 relative overflow-hidden">
                                <div class="sw-overlay op-3"></div>
                                <img src="{{ asset('images/background/1.webp') }}" class="jarallax-img" alt="">
                                <div class="row g-4 align-items-center justify-content-between">
                                    <div class="col-md-6 col-sm-6 relative">
                                        <div class="relative z-index-1000">
                                            <h2 class="wow fadeInUp" data-wow-delay=".3s">Contact us today to schedule your waste service and keep your space clean</h2>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <div class="bg-color px-4 py-5 d-block text-center wow zoomIn" data-wow-delay=".6s">
                                            <img src="{{ asset('images/icons/call.webp') }}" class="w-40 mb-3" alt="">
                                            <p class="lead mb-0">24 Hours</p>
                                            <h4 class="mb-0">+1 123 456 789</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-6 offset-lg-3 text-center">
                            <div class="subtitle mb-3">Testimonials</div>
                            <h2 class="mb-4">Our Happy Customers</h2>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel owl-theme wow fadeInUp" id="testimonial-carousel">
                            <div class="item">
                                <div class="de_testi bg-white py-2 px-4">
                                    <blockquote>
                                        <div class="de_testi_by">
                                            <img class="circle" alt="" src="{{ asset('images/testimonial/1.webp') }}"> <div>Michael S.<span>Customer</span></div>
                                        </div>

                                        <div class="abs top-0 end-0 p-4">
                                            <i class="fa fa-quote-right id-color fs-28"></i>
                                        </div>

                                        <p>"Working with this company has been a game changer for our business. Their waste collection is always reliable, and they took the time to understand our unique needs."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="de_testi bg-white py-2 px-4">
                                    <blockquote>
                                        <div class="de_testi_by">
                                            <img class="circle" alt="" src="{{ asset('images/testimonial/2.webp') }}"> <div>Robert L.<span>Customer</span></div>
                                        </div>

                                        <div class="abs top-0 end-0 p-4">
                                            <i class="fa fa-quote-right id-color fs-28"></i>
                                        </div>

                                        <p>"Working with this company has been a game changer for our business. Their waste collection is always reliable, and they took the time to understand our unique needs."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="de_testi bg-white py-2 px-4">
                                    <blockquote>
                                        <div class="de_testi_by">
                                            <img class="circle" alt="" src="{{ asset('images/testimonial/3.webp') }}"> <div>Jake M.<span>Customer</span></div>
                                        </div>

                                        <div class="abs top-0 end-0 p-4">
                                            <i class="fa fa-quote-right id-color fs-28"></i>
                                        </div>

                                        <p>"Working with this company has been a game changer for our business. Their waste collection is always reliable, and they took the time to understand our unique needs."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="de_testi bg-white py-2 px-4">
                                    <blockquote>
                                        <div class="de_testi_by">
                                            <img class="circle" alt="" src="{{ asset('images/testimonial/4.webp') }}"> <div>Alex P.<span>Customer</span></div>
                                        </div>

                                        <div class="abs top-0 end-0 p-4">
                                            <i class="fa fa-quote-right id-color fs-28"></i>
                                        </div>

                                        <p>"Working with this company has been a game changer for our business. Their waste collection is always reliable, and they took the time to understand our unique needs."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="de_testi bg-white py-2 px-4">
                                    <blockquote>
                                        <div class="de_testi_by">
                                            <img class="circle" alt="" src="{{ asset('images/testimonial/5.webp') }}"> <div>Carlos R.<span>Customer</span></div>
                                        </div>

                                        <div class="abs top-0 end-0 p-4">
                                            <i class="fa fa-quote-right id-color fs-28"></i>
                                        </div>

                                        <p>"Working with this company has been a game changer for our business. Their waste collection is always reliable, and they took the time to understand our unique needs."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="de_testi bg-white py-2 px-4">
                                    <blockquote>
                                        <div class="de_testi_by">
                                            <img class="circle" alt="" src="{{ asset('images/testimonial/6.webp') }}"> <div>Edward B.<span>Customer</span></div>
                                        </div>

                                        <div class="abs top-0 end-0 p-4">
                                            <i class="fa fa-quote-right id-color fs-28"></i>
                                        </div>

                                        <p>"Working with this company has been a game changer for our business. Their waste collection is always reliable, and they took the time to understand our unique needs."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="de_testi bg-white py-2 px-4">
                                    <blockquote>
                                        <div class="de_testi_by">
                                            <img class="circle" alt="" src="{{ asset('images/testimonial/7.webp') }}"> <div>Daniel H.<span>Customer</span></div>
                                        </div>

                                        <div class="abs top-0 end-0 p-4">
                                            <i class="fa fa-quote-right id-color fs-28"></i>
                                        </div>

                                        <p>"Working with this company has been a game changer for our business. Their waste collection is always reliable, and they took the time to understand our unique needs."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="item">
                                <div class="de_testi bg-white py-2 px-4">
                                    <blockquote>
                                        <div class="de_testi_by">
                                            <img class="circle" alt="" src="{{ asset('images/testimonial/8.webp') }}"> <div>Bryan G.<span>Customer</span></div>
                                        </div>

                                        <div class="abs top-0 end-0 p-4">
                                            <i class="fa fa-quote-right id-color fs-28"></i>
                                        </div>

                                        <p>"Working with this company has been a game changer for our business. Their waste collection is always reliable, and they took the time to understand our unique needs."
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>f
                </div>
            </section>

            <section id="section-contact" class="relative overflow-hidden z-1000 jarallax" data-video-src="mp4:{{ asset('video/1.mp4') }}">
                <div class="sw-overlay op-4"></div>
                <div class="h-30 de-gradient-edge-top op-5 dark z-2"></div>
                <div class="container relative z-2">
                    <div class="row g-4 justify-content-between">

                        <div class="col-lg-5 text-light ">
                            <div class="relative h-100">
                                <div class="subtitle">Turning Waste Into New Possibilities</div>
                                <h2>Efficient Waste Disposal Starts With Your Call</h2>

                                <div class="abs p-sm-relative bottom-0">
                                    <p class="col-lg-10 mb-4">Delivering smart waste solutions for homes, businesses & industries to keeping communities clean and protecting the environment every day.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="bg-white">
                                <div id="success_message_col" class='success p-40 h-100'>
                                    <h3>Thank You For Your Order</h3>
                                    <p>We have received your request and will be processing it shortly. Click button below if you want to make another order.</p>
                                    <a class="btn-main" href="booking.html">Re-order</a>
                                </div>

                                <form name="bookingForm" id="booking_form" class="form-underline position-relative z1000 bg-white p-40" method="post" action="booking.php">

                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <h4 class="mb-3"><i class="fa fa-envelope-o id-color me-2"></i> Get An Appointment</h4>
                                            <div class="relative">
                                                <select name="service" id="service" class="form-control">
                                                    <option disabled selected value>Select Service</option>
                                                    <option value="Residential Cleaning">Residential Cleaning</option>
                                                    <option value="Commercial Cleaning">Commercial Cleaning</option>
                                                    <option value="Deep Cleaning">Deep Cleaning</option>
                                                    <option value="Move-In/Move-Out Cleaning">Move-In/Move-Out Cleaning</option>
                                                    <option value="Post-Construction Cleaning">Post-Construction Cleaning</option>
                                                    <option value="Carpet and Upholstery Cleaning">Carpet and Upholstery Cleaning</option>
                                                </select>
                                                <i class="absolute top-0 end-0 id-color pt-3 pe-3 icofont-simple-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div id="date" class="relative input-group date" data-date-format="mm-dd-yyyy">
                                                <i class="absolute top-0 end-0 id-color pt-3 pe-3 icofont-calendar"></i>
                                                <input class="form-control" value="Select Date" name="date" type="text" >
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="relative">
                                                <select name="time" id="time" class="form-control">
                                                    <option disabled selected value>Select Time</option>
                                                    <option value="10:00">10:00</option>
                                                    <option value="11:00">11:00</option>
                                                    <option value="12:00">12:00</option>
                                                    <option value="13:00">13:00</option>
                                                    <option value="14:00">14:00</option>
                                                    <option value="15:00">15:00</option>
                                                    <option value="16:00">16:00</option>
                                                    <option value="17:00">17:00</option>
                                                    <option value="18:00">18:00</option>
                                                    <option value="19:00">19:00</option>
                                                    <option value="20:00">20:00</option>
                                                </select>
                                                <i class="absolute top-0 end-0 id-color pt-3 pe-3 icofont-simple-down"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" required>
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" required>
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" required>
                                        </div>

                                        <div class="col-lg-12">
                                            <textarea name="message" id="message" class="form-control" placeholder="Message"></textarea>
                                        </div>

                                        <div class="col-lg-12">
                                            <div id='submit'>
                                                <input type='submit' id='send_message' value='Send Appointment' class="btn-main">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="error_message" class='error'>
                                        Sorry there was an error sending your form.
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="relative overflow-hidden">
                <img src="{{ asset('images/misc/recycle-crop.webp') }}" class="w-20 abs end-0 bottom-0 z-3" alt="">
                <div class="container relative z-2">
                    <div class="row g-4 align-items-end">
                        <div class="col-lg-4">
                            <div class="subtitle">Our Mission</div>
                            <h2>Responsible Waste Disposal for a Healthier Tomorrow</h2>
                        </div>
                        <div class="col-lg-8">
                            <ul class="ul-check">
                                <li>Deliver efficient, eco-friendly waste collection, recycling, and disposal services.</li>
                                <li>Promote sustainability through waste reduction, reuse, and recycling initiatives.</li>
                                <li>Ensure compliance with environmental regulations and best industry practices.</li>
                                <li>Educate communities on responsible waste management and environmental stewardship.</li>
                                <li>Utilize advanced technology to enhance waste management efficiency and sustainability.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section aria-label="section" class="pt-4 pb-4 bg-color">
                <div class="wow fadeInRight d-flex">
                  <div class="de-marquee-list relative wow">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Waste Collection</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Commercial Recycling</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Dumpster Rental</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Waste Management</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Organic Waste</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Waste Consulting</span>
                    <img src="images/logo-icon-line.webp" class="abs abs-middle w-40px" alt="">
                  </div>
                </div>
            </section>

        </div>
        <!-- content end -->

        <!-- footer begin -->
        <footer class="section-dark">
            <div class="container relative z-2">
                <div class="row gx-5 relative z-2">
                    <div class="col-lg-4 col-sm-6">
                        <img src="{{ asset('images/logo-white.webp') }}" class="w-200px" alt="">
                        <div class="spacer-20"></div>
                        <p>We are committed to providing dependable, eco-friendly waste management solutions tailored to the unique needs of homes, businesses, and industries. By combining advanced technology with sustainable practices, we work to reduce environmental impact, increase efficiency, and support a cleaner, greener future for our communities and the planet.</p>
                    </div>
                    <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="widget">
                                    <h5>Company</h5>
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="services.html">Our Services</a></li>
                                        <li><a href="projects.html">Projects</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="widget">
                                    <h5>Our Services</h5>
                                    <ul>
                                        <li><a href="service-single.html">Waste Collection</a></li>
                                        <li><a href="service-single.html">Commercial Recycling</a></li>
                                        <li><a href="service-single.html">Dumpster Rental</a></li>
                                        <li><a href="service-single.html">Organic Waste</a></li>
                                        <li><a href="service-single.html">E-waste Disposal</a></li>
                                        <li><a href="service-single.html">Medical Waste</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 order-lg-2 order-sm-1">
                        <div class="widget">
                            <h5>Subscribe to Newsletter</h5>
                            <form action="#" class="row form-dark" id="form_subscribe" method="post" name="form_subscribe">
                                <div class="col text-center">
                                    <input class="form-control" id="txt_subscribe" name="txt_subscribe" placeholder="enter your email" type="text" > <a href="#" id="btn-subscribe"><i class="arrow_right bg-color-secondary"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                            <div class="spacer-10"></div>
                            <small>Your email is safe with us. We don't spam.</small>
                            <div class="spacer-30"></div>

                            <div class="widget">
                                <h5>Follow Us</h5>
                                <div class="social-icons mb-sm-30">
                                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 order-3">
                        <div class="spacer-single"></div>
                        <div class="spacer-double"></div>
                        <div class="spacer-double"></div>
                        <div class="spacer-double"></div>
                        <div class="abs bottom-0">
                            <h2 class="text-fit p-0 lh-1 op-2">dahanawastesolution</h2>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- footer end -->
    </div>

    <!-- overlay content begin -->
    <div id="extra-wrap" class="text-light">
        <div id="btn-close">
            <span></span>
            <span></span>
        </div>

        <div id="extra-content">
            <img src="{{ asset('images/logo-white.webp') }}" class="w-150px" alt="">

            <div class="spacer-30-line"></div>

            <h5>Our Services</h5>
            <ul class="no-style">
                <li><a href="service-single.html">Waste Collection</a></li>
                <li><a href="service-single.html">Commercial Recycling</a></li>
                <li><a href="service-single.html">Dumpster Rental</a></li>
                <li><a href="service-single.html">Organic Waste</a></li>
                <li><a href="service-single.html">E-waste Disposal</a></li>
                <li><a href="service-single.html">Medical Waste</a></li>
            </ul>

            <div class="spacer-30-line"></div>

            <h5>Contact Us</h5>
            <div><i class="icofont-clock-time me-2 op-5"></i>Monday - Friday 08.00 - 18.00</div>
            <div><i class="icofont-location-pin me-2 op-5"></i>100 S Main St, New York, </div>
            <div><i class="icofont-envelope me-2 op-5"></i>contact@wastewise.com</div>

            <div class="spacer-30-line"></div>

            <h5>About Us</h5>
            <p>We provide reliable, eco-conscious waste management solutions for homes, businesses, and industries. With a focus on sustainability and innovation, we help communities reduce waste, recycle more, and create a cleaner, greener future.</p>

            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/custom-swiper-1.js') }}"></script>
    <script src="{{ asset('js/custom-marquee.js') }}"></script>

</body>

</html>
