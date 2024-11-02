@include('sweetalert::alert')
@php
    $config = DB::table('configs')->first();
    $service = DB::table('services')->get();
    $produit = DB::table('produits')->get();
@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HB-DESIGN</title>
    <meta name="robots" content="index, follow">
    <meta charset="utf-8">
     
 

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="soukhinkhan">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
   {{--  <link rel="shortcut icon" type="image/x-icon"src="{{ config('app.app_url') }}{{ asset(Storage::url($config->icon)) }}"> --}}
  {{--  <link rel="shortcut icon" type="image/png" href="./assets/logo/icon.png" /> --}}
   <link rel="icon" href="{{ Storage::url($config->logo) }}" type="image/png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/animate.min.css">
    <link rel="stylesheet"href="/assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/vendor/fontawesome-pro.css">
    <link rel="stylesheet" href="/assets/css/vendor/spacing.css">
    <link rel="stylesheet" href="/assets/css/vendor/custom-font.css">
    <link rel="stylesheet" href="/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Script.js"></script>
    @yield('SEO')
</head>

<body>

    <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

    <!-- preloader start -->
    
    <!-- preloader start -->

    <!-- Backtotop start -->
    <div class="backtotop-wrap cursor-pointer">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Backtotop end -->

    <!-- Offcanvas area start -->
    <div class="fix">
        <div class="offcanvas__area">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="{{ route('home') }}"><img src="{{ Storage::url($config->logo) }}" alt="Logo"
                                    height="100" width="100" /></a>
                        </div>
                        <div class="offcanvas__close">
                            <button class="offcanvas-close-icon animation--flip">
                                <span class="offcanvas-m-lines">
                                    <span class="offcanvas-m-line line--1"></span><span
                                        class="offcanvas-m-line line--2"></span><span
                                        class="offcanvas-m-line line--3"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="mobile-menu fix"></div>
                    <div class="offcanvas__social">
                        <h3 class="offcanvas__title mb-20">Abonnez-vous et suivez</h3>
                        <ul>
                            <li><a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                        
                            <li><a href="{{ $config->instagram }}"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="offcanvas__btn">
                        <div class="header__btn-wrap">
                            <a class="rr-btn btn-hover-white"  href="{{ route('shop') }}">shop<span><i
                                        class="fa-regular fa-angle-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>
    <div class="offcanvas__overlay-white"></div>
    <!-- Offcanvas area start -->

    <!-- Header area start -->
    <header>
        <div id="header-sticky" class="header__area box-shadow-3 header-1 bg-headr-3">
            <div class="header-top-3  d-none d-md-block">
                <div class="container-fluid container-width">
                    <div class="top-header__menu-wrapper d-flex justify-content-between align-items-center">
                        <div class="header-top-socail-menu d-flex">
                            <div class="lan-select lan-select-2">
                                <form>
                                 
                                </form>
                            </div>
                       
                        </div>

                        <ul class="header-top-menu d-flex">
                          
                        </ul>

                        <div class="header-top-social d-flex">
                            <a href="{{ $config->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                           
                            <a href="{{ $config->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid home3-container-width">
                <div class="mega__menu-wrapper p-relative">
                    <div class="header__main">
                        <div class="header__left">
                            <div class="header__logo header__logo-3">
                                <div class="header__hamburger">
                                    <div class="sidebar__toggle">
                                        <button class="bar-icon bar-icon-3">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </button>
                                    </div>
                                </div>
                                <a href="index.html">
                                    <div class="logo logo-3">
                                        <a class="menu-logo" href="{{ route('home') }}"><img
                                                src="{{ Storage::url($config->logo) }}" alt="Logo" height="5"
                                                width="5" /></a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="header__middle">
                            <div class="mean__menu-wrapper d-none d-lg-block">
                                <div class="main-menu">
                                    <nav id="mobile-menu" class="mobile-menu">
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">Accueil</a>

                                            </li>

                                            <li><a href="{{ route('shop') }}">Shop</a></li>


                                            <li><a href="{{ route('contact') }}">Contact</a></li>

                                            @if (auth()->user())
                                                <li> <a href="{{ route('comptes') }}">

                                                        Mes commandes
                                                    </a>
                                            @endif
                                            </li>
                                            @guest



                                                <li class="current">
                                                    <a href="{{ route('register') }}">Inscription</a>
                                                </li>

                                                <li>
                                                    <a href="{{ url('login') }}">Connexion</a>
                                                </li>
                                            @else
                                                @if (auth()->user()->role != 'client')
                                                    <li><a href="{{ url('dashboard') }}"
                                                            class="nav-item nav-link">Dashboard</a>
                                                    </li>
                                                @endif





                                            @endguest



                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="header__right">
                            <div class="header__action d-flex align-items-center">
                                <div class="header__social d-none d-sm-inline-flex">
                                


                                    <a href="{{ route('favories') }}"><svg width="22" height="20"
                                            viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.4578 2.59133C18.9691 2.08683 18.3889 1.68663 17.7503 1.41358C17.1117 1.14054 16.4272 1 15.7359 1C15.0446 1 14.3601 1.14054 13.7215 1.41358C13.0829 1.68663 12.5026 2.08683 12.0139 2.59133L10.9997 3.63785L9.98554 2.59133C8.99842 1.57276 7.6596 1.00053 6.26361 1.00053C4.86761 1.00053 3.52879 1.57276 2.54168 2.59133C1.55456 3.6099 1 4.99139 1 6.43187C1 7.87235 1.55456 9.25383 2.54168 10.2724L3.55588 11.3189L10.9997 19L18.4436 11.3189L19.4578 10.2724C19.9467 9.76814 20.3346 9.16942 20.5992 8.51045C20.8638 7.85148 21 7.14517 21 6.43187C21 5.71857 20.8638 5.01225 20.5992 4.35328C20.3346 3.69431 19.9467 3.09559 19.4578 2.59133Z"
                                                stroke="#001D08" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        <div class="icon-wrapper">
                                            <span>
                                                <svg width="8" height="10" viewBox="0 0 8 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.936 9.12C3.368 9.12 2.884 9.036 2.484 8.868C2.084 8.7 1.756 8.468 1.5 8.172C1.244 7.876 1.052 7.536 0.924 7.152C0.796 6.76 0.72 6.344 0.696 5.904C0.688 5.688 0.68 5.452 0.672 5.196C0.672 4.932 0.672 4.668 0.672 4.404C0.68 4.14 0.688 3.896 0.696 3.672C0.712 3.232 0.788 2.82 0.924 2.436C1.06 2.044 1.256 1.704 1.512 1.416C1.776 1.128 2.108 0.9 2.508 0.732C2.908 0.564 3.384 0.48 3.936 0.48C4.496 0.48 4.976 0.564 5.376 0.732C5.776 0.9 6.104 1.128 6.36 1.416C6.624 1.704 6.82 2.044 6.948 2.436C7.084 2.82 7.16 3.232 7.176 3.672C7.192 3.896 7.2 4.14 7.2 4.404C7.2 4.668 7.2 4.932 7.2 5.196C7.2 5.452 7.192 5.688 7.176 5.904C7.16 6.344 7.088 6.76 6.96 7.152C6.832 7.536 6.64 7.876 6.384 8.172C6.128 8.468 5.796 8.7 5.388 8.868C4.988 9.036 4.504 9.12 3.936 9.12ZM3.936 7.74C4.456 7.74 4.836 7.572 5.076 7.236C5.324 6.892 5.452 6.428 5.46 5.844C5.476 5.612 5.484 5.38 5.484 5.148C5.484 4.908 5.484 4.668 5.484 4.428C5.484 4.188 5.476 3.96 5.46 3.744C5.452 3.176 5.324 2.72 5.076 2.376C4.836 2.024 4.456 1.848 3.936 1.848C3.424 1.848 3.044 2.024 2.796 2.376C2.556 2.72 2.428 3.176 2.412 3.744C2.412 3.96 2.408 4.188 2.4 4.428C2.4 4.668 2.4 4.908 2.4 5.148C2.408 5.38 2.412 5.612 2.412 5.844C2.428 6.428 2.56 6.892 2.808 7.236C3.056 7.572 3.432 7.74 3.936 7.74Z"
                                                        fill="white" />
                                                </svg>
                                            </span>
                                        </div>
                                    </a>
                                    <a href="{{ route('cart') }}"><svg width="20" height="20"
                                            viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.54572 18.9999C7.99759 18.9999 8.3639 18.6162 8.3639 18.1428C8.3639 17.6694 7.99759 17.2856 7.54572 17.2856C7.09385 17.2856 6.72754 17.6694 6.72754 18.1428C6.72754 18.6162 7.09385 18.9999 7.54572 18.9999Z"
                                                stroke="#001D08" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M16.5447 18.9999C16.9966 18.9999 17.3629 18.6162 17.3629 18.1428C17.3629 17.6694 16.9966 17.2856 16.5447 17.2856C16.0929 17.2856 15.7266 17.6694 15.7266 18.1428C15.7266 18.6162 16.0929 18.9999 16.5447 18.9999Z"
                                                stroke="#001D08" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M1 1H4.27273L6.46545 12.4771C6.54027 12.8718 6.7452 13.2263 7.04436 13.4785C7.34351 13.7308 7.71784 13.8649 8.10182 13.8571H16.0545C16.4385 13.8649 16.8129 13.7308 17.112 13.4785C17.4112 13.2263 17.6161 12.8718 17.6909 12.4771L19 5.28571H5.09091"
                                                stroke="#001D08" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />

                                        </svg>
                                        <style>
                                            .count-panier-span span {
                                                /* ... other styles ... */
                                                color: #ffffff;

                                                /* Set the text color to white */
                                                #count-panier-span span {
                                                    font-family: Arial, sans-serif;
                                                    font-size: 12px;
                                                    color: white;
                                                    font-weight: bold;
                                                    position: absolute;
                                                    top: 50%;
                                                    left: 50%;
                                                    transform: translate(-50%, -50%);
                                                }
                                            }
                                        </style>
                                        <div class="icon-wrapper">
                                            <span id="count-panier-span" style="color: #ffffff">
                                                <svg width="15" height="15" viewBox="0 0 8 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.936 9.12C3.368 9.12 2.884 9.036 2.484 8.868C2.084 8.7 1.756 8.468 1.5 8.172C1.244 7.876 1.052 7.536 0.924 7.152C0.796 6.76 0.72 6.344 0.696 5.904C0.688 5.688 0.68 5.452 0.672 5.196C0.672 4.932 0.672 4.668 0.672 4.404C0.68 4.14 0.688 3.896 0.696 3.672C0.712 3.232 0.788 2.82 0.924 2.436C1.06 2.044 1.256 1.704 1.512 1.416C1.776 1.128 2.108 0.9 2.508 0.732C2.908 0.564 3.384 0.48 3.936 0.48C4.496 0.48 4.976 0.564 5.376 0.732C5.776 0.9 6.104 1.128 6.36 1.416C6.624 1.704 6.82 2.044 6.948 2.436C7.084 2.82 7.16 3.232 7.176 3.672C7.192 3.896 7.2 4.14 7.2 4.404C7.2 4.668 7.2 4.932 7.2 5.196C7.2 5.452 7.192 5.688 7.176 5.904C7.16 6.344 7.088 6.76 6.96 7.152C6.832 7.536 6.64 7.876 6.384 8.172C6.128 8.468 5.796 8.7 5.388 8.868C4.988 9.036 4.504 9.12 3.936 9.12ZM3.936 7.74C4.456 7.74 4.836 7.572 5.076 7.236C5.324 6.892 5.452 6.428 5.46 5.844C5.476 5.612 5.484 5.38 5.484 5.148C5.484 4.908 5.484 4.668 5.484 4.428C5.484 4.188 5.476 3.96 5.46 3.744C5.452 3.176 5.324 2.72 5.076 2.376C4.836 2.024 4.456 1.848 3.936 1.848C3.424 1.848 3.044 2.024 2.796 2.376C2.556 2.72 2.428 3.176 2.412 3.744C2.412 3.96 2.408 4.188 2.4 4.428C2.4 4.668 2.4 4.908 2.4 5.148C2.408 5.38 2.412 5.612 2.412 5.844C2.428 6.428 2.56 6.892 2.808 7.236C3.056 7.572 3.432 7.74 3.936 7.74Z"
                                                        fill="white" />
                                                </svg>

                                            </span>


                                        </div>

                                    </a>
                                </div>
                                @if (auth()->user())
                                    <div class="tp-header-btn d-flex  p-1 d-sm-inline-block d-inline-block"
                                        style=" height: 60px;  line-height: 60px;   padding: 0 ;  display: inline-block;font-weight: 700;font-size: 18px; ">
                                        {{-- <a class="tp-btn-theme" href="contact.html"><span>Get Started Now</span></a> --}}
                                        <div class="dropdown">
                                          
                                            <a class=" dropdown-toggle p-3 " href="#"
                                                style="font-size: 18px; color: black;" id="dropdownMenu2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->prenom }} {{-- {{ Auth::user()->nom }} --}}
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2"
                                                style="padding:0%; font-size:100%;padding:0%">
                                                <a class="dropdown-item" href="{{ route('comptes') }}">
                                                    <i class="bx bx-tachometer text-left"></i>
                                                    <span>Mes commandes</span>
                                                </a>

                                                <a class="dropdown-item" href="{{ route('favories') }}">
                                                    <i class="bx bx-tachometer"></i>
                                                    <span>Mes favoris</span>

                                                </a>
                                                <a class="dropdown-item" href="{{ route('profile') }}">
                                                    <i class="bx bx-tachometer"></i>
                                                    <span>Paramètres</span>

                                                </a>

                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                                    Déconnexion
                                                </a>
                                                {{-- <a class="nav-link" href="{{ route('dashboard') }}">Dashboad</a> --}}
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="header__message d-flex align-items-center">
                           
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header area end -->
    <div id="popup-search-box">
        <div class="box-inner-wrap d-flex align-items-center">
            <form id="form" action="#" method="get" role="search">
                <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
            </form>
            <div class="search-close"><i class="fa-sharp fa-regular fa-xmark"></i></div>
        </div>
    </div>
    <!-- /#popup-search-box -->
    <!-- Body main wrapper start -->
    <main>



        @yield('body')




    </main>

