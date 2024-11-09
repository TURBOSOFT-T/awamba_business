@extends('front.fixe')
@section('titre', 'Mes Favoris')
@section('body')

<main>
    <main class="main-wrapper">

        
        <div class="axil-wishlist-area axil-section-gap" style="margin-inline:1rem 1rem">
            <div class="container" >
                <div class="mb-4  d-flex justify-content-between align-items-center">
                    <h4 class="title">Liste de mes favoris sur AWAMBA</h4>
					<div>
					 <button class="btn btn-outline-white border fs-4 p-3 mb-3 ">Ajouter Tous au Panier</button>
 
                </div>
                </div>
                @livewire('Front.Favoris')
          
            </div>
        </div>
       
    </main>

</main>
@endsection
