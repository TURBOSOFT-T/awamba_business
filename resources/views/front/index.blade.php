@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')

<main>
    @php
    $config = DB::table('configs')->first();
    $service = DB::table('services')->get();
    $produit = DB::table('produits')->get();
    @endphp

    <body>

    <div class="container-fluid d-flex">
    <!-- Barre latérale des catégories -->
    <div class="categories-sidebar">
        <ul class="categories-list">
            <li>Tendances Femmes</li>
            <li>Tendances Hommes</li>
            <li>Électroniques</li>
            <li>Médecine</li>
            <li>Maison & Plein Air</li>
            <li>Sports & Sortie</li>
            <li>Enfants & Jouets</li>
            <li>Cuisine & Aliments</li>
            <li>Santé & Beauté</li>
            <li>Entreprises & Industry</li>
            <li>Voitures & Motos</li>
            <li>Électroménager</li>
        </ul>
    </div>

    <!-- Slider principal -->
    <div class="main-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://png.pngtree.com/background/20230611/original/pngtree-black-iphone-with-an-app-overlay-on-it-picture-image_3166866.jpg" class="d-block w-100" alt="iPhone 14 Promo">
                    <div class="carousel-caption d-none d-md-block text-start">
                        <h3>iPhone 14 Series</h3>
                        <p>Remise de 10%</p>
                        <a href="#" class="btn btn-light">Acheter Maintenant <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Ajouter d'autres items du slider ici si nécessaire -->
            </div>
        </div>
    </div>
</div>




        <main class="main-wrapper">

        {{-- 
            <div class="axil-main-slider-area main-slider-style-5">
                <div class="container">
                    <div class="slider-box-wrap">
                        <div class="slider-activation-two axil-slick-dots">
                            @foreach ($banners as $key => $banner)
                            <div class="single-slide slick-slide">
                                <div class="main-slider-content">
                                    <span class="subtitle"><i class="fas fa-fire"></i> {{ \App\Helpers\TranslationHelper::TranslateText($banner->titre ?? ' ') }}</span>
                                    <h1 class="title">{{ \App\Helpers\TranslationHelper::TranslateText($banner->sous_titre ?? ' ') }}</h1>
                                    <div class="shop-btn">
                                        <a href="/shop" class="axil-btn btn-bg-white">{{ __('voir_boutique') }}<i class="fal fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                                <div class="main-slider-thumb">
                                    <img src="{{ Storage::url($banner->image) }}" alt="Product">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

       
            <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.slider-activation-two').slick({
                        infinite: true
                        , slidesToShow: 1
                        , slidesToScroll: 1
                        , autoplay: true
                        , autoplaySpeed: 2000
                        , dots: true
                        , arrows: true
                    });
                });

            </script>
 --}}



             <!-- Start Flash Sale Area  -->
             <div class="flash-sales-section container mt-5">
    <div class="header d-flex align-items-center justify-content-between">
        <div class="section-title">
            <span class="title-highlight"><i class="fas fa-calendar-day"></i> Aujourd'hui</span>
            <h2 class="title">Ventes Flash</h2>
        </div>
        <div class="countdown d-flex align-items-center">
            <div class="countdown-item">
                <span class="count">03</span>
                <p>Jours</p>
            </div>
            <span class="separator">:</span>
            <div class="countdown-item">
                <span class="count">23</span>
                <p>Heures</p>
            </div>
            <span class="separator">:</span>
            <div class="countdown-item">
                <span class="count">19</span>
                <p>Minutes</p>
            </div>
            <span class="separator">:</span>
            <div class="countdown-item">
                <span class="count">56</span>
                <p>Secondes</p>
            </div>
        </div>
    </div>

    <div class="products row mt-4">
        <!-- Carte de Produit 1 -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 1">
                    <div class="discount-badge">-40%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">HAVIT HV-G92 Manette</h5>
                    <div class="product-pricing">
                        <span class="current-price">15 000 XAF</span>
                        <span class="old-price">19 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(88)</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carte de Produit 2 -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton Voir Tous Les Produits -->
    <div class="text-center mt-4">
        <button class="btn-view-products">Voir Tous Les Produits</button>
    </div>