<style>
    .custom-footer-bg {
    background-color: #f3edec; /* Remplacez #ff5733 par la couleur de votre choix */
}

</style>
    <!-- Footer area start -->
    <footer>
        <section class="footer__area-common overflow-hidden position-relative z-1 custom-footer-bg">
          
            <div class="container">
                <div class="row mb-minus-40 footer-wrap">
                    
                    <div class="col-lg-4">
                    
                        <div class=" footer__widget footer__widget-item-1">
                            <div class=" footer__logo mb-20">
                                <a class="menu-logos" href="{{ route('home') }}"><img
                                        src="{{ Storage::url($config->logo) }}" alt="Logo" style="height="5"
                                        width="5" /></a>
                            </div>
                            <div class="  footer__content" style="text-align: justify;">
                                <p>{{ $config->description }}</p>
                            </div>
                            <style>
                                .mt-40 {
    margin-top: 40px;
}

.p-4 {
    padding: 16px; /* 1rem padding */
}
                            </style>
                            <div class="footer__social mt-20">
                                <a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a>
                               
                                <a href="{{ $config->instagram }}"><i class="fab fa-instagram"></i></a>

                                
                              
                            </div>


                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer__widget footer__widget-item-2">
                            <div class="footer__widget-title">
                                <h4>Les liens utiles</h4>
                            </div>
                            <div class="footer__link">
                                <ul>
                                    <li><a href="about-us.html"><i class="fa-solid fa-angle-right"></i>Accueil </a>
                                    </li>
                                    <li><a href="faq.html"><i class="fa-solid fa-angle-right"></i>Shop</a></li>
                                    <li><a href="service-details.html"><i class="fa-solid fa-angle-right"></i>Contact</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="footer__widget footer__widget-item-3">
                            <div class="footer__widget-title">
                                <h4>Compte</h4>
                            </div>
                            <div class="footer__link">
                               
                                <ul>
                                    @if (auth()->user())
                                    <li><a href="{{ route('profile') }}"><i class="fa-solid fa-angle-right"></i>Paramètres
                                            </a></li>
                                    <li><a href="{{ route('comptes') }}"><i class="fa-solid fa-angle-right"></i> Mes commandes
                                            </a></li>
                                    <li><a href="{{ route('favories') }}"><i class="fa-solid fa-angle-right"></i> Mes favories
                                            </a></li>
                                            @else

                                            <li class="current">
                                                <a href="{{ route('register') }}">Inscription</a>
                                            </li>

                                            <li>
                                                <a href="{{ url('login') }}">Connexion</a>
                                            </li>
                                            @endif
                                  
                                </ul>
                                    
                                
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget footer__widget-item-4">
                            <div class="footer__widget-title">
                                <h4>Nos coordonnées</h4>
                            </div>

                            <div class="footer__subscribe subscribe-2 d-flex mt-15">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="22"
                                                    viewBox="0 0 18 22" fill="none">
                                                    <path
                                                        d="M17 9.18182C17 15.5455 9 21 9 21C9 21 1 15.5455 1 9.18182C1 7.01187 1.84285 4.93079 3.34315 3.3964C4.84344 1.86201 6.87827 1 9 1C11.1217 1 13.1566 1.86201 14.6569 3.3964C16.1571 4.93079 17 7.01187 17 9.18182Z"
                                                        stroke="#646464" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M8.99967 11.909C10.4724 11.909 11.6663 10.688 11.6663 9.18174C11.6663 7.67551 10.4724 6.45447 8.99967 6.45447C7.52692 6.45447 6.33301 7.67551 6.33301 9.18174C6.33301 10.688 7.52692 11.909 8.99967 11.909Z"
                                                        stroke="#646464" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            {{ $config->addresse }}
                                        </a>
                                    </li>
                                    <li class="gap-10">
                                        <a href="#">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 18 18" fill="none">
                                                    <path
                                                        d="M10.9104 4.05809C11.6586 4.20378 12.3462 4.56898 12.8852 5.10696C13.4242 5.64494 13.7901 6.33121 13.9361 7.07795M10.9104 1C12.4648 1.17235 13.9143 1.8671 15.0209 2.97018C16.1275 4.07326 16.8254 5.5191 17 7.0703M16.234 13.1712V15.4648C16.2349 15.6777 16.1912 15.8884 16.1057 16.0835C16.0203 16.2786 15.8949 16.4537 15.7377 16.5977C15.5805 16.7416 15.3949 16.8512 15.1928 16.9194C14.9908 16.9876 14.7766 17.013 14.5642 16.9938C12.2071 16.7382 9.94297 15.9343 7.95371 14.6467C6.10295 13.4729 4.53384 11.9068 3.35779 10.0596C2.06326 8.0651 1.25765 5.79431 1.00622 3.43118C0.987076 3.21976 1.01225 3.00669 1.08014 2.80551C1.14802 2.60434 1.25713 2.41948 1.40052 2.2627C1.54391 2.10592 1.71843 1.98066 1.91298 1.89489C2.10753 1.80912 2.31785 1.76472 2.53053 1.76452H4.82849C5.20022 1.76087 5.56061 1.89226 5.84247 2.13419C6.12433 2.37613 6.30843 2.71211 6.36046 3.0795C6.45745 3.81349 6.63732 4.53418 6.89665 5.22781C6.99971 5.50145 7.02201 5.79884 6.96092 6.08474C6.89983 6.37065 6.7579 6.63308 6.55195 6.84095L5.57915 7.81189C6.66958 9.7259 8.25739 11.3107 10.1751 12.399L11.1479 11.4281C11.3561 11.2225 11.6191 11.0809 11.9055 11.0199C12.192 10.9589 12.4899 10.9812 12.7641 11.084C13.4591 11.3429 14.1811 11.5224 14.9165 11.6192C15.2886 11.6716 15.6284 11.8587 15.8713 12.1448C16.1143 12.431 16.2433 12.7962 16.234 13.1712Z"
                                                        stroke="#646464" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>

                                        </a>
                                        <a href="#">{{ $config->telephone }}</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15"
                                                    viewBox="0 0 18 15" fill="none">
                                                    <path
                                                        d="M2.6 1H15.4C16.28 1 17 1.73125 17 2.625V12.375C17 13.2688 16.28 14 15.4 14H2.6C1.72 14 1 13.2688 1 12.375V2.625C1 1.73125 1.72 1 2.6 1Z"
                                                        stroke="#646464" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M17 2.62512L9 8.31262L1 2.62512" stroke="#646464"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span>{{ $config->email }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       <style>
        .footer__bottom-wrapper {
    background-color: #000; /* Couleur noire */
    padding: 20px 0;
    border-top: 1px solid #eaeaea;
}
       </style>
            <div class="footer__bottom-wrapper footer-bottom-border p-1">
                <div class="container">
                    <div class="footer__bottom">
                        <div class="footer__copyright">
                            <p> Copyright HB-DESIGN @ 2024 HB-DESIGN. </p>
                        </div>

                        <div class="footer__copyright-menu">
                            <ul>
                                <li>
                                    Build by
                                    <a href="https://www.e-build.tn" style="color: #c71f17;">
                                        <b> E-build </b>
                                    </a>.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <!-- Footer area end -->



    <!-- JS here -->
    <script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/plugins/waypoints.min.js"></script>
    <script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/plugins/meanmenu.min.js"></script>
    <script src="/assets/js/plugins/swiper.min.js"></script>
    <script src="/assets/js/plugins/wow.js"></script>
    <script src="/assets/js/vendor/magnific-popup.min.js"></script>
    <script src="/assets/js/vendor/type.js"></script>
    <script src="/assets/js/plugins/counterup.js"></script>
    <script src="/assets/js/plugins/nice-select.min.js"></script>
    <script src="/assets/js/vendor/jquery-ui.min.js"></script>
    <script src="/assets/js/plugins/parallax-scroll.js"></script>
    <script src="/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="/assets/js/plugins/isotope-docs.min.js"></script>
    <script src="/assets/js/vendor/ajax-form.js"></script>
    <script src="/assets/js/plugins/slick.min.js"></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>
