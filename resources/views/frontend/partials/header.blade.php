@php
    $headerClass = $headerClass ?? 'header-light';
    $logoVariant = $logoVariant ?? 'white';
    $logoPath = $logoVariant === 'black' ? 'images/logo-black.webp' : 'images/logo-white.webp';
@endphp
<header class="{{ $headerClass }}">
    <div id="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between xs-hide">
                        <div class="d-flex">
                            <div class="topbar-widget me-3"><a href="#"><i class="fas fa-clock"></i>Senin - Sabtu 08.00 - 18.00</a></div>
                            <div class="topbar-widget me-3"><a href="#"><i class="fas fa-envelope"></i>dahanasolusi@gmail.com</a></div>
                            <div class="topbar-widget me-3"><a href="#"><i class="fas fa-phone"></i>+62 8222 6777 006</a></div>
                        </div>
                        <div class="d-flex">
                            <div class="social-icons">
                                <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a>

                                <a href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>

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
                                <img class="logo-main" src="{{ asset($logoPath) }}" alt="" >
                                <img class="logo-mobile" src="{{ asset($logoPath) }}" alt="" >
                            </a>
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="{{ route('frontend.index') }}">Home</a></li>
                            {{-- <li><a class="menu-item" href="#">Projects</a></li> --}}
                            <li><a class="menu-item" href="#">Company</a>
                                <ul>
                                    <li><a href="{{ route('frontend.about') }}">Tentang kami</a></li>
                                    <li><a href="{{ route('frontend.team') }}">Team</a></li>
                                    <li><a href="{{ route('frontend.gallery') }}">Gallery</a></li>
                                </ul>
                            </li>
                            <li><a class="menu-item" href="{{ route('frontend.kajian') }}">Kajian</a></li>
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