</div>





        <!-- End Flash Sale Area  -->

        <!-- Start Categorie Area  -->
        <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> {{ \App\Helpers\TranslationHelper::TranslateText("Categories") }}</span>
                    <h2 class="title">

                        {{ \App\Helpers\TranslationHelper::TranslateText("Parcourrir nos categories") }}
                    </h2>
                </div>
                <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">

                    @foreach ($categories as $category)
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                            <a href="/category/{{ $category->id }}" class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}">
                                <img class="img-fluid" src="{{ Storage::url($category->photo) }}" alt="product categorie">
                                <h6 class="cat-title">{{ $category->produits->count() }} Collections</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    @endforeach


                </div>
            </div>
            <div class="category-section container mt-5 position-relative">
   

    <div class="categories-wrapper position-relative">
        <!-- Flèche de retour -->
        <button class="arrow-btn prev-arrow">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="categories d-flex justify-content-between flex-wrap mt-4">
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <p class="category-label">Téléphones</p>
            </div>
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-desktop"></i>
                </div>
                <p class="category-label">Ordinateurs</p>
            </div>
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <p class="category-label">Montres</p>
            </div>
            <div class="category-card selected">
                <div class="category-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <p class="category-label">Caméra</p>
            </div>
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-music"></i>
                </div>
                <p class="category-label">Musique</p>
            </div>
            <div class="category-card">
                <div class="category-icon">
                    <i class="fas fa-gamepad"></i>
                </div>
                <p class="category-label">Jeux Vidéos</p>
            </div>
        </div>

        <!-- Flèche d'avance -->
                                <button class="arrow-btn next-arrow">
                            <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

        
        <!-- End Categorie Area  -->


        <div class="bestseller-section container mt-5">
    <!-- Section des produits les plus vendus -->
    <div class="header d-flex align-items-center justify-content-between">
        <div class="section-title">
            <span class="title-highlight"><i class="fas fa-calendar-alt"></i> Ce Mois</span>
            <h2 class="title">Produits Les Plus Vendus</h2>
        </div>
        <button class="btn-view-more">Voir plus</button>
    </div>

    <div class="products row mt-4">
        <!-- Produit 1 -->
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://img.freepik.com/free-photo/rendering-smart-home-device_23-2151039368.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1722384000&semt=ais_hybrid" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ajouter d'autres produits similaires ici -->
    </div>
        
        <!-- Ajouter d'autres produits similaires ici -->
    </div>
</div>
<div class="bestseller-section container mt-5">

    

    <!-- Bannière promotionnelle -->
    <div class="promotion-banner mt-5">
        <div class="promotion-content">
            <span class="category-highlight">Catégories</span>
            <h3 class="promotion-title">Elevé Votre Expérience Musicale</h3>
            <div class="countdown mt-3 mb-4">
                <div class="countdown-item">
                    <span class="count">23</span>
                    <p>Mois</p>
                </div>
                <div class="countdown-item">
                    <span class="count">05</span>
                    <p>Jours</p>
                </div>
                <div class="countdown-item">
                    <span class="count">59</span>
                    <p>Minutes</p>
                </div>
                <div class="countdown-item">
                    <span class="count">35</span>
                    <p>Secondes</p>
                </div>
            </div>
            <button class="btn-buy-now">Acheter Maintenant</button>
        </div>
        <div class="promotion-image">
            <img src="https://img.freepik.com/free-photo/rendering-smart-home-device_23-2151039368.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1722384000&semt=ais_hybrid" alt="Produit Promotionnel">
        </div>
    </div>
</div>
<div class="bestseller-section container mt-5">
    <!-- Section des produits les plus vendus -->
    <div class="header d-flex align-items-center justify-content-between">
        <div class="section-title">
            <span class="title-highlight"><i class="fas fa-calendar-alt"></i>     Nos produits</span>
            <h2 class="title">Explorer nos produits</h2>
        </div>
    </div>
</div>

<div class="flash-sales-section container mt-5">
    <div class="header d-flex align-items-center justify-content-between">
<div class="products row mt-4">
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Ajouter d'autres produits similaires ici -->
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ajouter d'autres produits similaires ici -->
    </div>
    <div class="flash-sales-section container mt-5">
    <div class="header d-flex align-items-center justify-content-between">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="product-card">
                <div class="product-image">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScPhwXk8KXSxiD_MYEwf76-8ujVFaXGrYWLw&s" alt="Produit 2">
                    <div class="discount-badge">-35%</div>
                    <div class="product-actions">
                        <button class="wishlist"><i class="far fa-heart"></i></button>
                        <button class="quickview"><i class="far fa-eye"></i></button>
                    </div>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
                <div class="product-content">
                    <h5 class="product-title">AK-900 Clavier Lumineux</h5>
                    <div class="product-pricing">
                        <span class="current-price">4 500 XAF</span>
                        <span class="old-price">5 000 XAF</span>
                    </div>
                    <div class="rating">
                        <span class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="reviews">(75)</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Ajouter d'autres produits similaires ici -->
    </div>
    </div>
    </div>
    <div class="text-center mt-4">
        <button class="btn-view-products">Voir Tous Les Produits</button>
    </div>
