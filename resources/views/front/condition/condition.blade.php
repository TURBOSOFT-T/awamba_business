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
                        <li class="axil-breadcrumb-item1 active" aria-current="page">Règles et Confidentialité</li>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

	<div class="container my-5">
    <!-- About Section -->
    <div class="row text-black ">
        <div class="col-12">
            <p class="text-muted">Règles et Directives d'Utilisation d'Awamba Business</p>
            <p>
               Bienvenue sur Awamba Business, la plateforme d'intermédiation sécurisée pour faciliter les transactions entre acheteurs et vendeurs. Nous garantissons la confidentialité des informations des vendeurs et nous nous assurons que toutes les transactions passent par Awamba Business pour une expérience fiable et sécurisée.
			   </p>
            <p>
1. Règles pour les Vendeurs
            </p>
			<p>
			Description des Produits : Les vendeurs doivent fournir une description fidèle et détaillée de chaque produit, incluant des images ou vidéos réalistes et représentatives du produit réel. Toute fausse déclaration entraînera des sanctions.
</p>
			<p>
Qualité et Authenticité : Seuls les produits authentiques et légaux sont acceptés. Toute violation de cette règle entraînera la suppression immédiate du compte du vendeur.
</p>
			<p>
Notation : Les acheteurs ont la possibilité de noter les vendeurs après chaque transaction. Les vendeurs avec des évaluations constamment basses seront exclus de la plateforme.
</p>
			<p>
Traitement des Paiements : Tous les paiements sont effectués via Awamba Business, par dépôt sur les numéros MTN et Orange Money de la plateforme.</p>
			</p>
			 <p>
2. Règles pour les Acheteurs
            </p>
			<p>
			Montant Minimum des Commandes :
</p>
			<p>
Achats Nationaux : Pas de minimum requis.
</p>
			<p>
Achats Internationaux : Pour les transactions internationales, un montant minimum de 100 000 francs CFA est requis pour valider la commande, afin de rationaliser les coûts de logistique.
</p>
			<p>
Avance de Paiement :
</p>
			<p>
Achats Nationaux : Pour une transaction dans le même pays que le vendeur, l'acheteur doit verser une avance de 30 % du prix du produit.
</p>
			<p>
Achats Internationaux : Pour une transaction entre différents pays, un acompte minimum de 75 % du prix du produit est requis, en plus des frais de livraison et de douane, si applicables.
</p>
			<p>

Comportement d'Achat : Les acheteurs qui annulent fréquemment leurs commandes ou qui refusent de finaliser les transactions de manière récurrente seront bannis de la plateforme.
</p>
			<p>
Notation des Vendeurs : Les acheteurs sont encouragés à noter leurs expériences après chaque transaction pour aider à maintenir un environnement de confiance.
</p>
			
			<p>
			3. Modalités de Paiement et Livraison
			</p>
			<p>
			Paiement Sécurisé : Tous les paiements doivent être effectués via les canaux sécurisés d’Awamba Business (MTN et Orange Money). Aucun paiement en espèces ou transaction hors plateforme n'est autorisé.
</p>
			<p>
Livraison :

Pour les commandes nationales, Awamba Business coordonne la livraison.
</p>
			<p>
En cas d'achat international, les frais de livraison et, si applicable, les frais de douane sont à la charge de l'acheteur.
</p>
			<p>

Avantages pour les Utilisateurs Fidèles : Les acheteurs réguliers et les vendeurs bien notés bénéficient de réductions et de privilèges supplémentaires en reconnaissance de leur fidélité et de leur confiance envers la plateforme.

			</p>
			<p>
			4. Règles Générales d'Utilisation
</p>
			<p>
Confidentialité : Les coordonnées des vendeurs, notamment les numéros de téléphone, sont masquées pour protéger leur vie privée. Toute communication doit passer par les services de messagerie d’Awamba Business.
</p>
			<p>
Respect des Transactions : L'usage abusif de la plateforme, notamment les fraudes ou fausses annonces, entraînera des sanctions immédiates.
</p>
			<p>
Politique de Réclamations : En cas de problème avec une commande, les utilisateurs peuvent contacter le service client pour une assistance rapide. Awamba Business fait office de médiateur pour garantir une résolution équitable.</p>
			</p>
        </div>
    </div>

 <div class='d-flex mb-4 mt-4 justify-content-center align-items-center gap-3'>
 <input type='radio' />
 <span>J’ai lu et j’accepte les règles d’utilisation AWAMBA BUSINESS</span>
 </div>
 <div class='d-flex mt-5 justify-content-center align-items-center gap-3'>
      <button  class="btns w-25">Retour à L'accueil</button>
	  </div>
        <style>.btns {
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
		}</style>	  
    </main>
    @endsection
    
