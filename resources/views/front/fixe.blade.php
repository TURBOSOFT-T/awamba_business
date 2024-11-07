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

    <!-- Bootstrap CSS -->





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

    <meta name="csrf-token" content="{{ csrf_token() }}">




    <link rel="stylesheet" href="/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="{{ asset('css/styles.cs s') }}">

    <link href="/assets/css/styles.css" rel="stylesheet">
    <script src="/Script.js"></script>

    @yield('SEO')
</head>

<body>


    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <div class="page-container">
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

            <div id="axil-sticky-placeholder"></div>
            <div class="axil-mainmenu">
                <div class="container">
                    <div class="header-navbar">
                        <div class="header-brand">
                            <a class="nav-brand" href="{{ route('home') }}">

                                <img src="{{ Storage::url($config->logo ?? ' ') }}" alt="Logo" />
                            </a>

                            <style>
                                .nav-brand {
                                    display: flex;
                                    align-items: center;
                                    text-decoration: none;
                                    padding: 0px;
                                }

                                /* Style pour l'image du logo */
                                .nav-brand img {
                                    height: 90px;
                                    width: 80px;
                                    object-fit: contain;
                                    transition: transform 0.3s ease;
                                    margin-top: -11px;
                                }

                                @media (max-width: 768px) {
                                    .nav-brand img {
                                        height: 100px;
                                        width: 100px;
                                        margin-top: 30;
                                        padding: 10;
                                        margin-left: 20px;



                                    }
                                }

                                .menu-toggle {
                                    display: none;
                                    font-size: 2em;
                                    cursor: pointer;
                                    margin-left: auto;
                                }

                                /* Effet de survol pour le logo */
                                .nav-brand:hover img {
                                    transform: scale(1.1);
                                }

                                /* Ajustements pour le logo dans différents contextes */
                                .navbar .nav-brand {
                                    padding: 5px;
                                }

                                .navbar .nav-brand img {
                                    max-height: 50px;
                                }

                            </style>
                            {{-- <a href="{{ route('home') }}" class="logo logo-light">
                            <img href="{{ Storage::url($config->logo ?? '') }}" alt="Site Logo">
                            </a> --}}
                        </div>
                        <div class="header-main-nav">

                            <nav class="mainmenu-nav">
                                <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                                <div class="mobile-nav-brand">
                                    <a href="{{ route('home') }}" class="logo">
                                        <img href="{{ Storage::url($config->logo ?? '') }}" alt="Site Logo">
                                    </a>
                                </div>
                                <ul class="mainmenu">
                                    <li><a href="{{ route('home') }}">{{ __('accueil') }}</a>

                                    </li>


                                    <li><a href="{{ route('shop') }}">{{ __('boutique') }}</a></li>
                                    </li class="menu-item">
                                    <li><a href="{{ route('about') }}">
                                            {{ \App\Helpers\TranslationHelper::TranslateText('A propos de nous') }}
                                        </a></li>



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

                        </div>
                        <div class="header-action">
                            <ul class="action-list">
                                <li class="axil-search d-xl-block d-none">
                                    <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="{{ \App\Helpers\TranslationHelper::TranslateText("Rechercher produit") }}" autocomplete="off">
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
                                    <a href="{{ route('favories') }}">
                                        <i class="flaticon-heart"></i>
                                    </a>
                                </li>
                                <li class="shopping-cart">
                                    <a href="#" class="cart-dropdown-btn">
                                        <span class="cart-count" id="count-panier-span">00</span>
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
                                                <a href="{{ route('account') }}">Mon compte</a>
                                            </li>

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
            {{--
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
        </div> --}}
        </header>

        <main>



            @yield('body')




        </main>





        <style>
            .page-container {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                /* Ensure it takes up full viewport height */
            }

            main {
                flex: 1;
                /* Fills the remaining space, pushing footer down */
            }

            .footer {
                background-color: #111;
                color: #fff;
                padding: 40px 0;
                font-size: 14px;
            }

            .footer .footer-title,
            .footer p {
                font-size: 16px;
                font-weight: bold;
                color: #fff;
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

            .footer .input-group {
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
                border: none;
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
                    <div class="col-md-3 mb-3">
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
                    <div class="col-md-3 mb-3">
                        <h6 class="footer-title">Support</h6>
                        <p>111 Bijoy sarani, Dhaka, DH 1515, Bangladesh.</p>
                        <p>exclusive@gmail.com</p>
                        <p>+88015-88888-9999</p>
                    </div>

                    <!-- Compte Section -->
                    <div class="col-md-2 mb-3">
                        <h6 class="footer-title">Compte</h6>
                        <a href="#">Mon Compte</a>
                        <a href="/login">Se connecter / S'inscrire</a>
                        <a href="#">Panier</a>
                        <a href="#">Favoris</a>
                        <a href="#">Boutique</a>
                    </div>

                    <!-- Quick Link Section -->
                    <div class="col-md-2 mb-3">
                        <h6 class="footer-title">Quick Link</h6>
                        <a href="#">Confidentialité</a>
                        <a href="/conditions">Conditions</a>
                        <a href="/contact">Contacts</a>
                    </div>

                    <!-- Download App Section -->
                    <div class="col-md-2 mb-3">
                        <h6 class="footer-title">Download App</h6>

                        <div class="d-flex gap-4">
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

            </div>
            <hr class='border-2 border-top mt-4' />
            <div class="col-md-12 copy mt-1 ">

                <p class="mb-0" style="font-size: 1.1rem;">
                    &copy; {{ date('Y') }} | Developed By:
                    <a href="https://turbosoft-techno.com" target="_blank" style="color: #c71f17 !important; font-size: 0.9rem;">
                        TURBOSOFT
                    </a>
                </p>

                {{-- Copyright awamba {{ date('Y') }}. Designd By
                <a href="https://turbosoft-techno.com" style="color: #dc3545">
                    TURBOSOFT
                </a> --}}
            </div>
        </footer>
    </div>
    <!-- Product Quick View Modal Start -->

    @if ($produits)
    @foreach ($produits as $key => $produit)
    <div class="modal fade quick-view-product" id="{{ $produit->id }}" {{-- id="quick-view-modal" --}} tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">

                            <div class="col-12 col-md-6">
                                <div class="product-detail__slide-two">
                                    <style>
                                        .product-detail__slide-two__big {
                                            position: relative;
                                            overflow: hidden;
                                        }
    
                                        .product-detail__slide-two__big .slider__item img {
                                            transition: transform 0.3s ease;
                                        }
    
                                        .product-detail__slide-two__big .slider__item:hover img {
                                            transform: scale(1.2);
                                            /* Ajustez le facteur de zoom ici */
                                        }
    
                                    </style>
    
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var zoom = new Zoom({
                                                selector: '.product-detail__slide-two__big img'
                                                , zoom: 2, // Facteur de zoom
                                                width: 300, // Largeur de l'image zoomée
                                                height: 300 // Hauteur de l'image zoomée
                                            });
                                        });
    
                                    </script>
    
                                    <div class="product-detail__slide-two__big">
                                        <div class="slider__item">
                                            <img id="mainImage" src="{{ Storage::url($produit->photo) }}" width="200 " height="200 " border-radius="8px" alt="Product image" />
    
    
                                            <div class="top-left">
                                                @if ($produit->inPromotion())
                                                <span class="badge rounded-pill text-bg-danger">
                                                    <div class="product-type">
                                                        <h5 class="-sale">
                                                            -{{ $produit->inPromotion()->pourcentage }}%
                                                        </h5>
                                                    </div>
    
                                                </span>
                                                @endif
                                            </div>
    
                                        </div>
                                    </div>
    
                                    <div class="product-detail__slide-two__small" style="display: flex; gap: 10px; margin-top: 10px;">
    
                                        @foreach (json_decode($produit->photos) ?? [] as $image)
                                        <div class="slider__item">
                                            <img onclick="changeMainImage('{{ Storage::url($image) }}')" src="{{ Storage::url($image) }}" width="100" height="100" style="border-radius: 8px;" alt="Additional product image" />
                                        </div>
                                        @endforeach
                                    </div>
                                    <script>
                                        function changeMainImage(imageUrl) {
                                            document.getElementById('mainImage').src = imageUrl;
                                        }
    
                                    </script>
    
                                </div>
                            </div>
                            {{-- <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            <div class="thumbnail">
                                                <img id="mainImage" src="{{ Storage::url($produit->photo) }}"  alt="Product Images">
                                                @if ($produit->inPromotion())
                                                <div class="label-block label-right">
                                                    <div class="product-badget">-{{ $produit->inPromotion()->pourcentage }}%</div>
                                                </div>
                                                @endif
                                                <div class="product-quick-view position-view">
                                                    <a id="mainImage"  src="{{ Storage::url($produit->photo) }}"  class="popup-zoom">
                                                        <i class="far fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                          
                                           
                                        </div>
                                    </div>

                                    <script>
                                        function changeMainImage(imageUrl) {
                                            document.getElementById('mainImage').src = imageUrl;
                                        }
                                    </script>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb small-thumb-wrapper">
                                            @foreach (json_decode($produit->photos) ?? [] as $image)
                                            <div class="small-thumb-img">
                                                <img onclick="changeMainImage('{{ Storage::url($image) }}')" src="{{ Storage::url($image) }}"  alt="thumb image">
                                            </div>
                                           @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
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
                                        <h3 class="product-title">{{ \App\Helpers\TranslationHelper::TranslateText($produit->nom) }}</h3>
                                        <span class="price-amount">
                                            @if ($produit->inPromotion())
                                            <span class=" small">
                                                - {{ $produit->inPromotion()->pourcentage }} %
                                            </span>
                                            <b class="text-success">
                                                {{ $produit->getPrice() }} DT
                                            </b>
                                            <br>
                                            <strike>
                                                <span class="text-danger small">
                                                    {{ $produit->prix }} DT
                                                </span>
                                            </strike>
                                            @else
                                            {{ $produit->getPrice() }} DT
                                            @endif
                                        </span>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>
                                                <span class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm">
                                                    @if ($produit->stock > 0)
                                                    <label class="badge bg-success">
                                                        {{ __('stock_disponible') }}
                                                    </label>
                                                    @else
                                                    <label class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm">

                                                        {{ __('non_disponible') }}
                                                    </label>
                                                    @endif
                                                </span>
                                            </li>
                                            <li><i class="fal fa-check"></i>
                                                {{ \App\Helpers\TranslationHelper::TranslateText("Categorie") }}:

                                                {{ \App\Helpers\TranslationHelper::TranslateText($produit->categories->nom) }}
                                            </li>
                                            {{-- <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li> --}}
                                        </ul>
                                        <p class="description"> {!! \App\Helpers\TranslationHelper::TranslateText($produit->description) !!}</p>

                                        <div class="product-variations-wrapper">

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title"> {{ \App\Helpers\TranslationHelper::TranslateText("Couleur") }}(s):</h6>
                                                <div class="color-variant-wrapper">
                                                    <ul class="color-variant mt--0">
                                                        @foreach ($produit->couleur ?? [] as $key => $value)
                                                
                                                        <li class="color-extra-01 active">
                                                            <input class="form-check-input" type="radio" name="couleur" id="couleur">
                                                            <span>
                                                                <span class="color"  style="background-color: {{ $value }} ;color:{{ $value }};">

                                                                </span>
                                                            </span>
                                                        </li>


                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                         
                                            <!-- End Product Variation  -->

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title"> {{ \App\Helpers\TranslationHelper::TranslateText("Taille") }}(s):</h6>
                                                <ul class="range-variant">

                  
                                                    @foreach ($produit->tailles ?? [] as $index => $taille)
                                                    <li>
                                                        <input type="radio" class="form-check-input" name="taille" value="{{ $taille }}"
                                                                   id="taille-{{ $produit->id }}-{{ $index }}">
                                                            <label class="form-option-label" for="taille-{{ $produit->id }}-{{ $index }}">{{ $taille->nom }}</label>
                                                
                                                    </li>
                                                    
                                                    @endforeach 
                                                </ul>
                                            </div>
                                            <!-- End Product Variation  -->

                                        </div>

                                      

                                        <!-- Start Product Action Wrapper  -->
                                        <div class="product-action-wrapper d-flex-center">
                                            <!-- Start Quentity Action  -->
                                            
                                            <div class="pro-qty">
                                                <span class="quantity-control minus"></span>
                                                <input type="number" class="input-text qty text" name="quantite"
                                                    value="1" id="qte-{{ $produit->id }}" autocomplete="off">
                                                <span class="quantity-control plus"></span>
                                        
                                        
                                               
                                            </div>
                                            <!-- End Quentity Action  -->

                                            <!-- Start Product Action  -->
                                            <ul class="product-action d-flex-center mb--0">
                                                <li class="add-to-cart"><a  onclick="AddToCart( {{ $produit->id }} )" class="axil-btn btn-bg-primary"> {{ \App\Helpers\TranslationHelper::TranslateText("Ajouter au panier") }}</a></li>
                                                @if (Auth()->user())
                                               
                                                <li class="wishlist"><a onclick="AddFavoris({{ $produit->id }})" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                           @endif
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
    @endforeach
    @endif

    <!-- Product Quick View Modal End -->

    <!-- Header Search Modal End -->

    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form role="search" action="{{ url('search') }}" method="get">
                    <div class="input-group">
                        <input value="{{ $nom ?? '' }}" class="form-control" id="search" type="search" name="search" placeholder="{{ \App\Helpers\TranslationHelper::TranslateText("Rechercher produit") }}">

                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title"></h6>
                    <a href="{{ route('shop') }}" class="view-all">{{ \App\Helpers\TranslationHelper::TranslateText("Voir tout") }}</a>
                </div>
                <div class="psearch-results">
                    @if (isset($searchproducts))
                    @foreach ($searchproducts as $produit)
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                <img width="100" height="100" src="{{ Storage::url($produit->photo) }}" alt="Yantiti Leather Bags">
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
                            <h6 class="product-title"><a href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a>
                            </h6>

                            <div class="product-price-variant">
                                @if ($produit->inPromotion())
                                <span class="price current-price"><b class="text-success" style="color: #4169E1">
                                        {{ $produit->getPrice() }} DT
                                    </b></span>
                                <span class="price old-price">
                                    <span class="price old-price" style="position: relative; font-size: 1.2rem; color: #dc3545; font-weight: bold;">
                                        {{ $produit->prix }} DT
                                        <span style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: black;"></span>
                                    </span>
                                </span>
                                @else
                                {{ $produit->getPrice() }}DT
                                @endif

                            </div>
                            <div class="product-cart">
                                <a onclick="AddToCart( {{ $produit->id }} )" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                @if (Auth()->user())
                                <a onclick="AddFavoris({{ $produit->id }})" class="cart-btn"><i class="fal fa-heart"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>



    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title"> {{ \App\Helpers\TranslationHelper::TranslateText('Mon Panier') }}</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list" id="list_content_panier">

                    {{-- <div class="cart-item row" id="list_content_panier">

                    </div> --}}


                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount" id="montant_total_panier">00</span>
                </h3>
                <div class="group-btn">
                    <a href="{{ route('cart') }}" class="axil-btn btn-bg-primary viewcart-btn">{{ \App\Helpers\TranslationHelper::TranslateText('Voir Panier') }}</a>
                    <a href="{{ url('/commander') }}" class="axil-btn btn-bg-secondary checkout-btn">{{ \App\Helpers\TranslationHelper::TranslateText('Passer votre commande') }}</a>
                </div>
            </div>
        </div>
    </div>




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


    <script src="/assets/js/main.js"></script>

</body>

</html>