</div>
</div>
</div>



            <!-- Start New Arrivals Product Area  -->
            <div class="new-products-section container mt-5">
    <!-- Section des Nouveautés -->
    <div class="header d-flex align-items-center">
        <div class="section-title">
            <span class="title-highlight"><i class="fas fa-star"></i> Recommandés</span>
            <h2 class="title">Nouveauté</h2>
        </div>
    </div>

    <div class="new-products-wrapper d-flex mt-4 gap-4">
        <!-- Grande Carte pour PS5 -->
        <div class="new-product-card big-card">
            <img src="https://4kwallpapers.com/images/wallpapers/sony-ps5-dualsense-wireless-controller-cosmic-red-2880x1800-5433.jpg" class="product-image">
            <div class="card-content">
                <h3>PlayStation 5</h3>
                <p>La PS5 Noir et Blanc est Maintenant Disponible en Vente</p>
                <a href="#" class="btn-buy-now">Achetez Maintenant</a>
            </div>
        </div>

        <!-- Petites Cartes à droite -->
        <div class="new-product-small-cards">
            <div class="new-product-card small-card mb-4">
                <img src="data:image/jpeg;base64,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" alt="Collection Femmes" class="product-image">
                <div class="card-content">
                    <h3>Collection Femmes</h3>
                    <p>Featured woman collections that give you another vibe.</p>
                    <a href="#" class="btn-buy-now">Achetez Maintenant</a>
                </div>
            </div>
            <div class="new-product-card small-card mb-4">
                <img src="data:image/jpeg;base64,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" alt="Enceintes" class="product-image">
                <div class="card-content">
                    <h3>Enceintes</h3>
                    <p>Enceintes sans Fil Amazon</p>
                    <a href="#" class="btn-buy-now">Achetez Maintenant</a>
                </div>
            </div>
            <div class="new-product-card small-card">
                <img src="data:image/jpeg;base64,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" alt="Parfum" class="product-image">
                <div class="card-content">
                    <h3>Parfum</h3>
                    <p>GUCCI INTENSE OUD EDP</p>
                    <a href="#" class="btn-buy-now">Achetez Maintenant</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section d'informations supplémentaires -->
<div class="extra-info-section container mt-5">
    <div class="row text-center">
        <div class="col-md-6 mb-4">
            <div class="info-card">
                <div class="info-icon mb-3">
                    <i class="fas fa-shipping-fast"></i>
                </div>
                <h4>LIVRAISON GRATUITE ET RAPIDE</h4>
                <p>Livraison Gratuite Pour Toute Commande égale ou supérieure à 50 000 XAF si vous êtes dans le même pays que le fournisseur</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="info-card">
                <div class="info-icon mb-3">
                    <i class="fas fa-headphones-alt"></i>
                </div>
                <h4>SERVICE CLIENT 24/7</h4>
                <p>Soutien Client Amical</p>
            </div>
        </div>
    </div>
</div>




    </body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    .container-fluid {
    display: flex;
    gap: 100px;
}

.categories-sidebar {
    width: 20%;
    padding: 60px;
    background-color: #f8f8f8;
    border-right: 1px solid #ddd;
}

.categories-list {
    list-style: none;
    padding: 0;
}

.categories-list li {
    padding: 5px 0;
    font-size: 16px;
    color: #333;
    cursor: pointer;
    border-bottom: 1px solid #e8e8e8;
}

.categories-list li:hover {
    color: #E74C3C;
    font-weight: bold;
}

.main-slider {
    padding: 100px;
    width: 100%;
    position: relative;
}

.carousel-inner img {
    max-height: 400px;
    object-fit: cover;
}

.carousel-caption {
    background-color: rgba(0, 0, 0, 0.6);
    padding: 20px;
    border-radius: 8px;
    left: 0;
    bottom: 20px;
}

.carousel-caption h3 {
    font-size: 24px;
    font-weight: bold;
}

.carousel-caption p {
    font-size: 20px;
}

.btn-light {
    background-color: #ffffff;
    color: #000;
    border: none;
    font-weight: bold;
    text-transform: uppercase;
}

<>
    .flash-sales-section {
    background-color: #ffffff;
    padding: 10px;
    border-radius: 8px;
}

.section-title {
    margin-bottom: 20px;
}

.title-highlight {
    color: #E74C3C;
    font-size: 14px;
}

.title {
    font-size: 28px;
    font-weight: bold;
    margin-top: 5px;
}

.countdown {
    display: flex;
    align-items: left;
}

