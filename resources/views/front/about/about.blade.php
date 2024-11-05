@extends('front.fixe')
@section('titre', "Contact")
@section('body')
    <main>
@php
    
    $config = DB::table('configs')->first();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

<div class="axil-breadcrumb-area bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item1 active" aria-current="page">A Propos</li>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->
<style>
.profile {
	
            padding: 20px;
        }
        
        .profile .picture {
            border-radius: 8px;
            width: 350px;
            height: 350px;
            object-fit: cover;
            margin-bottom: 15px;
        }
        
        .profile h3 {
			font-size: 1.25rem;
            margin-bottom: 5px;
        }
        
        .profile p {
			 color: #555;
            margin-bottom: 5px;
        }

       

        /* Service boxes styling */
        .service-boxs {
			display:flex;
			flex-direction:column;
			justify-content:center;
			align-items:center;
            text-align: center;
            padding: 20px;
			border:none;
        }
        
        .service-boxs i {
			margin:0 auto;
			width:60px;
			height:60px;
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 10px;
			border-radius:50%;
			border:4px solid #eee;
			background:#DB4444;
			padding:15px 13px;
        }
        
        .service-boxs p {
            margin-bottom: 0;
        }
                .stat-box {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            transition: background-color 0.3s, color 0.3s;
            color: black;
			display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: white;
            width: 100%; 
            height: 100%; 
        }

        .stat-box i {
			margin:0 auto;
			width:60px;
			height:60px;
            font-size: 3rem;
            color: #fff;
            margin-bottom: 10px;
			border-radius:50%;
			border:4px solid #eee;
			background:#DB4444;
			padding:8px 8px;
            transition: color 0.3s;
        }
		
		.stat-box .stat-number {
            font-size: 2em;
            font-weight: bold;
        }

        .stat-box:hover {
            background-color: #DB4444; /* red background on hover */
            color: white; /* white text on hover */
			cursor:pointer;
        }

        .stat-box:hover i,.stat-box:hover p {
            color: white; /* white icon color on hover */
        }
		
		.row-equal-height .col-md-3 {
            display: flex;
            flex-grow: 1;
        }
		.social-icons {
    display: flex; /* Align items in a row */
	justify-content:start;
    gap: 10px; /* Space between icons */
}

.social-icon {
    width: 20px; /* Set width for the icons */
    height: auto; /* Maintain aspect ratio */
    transition: transform 0.2s, opacity 0.2s; /* Transition for hover effects */
    opacity: 0.8; /* Slightly transparent for aesthetic */
}

.social-icon:hover {
    transform: scale(1.1); /* Slightly enlarge on hover */
    opacity: 1; /* Full opacity on hover */
}
		
    </style>
	<div class="container my-5">
    <!-- About Section -->
    <div class="row">
        <div class="col-12">
            <h1>Notre Histoire</h1>
            <p class="text-muted">À propos d’Awamba Business </p>
            <p>
               Awamba Business est née de la vision d'une Afrique connectée à l'économie mondiale, où les produits africains trouvent leur place sur la scène internationale. Fondée en décembre 2024, Awamba Business est une plateforme innovante qui permet aux fabricants locaux, artisans, petites entreprises, et commerçants africains de vendre leurs produits non seulement en Afrique mais aussi en Europe, en Amérique et en Asie.
			</p>
            <p>
Awamba Business, c'est avant tout une mission : donner aux producteurs africains les moyens de conquérir de nouveaux marchés et aux consommateurs d'accéder à des produits locaux et internationaux à des prix compétitifs. Notre plateforme se distingue par son engagement envers les vendeurs. Sur Awamba Business, publier des produits est entièrement gratuit, sans abonnement ni frais de commission. Que vous soyez un fabricant local, un grossiste ou un petit commerçant, vous pouvez vendre vos produits à l'international sans frais.
            </p>
			<p>
			Pour les acheteurs, nous offrons également une expérience unique. Toute commande d’un montant minimum de 50 000 francs CFA bénéficie de la livraison gratuite si le produit est localisé dans le même pays que l’acheteur. Pour les produits provenant d'autres pays, nous facilitons les options de livraison internationale.
			</p>
			<p>
			La mission d'Awamba Business
			</p>
			<p>
			Awamba Business a été créée pour transformer l’expérience du commerce africain, en permettant aux produits africains de briller au-delà des frontières. Notre mission se concentre sur trois objectifs clés :
