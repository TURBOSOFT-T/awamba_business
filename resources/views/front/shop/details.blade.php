@extends('front.fixe')
@section('titre', $produit->nom)
@section('body')

    @section('SEO')
      <!-- Title -->
      <title>{{ $produit->nom ?? config('app.name') }}</title>

        <meta name="author" content="hb-design.shop">
        <meta property="og:title" content="{{ $produit->nom }}">
        <meta property="og:description" content="{{ $produit->description ?? '' }}">
        <meta property="og:image" content="{{ $produit->photo }}">
        <meta property="og:type" content="product">
        <meta property="og:price:amount" content="{{ $produit->prix }} DT">
        <meta property="og:availability" content="{{ $produit->statut }}">
        <meta property="product:price:amount" content="{{ $produit->prix }} DT">
        <meta property="product:availability" content="{{ $produit->statut }}">
        <meta name="robots" content="index, follow">
    @endsection
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Include Bootstrap JS and its dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include Bootstrap CSS in your Blade template -->



<main>



    <div class="breadcrumb__area breadcrumb-space overflow-hidden banner-home-bg ">
        <div class="banner-home__middel-shape inner-top-shape"></div>
        <div class="container">
            <div class="banner-all-shape-wrapper">
                <div class="banner-home__banner-shape-1 first-shape">
                    <img class="upDown-top" src="/assets/imgs/banner-1/banner-shape-1.svg" alt="img not found">
                </div>
                <div class="banner-home__banner-shape-2 second-shape">
                    <img class="upDown-bottom" src="/assets/imgs/banner-1/banner-shape-2.svg" alt="img not found">
                </div>
                <div class="right-shape">
                    <img class="zooming" src="/assets/imgs/inner-img/inner-right-shape.svg" alt="img not found">
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <div class="breadcrumb__title-wrapper mb-15 mb-sm-10 mb-xs-5">
                            <h1 class="breadcrumb__title color-white wow fadeIn animated" data-wow-delay=".1s">
                                {{ $produit->nom }}
                            </h1>
                        </div>
                        <div class="breadcrumb__menu wow fadeIn animated" data-wow-delay=".5s">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home') }}">Accueil</a></span></li>
                                    <li><span><a href="{{ route('shop') }}">Boutique</a></span></li>
                                    <li class="active"><span>{{ $produit->nom }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product-filter-area filter-area-3 section-space">
        <div class="container">
            <div class="row flex align-items-center">
                {{-- <div class="col-xl-6 col-lg-6">
                    <div class="rr-product-details-thumb-wrapper">
                        <figure class="rr-product-media">
                            <img src="{{ Storage::url($produit->photo) }}" width="300 " height="300 "
                                border-radius="8px" alt="Product image" />

                        </figure>

                    </div>
                </div> --}}
                <div class="col-xl-6 col-lg-6">
                <div id="productCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach (json_decode($produit->photos) ?? [] as $index => $image)
                            <li data-target="#productCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                     
                      @foreach (json_decode($produit->photos) ?? [] as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ Storage::url($image) }}" {{-- class="d-block  "   --}} style=" width: 600px;height: 500px; border-radius:8px"    {{-- class="img-responsive m-auto" --}} alt="Product image">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                </div>
                <style>
                    .carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5); /* Ajoute un fond semi-transparent pour mieux distinguer les icônes */
    border-radius: 50%; /* Rend les icônes circulaires */
    padding: 10px; /* Augmente la taille de la zone cliquable autour des icônes */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Ajoute une transition pour l'effet de survol */
}

.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    background-color: rgba(0, 0, 0, 0.8); /* Rendre le fond plus sombre au survol */
    transform: scale(1.1); /* Légère augmentation de la taille au survol */
}

.carousel-control-prev,
.carousel-control-next {
    width: 50px; /* Augmente la largeur des zones de contrôle */
    opacity: 1; /* Assure que les contrôles sont entièrement visibles */
}

