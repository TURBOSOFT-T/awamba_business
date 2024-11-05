@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
@include('sweetalert::alert')
		@php
            $config = DB::table('configs')->first();
            $service = DB::table('services')->get();
            $produit = DB::table('produits')->get();
        @endphp

 <main class="main-wrapper">
<style>
        .promo-section {
            background-color: #FAE7E7; /* Light pink */
            color: #d32f2f; /* Dark red */
            text-align: center;
           padding: 10rem;
        }
        
        .form-group .custom-input {
			border:none;
            border-bottom: 4px solid #f9f9f9; /* Red border */
            border-radius: 0;
            padding: 12px 15px;
            font-size: 1.5rem;
            color: #000;
            background-color: #fff; /* Light background */
            transition: border-color 0.3s ease;
        }
        .form-group .custom-input:focus {
            outline: none;
            border-color: #DB4444; /* Red border on focus */
            background-color: #fff; /* White background on focus */
            box-shadow: none;
        }
        .custom-input::placeholder {
            color: #aaa; /* Light grey placeholder */
            font-size: 1.5rem;
        }
        
.carousel-controls {
    position: absolute; /* Positionner les contrôles par rapport au parent */
    top: 50%; /* Centrer verticalement */
    left: 50%; /* Centrer horizontalement */
    transform: translate(-50%, -50%); /* Ajuster le centrage */
    display: flex; /* Utiliser flexbox pour aligner les boutons */
    justify-content: space-between; /* Espacement entre les boutons */
    width: 100%; /* Largeur pleine pour le centrage */
    padding: 0 20px; /* Optionnel : espacement latéral */
}

.carousel-control-prev, .carousel-control-next {
    background-color: rgba(255, 255, 255, 0.8); /* Couleur de fond semi-transparente */
    border-radius: 50%; /* Arrondir les coins */
    width: 30px; /* Largeur personnalisée */
    height: 30px; /* Hauteur personnalisée */
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Ombre */
    transition: background-color 0.3s, transform 0.3s; /* Transition */
}

.carousel-control-prev:hover, .carousel-control-next:hover {
    background-color: rgba(255, 255, 255, 1); /* Couleur de fond lors du survol */
    transform: scale(1.1); /* Agrandir légèrement lors du survol */
}

.carousel-control-prev i, .carousel-control-next i {
    font-size: 20px; /* Taille de l'icône */
    color: #999; /* Couleur de l'icône */
}

.visually-hidden {
    display: none; /* Masquer le texte pour l'accessibilité */
}



		</style>

		
		<div class="bg-color-white mb--30">
            <div class="container-fluid">
                <div class="mb--30">
                    <div class="row row--30 vh-100">
        <!-- Left Section - Promo Section -->
       <div class="col-lg-6 d-md-none d-sm-none d-lg-block d-flex align-items-center justify-content-center promo-section">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
		
			<div class="carousel-item active">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="d-flex flex-column" >
                         <span class="h2" style="color:#DB4444">Livraison Express Gratuite pour tout achat à partir de 50 000XAF </span>
						 <a href="/login" class="text-decoration-none fs-5">Voir Conditions et Confidentialité</a>
                        </h1>
						
                        <div class="mt-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWVoKNutNdQqwNDUp9VWX36p3j2SmX3jkXRw&s" 
                                 alt="Promo Image" class="img-fluid" style="max-width: 80%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="carousel-controls">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i> <!-- Icône de flèche gauche -->
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i> <!-- Icône de flèche droite -->
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


        <!-- Right Section - Signup Form -->
        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center signup-form-section">
		@livewire('connexion') 
           
        </div>
    </div>
	
					</div>
				</div>
			</div>
		</div>
        
		
   
  </main>
 
  @endsection