<ol>
<li>Connecter les fabricants africains au monde : En permettant aux producteurs locaux de vendre sur les marchés européens, américains et asiatiques, Awamba Business contribue à ouvrir des portes pour l'industrie africaine à l'international.</li>
<li>Offrir aux commerçants un accès à l’international : Awamba Business permet aux entrepreneurs africains de commander des produits sur des plateformes mondiales comme Amazon et Alibaba et de les revendre sur le marché africain à travers notre plateforme.</li>
<li>Soutenir le commerce local sans frais : Nous croyons que les créateurs de valeur africaine méritent de prospérer sans frais d’inscription ni commissions, en leur offrant une plateforme où ils peuvent publier et vendre sans contraintes financières.</li>
</ol>
			</p>
			<p>
			Message du Fondateur – Abdel Awamba
			</p>
			<p>
			Je m'appelle Abdel Awamba, fondateur d’Awamba Business. Mon rêve est de voir les produits africains valorisés à l’international et d'aider les commerçants de notre continent à prospérer. C'est avec cette vision que j'ai lancé Awamba Business, pour qu'elle devienne le tremplin des producteurs et des commerçants africains vers le monde entier. En tant que passionné par l’entrepreneuriat et le potentiel de l'Afrique, je suis déterminé à faire d’Awamba Business une entreprise de référence pour le commerce en ligne en Afrique.
			</p>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="row row-equal-height text-center mt-5">
        <div class="col-md-3 mb-3">
            <div class="stat-box">
                <i class="bi bi-box-seam fs-1"></i>
                <p class="stat-number">10.5k</p>
                <p>Commandes Livrées</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-box">
                <i class="bi bi-people fs-1"></i>
                <p class="stat-number">33k</p>
                <p>Vendeurs actuellement</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-box">
                <i class="bi bi-person-check fs-1"></i>
                <p class="stat-number">45.5k</p>
                <p>Clients en ligne</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-box">
                <i class="bi bi-cart-check fs-1"></i>
                <p class="stat-number">25k</p>
                <p>Commandes en attente</p>
            </div>
        </div>
		<div class="col-md-12 m-3">
		<!-- Profile Section -->
    <div class="profile d-flex flex-column justify-content-center align-items-center">
        <img src="https://t4.ftcdn.net/jpg/06/13/74/95/240_F_613749525_Y1yxH6Ip7e3oJaMvLRYeciBWuXHWMLMV.jpg" class="picture" alt="Profile Picture">
        
        <p class="d-flex flex-column align-items-center">
		<span class="fs-1 fw-bold" >Abdel AWAMBA</span>
		<span class="w-75 fs-3">Fondateur de la Plateforme AWAMBA BUSINESS</span>
		<div class="social-icons text-start">
            <a href="#"><img src="assets/images/icons/twitter.png" class="social-icon" alt="Twitter"></a>
            <a href="#"><img src="assets/images/icons/instagram.png" class="social-icon" alt="Instagram"></a>
            <a href="#"><img src="assets/images/icons/sociale.png" class="social-icon" alt="LinkedIn"></a>
        </div>
		</p>
        
        
    </div>
    </div>
    
    <!-- Services Section -->
    <div class="row d-flex justify-content-between mt-5">
        <div class="col-md-4 mb-3">
            <div class="service-boxs">
                <i class="far fa-truck"></i>
                <h5>Livraison Gratuite et Rapide</h5>
                <p> 
				Livraison Gratuite Pour Toute Commande égale
ou supérieure à 50 000 XAF si vous êtes dans le
même pays que le fournisseur
				</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="service-boxs">
                <i class="far fa-headset"></i>
                <h5>Service Client 24/7</h5>
                <p> Soutien Client Amical</p>
            </div>
        </div>
    </div>
    </div>
</div>



        
    </main>
    @endsection
    
