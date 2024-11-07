
@extends('front.fixe')
@section('titre', 'Paiement')
@section('body')
<main>

<body class="sticky-header">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>

    <main class="main-wrapper">
<div class="gray py-3">
            <div class="container">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ __('Acceuil') }}</a></li>
                               
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Commande') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
		 
            <div class="container">
			
			 <h4 class="title mb--40">  {{ \App\Helpers\TranslationHelper::TranslateText("Détails de Paiement") }}</h4>

                <form action="{{ route('order.confirm') }}" method="post">
                    @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-lg-7">
                         
                            <div class="axil-checkout-billing">
                               
                                <div class="row">
                                    <div class="col-lg-8">
									<div class="form-group">
									<span>Nom et Prénom *</span>
                    <input  type="text" id="nom" class="form-control" @if (Auth::user()) value="{{ Auth::user()->nom }}" @endif required />
                   
                </div>
                </div>
				 <div class="col-lg-8">
									<div class="form-group">
									<span>Nom de l'entreprise</span>
                    <input  type="text" id="societe" class="form-control">
                   
                </div>
                </div>
				<div class="col-lg-8">
									<div class="form-group">
									<span>Addresse de la Rue *</span>
                    <input  type="text" id="adresse" class="form-control" required>
                   
                </div>
                </div>
				<div class="col-lg-8">
									<div class="form-group">
									<span>Appartement, étage, etc. (Facultatif)</span>
                    <input  type="text" id="lieu" class="form-control">
                   
                </div>
                </div>
				<div class="col-lg-8">
									<div class="form-group">
									<span>Ville/Commune*</span>
                    <input  type="text" id="ville" class="form-control" required>
                   
                </div>
                </div>
				<div class="col-lg-8">
									<div class="form-group">
									<span>Numéro de Téléphone*</span>
                    <input  type="tel" id="phone" name="phone" class="form-control" required>
                   
                </div>
                </div>
				<div class="col-lg-8">
									<div class="form-group">
									<span>Addresse Email*</span>
                    <input  type="email" name="email"    @if (Auth::user()) value="{{ Auth::user()->email }}" @endif required>
                   
                </div>
                </div>
				<div class="col-lg-12">
				<div class="d-flex align-items-center">
                <input type="checkbox" name="accept" class="custom-checkbox" value="70_percent" id="condi" />
                <label for="condi" class="ms-2">Conserver les informations pour une commande future</label>
            </div>
				</div>
				
</div>
</div>
                              
                        </div>
                        <div class="col-lg-5">
                            <div class="">
                                <div class=" my-5 mt-4  summery-table-wrap">
                                    <table class="table summery-table">
                                       
                                        <tbody>
                                            @foreach ($paniers as $id => $details)
                                            <tr class="order-product d-flex justify-content-between">
											<td class="d-flex gap-4 align-items-center" >
											<img width="80" src="{{ Storage::url($details['photo']) }}" alt="{{ $details['nom'] }}"> 
											<span>{{ $details['nom'] }}</span>
											</td>
                                                <td> {{ $details['total'] }}  <x-devise></x-devise></td>
                                            </tr>
                                            @endforeach
                                           
                                            <tr class="mt-4 border-bottom d-flex justify-content-between">
                                                <td>Sous-Total:</td>
                                                <td>{{ $total }}  <x-devise></x-devise></td>
                                            </tr>
                                            

                                            <tr class="order-shipping ">

                                                <tbody>
                                                    <td colspan="2" >
                                                    <tr class="border-bottom d-flex justify-content-between" >
                                                        <td class="tax">  {{ \App\Helpers\TranslationHelper::TranslateText("Livraison") }}</td>
                                                        <td>{{ $configs->frais ?? 0 }}
                                                            <x-devise></x-devise></td>
                                                    </tr>
                                                    
                                                    </td>
                                                   
                                                </tbody>
                                             
                                            </tr>
                                            <tr class="order-total border-bottom d-flex justify-content-between">
                                                <td>Total</td>
                                                <td class="order-total-amount">{{ $total + $configs->frais ?? 0 }} <x-devise></x-devise></td>
                                            </tr>
											
                                        </tbody>
                                    </table>
                                </div>
<div class="mb-5 d-flex flex-column">
    <div class="payment-option mb-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <input type="radio" name="payment" class="custom-radio" checked value="70_percent" id="payment_70" />
                <label for="payment_70" class="ms-2">Paiement de 70% avant la livraison</label>
            </div>
            <div>
                <img width="150" src="https://mesomb.com/wp-content/uploads/2023/04/mobile-money.jpg" alt="Mobile Money Logo" />
            </div>
        </div>
    </div>
    <div class="payment-option">
        <div class="d-flex align-items-center">
            <input type="radio" name="payment" class="custom-radio" value="30_percent" id="payment_30" />
            <label for="payment_30" class="ms-2">Paiement de 30% avant la livraison</label>
        </div>
    </div>
</div>

                                
                               <div class="d-flex flex-column gap-3">
							    <button type="submit" class="axil-btn btn-bg-primary2 checkout-btn">Valider la Commande</button>
								<a href="/conditions">Voir Conditions et Confidentialité</a>
							   </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Checkout Area  -->
        <style>
            .btn-bg-primary2 {
                background-color: #DB4444;
                color: #ffffff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
				max-width:250px;
            }
    
            .btn-bg-secondary2 {
            background-color: #EFB121; /* Couleur de fond, bleu dans cet exemple */
            color: #ffffff; /* Couleur du texte, blanc dans cet exemple */
            border: none;
            padding: 10px 20px; /* Optionnel, ajuste la taille */
            border-radius: 5px; /* Optionnel, arrondit les coins */
            text-decoration: none; /* Supprime le soulignement */
        }
		input[type="text"],
    input[type="email"],
    input[type="tel"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fbecec;
    }
		.form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fbecec; /* Couleur de fond légèrement rose */
        }


input[type="radio"] + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    border: 2px solid #333; 
    border-radius: 50%; 
    background: white; 
}
input[type="checkbox"] + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    border: 2px solid #DB4444; 
    border-radius: 0%; 
    background: white; 
}

input[type="checkbox"]:checked + label:before {
    background: #DB4444; 
    border: 2px solid #DB4444; 
}


input[type="radio"]:checked + label:before {
    background: #333; 
    border: 2px solid #999; 
}



        </style>
    </main>

</main>

@endsection