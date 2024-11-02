@extends('front.fixe')

@section('body')
    <main>
      
        <!-- error area start -->
        <br><br><br>
        <section class="error section-space">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="error__content">
    
                            <div class="error__content-medias mb-40 mb-sm-35 mb-xs-30">
                                <img class="upDown-bottom" src="assets/imgs/404/404.png" alt="image not found" style=" height:50; width:50 ">
                            </div>
    
                            <div class="section__title-wrapper text-center">
                                <h3 class="section__title mb-15 mb-xs-10 wow fadeIn animated" data-wow-delay=".3s">Désolé, page introuvable</h3>
                                <p class="mb-40 mb-sm-25 mb-xs-20 wow fadeIn animated" data-wow-delay=".5s">La page que vous recherchez ne se ferme pas. Veuillez l'essayer.</p>
    
                                <div class="error-btn-wrap">
                                    <a href="{{ route('home') }}" class="error-btn wow fadeIn animated" data-wow-delay=".7s"> Retour a l'Accueil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
   
    </main>


    <style>
        .img {
            max-width: 100%;
            width: 500px;
        }
    </style>
@endsection
