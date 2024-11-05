@extends('front.fixe')
@section('titre', "Contact")
@section('body')
    <main>
@php
    
    $config = DB::table('configs')->first();
@endphp

<div class="axil-breadcrumb-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item1 active" aria-current="page">A Propos de Nous</li>
                        <style>
                            .axil-breadcrumb-item1 {
    font-size: 14px;
    color: #de1212; /* Default breadcrumb color */
}

.axil-breadcrumb-item.active {
    font-weight: bold;
    color: #de1212; /* Distinct color for active item */
}

                        </style>
                    </ul>
                    <h1 class="title">A Propos de notre Boutique</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="inner">
                    <div class="bradcrumb-thumb">
                        <img  src="{{ Storage::url($config->image_about ?? ' ') }}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->

<!-- Start About Area  -->
<div class="axil-about-area about-style-1 axil-section-gap ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-6">
                <div class="about-thumbnail">
                    <div class="thumbnail">
                        <img src="{{ Storage::url($config->image_apropos ?? ' ') }}" alt="About Us">
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6">
                <div class="about-content content-right">
                 <h4>   <span class="axil-breadcrumb-item1 active" aria-current="page"> <i class="far fa-shopping-basket"></i> A Propos de Nous</span> </h4>
                   {{--  <span class="title-highlighter highlighter-primary2"> <i class="far fa-shopping-basket"></i>A Propos de nous</span>
                   --}}  <h3 class="title">{{ $config->titre_apropos ?? '' }}</h3>
                    
                    <div class="row">
                        <div class="col-xl-12">
                            <p style="text-align: justify">{!! $config->des_apropos ?? ' ' !!}</p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Area  -->


<!-- Start About Area  -->
<div class="axil-about-area about-style-2">
    <div class="container">

        <div class="row align-items-center">
            <div class="col-lg-5 order-lg-2">
                <div class="about-thumbnail">
                    <img src="{{ Storage::url($config->image_apropos2 ?? ' ') }}"alt="about">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="about-content content-left">
                   
                    <h4 class="title">{{ $config->titre_apropos2  ?? ' '}}</h4>
                    <p style="text-align: justify">{!! $config->des_apropos2 ?? ' ' !!}</p>
                    <a href="{{ route('shop') }}"  class="axil-btn btn-bg-primary2">Voir Boutique</a>
                </div>
            </div>
        </div>
        <div class="row align-items-center mb--80 mb_sm--60">
            <div class="col-lg-5">
                 <div class="about-thumbnail">
                    <img src="{{ Storage::url($config->image_apropos2 ?? ' ') }}" alt="about">
                </div> 
            </div>
            <div class="col-lg-7">
                <div class="about-content content-right">
                   
                  <h4 class="title">{{ $config->titre_apropos1 ?? ' ' }}</h4>
                    <p style="text-align: justify">{!! $config->des_apropos1 ?? ' ' !!}</p>
                    <a href="{{ route('shop') }}" class="axil-btn  btn-bg-primary2 ">Voir Boutique</a>
                </div>
            </div>
        </div>
       
    </div>
</div>


<style>
    .btn-bg-primary2 {
        background-color: #de1212;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-bg-secondary2 {
    background-color: #de1212; /* Couleur de fond, bleu dans cet exemple */
    color: #ffffff; /* Couleur du texte, blanc dans cet exemple */
    border: none;
    padding: 10px 20px; /* Optionnel, ajuste la taille */
    border-radius: 5px; /* Optionnel, arrondit les coins */
    text-decoration: none; /* Supprime le soulignement */
}
</style>
<!-- End About Area  -->


<!-- End Axil Newsletter Area  -->


<br><br>


        
    </main>
    @endsection
    
