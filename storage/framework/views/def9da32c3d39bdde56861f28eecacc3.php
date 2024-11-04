<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$config = DB::table('configs')->first();
$service = DB::table('services')->get();
$produit = DB::table('produits')->get();
?>
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


    <link rel="icon" href="<?php echo e(Storage::url($config->icon ?? '')); ?>" type="image/png" />


    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="/assets/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick.css">
    <link rel="stylesheet" href="/assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="/assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/sal.css">
    <link rel="stylesheet" href="/assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/vendor/base.css">
    <link rel="stylesheet" href="/assets/css/style.min.css">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">




    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <link href="/assets/css/styles.css" rel="stylesheet">
    <script src="/Script.js"></script>



    <?php echo $__env->yieldContent('SEO'); ?>
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
                                <form action="<?php echo e(route('locale.change')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo e(app()->getLocale() == 'fr' ? 'Français' : 'English'); ?>

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
                                <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('accueil')); ?></a>

                                </li>


                                <li><a href="<?php echo e(route('shop')); ?>"><?php echo e(__('boutique')); ?></a></li>
                            </li class="menu-item">
                            <li><a href="<?php echo e(route('about')); ?>">
                                <?php echo e(\App\Helpers\TranslationHelper::TranslateText('A propos de nous')); ?>    
                            </a></li>
            


                                <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>

                                
                                <?php if(auth()->guard()->guest()): ?>
                                <?php else: ?>
                                <?php if(auth()->user()->role != 'client'): ?>
                                <li><a href="<?php echo e(url('dashboard')); ?>" class="nav-item nav-link">Dashboard</a>
                                </li>
                                <?php endif; ?>





                                <?php endif; ?>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-xl-block d-none">
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="<?php echo e(\App\Helpers\TranslationHelper::TranslateText("Rechercher produit")); ?>" autocomplete="off">
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
                                <a  href="<?php echo e(route('favories')); ?>">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <span class="cart-count"  id="count-panier-span">00</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>

                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="far fa-user"></i>
                                </a>
                                <div class="my-account-dropdown">

                                    <?php if(Auth()->user()): ?>
                                    <ul>
                                        <?php if(auth()->user()->role != 'client'): ?>
                                        <li><a href="<?php echo e(url('dashboard')); ?>">Dashboard</a>
                                        </li>
                                        <?php endif; ?>
                                         <li>
                                    <a href="<?php echo e(route('account')); ?>">Mon compte</a>
                                </li>
                                   
                                        <li>
                                            <a href="<?php echo e(route('favories')); ?>">Mes favoris</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('cart')); ?>">Mon panier</a>
                                        </li>
                                        <li>

                                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();   document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>




                                    </ul>
                                    <?php else: ?>
                                    <div class="login-btn">
                                        <a href="<?php echo e(url('login')); ?>" class="axil-btn btn-bg-primary">Connexion</a>
                                    </div>

                                    <div class="reg-footer text-center">Pas de compte? <a href="<?php echo e(url('register')); ?>" class="btn-link">S'inscrire ici.</a>
                                    </div>
                                    <?php endif; ?>

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
 
    <main>



        <?php echo $__env->yieldContent('body'); ?>




    </main>

    <!-- <div class="service-area">
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
    </div> -->
    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-2">
    
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
    
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Support</h5>
                            <!-- <div class="logo mb--30">
                                <a href="index.html">
                                    <img class="light-logo" src="assets/images/logo/logo.png" alt="Logo Images">
                                </a>
                            </div> -->
                            <div class="inner">
                                <p>685 Market Street, <br>
                                    Las Vegas, LA 95820, <br>
                                    United States.
                                </p>
                                <ul class="support-list-item">
                                    <li><a href="mailto:example@domain.com"><i class="fal fa-envelope-open"></i> example@domain.com</a></li>
                                    <li><a href="tel:(+01)850-315-5862"><i class="fal fa-phone-alt"></i> (+01) 850-315-5862</a></li>
                                    <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Account</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="sign-up.html">Login / Register</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Quick Link</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="terms-of-service.html">Terms Of Use</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Download App</h5>
                            <div class="inner">
                                <span>Save $3 With App & New User only</span>
                                <div class="download-btn-group">
                                    <div class="qr-code">
                                        <img src="assets/images/others/qr.png" alt="Axilthemes">
                                    </div>
                                    <div class="app-link">
                                        <a href="#">
                                            <img src="assets/images/others/app-store.png" alt="App Store">
                                        </a>
                                        <a href="#">
                                            <img src="assets/images/others/play-store.png" alt="Play Store">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="social-share">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li>© 2024. All rights reserved by <a target="_blank" href="https://axilthemes.com/">Axilthemes</a>.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="assets/images/icons/cart/cart-1.png" alt="paypal cart"></li>
                                <li><img src="assets/images/icons/cart/cart-2.png" alt="paypal cart"></li>
                                <li><img src="assets/images/icons/cart/cart-5.png" alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- End Footer Area  -->

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

     <!-- Header Search Modal End -->
     <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form role="search" action="<?php echo e(url('search')); ?>" method="get">
                    <div class="input-group">
                        <input value="<?php echo e($nom ?? ''); ?>" class="form-control" id="search" type="search" name="search" placeholder="<?php echo e(\App\Helpers\TranslationHelper::TranslateText("Rechercher produit")); ?>">

                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title"></h6>
                    <a href="<?php echo e(route('shop')); ?>" class="view-all"><?php echo e(\App\Helpers\TranslationHelper::TranslateText("Voir tout")); ?></a>
                </div>
                <div class="psearch-results">
                    <?php if(isset($searchproducts)): ?>
                    <?php $__currentLoopData = $searchproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="<?php echo e(route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))])); ?>">
                                <img width="100" height="100" src="<?php echo e(Storage::url($produit->photo)); ?>" alt="Yantiti Leather Bags">
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
                            <h6 class="product-title"><a href="<?php echo e(route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))])); ?>"><?php echo e($produit->nom); ?></a>
                            </h6>

                            <div class="product-price-variant">
                                <?php if($produit->inPromotion()): ?>
                                <span class="price current-price"><b class="text-success" style="color: #4169E1">
                                        <?php echo e($produit->getPrice()); ?> DT
                                    </b></span>
                                <span class="price old-price">
                                    <span class="price old-price" style="position: relative; font-size: 1.2rem; color: #dc3545; font-weight: bold;">
                                        <?php echo e($produit->prix); ?> DT
                                        <span style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: black;"></span>
                                    </span>
                                </span>
                                <?php else: ?>
                                <?php echo e($produit->getPrice()); ?>DT
                                <?php endif; ?>

                            </div>
                            <div class="product-cart">
                                <a onclick="AddToCart( <?php echo e($produit->id); ?> )" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <?php if(Auth()->user()): ?>
                                <a onclick="AddFavoris(<?php echo e($produit->id); ?>)" class="cart-btn"><i class="fal fa-heart"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
  


    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title"> <?php echo e(\App\Helpers\TranslationHelper::TranslateText('Mon Panier')); ?></h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list" id="list_content_panier">

                    


                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount" id="montant_total_panier">00</span>
                </h3>
                <div class="group-btn">
                    <a href="<?php echo e(route('cart')); ?>" class="axil-btn btn-bg-primary viewcart-btn"><?php echo e(\App\Helpers\TranslationHelper::TranslateText('Voir Panier')); ?></a>
                    <a href="<?php echo e(url('/commander')); ?>" class="axil-btn btn-bg-secondary checkout-btn"><?php echo e(\App\Helpers\TranslationHelper::TranslateText('Passer votre commande')); ?></a>
                </div>
            </div>
        </div>
    </div>




    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="/assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="/assets/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/assets/js/vendor/bootstrap.min.js"></script>
    <script src="/assets/js/vendor/slick.min.js"></script>
    <script src="/assets/js/vendor/js.cookie.js"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="/assets/js/vendor/jquery-ui.min.js"></script>
    <script src="/assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="/assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="/assets/js/vendor/sal.js"></script>
    <script src="/assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="/assets/js/vendor/isotope.pkgd.min.js"></script>
    <script src="/assets/js/vendor/counterup.js"></script>
    <script src="/assets/js/vendor/waypoints.min.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

</body>

</html>
<?php /**PATH D:\Ecom stage\awamba_business-main\resources\views/front/fixe.blade.php ENDPATH**/ ?>
