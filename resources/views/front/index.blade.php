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





        <main class="main-wrapper">

            <!-- Start Slider Area -->
            <div class="axil-categorie-area pt--30 bg-color-white">
                <div class="container">
                    <div class="categrie-product-activation-2 categorie-product-two slick-layout-wrapper--15">
                        @foreach ($categories as $category)
                        <div class="slick-single-layout slick-slide">
                            <div class="categrie-product-2">
                                <a href="/category/{{ $category->id }}" class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}">
                                    <img class="img-fluid" src="{{ Storage::url($category->photo) }}" alt="product categorie">

                                </a>
                            </div>
                            <!-- End .categrie-product -->
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- End Slider Area -->


            <!-- Start Slider Area -->

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

            <!-- Script pour activer le slider -->
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

            {{-- <div class="axil-main-slider-area main-slider-style-5">
            <div class="container">
                <div class="slider-box-wrap">
                    <div class="slider-activation-two axil-slick-dots">
                        @foreach ($banners as $key => $banner)
                        <div class="single-slide slick-slide">
                            <div class="main-slider-content">
                                <span class="subtitle"><i class="fas fa-fire"></i>   {{ \App\Helpers\TranslationHelper::TranslateText($banner->titre ?? ' ') }}</span>
            <h1 class="title"> {{ \App\Helpers\TranslationHelper::TranslateText($banner->sous_titre ?? ' ') }}</h1>
            <div class="shop-btn">

                <a href="/shop" class="axil-btn btn-bg-white"> {{ __('voir_boutique') }}<i class="fal fa-shopping-cart"></i></a>
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
            </div> --}}
            <!-- End Slider Area -->


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
            </div>
            <!-- End Categorie Area  -->

            <!-- Start New Arrivals Product Area  -->
            <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
                <div class="container ml--xxl-0">
                    <div class="product-area pb--50">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-secondary"><i class="far fa-shopping-basket"></i> {{ \App\Helpers\TranslationHelper::TranslateText("Cette semaine") }}</span>
                            <h2 class="title"> {{ \App\Helpers\TranslationHelper::TranslateText("Les nouvelles arrivages") }}</h2>
                        </div>
                        <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">

                            <!-- End .slick-single-layout -->
                            @foreach ($produits as $key => $produit)
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                    <div class="thumbnail">
                                        <a href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                            <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="{{ Storage::url($produit->photo) }}" alt="Product Images">
                                            <img class="hover-img" src="{{ Storage::url($produit->photo) }}" alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="wishlist">
                                                    @if (Auth()->user())
                                                    @php

                                                    $count = DB::table('favoris')
                                                    ->where('id_user', Auth()->user()->id)
                                                    ->where('id_produit', $produit->id)
                                                    ->count();
                                                    @endphp


                                                    <a onclick="AddFavoris({{ $produit->id }})">


                                                        <i class="far fa-heart"></i></a></li>
                                                @endif


                                                <style>
                                                    .favoris-added {
                                                        color: rgb(233, 20, 35);

                                                    }

                                                </style>

                                                <li class="select-option"><a onclick="AddToCart( {{ $produit->id }} )">
                                                        {{ \App\Helpers\TranslationHelper::TranslateText("Ajouter au panier") }}
                                                    </a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">

                                                    {{ $produit->nom }}</a>
                                            </h5>
                                            </a></h5>
                                            <div class="product-price-variant">
                                                {{-- <span class="price old-price">$40</span>
                                            <span class="price current-price">$40</span> --}}
                                                @if ($produit->inPromotion())
                                                <div class="row">
                                                    <div class="col-sm-6 col-6">

                                                        <b class="text-success" style="color: #4169E1">
                                                            {{ $produit->getPrice() }} <x-devise></x-devise>
                                                        </b>
                                                    </div>

                                                    <div class="col-sm-6 col-6 text-end">
                                                        <strike>


                                                            <span class="text-danger small">
                                                                {{ $produit->prix }} <x-devise></x-devise>
                                                            </span>


                                                        </strike>
                                                    </div>
                                                    @else
                                                    {{ $produit->getPrice() }}<x-devise></x-devise>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
                <!-- End New Arrivals Product Area  -->

                <!-- Start Best Sellers Product Area  -->
                <div class="axil-best-seller-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
                    <div class="container">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-secondary"><i class="far fa-shopping-basket"></i>This Month</span>
                            <h2 class="title">Best Sellers</h2>
                        </div>
                        <div class="new-arrivals-product-activation-2 product-transparent-layout slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-seven">
                                    <div class="product-content">
                                        <div class="cart-btn">
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Full Sleev Tshirt</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
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
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="assets/images/product/fashion/product-16.png" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-seven">
                                    <div class="product-content">
                                        <div class="cart-btn">
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Comfort Unisex Hoddie</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <span class="icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="rating-number">(44)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="assets/images/product/fashion/product-17.png" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-seven">
                                    <div class="product-content">
                                        <div class="cart-btn">
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Stylish Hoddie</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <span class="icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="rating-number">(60)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="assets/images/product/fashion/product-18.png" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-seven">
                                    <div class="product-content">
                                        <div class="cart-btn">
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Sky Blue T-shirt</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <span class="icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="rating-number">(22)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="assets/images/product//fashion/product-19.png" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-seven">
                                    <div class="product-content">
                                        <div class="cart-btn">
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Modern Hoddie</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
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
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="assets/images/product/fashion/product-20.png" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-seven">
                                    <div class="product-content">
                                        <div class="cart-btn">
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Blue T-shirt</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <span class="icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="rating-number">(14)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="assets/images/product/fashion/product-21.png" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-seven">
                                    <div class="product-content">
                                        <div class="cart-btn">
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Men's Full Sleev T-shirt</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
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
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="assets/images/product/fashion/product-22.png" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-seven">
                                    <div class="product-content">
                                        <div class="cart-btn">
                                            <a href="cart.html">
                                                <i class="flaticon-shopping-cart"></i>
                                            </a>
                                        </div>
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Men's Half Sleev T-shirt</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="product-rating">
                                                <span class="icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="rating-number">(94)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" src="assets/images/product//fashion/product-23.png" alt="Product Images">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End  Best Sellers Product Area  -->

                <!-- Poster Countdown Area  -->
                <div class="axil-poster-countdown">
                    <div class="container">
                        <div class="poster-countdown-wrap bg-lighter">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="poster-countdown-content">
                                        <div class="section-title-wrapper">
                                            <span class="title-highlighter highlighter-secondary"> <i class="far fa-shopping-basket"></i> Don’t Miss!!</span>
                                            <h2 class="title">Let's Shopping Today</h2>
                                        </div>
                                        <div class="poster-countdown countdown mb--40"></div>
                                        <a href="#" class="axil-btn btn-bg-primary">Check it Out!</a>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6">
                                    <div class="poster-countdown-thumbnail">
                                        <img src="./assets/images/product/poster/poster-05.png" alt="Poster Product">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Poster Countdown Area  -->

                <!-- Start Expolre Product Area  -->
                <div class="axil-product-area bg-color-white axil-section-gap">
                    <div class="container">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our Products</span>
                            <h2 class="title">Explore our Products</h2>
                        </div>
                        <div class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                            <div class="slick-single-layout">
                                <div class="row row--15">
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="assets/images/product/fashion/product-8.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Leather Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$29.99</span>
                                                        <span class="price old-price">$49.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="assets/images/product/fashion/product-7.png" alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="single-product.html">Select Option</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Men's Stylish Hat</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$25.00</span>
                                                        <span class="price old-price">$35.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="assets/images/product/fashion/product-6.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Women's Stylish Hat</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$29.99</span>
                                                        <span class="price old-price">$49.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="assets/images/product/fashion/product-5.png" alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Solid A Line Dress</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$100.00</span>
                                                        <span class="price old-price">$150.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="assets/images/product/fashion/product-4.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Denim Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$50.00</span>
                                                        <span class="price old-price">$89.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="assets/images/product/fashion/product-3.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Leather Bag</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$99.99</span>
                                                        <span class="price old-price">$149.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="assets/images/product/fashion/product-2.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="single-product.html">Select Option</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Women's Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$29.99</span>
                                                        <span class="price old-price">$49.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="assets/images/product/fashion/product-1.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Men's Tshirt</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$29.99</span>
                                                        <span class="price old-price">$39.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->

                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout">
                                <div class="row row--15">
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="assets/images/product/fashion/product-8.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Leather Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$29.99</span>
                                                        <span class="price old-price">$49.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="assets/images/product/fashion/product-7.png" alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="single-product.html">Select Option</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Men's Stylish Hat</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$25.00</span>
                                                        <span class="price old-price">$35.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="assets/images/product/fashion/product-6.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Women's Stylish Hat</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$29.99</span>
                                                        <span class="price old-price">$49.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="assets/images/product/fashion/product-5.png" alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Solid A Line Dress</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$100.00</span>
                                                        <span class="price old-price">$150.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="assets/images/product/fashion/product-4.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Denim Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$50.00</span>
                                                        <span class="price old-price">$89.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="assets/images/product/fashion/product-3.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Leather Bag</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$99.99</span>
                                                        <span class="price old-price">$149.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="assets/images/product/fashion/product-2.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="single-product.html">Select Option</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Women's Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$29.99</span>
                                                        <span class="price old-price">$49.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->
                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                        <div class="axil-product product-style-one">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="assets/images/product/fashion/product-1.png" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% Off</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Men's Tshirt</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price current-price">$29.99</span>
                                                        <span class="price old-price">$39.99</span>
                                                    </div>
                                                    <div class="color-variant-wrapper">
                                                        <ul class="color-variant">
                                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                                            </li>
                                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Product  -->

                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center mt--20 mt_sm--0">
                                <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Expolre Product Area  -->

                <!-- Start Testimonila Area  -->
                <div class="axil-testimoial-area axil-section-gap bg-vista-white">
                    <div class="container">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-secondary"> <i class="fal fa-quote-left"></i>Testimonials</span>
                            <h2 class="title">Users Feedback</h2>
                        </div>
                        <!-- End .section-title -->
                        <div class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                            <div class="slick-single-layout testimonial-style-one">
                                <div class="review-speech">
                                    <p>“ It’s amazing how much easier it has been to
                                        meet new people and create instantly non
                                        connections. I have the exact same personal
                                        the only thing that has changed is my mind
                                        set and a few behaviors. “</p>
                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                        <img src="./assets/images/testimonial/image-1.png" alt="testimonial image">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head Of Idea</span>
                                        <h6 class="title">James C. Anderson</h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout testimonial-style-one">
                                <div class="review-speech">
                                    <p>“ It’s amazing how much easier it has been to
                                        meet new people and create instantly non
                                        connections. I have the exact same personal
                                        the only thing that has changed is my mind
                                        set and a few behaviors. “</p>
                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                        <img src="./assets/images/testimonial/image-2.png" alt="testimonial image">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head Of Idea</span>
                                        <h6 class="title">James C. Anderson</h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout testimonial-style-one">
                                <div class="review-speech">
                                    <p>“ It’s amazing how much easier it has been to
                                        meet new people and create instantly non
                                        connections. I have the exact same personal
                                        the only thing that has changed is my mind
                                        set and a few behaviors. “</p>
                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                        <img src="./assets/images/testimonial/image-3.png" alt="testimonial image">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head Of Idea</span>
                                        <h6 class="title">James C. Anderson</h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout testimonial-style-one">
                                <div class="review-speech">
                                    <p>“ It’s amazing how much easier it has been to
                                        meet new people and create instantly non
                                        connections. I have the exact same personal
                                        the only thing that has changed is my mind
                                        set and a few behaviors. “</p>
                                </div>
                                <div class="media">
                                    <div class="thumbnail">
                                        <img src="./assets/images/testimonial/image-2.png" alt="testimonial image">
                                    </div>
                                    <div class="media-body">
                                        <span class="designation">Head Of Idea</span>
                                        <h6 class="title">James C. Anderson</h6>
                                    </div>
                                </div>
                                <!-- End .thumbnail -->
                            </div>
                            <!-- End .slick-single-layout -->

                        </div>
                    </div>
                </div>
                <!-- End Testimonila Area  -->

                <!-- Start New Arrivals Product Area  -->
                <div class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--50">
                    <div class="container">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This Week’s</span>
                            <h2 class="title">New Arrivals</h2>
                        </div>
                        <div class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-two has-color-pick">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="assets/images/product/fashion/product-14.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">50% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Full A-Line Dress</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price old-price">$50</span>
                                                <span class="price current-price">$25</span>
                                            </div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action justify-content-center">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-two has-color-pick">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="assets/images/product/fashion/product-15.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">15% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Leather Hand Bag</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price old-price">$60</span>
                                                <span class="price current-price">$45</span>
                                            </div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action justify-content-center">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-two has-color-pick">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="assets/images/product/fashion/product-4.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">30% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Guys Bomber Jacket</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price old-price">$30</span>
                                                <span class="price current-price">$20</span>
                                            </div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action justify-content-center">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-two has-color-pick">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="assets/images/product/fashion/product-5.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">50% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Full A-Line Dress</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price old-price">$50</span>
                                                <span class="price current-price">$25</span>
                                            </div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action justify-content-center">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-two has-color-pick">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="assets/images/product/fashion/product-10.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">10% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Men's Tshirt</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price old-price">$40</span>
                                                <span class="price current-price">$30</span>
                                            </div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action justify-content-center">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-two has-color-pick">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500" src="assets/images/product/fashion/product-11.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">25% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Leather Jacket</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price old-price">$50</span>
                                                <span class="price current-price">$40</span>
                                            </div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action justify-content-center">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-two has-color-pick">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500" src="assets/images/product/fashion/product-12.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">15% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Leather Hand Bag</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price old-price">$60</span>
                                                <span class="price current-price">$45</span>
                                            </div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action justify-content-center">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-two has-color-pick">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500" src="assets/images/product/fashion/product-13.png" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">30% OFF</div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Guys Bomber Jacket</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price old-price">$30</span>
                                                <span class="price current-price">$20</span>
                                            </div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action justify-content-center">
                                                <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                                <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                                <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                        </div>
                    </div>
                </div>
                <!-- End New Arrivals Product Area  -->

                <!-- Start Axil Newsletter Area  -->
                <div class="axil-newsletter-area axil-section-gap pt--0">
                    <div class="container">
                        <div class="etrade-newsletter-wrapper bg_image bg_image--12">
                            <div class="newsletter-content">
                                <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                                <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                                <div class="input-group newsletter-form">
                                    <div class="position-relative newsletter-inner mb--15">
                                        <input placeholder="example@gmail.com" type="text">
                                    </div>
                                    <button type="submit" class="axil-btn mb--15">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .container -->
                </div>
                <!-- End Axil Newsletter Area  -->

        </main>


    </body>
</main>
@endsection
