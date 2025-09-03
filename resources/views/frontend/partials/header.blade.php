@php $headerClass = $headerClass ?? 'header-light'; @endphp
<header class="{{ $headerClass }}">
    <div id="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between xs-hide">
                        <div class="d-flex">
                            <div class="topbar-widget me-3"><a href="#"><i class="fas fa-clock"></i>Monday - Friday 08.00 - 18.00</a></div>
                            <div class="topbar-widget me-3"><a href="#"><i class="fas fa-envelope"></i>contact@wastewise.com</a></div>
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
                        <div id="logo">
                            <a href="{{ route('frontend.index') }}">
                                <img class="logo-main" src="{{ asset('images/logo-white.webp') }}" alt="" >
                                <img class="logo-mobile" src="{{ asset('images/logo-white.webp') }}" alt="" >
                            </a>
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="{{ route('frontend.index') }}">Home</a></li>
                            <li><a class="menu-item" href="{{ route('frontend.projects') }}">Projects</a></li>
                            <li><a class="menu-item" href="#">Company</a>
                                <ul>
                                    <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                                    <li><a href="{{ route('frontend.team') }}">Our Team</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                                </ul>
                            </li>
                            <li><a class="menu-item" href="{{ route('frontend.blog') }}">Blog</a></li>
                            <li><a class="menu-item" href="{{ route('frontend.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <a href="{{ route('login') }}" class="btn-main">Login</a>
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
