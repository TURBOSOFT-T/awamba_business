@extends('front.fixe')
@section('titre', "Contact")
@section('body')
    <main>
@php
    
    $config = DB::table('configs')->first();
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
<style>
/* General styling */
.container p, .container h5, .container h6 {
    line-height: 1.6;
}

.btns {
             background-color: #DB4444;
            color: #fff;
            border: none;
            width: 100%;
            padding: 15px;
            border-radius: 5px;
			text-decoration:none;
			font-size:1.5rem
        }
		.btns:hover{
						text-decoration:none;
						color:#fff;
		}
</style>
<div class="axil-breadcrumb-area bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item1 active" aria-current="page">Règles et Confidentialité</li>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

<div class="container my-5">
    <!-- Conditions Section -->
    <div class="row text-black">
        <div class="col-12">
            <h5 class="text-muted">Règles et Directives d'Utilisation d'Awamba Business</h5>
            <p>Bienvenue sur Awamba Business, la plateforme d'intermédiation sécurisée pour faciliter les transactions entre acheteurs et vendeurs. Nous garantissons la confidentialité des informations des vendeurs et nous nous assurons que toutes les transactions passent par Awamba Business pour une expérience fiable et sécurisée.</p>

            <h6>1. Règles pour les Vendeurs</h6>
			<p><strong>Description des Produits : </strong>Les vendeurs doivent fournir une description fidèle et détaillée de chaque produit, incluant des images ou vidéos réalistes et représentatives du produit réel. Toute fausse déclaration entraînera des sanctions.</p>
            <p><strong>Qualité et Authenticité : </strong>Seuls les produits authentiques et légaux sont acceptés. Toute violation de cette règle entraînera la suppression immédiate du compte du vendeur.</p>
            <p><strong>Notation : </strong>Les acheteurs ont la possibilité de noter les vendeurs après chaque transaction. Les vendeurs avec des évaluations constamment basses seront exclus de la plateforme.</p>
            <p><strong>Traitement des Paiements : </strong>Tous les paiements sont effectués via Awamba Business, par dépôt sur les numéros MTN et Orange Money de la plateforme.</p>

            <h6>2. Règles pour les Acheteurs</h6>
			<p><strong>Montant Minimum des Commandes :
			<ul>
            <li><strong>Achats Nationaux :</strong> Pas de minimum requis.</p>
            <li><strong>Achats Internationaux :</strong> Pour les transactions internationales, un montant minimum de 100 000 francs CFA est requis pour valider la commande, afin de rationaliser les coûts de logistique.</strong></li>
            </ul>
			</p>
            <p><strong>Avance de Paiement :</strong>
			<ul>
            <li><strong>Achats Nationaux :</strong> Pour une transaction dans le même pays que le vendeur, l'acheteur doit verser une avance de 30 % du prix du produit.</p>
            <li><strong>Achats Internationaux:</strong> Pour une transaction entre différents pays, un acompte minimum de 75 % du prix du produit est requis, en plus des frais de livraison et de douane, si applicables.</li>
            </ul>
			</p>
			<p><strong>Comportement d'Achat :</strong> Les acheteurs qui annulent fréquemment leurs commandes ou qui refusent de finaliser les transactions de manière récurrente seront bannis de la plateforme.</li>
            <p><strong>Notation des Vendeurs :</strong> Les acheteurs sont encouragés à noter leurs expériences après chaque transaction pour aider à maintenir un environnement de confiance.</p>

            <h6>3. Modalités de Paiement et Livraison</h6>
            <p><strong>Paiement Sécurisé :</strong> Tous les paiements doivent être effectués via les canaux sécurisés d’Awamba Business (MTN et Orange Money). Aucun paiement en espèces ou transaction hors plateforme n'est autorisé.</p>
            <p><strong>Livraison :</strong>Pour les commandes nationales, Awamba Business coordonne la livraison. En cas d'achat international, les frais de livraison et, si applicable, les frais de douane sont à la charge de l'acheteur.</p>

            <h6>4. Règles Générales d'Utilisation</h6>
            <p><strong>Confidentialité :</strong>  Les coordonnées des vendeurs, notamment les numéros de téléphone, sont masquées pour protéger leur vie privée. Toute communication doit passer par les services de messagerie d’Awamba Business.</p>
            <p><strong>Respect des Transactions :</strong> L'usage abusif de la plateforme, notamment les fraudes ou fausses annonces, entraînera des sanctions immédiates.</p>
            <p><strong>Politique de Réclamations :</strong>En cas de problème avec une commande, les utilisateurs peuvent contacter le service client pour une assistance rapide. Awamba Business fait office de médiateur pour garantir une résolution équitable.</p>
        </div>

        <!-- Acceptance Checkbox and Continue Button -->
        <div class="d-flex mb-5 mt-5 justify-content-center align-items-center gap-3">
            <input type="checkbox" id="acceptCheckbox" class="custom-checkbox">
            <label for="acceptCheckbox">J’ai lu et j’accepte les règles d’utilisation AWAMBA BUSINESS</label>
        </div>
        <div class="d-flex mt-5 justify-content-center align-items-center">
            <button class="btns w-md-50 w-25">Continuer</button>
        </div>
    </div>
</div>


 
    </main>
    @endsection
    
