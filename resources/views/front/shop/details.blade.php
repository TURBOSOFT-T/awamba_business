@extends('front.fixe')
@section('titre', $produit->nom)
@section('body')
    @php

        $config = DB::table('configs')->first();
    @endphp

    <head>
    @section('header')
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

    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shop-details-img">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="shop-details-tab-img product-img--main" id="zoomContainers"
                                        data-scale="1.4" style="overflow: hidden; position: relative;">

                                        <img id="mainImage" src="{{ Storage::url($produit->photo) }}" height="600"
                                            width="600" alt="Product image"
                                            style="transition: transform 0.3s ease;" />
                                    </div>


                                </div>
                                <br><br>

                                <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @foreach (json_decode($produit->photos) ?? [] as $image)
                                        <div class="slider__item">
                                            <img onclick="changeMainImage('{{ Storage::url($image) }}')"
                                                src="{{ Storage::url($image) }}" width="100" height="100"
                                                style="border-radius: 8px;" alt="Additional product image" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <script>
                                function changeMainImage(imageUrl) {
                                    document.getElementById('mainImage').src = imageUrl;
                                }
                            </script>

                            <script>
                                const zoomContainers = document.getElementById('zoomContainers');
                                const mainImage = document.getElementById('mainImage');
                                const scale = zoomContainers.getAttribute('data-scale') || 1.4;


                                zoomContainers.addEventListener('mouseover', function() {
                                    mainImage.style.transform = `scale(${scale})`;
                                    mainImage.style.cursor = "zoom-in";
                                });


                                zoomContainers.addEventListener('mouseout', function() {
                                    mainImage.style.transform = "scale(1)";
                                });


                                function changeMainImage(imageUrl) {
                                    mainImage.src = imageUrl;
                                    mainImage.style.transform = "scale(1)";
                                }
                            </script>




                        </div>

                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h3 class="product-title">{{ $produit->nom }}</h3>

                                    <span class="price-amount">

                                        @if ($produit->inPromotion())
                                            <div class="row">
                                                <div class="col-sm-6 col-6">

                                                    <b class="text-success" style="color: #4169E1">
                                                        {{ $produit->getPrice() }} DT
                                                    </b>
                                                </div>

                                                <div class="col-sm-6 col-6 text-end">


                                                    <span
                                                        style="position: relative; font-size: 1.7rem; color: #dc3545; font-weight: bold;">
                                                        {{ $produit->prix }} DT
                                                        <span
                                                            style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: black;"></span>
                                                    </span>


                                                </div>
                                            @else
                                            
                                            <span class="price current-price"> 
                                               
                                                {{ $produit->getPrice() }} DT
                                            </b></span>
                                               
                                        @endif
                                    </span>
                                    <div class="product-rating">

                                    </div>
                                    <ul class="product-meta">
                                        @if ($produit->stock > 0)
                                            <label class="badge btn-bg-primary2"> Stock disponible</label>
                                        @else
                                            <label class="badge bg-danger"> Stock non disponible</label>
                                        @endif
                                        <br><br>

                                        <li><span style="color: #EFB121">Categorie:</span>  <span style="color: #5EA13C">{{ Str::limit($produit->categories->nom, 30) }}</span></li>
