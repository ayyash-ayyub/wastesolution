<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.partials.head', [
    'title' => 'About — Dahana',
    'metaDescription' => 'Tentang Dahana Waste Management System',
    'metaAuthor' => 'Dahana'
])
    <style>
        /* Warna hijau gelap untuk semua <strong> pada laman ini */
        #wrapper strong { color: #0f5132; }

        /* Samakan tinggi card pada section 'Tahukah anda?' */
        .equal-cards > [class*="col-"] { display: flex; }
        .equal-cards > [class*="col-"] > .p-40 {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* Shadow elegan untuk gambar kedua pada blok gambar bertumpuk */
        .shadow-elegant {
            box-shadow: 0 14px 28px rgba(0,0,0,0.22), 0 10px 10px rgba(0,0,0,0.18);
            border-radius: 8px;
        }
    </style>
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
                                <p class="col-lg-10 lead mb-0 wow fadeInUp" data-wow-delay=".3s">Solusi Pengelolaan Sampah untuk Masa Depan yang Lebih Bersih dan berkelanjutan</p>
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
                                    <img src="images/logo-icon-color.webp" class="w-100 wow scaleIn" alt="">
                                </div>
                                <div class="bg-body w-50 abs mb-min-50 end-0 bottom-0 z-2 overflow-hidden wow zoomIn shadow-elegant" data-wow-delay=".2s">
                                    <img src="images/logo-icon-color.webp" class="w-100 wow scaleIn" data-wow-delay=".2s" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="subtitle wow fadeInUp mb-3">Tentang kami</div>
                            <h2 class="wow fadeInUp">dahanawastesolution</h2>
                            <p class="wow fadeInUp">Kami menyediakan solusi inovatif dalam pengelolaan sampah untuk kebutuhan rumah tangga, komersial, dan industri. Mulai dari pengumpulan hingga daur ulang, layanan kami memastikan pembuangan yang bertanggung jawab demi melindungi lingkungan sekaligus menciptakan komunitas yang lebih bersih dan berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-dark text-light">
                <div class="container">
                    <div class="row g-4 align-items-stretch equal-cards justify-content-center">
                        <div class="col-lg-4">
                            <h2>Our Vision</h2>
                        </div>
                        <div class="col-lg-8">
                            <h3>Menjadi perusahaan pengelolaan sampah terpadu yang mewujudkan lingkungan bersih dan berkelanjutan melalui kolaborasi aktif dengan seluruh pemangku kepentingan.</h3>
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
                                <li><strong>Menciptakan Lingkungan Bersih</strong>
Mengelola sampah secara terpadu, efektif, dan ramah lingkungan untuk menjaga kebersihan serta kesehatan masyarakat.</li>
                                <li><strong>Mendorong Keberlanjutan</strong>
Mengoptimalkan penerapan prinsip 3R (Reduce, Reuse, Recycle) dan ekonomi sirkular guna menghasilkan manfaat jangka panjang bagi lingkungan dan generasi mendatang.</li>
                                <li><strong>Kolaborasi dengan Stakeholder</strong>
Memperkuat sinergi dengan pemerintah, masyarakat, dunia usaha, dan akademisi dalam mendukung pengelolaan sampah yang terintegrasi.</li>
                                <li><strong>Pemberdayaan dan Edukasi</strong>
Memberikan edukasi, pelatihan, serta pendampingan kepada masyarakat dan mitra agar lebih berdaya dalam mengurangi dan mengelola sampah dari sumbernya.</li>
                                <li><strong>Inovasi Hijau</strong>
Mengembangkan inovasi teknologi pengolahan sampah yang ramah lingkungan serta bernilai tambah ekonomi dan sosial.</li>
                                <li><strong>Kepatuhan dan Tata Kelola</strong>
Menjalankan usaha sesuai dengan regulasi lingkungan hidup, standar kesehatan, serta prinsip tata kelola perusahaan yang baik (Good Corporate Governance)
.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-color-op-1">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <h2 class="mb-4">Tahukah anda?</h2>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".0s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-color text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Limbah domestik</h4>
                                    <p class="mb-0">Limbah domestik adalah sisa buangan yang berasal dari kegiatan rumah tangga, seperti sisa makanan, plastik, kertas, botol, dan air bekas cucian. Jenis limbah ini umumnya bersifat organik dan anorganik, dengan volume terbesar berasal dari permukiman dan aktivitas sehari-hari masyarakat.</p>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-color text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Limbah B3</h4>
                                    <p class="mb-0">Limbah B3 (Bahan Berbahaya dan Beracun) adalah limbah yang mengandung zat berbahaya yang dapat merusak lingkungan dan membahayakan kesehatan manusia, seperti limbah medis, pestisida, oli bekas, atau limbah kimia. Pengelolaan limbah B3 harus mengikuti aturan ketat, termasuk penyimpanan, transportasi, hingga proses pengolahan khusus.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-color text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Limbah industri</h4>
                                    <p class="mb-0">Limbah industri merupakan sisa hasil produksi dari kegiatan pabrik atau perusahaan, yang dapat berupa padat, cair, atau gas. Limbah ini biasanya mengandung bahan kimia atau zat berbahaya jika tidak diolah dengan baik, sehingga membutuhkan sistem pengelolaan khusus untuk mencegah pencemaran lingkungan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                            <div class="p-40 overlay-white-5">
                                <i class="bg-dark text-light fs-48 p-2 absolute id-color icon_check"></i>
                                <div class="ps-80">
                                    <h4>Limbah NonB3</h4>
                                    <p class="mb-0">Limbah NonB3 adalah limbah yang tidak mengandung bahan berbahaya dan beracun, seperti kertas, plastik, kayu, atau sisa material konstruksi. Meskipun tidak berbahaya, pengelolaan yang tidak tepat tetap dapat menimbulkan masalah lingkungan, sehingga perlu didaur ulang atau ditangani dengan metode ramah lingkungan.</p>
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
