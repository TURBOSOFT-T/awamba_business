@extends('front.fixe')
@section('titre', "Félicitation pour votre commande")
@section('body')

<main> 
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">{{ __('accueil') }}</a></li>
                            <li class="breadcrumb-item"><a href="#">  {{ \App\Helpers\TranslationHelper::TranslateText("Support") }}</a></li>
                           
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->
    
    <!-- ======================= Product Detail ======================== -->
    <section class="middle">
        <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Icon -->
                    <div class="p-4 d-inline-flex align-items-center justify-content-center circle bg-light-success text-success mx-auto mb-4"><i class="lni lni-heart-filled fs-lg"></i></div>
                    <!-- Heading -->
                    <h2 class="mb-2 ft-bold">
                        {{ \App\Helpers\TranslationHelper::TranslateText("Votre commande est Completée") }}
                    </h2>
                    <!-- Text -->
                    <p class="ft-regular fs-md mb-5">  
                        {{ \App\Helpers\TranslationHelper::TranslateText("Félicitation pour  votre commande !") }}
                    </p>
                    <!-- Button -->
                    <a class="btn btn-dark" href="/shop"> 
                        {{ \App\Helpers\TranslationHelper::TranslateText("Continuer les achats") }}
                    </a>
                </div>
            </div>
            
        </div>
    </section>
    </main>

    <style>
        .card-bodyx{
            margin-bottom: 20px;
            margin-top: 20px;
        }
    </style>
@endsection