.countdown-item {
    background-color: #ffffff;
    width: 10%;
    height: 10%;
    border-radius: 100px;
    text-align: center;
    margin: 0 20px;
}

.countdown-item .count {
    /* position: relative; */
    /* right: 500px; */
    font-size: 24px;
    color: black;
    font-weight: bold;
}

.countdown p {
    /* position: relative; */
    /* right: 500px; */
    font-size: 10px;
    margin: 0;
}

.separator {
    /* position: relative; */
    /* right: 500px; */
    font-size: 24px;
    color: #E74C3C;
}

.products {
    margin-top: 20px;
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding-bottom: 15px;
}

.product-card {
    background-color: #fff4f4;
    border-radius: 8px;
    padding: 15px;
    
    text-align: center;
    transition: box-shadow 0.3s;
    position: relative;
    overflow: hidden;
    margin-right: 15px;
    min-width: 250px; /* Pour garantir l'espace minimum de chaque produit en mode défilement horizontal */
}

.product-card:hover {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.product-image {
    position: relative;
    margin-bottom: 15px;
}

.product-image img {
    width: 100%;
    height: 200px;
    border-radius: 8px;
}

.discount-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: #E74C3C;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
}

.product-actions {
    position: absolute;
    top: 10px;

    right: 10px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.product-actions button {
    background: #ffffff;
    border: none;
    color: #000;
    font-size: 16px;
    cursor: pointer;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: color 0.3s, transform 0.3s;
}

.product-actions button:hover {
    color: #E74C3C;
    transform: scale(1.1);
}

.btn-add-to-cart {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #E74C3C;
    color: #ffffff;
    border: none;
    padding: 15px 0;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    opacity: 0;
    transition: all 0.3s ease;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
}

.product-card:hover .btn-add-to-cart {
    opacity: 1;
}

.product-content {
    padding-top: 10px;
}

.product-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.product-pricing {
    margin-bottom: 10px;
}

.current-price {
    font-size: 20px;
    color: #E74C3C;
    font-weight: bold;
    margin-right: 10px;
}

.old-price {
    text-decoration: line-through;
    color: #999;
}

.rating {
    margin-bottom: 15px;
}

.rating .stars i {
    color: #ffb400;
}

.btn-primary {
    background-color: #E74C3C;
    color: #ffffff;
    border: none;
    padding: 15px 40px; 
    border-radius: 8px; 
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 16px;
    font-weight: bold;
}

.btn-primary:hover,.btn-view-products  {
    background-color: #c0392b;
    transform: translateY(-2px); 
}
.btn-view-products {
    background-color: #E74C3C;
    color: #ffffff; 
    border: none; 
    padding: 15px 40px;
    border-radius: 8px; 
    cursor: pointer;
    width: 30%;
    font-size: 16px; 
    font-weight: bold;
    transition: background-color 0.3s, transform 0.3s;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
}




/* Responsivité */
@media (max-width: 768px) {
    .products {
        flex-wrap: nowrap;
        overflow-x: auto;
    }

    .product-card {
        min-width: 200px;
    }
}

.category-section {
    padding: 30px;
}

.section-title {
    margin-bottom: 20px;
}

.title-highlight {
    color: #E74C3C;
    font-size: 14px;
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.title {
    font-size: 28px;
    font-weight: bold;
    margin-top: 5px;
}

.categories-wrapper {
    position: relative;
}

.categories {
    gap: 15px;
    overflow: hidden; /* Empêche le contenu de sortir des limites */
    scroll-behavior: smooth;
}

.category-card {
    background-color: #ffffff;
    border: 1px solid #dcdcdc;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    transition: background-color 0.3s, transform 0.3s;
    width: 140px;
    cursor: pointer;
}

.category-card.selected {
    
    color: #000000;
}

.category-card:hover {
    transform: translateY(-5px);
    background-color: #E74C3C;
    color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.category-icon {
    font-size: 32px;
    margin-bottom: 10px;
}

.category-card.selected .category-icon {
    color: #000000;
}

.category-card .category-icon {
    color: #000000;
}
.category-card:hover {
    
    color: #fff;
}
.selected:hover {
    color: #fff;
}
.category-card:hover {
    color: #fff;
}
.category-icon:hover {
    color: #fff;
}

.category-label {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
    color: inherit;
}

.arrow-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #ffffff;
    border: 1px solid #dcdcdc;
    color: #000000;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s, transform 0.3s;
}

.arrow-btn:hover {
    background-color: #E74C3C;
    color: #ffffff;
}

.prev-arrow {
    left: -20px; /* Positionne la flèche de gauche */
}

.next-arrow {
    right: -20px; /* Positionne la flèche de droite */
}

/* Responsivité */
@media (max-width: 768px) {
    .categories {
        flex-wrap: wrap;
        justify-content: center;
    }

    .category-card {
        width: 120px;
        margin-bottom: 15px;
    }

    .arrow-btn {
        width: 30px;
        height: 30px;
    }
}
.bestseller-section {
    padding: 30px;
}

.section-title {
    margin-bottom: 20px;
}

.title-highlight {
    color: #E74C3C;
    font-size: 14px;
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.title {
    font-size: 28px;
    font-weight: bold;
    margin-top: 5px;
}

.btn-view-more {
    background-color: #E74C3C;
    color: #ffffff;
    width: 15%;
    border: none;
    padding: 10px 25px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.btn-view-more:hover {
    background-color: #c0392b;
}

.products {
    gap: 15px;
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
}

.product-card {
    background-color: #fff4f4;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    transition: box-shadow 0.3s;
    position: relative;
    overflow: hidden;
    margin-right: 15px;
    min-width: 250px;
}

.product-image {
    position: relative;
    margin-bottom: 15px;
}

.product-image img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.product-actions {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.product-actions button {
    background: #ffffff;
    border: none;
    color: #000;
    font-size: 16px;
    cursor: pointer;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: color 0.3s, transform 0.3s;
}

.product-actions button:hover {
    color: #E74C3C;
    transform: scale(1.1);
}

.product-content {
    padding-top: 10px;
}

.product-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.product-pricing {
    margin-bottom: 10px;
}

.current-price {
    font-size: 20px;
    color: #E74C3C;
    font-weight: bold;
    margin-right: 10px;
}

.old-price {
    text-decoration: line-through;
    color: #999;
}

.rating {
    margin-bottom: 15px;
}

.rating .stars i {
    color: #ffb400;
}

.promotion-banner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #E74C3C;
    padding: 40px;
    border-radius: 15px;
    color: #ffffff;
    margin-top: 40px;
}

.promotion-content {
    flex: 1;
}

.category-highlight {
    font-size: 14px;
    text-transform: uppercase;
    font-weight: bold;
}

.promotion-title {
    font-size: 36px;
    padding-right: 40px;
    font-weight: bold;
    margin-top: 10px;
}

.countdown {
    display: flex;
    gap: 20px;
}

.countdown-item {
    text-align: center;
}

.countdown-item .count {
    font-size: 24px;
    font-weight: bold;
}

.btn-buy-now {
    background-color: #000000;
    color: #ffffff;
    border: none;
    width: 50%;
    padding: 15px 30px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.3s;
    margin-top: 20px;
}

.btn-buy-now:hover {
    background-color: #333333;
    transform: translateY(-3px);
}

.promotion-image {
    flex: 1;
}

.promotion-image img {
    max-width: 100%;
    border-radius: 15px;
}

/* Responsivité */
@media (max-width: 768px) {
    .promotion-banner {
        flex-direction: column;
        align-items: center;
    }

    .promotion-content, .promotion-image {
        text-align: center;
        width: 100%;
        margin-bottom: 20px;
    }
}

.new-products-section {
    padding: 30px;
}

.section-title {
    margin-bottom: 20px;
}

.title-highlight {
    color: #E74C3C;
    margin-left:10px;

    font-size: 14px;
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.title {
    font-size: 28px;
    margin-left:10px;
    font-weight: bold;
    margin-top: 5px;
}

.new-products-wrapper {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.new-product-card {
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    color: #ffffff;
}

.big-card {
    background-color: #E74C3C;
    width: 60%;
    padding: 20px;
}

.small-card {
    background-color: #333;
    width: 100%;
    padding: 15px;
    margin-bottom: 15px;
}

.product-image {
    width: 100%;
    height: 100%;
    border-radius: 8px;
    margin-bottom: 10px;
}

.card-content {
    position: absolute;
    bottom: 15px;
    left: 15px;
}

.card-content h3 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-content p {
    font-size: 16px;
    margin-bottom: 35px;
}

.btn-buy-now {
    background-color: #000000;
    color: #ffffff;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-buy-now:hover {
    background-color: #333333;
    transform: translateY(-3px);
}

.extra-info-section {
    padding: 40px 0;
}

.info-card {
    text-align: center;
}

.info-icon {
    font-size: 40px;
    color: #E74C3C;
}

.info-card h4 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}

.info-card p {
    font-size: 16px;
    color: #666;
}

/* Responsivité */
@media (max-width: 768px) {
    .new-products-wrapper {
        flex-direction: column;
    }

    .big-card,
    .small-card {
        width: 600px;
    }

    .info-card {
        margin-bottom: 30px;
    }
}


</style>
@endsection