<br>
                                        <li> <span style="color: #EFB121">Reference:</span> <span style="color: #5EA13C">{{ $produit->reference }}</span></li>
                                    </ul>
                                    <p class="description">{{ Str::limit($produit->description, 100) }}</p>

                                    <div class="product-variations-wrapper">

                                        <!-- Start Product Variation  -->
                                        <div class="product-variation">

                                        </div>
                                        <!-- End Product Variation  -->

                                        <!-- Start Product Variation  -->
                                        <div class="product-variation product-size-variation">

                                        </div>
                                        <!-- End Product Variation  -->

                                    </div>

                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">
                                        <!-- Start Quentity Action  -->
                                        <div class="pro-qty">
                                            {{--  <input type="text" value="1"> --}}
                                            <span class="quantity-control minus"></span>
                                            <input type="number" class="input-text qty text" name="quantite"
                                                min="1" value="1" id="qte-{{ $produit->id }}"
                                                autocomplete="off">
                                            <span class="quantity-control plus"></i></span>
                                        </div>



                                        <!-- End Quentity Action  -->

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">

                                            <li class="select-option2"><a
                                                onclick="AddToCart( {{ $produit->id }} )">Ajouter
                                                au panier</a></li>
                                                    <style>
                                            .select-option2 {
                                                background-color: #5EA13C;
                                                color: #ffffff;
                                                border: none;
                                                padding: 10px 20px;
                                                border-radius: 5px;
                                                text-decoration: none;
                                            }
                                        </style>
                                          {{--   <li class="add-to-cart"><a onclick="AddToCart( {{ $produit->id }} )"
                                                    class=" badge  btn-bg-primary2">Ajouter au panier</a></li> --}}
                                            @if (Auth()->user())
                                                <li class="wishlist">

                                                    <a onclick="AddFavoris({{ $produit->id }})"
                                                        class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a>
                                                </li>
                                            @endif

                                            <style>
                                                .btn-bg-primary2 {
                                                    background-color: #5EA13C;
                                                    color: #ffffff;
                                                    border: none;
                                                    padding: 10px 20px;
                                                    border-radius: 5px;
                                                    text-decoration: none;
                                                }
                                            </style>
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
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true"><span style="color: #EFB121">Description</span></a>
                        </li>
                        <li class="nav-item " role="presentation">
                            <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab" aria-controls="additional-info" aria-selected="false">Additional Information</a>
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
                                            <h5 class="title">Specifications:</h5>
                                            <p>We’ve created a full-stack structure for our working workflow processes, were from the funny the century initial all the made, have spare to negatives. But the structure was from the funny the century rather,
                                                initial all the made, have spare to negatives.</p>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-6 -->
                                    <div class="col-lg-6 mb--30">
                                        <div class="single-desc">
                                            <h5 class="title">Care & Maintenance:</h5>
                                            <p>Use warm water to describe us as a product team that creates amazing UI/UX experiences, by crafting top-notch user experience.</p>
                                        </div>
                                    </div>
                                    <!-- End .col-lg-6 -->
                                </div>
                                <!-- End .row -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="pro-des-features">
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="assets/images/product/product-thumb/icon-3.png" alt="icon">
                                                </div>
                                                Easy Returns
                                            </li>
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="assets/images/product/product-thumb/icon-2.png" alt="icon">
                                                </div>
                                                Quality Service
                                            </li>
                                            <li class="single-features">
                                                <div class="icon">
                                                    <img src="assets/images/product/product-thumb/icon-1.png" alt="icon">
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
                        <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                            <div class="product-additional-info">
                                <div class="table-responsive">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Stand Up</th>
                                                <td>35″L x 24″W x 37-45″H(front to back wheel)</td>
                                            </tr>
                                            <tr>
                                                <th>Folded (w/o wheels) </th>
                                                <td>32.5″L x 18.5″W x 16.5″H</td>
                                            </tr>
                                            <tr>
                                                <th>Folded (w/ wheels) </th>
                                                <td>32.5″L x 24″W x 18.5″H</td>
                                            </tr>
                                            <tr>
                                                <th>Door Pass Through </th>
                                                <td>24</td>
                                            </tr>
                                            <tr>
                                                <th>Frame </th>
                                                <td>Aluminum</td>
                                            </tr>
                                            <tr>
                                                <th>Weight (w/o wheels) </th>
                                                <td>20 LBS</td>
                                            </tr>
                                            <tr>
                                                <th>Weight Capacity </th>
                                                <td>60 LBS</td>
                                            </tr>
                                            <tr>
                                                <th>Width</th>
                                                <td>24″</td>
                                            </tr>
                                            <tr>
                                                <th>Handle height (ground to handle) </th>
                                                <td>37-45″</td>
                                            </tr>
                                            <tr>
                                                <th>Wheels</th>
                                                <td>Aluminum</td>
                                            </tr>
                                            <tr>
                                                <th>Size</th>
                                                <td>S, M, X, XL</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
{{-- 
            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true"><span style="color: #EFB121">Description</span></a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <div class="product-desc-wrapper">
                                <div class="row">
                                    <div class="col-lg-12 mb--30">
                                        <div class="single-desc">

                                            <p>{!! $produit->description ?? ' ' !!}</p>
                                        </div>
                                    </div>
                                 
                                </div>
                                
                            </div>
                         
                        </div>

                    </div>
                </div>
            </div>
           --}}

        </div>
        <!-- End Shop Area  -->

        <!-- Start Recently Viewed Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
            <div class="container">
                <div class="section-title-wrapper">
                    <h4>   <span class="axil-breadcrumb-item1 active" aria-current="page"> <i class="far fa-shopping-basket"></i> Les produits de la même categorie</span> </h4>
                                
    
                    <h2 class="title">Parcourir</h2>
                </div>
                <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    @php

                        $relatedProducts = $produit->categories->produits->where('id', '!=', $produit->id);

                    @endphp
                    @if ($relatedProducts)
                        @foreach ($relatedProducts as $produit)
                            <div class="slick-single-layout">
                                <div class="axil-product">
                                    <div class="thumbnail">
                                        <a
                                            href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">
                                            <img src="{{ Storage::url($produit->photo) }}" alt="Product Images">

                                            <style>
                                                .top-left {
                                                    position: absolute;
                                                    top: 8px;
                                                    left: 16px;
                                                    color: red;
                                                }
                                            </style>

                                            <div class="top-left"
                                                style="background-color:#EFB121;color: white;">
                                                <span>
                                                    @if ($produit->inPromotion())
                                                        <span>
                                                            -{{ $produit->inPromotion()->pourcentage }}%</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </a>

                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                @if (Auth()->user())
                                                    <li class="wishlist"><a
                                                            onclick="AddFavoris({{ $produit->id }})"><i
                                                                class="far fa-heart"></i></a></li>
                                                @endif
                                                <li class="axil-btn  btn-bg-primary2 "><a
                                                        onclick="AddToCart( {{ $produit->id }} )">Ajouter au
                                                        panier</a></li>
                                                {{-- <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i
                                                            class="far fa-eye"></i></a></li> --}}

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a
                                                    href="{{ route('details-produits', ['id' => $produit->id, 'slug' => Str::slug(Str::limit($produit->nom, 10))]) }}">{{ Str::limit($produit->nom, 15) }}</a>
                                            </h5>
                                            <div class="product-price-variant">
                                                <h6 class="product-price--main">


                                                    @if ($produit->inPromotion())
                                                        <div class="row">
                                                            <div class="col-sm-6 col-6">

                                                                <b class="text-success" style="color: #4169E1">
                                                                    {{ $produit->getPrice() }} DT
                                                                </b>
                                                            </div>

                                                            <div class="col-sm-6 col-6 text-end">



                                                                {{-- <span style="font-size: 1.2rem; color: #dc3545; font-weight: bold;">
                                                            {{ $produit->prix }} DT
                                                    </span> --}}
                                                                <span class="price old-price"
                                                                    style="position: relative; font-size: 1.2rem; color: #dc3545; font-weight: bold;">
                                                                    {{ $produit->prix }} DT
                                                                    <span
                                                                        style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: black;"></span>
                                                                </span>


                                                            </div>
                                                        @else
                                                            {{ $produit->getPrice() }}DT
                                                    @endif



                                                </h6>
                                            </div>
                                            <div class="color-variant-wrapper">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif



                </div>
            </div>
            <style>
                .axil-breadcrumb-item1 {
            font-size: 14px;
            color: #EFB121; /* Default breadcrumb color */
            }
            
            .axil-breadcrumb-item.active {
            font-weight: bold;
            color: #EFB121; /* Distinct color for active item */
            }
            
            .axil-breadcrumb-item:not(.active)::after {
            content: " / "; /* Adds a separator after non-active items */
            color: #EFB121;
            }
            
            </style>
            <!-- End Axil Newsletter Area  -->
 
 
 
        </main>






</main>
@endsection