.carousel-control-prev,
.carousel-control-next {
    filter: drop-shadow(0px 0px 5px rgba(0, 0, 0, 0.7)); /* Ajoute une ombre portée pour améliorer la visibilité sur des fonds clairs */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-size: 70%, 70%; /* Ajuste la taille des icônes pour les rendre plus grandes */
}

                </style>
                

              {{--   <div class="col-xl-6 col-lg-6">
                    <div class="rr-product-details-thumb-wrapper">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="{{ Storage::url($produit->photo) }}" alt="Product image 1" /></div>
                                <div class="swiper-slide"><img src="{{ Storage::url($produit->photo) }}" alt="Product image 2" /></div>
                                <div class="swiper-slide"><img src="{{ Storage::url($produit->photo) }}" alt="Product image 3" /></div>
                                <!-- Ajoutez plus d'images si nécessaire -->
                            </div>
                            <!-- Ajoutez les contrôles si nécessaire -->
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div> --}}
                <script>
                    var swiper = new Swiper('.swiper-container', {
                        slidesPerView: 1,
                        spaceBetween: 10,
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        autoplay: {
                            delay: 2500,
                            disableOnInteraction: false,
                        },
                    });
                    </script>
                    
                
                <div class="col-xl-6 col-lg-6">
                    <div class="rr-shop-details__right-warp">
                        <h3 class="rr-shop-details__title-sm">{{ $produit->nom }}</h3>

                        <div class="rr-shop-details__price d-flex align-items-center">
                            <div class="price">
                                <div class="woocs_price_code">

                                    @if ($produit->inPromotion() && $produit->sur_devis === false)
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <b class="text-success" style="color: #4169E1">
                                                    {{ $produit->getPrice() }} DT
                                                </b>
                                            </div>
                                            <div class="col-sm-2">

                                            </div>
                                            <div class="col-sm-4">
                                                <strike>


                                                    <span class="text-danger small">
                                                        {{ $produit->prix }}DT
                                                    </span>


                                                </strike>
                                            </div>
                                        @elseif ($produit->sur_devis == false)
                                            {{ $produit->getPrice() }}DT
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="woocommerce-product-details__short-description">
                            {{--    <p>Aliquam tempus libero eget arcu euismod, in bibendum nisl posuere. Donec gravida sem eu dolor rhoncus viverra. In vel cursus ante. Quisque nec augue sollicitudin erat vehicula tincidunt. Morbi in nisi nisi. Proin eu eros diam.Quisque nec augue sollicitudin erat vehicula tincidunt.</p>
                          --}} </div>

                        <div class="rr-shop-details__quantity-wrap d-flex align-items-center">
                            @if ($produit->sur_devis == false)
                                <div class="rr-product-details-action__wrapper">
                                    <h6 class="rr-product-details-action__title">Quantity</h6>
                                    <div class="price-cart">
                                        <div class="cart">
                                            <div class="quantity">
                                                <div class="quantity__group">
                                                    <span class="quantity-control minus"><i
                                                            class="far fa-minus"></i></span>
                                                    <input type="number" class="input-text qty text" name="quantite"
                                                        value="1" id="qte-{{ $produit->id }}" autocomplete="off">
                                                    <span class="quantity-control plus"><i
                                                            class="far fa-plus"></i></span>
                                                </div>
                                            </div>



                                            <button type="button" class="rr-btn"
                                                onclick="AddToCart( {{ $produit->id }} )">
                                               
                                                Ajouter au panier
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <button type="button" class="rr-btn" onclick="AddToCart( {{ $produit->id }} )">
                                  
                                    Demmmander un devis
                                </button>
                            @endif

                        </div>
                        <br><br>
                        <div class="rr-shop-details__product-info">
                            <ul>
                                <li>
                                    @if ($produit->stock > 0 || $produit->sur_devis == false)
                                        <label class="badge bg-success"> Stock disponible</label>
                                    @else
                                        <label class="badge bg-danger"> Stock non disponible</label>
                                    @endif

                                </li>
                                <br><br>

                                <li>

                                    <label class="badge bg-success">Categorie:</label>

                                    <span>{{ Str::limit($produit->categories->nom, 30) }}</span>
                                </li>


                            </ul>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="rr-fea-product__tab rr-fea-product__tab-3 product-filter-area-review mb-40">
                            <nav>
                                <div class="nav nav-tab nav-inner nav-inner-3 align-items-center justify-content-center mt-80"
                                    id="nav-tab" role="tablist">
                                    <div class="all-button d-flex">
                                        <button class="nav-link nav-link-3 rr-el-rep-filterBtn active" id="nav-0-tab"
                                            data-bs-toggle="tab" data-bs-target="#nav-0" type="button"
                                            role="tab" aria-controls="nav-0" aria-selected="true">
                                            <span class="button button-3">
                                                <span>Description</span>
                                            </span>

                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane active fade show" id="nav-0" role="tabpanel"
                            aria-labelledby="nav-0-tab" tabindex="0">
                            <div class="rr-fea-product__wrapper wrapper">
                                <div class="row">
                                    <div class="paragraph ">
                                        <p>{{ $produit->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
 
    </div>


</main>
@endsection
