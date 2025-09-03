<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dahana</title>
    <link rel="icon" href="images/icon.webp" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Wastewise — Waste Management and Recycling Website Template" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="{{ asset('css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css" >
    <!-- Icon fonts via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icofont@1.0.1/icofont.min.css">

</head>

<body>
    <div id="wrapper">
        <a href="#" id="back-to-top"></a>

        <!-- preloader begin -->
        <div id="de-loader"></div>
        <!-- preloader end -->

        <!-- header begin -->
        @include('frontend.partials.header', ['headerClass' => 'header-light'])
        <header class="header-light" style="display:none">
            <div id="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between xs-hide">
                                <div class="d-flex">
                                    <div class="topbar-widget me-3"><a href="#"><i class="fas fa-clock"></i>Monday - Friday 08.00 - 18.00</a></div>
                                    <div class="topbar-widget me-3"><a href="#"><i class="fas fa-map-marker-alt"></i>100 S Main St, New York, NY</a></div>
                                    <div class="topbar-widget me-3"><a href="#"><i class="fas fa-phone"></i>+1 123 456 789</a></div>
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
                                    <a href="{{ route('frontend.index') }}">
                                        <img class="logo-main" src="images/logo-black.webp" alt="" >
                                        <img class="logo-mobile" src="images/logo-black.webp" alt="" >
                                    </a>
                                </div>
                                <!-- logo end -->
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainemenu begin -->
                                <ul id="mainmenu">
                                    <li><a class="menu-item" href="{{ route('frontend.index') }}">Home</a>
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
                                    <li><a class="menu-item" href="{{ route('frontend.projects') }}">Projects</a></li>
                                    <li><a class="menu-item" href="#">Company</a>
                                        <ul>
                                            <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                                            <li><a href="{{ route('frontend.team') }}">Our Team</a></li>
                                            <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                                        </ul>
                                    </li>
                            <li><a class="menu-item" href="{{ route('frontend.kajian') }}">Kajian</a></li>
                                    <li><a class="menu-item" href="{{ route('frontend.contact') }}">Contact</a></li>
                                </ul>
                                <!-- mainmenu end -->
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    <a href="booking.html" class="btn-main">Schedule Pickup</a>
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

            <section class="bg-color section-dark text-light no-top no-bottom overflow-hidden">
                <div class="container-fluid position-relative half-fluid">
                  <div class="container">
                    <div class="row">
                      <!-- Image -->
                      <div class="col-lg-6 position-lg-absolute right-half h-100">
                        <div class="de-gradient-edge-top dark"></div>
                        <div class="image jarallax">
                            <img src="images/banner2.webp" class="jarallax-img" alt="">
                        </div>
                      </div>
                      <!-- Text -->
                      <div class="col-lg-6 relative">
                            <div class="me-lg-4">
                                <div class="spacer-double"></div>
                                <div class="spacer-double sm-hide"></div>
                                <div class="spacer-single sm-hide"></div>
                                <div class="spacer-single sm-hide"></div>
                                <div class="spacer-single sm-hide"></div>
                                <ul class="crumb">
                                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                                    <li class="active">About Us</li>
                                </ul>
                                <h1 class="mb-2 wow fadeInUp" data-wow-delay=".2s">About Us</h1>
                                <p class="col-lg-10 lead mb-0 wow fadeInUp" data-wow-delay=".3s">Smart Waste Disposal for a Cleaner Future</p>
                                <div class="spacer-double"></div>
                                <div class="spacer-single sm-hide"></div>

                                <img src="images/misc/recycle-crop-2.webp" class="w-30 abs end-0 bottom-0 z-3" alt="">
                            </div>

                      </div>
                    </div>
                  </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="row gy-4 gx-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="relative">
                                <div class="bg-body w-90 overflow-hidden wow zoomIn">
                                    <img src="images/misc/3.webp" class="w-100 wow scaleIn" alt="">
                                </div>
                                <div class="bg-body w-50 abs mb-min-50 end-0 bottom-0 z-2 overflow-hidden wow zoomIn" data-wow-delay=".2s">
                                    <img src="images/misc/2.webp" class="w-100 wow scaleIn" data-wow-delay=".2s" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="subtitle wow fadeInUp mb-3">About Company</div>
                            <h2 class="wow fadeInUp">Waste Solutions For Brighter Tomorrow</h2>
                            <p class="wow fadeInUp">We specialize in innovative waste management solutions for residential, commercial, and industrial clients. From collection to recycling, we ensure responsible disposal that protects the environment while keeping communities clean and sustainable.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-dark text-light">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <h2>Our Vision</h2>
                        </div>
                        <div class="col-lg-8">
                            <h3>To be a leading waste management service provider committed to protecting the environment and enhancing the quality of life for future generations. We strive to create a cleaner, healthier, and more sustainable world by implementing innovative waste management solutions that minimize environmental impact.</h3>
                        </div>
                    </div>
                </div>
            </section>

            <section class="relative overflow-hidden">
                <img src="images/misc/recycle-crop.webp" class="w-20 abs end-0 bottom-0 z-3" alt="">
                <div class="container relative z-2">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2>Our Mission</h2>
                        </div>
                        <div class="col-lg-8">
                            <ul class="ul-check fw-600">
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

            <section class="bg-color-op-1">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <h2 class="mb-4">Why Choose Us?</h2>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".0s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-color text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Eco-Friendly Focus</h4>
                                    <p class="mb-0">Qui culpa qui consequat officia cillum quis irure aliquip ut dolore sit eu culpa ut irure nisi occaecat dolore adipisicing do pariatur.</p>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-color text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Flexible Scheduling</h4>
                                    <p class="mb-0">Qui culpa qui consequat officia cillum quis irure aliquip ut dolore sit eu culpa ut irure nisi occaecat dolore adipisicing do pariatur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-color text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Transparent Pricing</h4>
                                    <p class="mb-0">Qui culpa qui consequat officia cillum quis irure aliquip ut dolore sit eu culpa ut irure nisi occaecat dolore adipisicing do pariatur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-dark text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Innovative Technology</h4>
                                    <p class="mb-0">Qui culpa qui consequat officia cillum quis irure aliquip ut dolore sit eu culpa ut irure nisi occaecat dolore adipisicing do pariatur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-dark text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>One Stop Solution</h4>
                                    <p class="mb-0">Qui culpa qui consequat officia cillum quis irure aliquip ut dolore sit eu culpa ut irure nisi occaecat dolore adipisicing do pariatur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-dark text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Satisfaction Guarantee</h4>
                                    <p class="mb-0">Qui culpa qui consequat officia cillum quis irure aliquip ut dolore sit eu culpa ut irure nisi occaecat dolore adipisicing do pariatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- content end -->

        <!-- footer begin -->
        @include('frontend.partials.footer')
        <footer class="section-dark" style="display:none">
            <div class="container relative z-2">
                <div class="row gx-5 relative z-2">
                    <div class="col-lg-4 col-sm-6">
                        <img src="images/logo-white.webp" class="w-200px" alt="">
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
                            <h2 class="text-fit p-0 lh-1 op-2">wastewise</h2>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- footer end -->
    </div>




    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>
    <script src="js/custom-marquee.js"></script>

</body>

</html>
