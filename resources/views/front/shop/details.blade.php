@extends('front.fixe')
@section('titre', $produit->nom)
@section('body')
    @php

        $config = DB::table('configs')->first();
    @endphp

    <head>
        @section('SEO')
        <meta name="description" content="{{ $produit->description ?? ' ' }}">
        <meta name="author" content="konica.store">
        <meta property="og:title" content="{{ $produit->nom }}">
        <meta property="og:description" content="{{ $produit->description ?? '' }}">
        <meta property="og:brand" content="{{ $produit->marques->nom ?? '' }}">
        <meta property="og:image" content="{{ $produit->photo }}">
        <meta property="og:type" content="product">
        <meta property="og:price:amount" content="{{ $produit->prix }} DT">

        <meta property="og:availability" content="{{ $produit->statut }}">

        <meta property="product:price:amount" content="{{ $produit->prix }} DT">

        <meta property="product:availability" content="{{ $produit->statut }}">
        <meta name="robots" content="index, follow">


    @endsection

</head>
<script src="path/to/jquery.js"></script>
<script src="path/to/jquery.elevatezoom.js"></script>


<main>

    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">{{ __('accueil') }}</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ __('boutique') }}</a></li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
   
        <main class="main-wrapper">
            <!-- Start Shop Area  -->
            <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
                <div class="single-product-thumb mb--40">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div class="single-product-thumbnail-wrap zoom-gallery">
                                            <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                                <div class="thumbnail">
                                                    <a  src="{{ Storage::url($produit->photo) }}" class="popup-zoom">
                                                        <img  id="mainImage" src="{{ Storage::url($produit->photo) }}"  alt="Product Images">
                                                    </a>
                                                </div>
                                          
                                            </div>
                                            @if ($produit->inPromotion())
                                            <div class="label-block">
                                                <div class="product-badget"> -{{ $produit->inPromotion()->pourcentage }}%</div>
                                            </div>
                                            @endif
                                            <div class="product-quick-view position-view">
                                                <a  href="{{ Storage::url($produit->photo) }}" class="popup-zoom">
                                                    <i class="far fa-search-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">
                                        <div class="product-small-thumb-3 small-thumb-wrapper">

        
                                            @foreach (json_decode($produit->photos) ?? [] as $photo)
                                            <div class="small-thumb-img">
                                                <img onclick="changeMainImage('{{ Storage::url($photo) }}')" src="{{ Storage::url($photo) }}" alt="thumb image">
                                            </div>
                                            @endforeach
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function changeMainImage(imageUrl) {
                                    document.getElementById('mainImage').src = imageUrl;
                                }
                            </script>

                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <h2 class="product-title"> {{ \App\Helpers\TranslationHelper::TranslateText($produit->nom) }}</h2>
                                        <span class="price-amount">

                                            @if ($produit->inPromotion())
                                            <span class=" small">
                                                
                                            </span>
                                            <b class="">
                                                {{ $produit->getPrice() }} <x-devise></x-devise>
                                            </b>
                                            <br>
                                            <strike>
                                                <span class="text-danger small">
                                                    {{ $produit->prix }} <x-devise></x-devise>
                                                </span>
                                            </strike>
                                        @else
                                            {{ $produit->getPrice() }} <x-devise></x-devise>
                                        @endif
                                        </span>
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>2</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>
                                                @if ($produit->stock > 0 )
                                                <label class="badge bg-success"> {{ __('stock_disponible') }}</label>
                                            @else
                                                <label class="badge bg-danger">{{ __('non_disponible') }}</label>
                                            @endif
                                            </li>
                                            {{-- <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li> --}}
                                            
                                        </ul>
                                        <div class="prt_01 mb-1"><span class="text-light bg-info rounded px-2 py-1"> {{ \App\Helpers\TranslationHelper::TranslateText("Categorie") }}:
                                
                                                {{ \App\Helpers\TranslationHelper::TranslateText($produit->categories->nom) }}
                                            </span></div>
                                        <p class="description">

                                            {!! \App\Helpers\TranslationHelper::TranslateText($produit->description) !!}
                                        </p>
    
                                        <div class="product-variations-wrapper">
    
                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">
                                                <h6 class="title">{{ \App\Helpers\TranslationHelper::TranslateText("Couleur") }}(s):</h6>
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
                                            <!-- End Product Variation  -->
    
                                            <!-- Start Product Variation  -->
                                            <div class="product-variation product-size-variation">
                                                <h6 class="title"> {{ \App\Helpers\TranslationHelper::TranslateText("Taille") }}(s):</h6>
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
                                                <li class="add-to-cart"><a  onclick="AddToCart( {{ $produit->id }} )" class="axil-btn btn-bg-primary">{{ \App\Helpers\TranslationHelper::TranslateText("Ajouter au panier ") }}</a></li>
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
                <!-- End .single-product-thumb -->
    
                <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                    <div class="container">
                        <ul class="nav tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                            </li>
                           
                            <li class="nav-item" role="presentation">
                                <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="product-desc-wrapper">
                                    <div class="row">
                                        <div class="col-lg-6 mb--30">
                                            <div class="single-desc">
                                               
                                                <p> 
                                                    {!! \App\Helpers\TranslationHelper::TranslateText($produit->description) !!}
                                                </p>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <!-- End .row -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="pro-des-features">
                                                <li class="single-features">
                                                    <div class="icon">
                                                        <img src="/assets/images/product/product-thumb/icon-3.png" alt="icon">
                                                    </div>
                                                    Easy Returns
                                                </li>
                                                <li class="single-features">
                                                    <div class="icon">
                                                        <img src="/assets/images/product/product-thumb/icon-2.png" alt="icon">
                                                    </div>
                                                    Quality Service
                                                </li>
                                                <li class="single-features">
                                                    <div class="icon">
                                                        <img src="/assets/images/product/product-thumb/icon-1.png" alt="icon">
                                                    </div>
                                                    Original Product
                                                </li>
                                            </ul>
                                            <!-- End .pro-des-features -->
                                        </div>
                                    </div>
                                    <!-- End .row -->
                                </div>
                                <!-- End .product-desc-wrapper -->
                            </div>
                          
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-wrapper">
                                    <div class="row">
                                        <div class="col-lg-6 mb--40">
                                            <div class="axil-comment-area pro-desc-commnet-area">
                                                <h5 class="title">01 Review for this product</h5>
                                                <ul class="comment-list">
                                                    <!-- Start Single Comment  -->
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img src="./assets/images/blog/author-image-4.png" alt="Author Images">
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <a class="hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="Cameron Williamson">Eleanor Pena</span>
                                                                            </span>
                                                                        </a>
                                                                        <span class="commenter-rating ratiing-four-star">
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star empty-rating"></i></a>
                                                                        </span>
                                                                    </h6>
                                                                    <div class="comment-text">
                                                                        <p>“We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. ” </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- End Single Comment  -->
    
                                                    <!-- Start Single Comment  -->
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img src="./assets/images/blog/author-image-4.png" alt="Author Images">
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <a class="hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="Rahabi Khan">Courtney Henry</span>
                                                                            </span>
                                                                        </a>
                                                                        <span class="commenter-rating ratiing-four-star">
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                        </span>
                                                                    </h6>
                                                                    <div class="comment-text">
                                                                        <p>“We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. ”</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- End Single Comment  -->
    
                                                    <!-- Start Single Comment  -->
                                                    <li class="comment">
                                                        <div class="comment-body">
                                                            <div class="single-comment">
                                                                <div class="comment-img">
                                                                    <img src="./assets/images/blog/author-image-5.png" alt="Author Images">
                                                                </div>
                                                                <div class="comment-inner">
                                                                    <h6 class="commenter">
                                                                        <a class="hover-flip-item-wrapper" href="#">
                                                                            <span class="hover-flip-item">
                                                                                <span data-text="Rahabi Khan">Devon Lane</span>
                                                                            </span>
                                                                        </a>
                                                                        <span class="commenter-rating ratiing-four-star">
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                            <a href="#"><i class="fas fa-star"></i></a>
                                                                        </span>
                                                                    </h6>
                                                                    <div class="comment-text">
                                                                        <p>“We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. ” </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- End Single Comment  -->
                                                </ul>
                                            </div>
                                            <!-- End .axil-commnet-area -->
                                        </div>
                                        <!-- End .col -->
                                        <div class="col-lg-6 mb--40">
                                            <!-- Start Comment Respond  -->
                                            <div class="comment-respond pro-des-commend-respond mt--0">
                                                <h5 class="title mb--30">Add a Review</h5>
                                                <p>Your email address will not be published. Required fields are marked *</p>
                                                <div class="rating-wrapper d-flex-center mb--40">
                                                    Your Rating <span class="require">*</span>
                                                    <div class="reating-inner ml--20">
                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                        <a href="#"><i class="fal fa-star"></i></a>
                                                    </div>
                                                </div>
    
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Other Notes (optional)</label>
                                                                <textarea name="message" placeholder="Your Comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>Name <span class="require">*</span></label>
                                                                <input id="name" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>Email <span class="require">*</span> </label>
                                                                <input id="email" type="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-submit">
                                                                <button type="submit" id="submit" class="axil-btn btn-bg-primary w-auto">Submit Comment</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- End Comment Respond  -->
                                        </div>
                                        <!-- End .col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- woocommerce-tabs -->
    
            </div>
            <!-- End Shop Area  -->
    
            <!-- Start Recently Viewed Product Area  -->
            <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
                <div class="container">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>  {{ \App\Helpers\TranslationHelper::TranslateText("Les produits de la même categorie") }}</span>
                        <h2 class="title"> {{ \App\Helpers\TranslationHelper::TranslateText("Les produits similaires") }}</h2>
                    </div>
                    @php

                    $relatedProducts = $produit->categories->produits->where('id', '!=', $produit->id);

                @endphp

                    <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                   
                        <!-- End .slick-single-layout -->
                        @if ($relatedProducts)
                        @foreach ($relatedProducts as $produit)
                        <div class="slick-single-layout">
                            <div class="axil-product">
                                <div class="thumbnail">
                                    <a  href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                        <img  src="{{ Storage::url($produit->photo) }}" alt="Product Images">
                                    </a>
                                    @if ($produit->inPromotion())
                                    <div class="label-block label-right">
                                        <div class="product-badget"> -{{ $produit->inPromotion()->pourcentage }}%</div>
                                    </div>
                                    @endif
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            @if (Auth()->user())
                                            <li class="wishlist"><a onclick="AddFavoris({{ $produit->id }})"><i class="far fa-heart"></i></a></li>
                                            @endif
                                            <li class="select-option"><a onclick="AddToCart( {{ $produit->id }} )">{{ \App\Helpers\TranslationHelper::TranslateText("Ajouter au panier ") }}</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a   href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ $produit->nom }}</a></h5>
                                        <div class="product-price-variant">
                                            {{-- <span class="price old-price">$60</span>
                                            <span class="price current-price">$45</span> --}}

                                            @if ($produit->inPromotion())
                                            <span class=" small">
                                                - {{ $produit->inPromotion()->pourcentage }} %
                                            </span>
                                            <b class="ft-bold theme-cl fs-lg mr-2">
                                                {{ $produit->getPrice() }} <x-devise></x-devise>
                                            </b>
                                            <br>
                                            <strike>
                                                <span
                                                    class="ft-medium text-muted line-through fs-md mr-2">
                                                    {{ $produit->prix }} <x-devise></x-devise>
                                                </span>
                                            </strike>
                                        @else
                                            {{ $produit->getPrice() }} <x-devise></x-devise>
                                        @endif
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
                        @endforeach
                        @else
                            <div class="col-12 text-center">
                                {{ \App\Helpers\TranslationHelper::TranslateText("Aucun produit de la même categorie") }}


                            </div>

                        @endif
                     
                        
    
                    </div>
                </div>
            </div>
       
        </main>
    
  
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
    
     

</main>
@endsection
