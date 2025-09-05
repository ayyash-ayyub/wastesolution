<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.partials.head', [
    'title' => 'Gallery — Dahana',
    'metaDescription' => 'Galeri Dahana Waste Management System',
    'metaAuthor' => 'Dahana'
])
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
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">Gallery</li>
                                </ul>
                                <h1 class="mb-2 wow fadeInUp" data-wow-delay=".2s">Gallery</h1>
                                <p class="col-lg-10 lead mb-0 wow fadeInUp" data-wow-delay=".3s">solusi waste management sistem</p>
                                <div class="spacer-double"></div>
                                <div class="spacer-single sm-hide"></div>

                                <img src="images/misc/recycle-crop-2.webp" class="w-30 abs end-0 bottom-0 z-3" alt="">
                            </div>

                      </div>
                    </div>
                  </div>
                </div>
            </section>


            <section class="relative">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-4 text-center">
                            <a href="images/gallery/1.webp" class="image-popup d-block hover">
                                <div class="relative overflow-hidden">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="images/gallery/1.webp" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="images/gallery/2.webp" class="image-popup d-block hover">
                                <div class="relative overflow-hidden">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="images/gallery/2.webp" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="images/gallery/3.webp" class="image-popup d-block hover">
                                <div class="relative overflow-hidden">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="images/gallery/3.webp" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="images/gallery/4.webp" class="image-popup d-block hover">
                                <div class="relative overflow-hidden">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="images/gallery/4.webp" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="images/gallery/5.webp" class="image-popup d-block hover">
                                <div class="relative overflow-hidden">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="images/gallery/5.webp" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 text-center">
                            <a href="images/gallery/6.webp" class="image-popup d-block hover">
                                <div class="relative overflow-hidden">
                                    <div class="absolute start-0 w-100 abs-middle fs-36 text-white text-center z-2">
                                        <h4 class="mb-0 hover-scale-in-3">View</h4>
                                    </div>
                                    <div class="absolute w-100 h-100 top-0 bg-dark hover-op-05"></div>
                                    <img src="images/gallery/6.webp" class="img-fluid hover-scale-1-2" alt="">
                                </div>
                            </a>
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
