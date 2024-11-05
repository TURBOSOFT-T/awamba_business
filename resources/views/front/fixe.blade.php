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

    <title>AWAMBA</title>


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->


    <link rel="icon" href="{{ Storage::url($config->icon ?? '') }}" type="image/png" />


    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/sal.css">
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/base.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">




    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <link href="/assets/css/styles.css" rel="stylesheet">
    <script src="/Script.js"></script>

    @yield('SEO')
</head>

<body>

    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <header class="header axil-header header-style-5">
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="header-top-dropdown">
                            <div class="dropdown">
                                <form action="{{ route('locale.change') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ app()->getLocale() == 'fr' ? 'Français' : 'English' }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <button type="submit" name="locale" value="fr" class="dropdown-item">
                                            <img src="https://img.icons8.com/color/20/france-circular.png" alt="fr">
                                            Français
                                        </button>
                                        <button type="submit" name="locale" value="en" class="dropdown-item">
                                            <img src="https://img.icons8.com/color/20/great-britain-circular.png" alt="en">
                                            English
                                        </button>

                                    </ul>
                                </form>
                            </div>
                            <div class="dropdown">
                               {{--  <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    USD
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">USD</a></li>
                                    <li><a class="dropdown-item" href="#">AUD</a></li>
                                    <li><a class="dropdown-item" href="#">EUR</a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="header-top-link">
                            <ul class="quick-link">
                                <li><a href="#">Help</a></li>
                                <li><a href="sign-up.html">Join Us</a></li>
                                <li><a href="sign-in.html">Sign In</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <a href="index.html" class="logo logo-dark">
                            <img src="assets/images/logo/logo.png" alt="Site Logo">
                        </a>
                        <a href="index.html" class="logo logo-light">
                            <img src="assets/images/logo/logo-light.png" alt="Site Logo">
                        </a>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.html" class="logo">
                                    <img src="assets/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="{{ route('home') }}">{{ __('accueil') }}</a>

                                </li>


                                <li><a href="{{ route('shop') }}">{{ __('boutique') }}</a></li>


                                <li><a href="{{ route('contact') }}">Contact</a></li>

                                
                                @guest
                                @else
                                @if (auth()->user()->role != 'client')
                                <li><a href="{{ url('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                                </li>
                                @endif





                                @endguest
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-xl-block d-none">
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for?" autocomplete="off">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </button>
                            </li>
                            <li class="axil-search d-xl-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="wishlist">
                                <a href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <span class="cart-count">3</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>

                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="far fa-user"></i>
                                </a>
                                <div class="my-account-dropdown">

                                    @if (Auth()->user())
                                    <ul>
                                        @if (auth()->user()->role != 'client')
                                        <li><a href="{{ url('dashboard') }}">Dashboard</a>
                                        </li>
                                        @endif
                                   
                                        <li>
                                            <a href="{{ route('favories') }}">Mes favoris</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cart') }}">Mon panier</a>
                                        </li>
                                        <li>

                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>




                                    </ul>
                                    @else
                                    <div class="login-btn">
                                        <a href="{{ url('login') }}" class="axil-btn btn-bg-primary">Connexion</a>
                                    </div>

                                    <div class="reg-footer text-center">Pas de compte? <a href="{{ url('register') }}" class="btn-link">S'inscrire ici.</a>
                                    </div>
                                    @endif

                                </div>
                            </li>
                           
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
        <div class="header-top-campaign">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-10">
                        <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                            <div class="slick-slide">
                                <div class="campaign-content">
                                    <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                                </div>
                            </div>
                            <div class="slick-slide">
                                <div class="campaign-content">
                                    <p>STUDENT NOW GET 10% OFF : <a href="#">GET OFFER</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
  {{--  
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    
    <header class="header axil-header header-style-2">
        <div class="header-top-campaign">
            <div class="container position-relative">
                <div class="campaign-content">
                    <div class="campaign-countdown"></div>
                    <p>Open Doors To A World Of Fashion Get <a href="#">Get Your Offer</a></p>
                </div>
            </div>
            <button class="remove-campaign"><i class="fal fa-times"></i></button>
        </div>
    
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-3 col-5">
                        <div class="header-brand">
                            <a href="index.html" class="logo logo-dark">
                                <img src="assets/images/logo/logo.png" alt="Site Logo">
                            </a>
                            <a href="index.html" class="logo logo-light">
                                <img src="assets/images/logo/logo-light.png" alt="Site Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9 col-7">
                        <div class="header-top-dropdown dropdown-box-style">
                            <div class="axil-search">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="far fa-search"></i>
                                </button>
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for...." autocomplete="off">
                            </div>
                            <div class="dropdown">
                            
                            </div>
                            <div class="dropdown">

                                <form action="{{ route('locale.change') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ app()->getLocale() == 'fr' ? 'Français' : 'English' }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <button type="submit" name="locale" value="fr" class="dropdown-item">
                                            <img src="https://img.icons8.com/color/20/france-circular.png" alt="fr">
                                            Français
                                        </button>
                                        <button type="submit" name="locale" value="en" class="dropdown-item">
                                            <img src="https://img.icons8.com/color/20/great-britain-circular.png" alt="en">
                                            English
                                        </button>

                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        <div class="axil-mainmenu aside-category-menu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-nav-department">
                         <aside class="header-department">
                            <button class="header-department-text department-title">
                                <span class="icon"><i class="fal fa-bars"></i></span>
                                <span class="text">Categories</span>
                            </button>
                            <nav class="department-nav-menu">
                                <button class="sidebar-close"><i class="fas fa-times"></i></button>
                                <ul class="nav-menu-list">
                                    <li>
                                        <a href="#" class="nav-link has-megamenu">
                                            <span class="menu-icon"><img src="./assets/images/product/categories/cat-01.png" alt="Department"></span>
                                            <span class="menu-text">Fashion</span>
                                        </a>
                                        <div class="department-megamenu">
                                            <div class="department-megamenu-wrap">
                                                <div class="department-submenu-wrap">
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Men</h3>
                                                        <ul>
                                                            <li><a href="shop.html">T-shirts</a></li>
                                                            <li><a href="shop-sidebar.html">Shirts</a></li>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                        </ul>
                                                        <h3 class="submenu-heading">Baby</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Baby Cloths</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Gear</a></li>
                                                            <li><a href="shop.html">Baby Toddler</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Toys</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Women</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                            <li><a href="shop-sidebar.html">T-shirts</a></li>
                                                            <li><a href="shop.html">Shirts</a></li>
                                                            <li><a href="shop.html">Tops</a></li>
                                                            <li><a href="shop-sidebar.html">Jumpsuits</a></li>
                                                            <li><a href="shop.html">Coats</a></li>
                                                            <li><a href="shop-sidebar.html">Sweater</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Accessories</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Handbag</a></li>
                                                            <li><a href="shop.html">Shoes</a></li>
                                                            <li><a href="shop.html">Wallets</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="featured-product">
                                                    <h3 class="featured-heading">Featured</h3>
                                                    <div class="product-list">
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature1.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature2.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature3.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature4.png" alt="Featured Product"></a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="axil-btn btn-bg-primary">See All Offers</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link has-megamenu">
                                            <span class="menu-icon"><img src="./assets/images/product/categories/cat-02.png" alt="Department"></span>
                                            <span class="menu-text">Electronics</span>
                                        </a>
                                        <div class="department-megamenu">
                                            <div class="department-megamenu-wrap">
                                                <div class="department-submenu-wrap">
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Men</h3>
                                                        <ul>
                                                            <li><a href="shop.html">T-shirts</a></li>
                                                            <li><a href="shop-sidebar.html">Shirts</a></li>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                        </ul>
                                                        <h3 class="submenu-heading">Baby</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Baby Cloths</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Gear</a></li>
                                                            <li><a href="shop.html">Baby Toddler</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Toys</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Women</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                            <li><a href="shop-sidebar.html">T-shirts</a></li>
                                                            <li><a href="shop.html">Shirts</a></li>
                                                            <li><a href="shop.html">Tops</a></li>
                                                            <li><a href="shop-sidebar.html">Jumpsuits</a></li>
                                                            <li><a href="shop.html">Coats</a></li>
                                                            <li><a href="shop-sidebar.html">Sweater</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Accessories</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Handbag</a></li>
                                                            <li><a href="shop.html">Shoes</a></li>
                                                            <li><a href="shop.html">Wallets</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="featured-product">
                                                    <h3 class="featured-heading">Featured</h3>
                                                    <div class="product-list">
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature1.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature2.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature3.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature4.png" alt="Featured Product"></a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="axil-btn btn-bg-primary">See All Offers</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link has-megamenu">
                                            <span class="menu-icon"><img src="./assets/images/product/categories/cat-03.png" alt="Department"></span>
                                            <span class="menu-text">Home Decor</span>
                                        </a>
                                        <div class="department-megamenu">
                                            <div class="department-megamenu-wrap">
                                                <div class="department-submenu-wrap">
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Men</h3>
                                                        <ul>
                                                            <li><a href="shop.html">T-shirts</a></li>
                                                            <li><a href="shop-sidebar.html">Shirts</a></li>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                        </ul>
                                                        <h3 class="submenu-heading">Baby</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Baby Cloths</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Gear</a></li>
                                                            <li><a href="shop.html">Baby Toddler</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Toys</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Women</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Jeans</a></li>
                                                            <li><a href="shop-sidebar.html">T-shirts</a></li>
                                                            <li><a href="shop.html">Shirts</a></li>
                                                            <li><a href="shop.html">Tops</a></li>
                                                            <li><a href="shop-sidebar.html">Jumpsuits</a></li>
                                                            <li><a href="shop.html">Coats</a></li>
                                                            <li><a href="shop-sidebar.html">Sweater</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="department-submenu">
                                                        <h3 class="submenu-heading">Accessories</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Handbag</a></li>
                                                            <li><a href="shop.html">Shoes</a></li>
                                                            <li><a href="shop.html">Wallets</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="featured-product">
                                                    <h3 class="featured-heading">Featured</h3>
                                                    <div class="product-list">
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature1.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature2.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature3.png" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="./assets/images/product/product-feature4.png" alt="Featured Product"></a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="axil-btn btn-bg-primary">See All Offers</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link">
                                            <span class="menu-icon"><img src="./assets/images/product/categories/cat-04.png" alt="Department"></span>
                                            <span class="menu-text">Medicine</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link">
                                            <span class="menu-icon"><img src="./assets/images/product/categories/cat-05.png" alt="Department"></span>
                                            <span class="menu-text">Furniture</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link">
                                            <span class="menu-icon"><img src="./assets/images/product/categories/cat-06.png" alt="Department"></span>
                                            <span class="menu-text">Crafts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link">
                                            <span class="menu-icon"><img src="./assets/images/product/categories/cat-07.png" alt="Department"></span>
                                            <span class="menu-text">Accessories</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link">
                                            <span class="menu-icon"><img src="./assets/images/product/categories/cat-08.png" alt="Department"></span>
                                            <span class="menu-text">Camera</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </aside> 

                        
                        
                    </div>

                    
                    <div class="header-main-nav">
                       
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.html" class="logo">
                                    <img src="assets/images/logo/logo.png" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="{{ route('home') }}">{{ __('accueil') }}</a>

                                </li>


                                <li><a href="{{ route('shop') }}">{{ __('boutique') }}</a></li>


                                <li><a href="{{ route('contact') }}">Contact</a></li>

                                @if (auth()->user())
                                <li> <a href="{{ route('comptes') }}">

                                        {{ __('compte') }}
                                    </a>
                                    @endif
                                </li>
                                @guest
                                @else
                                @if (auth()->user()->role != 'client')
                                <li><a href="{{ url('dashboard') }}" class="nav-item nav-link">Dashboard</a>
                                </li>
                                @endif





                                @endguest

                            </ul>
                        </nav>
                      
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-sm-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="wishlist">
                                <a href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <span class="cart-count">3</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="far fa-user"></i>
                                </a>
                                <div class="my-account-dropdown">

                                    @if (Auth()->user())
                                    <ul>
                                        @if (auth()->user()->role != 'client')
                                        <li><a href="{{ url('dashboard') }}">Dashboard</a>
                                        </li>
                                        @endif
                                   
                                        <li>
                                            <a href="{{ route('favories') }}">Mes favoris</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cart') }}">Mon panier</a>
                                        </li>
                                        <li>

                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>




                                    </ul>
                                    @else
                                    <div class="login-btn">
                                        <a href="{{ url('login') }}" class="axil-btn btn-bg-primary">Connexion</a>
                                    </div>

                                    <div class="reg-footer text-center">Pas de compte? <a href="{{ url('register') }}" class="btn-link">S'inscrire ici.</a>
                                    </div>
                                    @endif

                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      
    </header>

 --}}
    <main>



        @yield('body')




    </main>

    <div class="service-area">
        <div class="container">
            <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="./assets/images/icons/service1.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                            <p>Tell about your service.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="./assets/images/icons/service2.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Money Back Guarantee</h6>
                            <p>Within 10 days.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="./assets/images/icons/service3.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">24 Hour Return Policy</h6>
                            <p>No question ask.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="./assets/images/icons/service4.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Pro Quality Support</h6>
                            <p>24/7 Live support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<style>
        /* Custom CSS for footer */
        .footer {
            background-color: #111;
            color: #fff;
            padding: 40px 0;
            font-size: 14px;
        }
        .footer .footer-title, .footer p {
            font-size: 16px;
            font-weight: bold;
			color:#fff;
            margin-bottom: 15px;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        .footer a:hover {
            color: #ccc;
        }
		.footer .input-group{
			background-color: #212121;
            border: 1px solid #ffffff;
            border-radius: 4px;
            color: #ffffff;
            font-size: 14px;
            padding: 2px 0px;
            text-align: center;
            text-decoration: none;
            display: flex;
            cursor: pointer;
		}
        .footer .input-group .form-control {
            background-color: transparent;
            color: #fff;
            border: none;
        }
		.footer .input-group .form-control:focus {
    outline: none;
    box-shadow: none;
    border-color: transparent;
}

        .footer .input-group-text {
            background-color: transparent;
			border:none;
            color: #fff;
            cursor: pointer;
        }
        .footer .social-icons a {
            color: #fff;
            margin-inline: 10px 10px;
            font-size: 18px;
        }
        .footer .app-links a {
            width: 150px;
            margin-top: 10px;
        }
        .footer .qr-code {
            width: 100px;
            margin-top: 10px;
        }
        .footer .copy {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
		
	
    </style>
	<!-- Footer Section -->
<footer class="footer">
    <div class="container-fuild" style="margin-inline:40px 40px">
        <div class="row">
            <!-- Exclusif Section -->
            <div class="col-md-3">
                <h6 class="footer-title">Exclusif</h6>
                <p>S'abonner</p>
                <p>Bénéficiez de 10€ de réduction sur votre première commande</p>
				 
                 <div class="input-group w-75">
                    <input type="email" class="form-control" placeholder="Entrez votre Email">
                    <span class="input-group-text">
                        <i class="far fa-send fa-2x"></i>
                    </span>
                </div>
            </div>

            <!-- Support Section -->
            <div class="col-md-3">
                <h6 class="footer-title">Support</h6>
                <p>111 Bijoy sarani, Dhaka, DH 1515, Bangladesh.</p>
                <p>exclusive@gmail.com</p>
                <p>+88015-88888-9999</p>
            </div>

            <!-- Compte Section -->
            <div class="col-md-2">
                <h6 class="footer-title">Compte</h6>
                <a href="#">Mon Compte</a>
                <a href="#">Se connecter / S'inscrire</a>
                <a href="#">Panier</a>
                <a href="#">Favoris</a>
                <a href="#">Boutique</a>
            </div>

            <!-- Quick Link Section -->
            <div class="col-md-2">
                <h6 class="footer-title">Quick Link</h6>
                <a href="#">Confidentialité</a>
                <a href="#">Conditions</a>
                <a href="#">Contacts</a>
            </div>

            <!-- Download App Section -->
            <div class="col-md-2">
                <h6 class="footer-title">Download App</h6>
				 
                <div class="d-flex gap-4" >
				<img src="assets/images/others/qr.png" alt="QR Code" class="qr-code">
                <div class="app-links">
				<a href="#"><img src="assets/images/others/play-store.png" alt="Google Play"></a>
                <a href="#"><img src="assets/images/others/app-store.png" alt="App Store"></a>
                </div>
				</div>
                <div class="social-icons d-flex flex-wrap mt-3">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="copy mt-4">
            &copy; Copyright Rimel 2022. All rights reserved
        </div>
    </div>
</footer>
   
    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-01.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-01.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-02.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-02.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="thumbnail">
                                                <img src="assets/images/product/product-big-03.png" alt="Product Images">
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-quick-view position-view">
                                                    <a href="assets/images/product/product-big-03.png" class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-08.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-07.png" alt="thumb image">
                                            </div>
                                            <div class="small-thumb-img">
                                                <img src="assets/images/product/product-thumb/thumb-09.png" alt="thumb image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="assets/images/icons/rate.png" alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">Serif Coffee Table</h3>
                                        <span class="price-amount">$155.00 - $255.00</span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                        </ul>
                                        <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi pretium. Integer ante est, elementum eget magna. Pellentesque sagittis dictum libero, eu dignissim tellus.</p>

                                        <div class="product-variations-wrapper">

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Colors:</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-02"><span><span class="color"></span></span>
                                                        </li>
                                                        <li class="color-extra-03"><span><span class="color"></span></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Product Variation  -->

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">Size:</h6>
                                                <ul class="range-variant">
                                                    <li>xs</li>
                                                    <li>s</li>
                                                    <li>m</li>
                                                    <li>l</li>
                                                    <li>xl</li>
                                                </ul>
                                            </div>
                                            <!-- End Product Variation  -->

                                        </div>

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                            <!-- End Product Action  -->

                                        </div>
                                        <!-- End Product Action Wrapper  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control" name="prod-search" id="prod-search" placeholder="Write Something....">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title">24 Result Found</h6>
                    <a href="shop.html" class="view-all">View All</a>
                </div>
                <div class="psearch-results">
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="./assets/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="./assets/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fal fa-star"></i>
                                </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->



    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Cart review</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list">
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product.html"><img src="assets/images/product/electric/product-01.png" alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(64)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product-3.html">Wireless PS Handler</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>155.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="15">
                            </div>
                        </div>
                    </li>
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product-2.html"><img src="assets/images/product/electric/product-02.png" alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(4)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product-2.html">Gradient Light Keyboard</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>255.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="5">
                            </div>
                        </div>
                    </li>
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product-3.html"><img src="assets/images/product/electric/product-03.png" alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(6)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product.html">HD CC Camera</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>200.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="100">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount">$610.00</span>
                </h3>
                <div class="group-btn">
                    <a href="cart.html" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                    <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="assets/js/vendor/sal.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="assets/js/vendor/counterup.js"></script>
    <script src="assets/js/vendor/waypoints.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

</html>
