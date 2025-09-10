<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.partials.head', ['title' => 'Dahana WMS'])
<style>
  /* Hero tiles: mobile-first (flow in document, centered, can wrap) */
  .hero-tiles { position: static; }
  .hero-tiles .tiles-row {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    max-width: 1000px;
    margin: 0 auto;
    padding: 8px 12px;
  }

  /* Desktop: center absolutely over banner and force single line */
  @media (min-width: 992px) {
    #section-intro { min-height: 75vh; }
    .hero-tiles {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1000;
      width: 100%;
    }
    .hero-tiles .tiles-row { flex-wrap: nowrap; }
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
        @include('frontend.partials.header', ['headerClass' => 'transparent'])
        <header class="transparent" style="display:none">
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
                                    <a href="{{ route('frontend.index') }}">
                                        <img class="logo-main" src="{{ asset('images/logo-white.webp') }}" alt="" >
                                        <img class="logo-mobile" src="{{ asset('images/logo-white.webp') }}" alt="" >
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

            <section id="section-intro" class="text-light no-top no-bottom relative overflow-hidden z-1000" style="min-height: 75vh;">

                <div class="v-center relative">
                    <!-- Centered statistic tiles overlay (responsive) -->
                    <div class="hero-tiles z-1000">
                        <div class="container">
                            <div class="tiles-row">

                                <div class="col-auto">
                                    <div class="p-3 text-center text-light rounded" style="background: rgba(0,0,0,.18); border: 1px solid rgba(255,255,255,.25); min-width: 140px;">
                                        <div class="mb-1"><i class="fa-solid fa-leaf" style="font-size:26px"></i></div>
                                        <div class="small opacity-75">Sampah Organik</div>
                                        <div class="fw-bold fs-5">{{ number_format(($stats['sum_organik'] ?? 0), 2) }} Kg ({{ number_format(($stats['sum_organik'] ?? 0) / 1000, 2) }} Ton)</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="p-3 text-center text-light rounded" style="background: rgba(0,0,0,.18); border: 1px solid rgba(255,255,255,.25); min-width: 140px;">
                                        <div class="mb-1"><i class="fa-solid fa-recycle" style="font-size:26px"></i></div>
                                        <div class="small opacity-75">Sampah Anorganik</div>
                                        <div class="fw-bold fs-5">{{ number_format(($stats['sum_anorganik'] ?? 0), 2) }} Kg ({{ number_format(($stats['sum_anorganik'] ?? 0) / 1000, 2) }} Ton)</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="p-3 text-center text-light rounded" style="background: rgba(0,0,0,.18); border: 1px solid rgba(255,255,255,.25); min-width: 140px;">
                                        <div class="mb-1"><i class="fa-solid fa-trash" style="font-size:26px"></i></div>
                                        <div class="small opacity-75">Sampah Residu</div>
                                        <div class="fw-bold fs-5">{{ number_format(($stats['sum_residu'] ?? 0), 2) }} Kg ({{ number_format(($stats['sum_residu'] ?? 0) / 1000, 2) }} Ton)</div>
                                    </div>
                                </div>
                                <!-- New method tonnage cards after Residu -->
                                <div class="col-auto">
                                    <div class="p-3 text-center text-light rounded" style="background: rgba(0,0,0,.18); border: 1px solid rgba(255,255,255,.25); min-width: 160px;">
                                        <div class="mb-1"><i class="fa-solid fa-recycle" style="font-size:26px"></i></div>
                                        <div class="small opacity-75">Recycle</div>
                                        <div class="fw-bold fs-6">{{ number_format(($stats['sum_recycle'] ?? 0), 2) }} Kg ({{ number_format(($stats['sum_recycle'] ?? 0) / 1000, 2) }} Ton)</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="p-3 text-center text-light rounded" style="background: rgba(0,0,0,.18); border: 1px solid rgba(255,255,255,.25); min-width: 160px;">
                                        <div class="mb-1"><i class="fa-solid fa-bug" style="font-size:26px"></i></div>
                                        <div class="small opacity-75">Maggot</div>
                                        <div class="fw-bold fs-6">{{ number_format(($stats['sum_maggot'] ?? 0), 2) }} Kg ({{ number_format(($stats['sum_maggot'] ?? 0) / 1000, 2) }} Ton)</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="p-3 text-center text-light rounded" style="background: rgba(0,0,0,.18); border: 1px solid rgba(255,255,255,.25); min-width: 160px;">
                                        <div class="mb-1"><i class="fa-solid fa-fire" style="font-size:26px"></i></div>
                                        <div class="small opacity-75">Pirolisis</div>
                                        <div class="fw-bold fs-6">{{ number_format(($stats['sum_pirolisis'] ?? 0), 2) }} Kg ({{ number_format(($stats['sum_pirolisis'] ?? 0) / 1000, 2) }} Ton)</div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="abs bottom-10 z-1000 w-100 d-none d-lg-block">
                        <div class="container">
                            <div class="row g-4 align-items-center justify-content-between">





                                <div class="col-lg-5">
                                    <h1>Waste Management System</h1>
                                </div>

                                <div class="col-lg-4">
                                    <p class="lead">Waste management adalah sistem pengelolaan sampah untuk mengurangi dampak lingkungan melalui pemilahan, daur ulang, dan pemrosesan yang berkelanjutan.</p>
                                    {{-- <a class="btn-main btn-line" href="projects.html">View Projects</a> --}}
                                </div>
                            </div>

                            </div>
                        </div>

                    <div class="swiper wow scaleIn">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="swiper-inner" data-bgimage="url({{ asset('images/bannernya.webp') }})">
                                <div class="sw-overlay op-1"></div>
                            </div>
                        </div>
                        <!-- Slides -->

                        <!-- Slides -->
                        {{-- <div class="swiper-slide">
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
                        </div> --}}
                        <!-- Slides -->

                      </div>

                    </div>
                </div>

            </section>


            <section id="jalan" aria-label="section" class="pt-4 pb-4 bg-color">
                <div class="wow fadeInRight d-flex">
                  <div class="de-marquee-list relative wow">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Reduce</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Reuse</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Recycle</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Waste Management</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Organic Waste</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Composting</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                  </div>
                </div>
            </section>

            <section id="gambar" class="bg-dark p-0">
                <div class="container-fluid">
                    <div class="row g-0">
                        <!-- service item begin -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".0s">
                                <img src="{{ asset('images/point1.webp') }}" class="hover-scale-1-1 w-100 wow scaleIn" alt="">
                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="mb-3">Tonase sampah dapat dihitung dengan memisahkan kategori seperti organik, anorganik, B3, dan residu. Pendekatan ini membantu mengetahui volume tiap jenis sampah sehingga proses pengelolaan lebih terarah, misalnya organik untuk kompos, anorganik untuk daur ulang, dan B3 untuk perlakuan khusus.</div>

                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs abs-centered z-2 mt-3 w-100 text-center hover-op-0">
                                    <h4 class="mb-3">Berdasarkan Jenis Sampah</h4>
                                </div>
                                <div class="gradient-trans-dark-bottom abs w-100 h-80 bottom-0"></div>
                            </div>
                        </div>
                        <!-- service item end -->

                        <!-- service item begin -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".3s">
                                <img src="{{ asset('images/point2.webp') }}" class="hover-scale-1-1 w-100 wow scaleIn" alt="">
                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="mb-3">Tonase juga bisa dicatat sesuai metode penanganan, seperti daur ulang, pengomposan, pembakaran, atau pembuangan ke TPA. Data ini memberikan gambaran efektivitas metode yang digunakan serta peluang pengurangan beban sampah di TPA.</div>

                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs abs-centered z-2 mt-3 w-100 text-center hover-op-0">
                                    <h4 class="mb-3">Berdasarkan Metode Pengelolaan</h4>
                                </div>
                                <div class="gradient-trans-dark-bottom abs w-100 h-80 bottom-0"></div>
                            </div>
                        </div>
                        <!-- service item end -->

                        <!-- service item begin -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".6s">
                                <img src="{{ asset('images/point3.webp') }}" class="hover-scale-1-1 w-100 wow scaleIn" alt="">
                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="mb-3">Perhitungan tonase sampah menurut lokasi (rumah tangga, bisnis, industri, atau area publik) memberi pemahaman tentang sumber utama timbulan sampah. Informasi ini penting untuk menentukan strategi pengelolaan sesuai karakteristik lokasi.</div>

                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs abs-centered z-2 mt-3 w-100 text-center hover-op-0">
                                    <h4 class="mb-3">Berdasarkan Lokasi Pengumpulan</h4>
                                </div>
                                <div class="gradient-trans-dark-bottom abs w-100 h-80 bottom-0"></div>
                            </div>
                        </div>
                        <!-- service item end -->

                        <!-- service item begin -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="hover overflow-hidden relative text-light text-center wow fadeInRight" data-wow-delay=".9s">
                                <img src="{{ asset('images/point1.webp') }}" class="hover-scale-1-1 w-100 wow scaleIn" alt="">
                                <div class="abs w-100 px-4 hover-op-1 z-4 hover-mt-40 abs-centered">
                                    <div class="mb-3">Selain jenis, metode, dan lokasi, tonase juga relevan jika dianalisis per periode waktu tertentu (harian, mingguan, bulanan). Hal ini memudahkan pemetaan tren kenaikan atau penurunan sampah sehingga perencanaan pengelolaan lebih akurat.</div>

                                </div>
                                <div class="abs bg-color z-2 top-0 w-100 h-100 hover-op-1"></div>
                                <div class="abs abs-centered z-2 mt-3 w-100 text-center hover-op-0">
                                    <h4 class="mb-3">Berdasarkan Periode Waktu</h4>
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
                            <div class="subtitle">Apa itu Waste Management Sistem</div>
                            <h2>Proses Sistematik untuk Semua Kebutuhan Pengelolaan Sampah</h2>
                        </div>

                        <div class="col-lg-4">
                            <p class="lead">Peduli lingkungan dengan solusi cerdas pengelolaan
sampah menuju zero waste, mendukung pengolahan
sampah rumah tangga, bisnis, dan industri agar tetap bersih,
sekaligus menjaga keberlanjutan alam yang lestari.</p>
                        </div>
                    </div>

                    <div class="spacer-single"></div>

                    <div class="row g-4 align-items-center">
                        <div class="col-lg-6">
                            <div class="wow zoomIn overflow-hidden">
                                <img src="{{ asset('images/waste1000a.png') }}" class="w-100 wow scaleIn" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="px-4 py-2">
                                        <img src="{{ asset('images/icons/phones.png') }}" class="w-70px mb-4 wow scaleIn" alt="">
                                        <h4>Permintaan & Penjemputan</h4>
                                        <p>Sampah dijadwalkan untuk dijemput dan dikumpulkan dari rumah, bisnis, atau lokasi kerja.</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="px-4 py-2">
                                        <img src="{{ asset('images/icons/lorry.png') }}" class="w-70px mb-4 wow scaleIn" alt="">
                                        <h4>Transportasi</h4>
                                        <p>Sampah diangkut dengan aman menuju fasilitas pengolahan.</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="px-4 py-2">
                                        <img src="{{ asset('images/icons/recycle-bin.png') }}" class="w-70px mb-4 wow scaleIn" alt="">
                                        <h4>Penyortiran</h4>
                                        <p>Sampah dipilah sesuai jenisnya
melalui proses pemilahan yang dilakukan pada hari
yang sama, sehingga memudahkan pengolahan lebih
lanjut dan menjaga kebersihan lingkungan</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="px-4 py-2">
                                        <img src="{{ asset('images/icons/recycle.png') }}" class="w-70px mb-4 wow scaleIn" alt="">
                                        <h4>Pemprosesan</h4>
                                        <p>sampah diproses untuk didaur
ulang, kompos, maggot, pirolisis dan proses
pengolahan lainnya yang aman untuk
lingkungan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


            <section id="tonase" class="pt-100 bg-dark text-light">
                <div class="container">
                    <div class="row g-4 mb-sm-30 justify-content-center">
                        <div class="col-md-3 col-6">
                            <div class="de_count text-center pl-50 fs-15 wow fadeInRight" data-wow-delay=".4s">
                                <h2 class="fs-48 mb-2"><span class="timer fs-40" data-to="{{ (int)($totalKemitraan ?? 0) }}" data-speed="3000">0</span><span class="id-color">+</span></h2>
                                Total Kemitraan
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="de_count text-center pl-50 fs-15 wow fadeInRight" data-wow-delay=".6s">
                                <h2 class="fs-48 mb-2"><span class="timer fs-40" data-to="{{ (int)($totalKajian ?? 0) }}" data-speed="3000">0</span><span class="id-color">+</span></h2>
                                Total Kajian
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
                                <img src="{{ asset('images/banner2.webp') }}" class="jarallax-img" alt="">
                                <div class="row g-4 align-items-center justify-content-between">
                                    <div class="col-md-6 col-sm-6 relative">
                                        <div class="relative z-index-1000">
                                            <h2 class="wow fadeInUp" data-wow-delay=".3s">Kelola Sampah Cerdas, Lingkungan Sehat.</h2>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-3 col-sm-6">
                                        <div class="bg-color px-4 py-5 d-block text-center wow zoomIn" data-wow-delay=".6s">
                                            <img src="{{ asset('images/icons/call.webp') }}" class="w-40 mb-3" alt="">
                                            <p class="lead mb-0">24 Hours</p>
                                            <h4 class="mb-0">+1 123 456 789</h4>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




            <section class="relative overflow-hidden">
                <img src="{{ asset('images/misc/recycle-crop.webp') }}" class="w-20 end-0 bottom-0 z-3" style="position: fixed; right: 0; bottom: 0; z-index: 99999;" alt="">
                <div class="container relative z-2">
                    <div class="row g-4 align-items-end">
                        <div class="col-lg-12">
                            <div class="subtitle"></div>

                        </div>

                    </div>
                </div>
            </section>

            <section aria-label="section" class="pt-4 pb-4 bg-color">
                <div class="wow fadeInRight d-flex">

                      <div class="de-marquee-list relative wow">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font"> </span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Reuse</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Recycle</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Waste Management</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Organic Waste</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
                    <span class="fs-36 lh-1 ms-5 me-2 p-4 text-white heading-font">Composting</span>
                    <img src="{{ asset('images/logo-icon-line.webp') }}" class="abs abs-middle w-40px" alt="">
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
                                        <li><a href="{{ route('frontend.kajian') }}">Kajian</a></li>
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

    <!-- overlay content begin -->



    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/custom-swiper-1.js') }}"></script>
    <script src="{{ asset('js/custom-marquee.js') }}"></script>

</body>

</html>
