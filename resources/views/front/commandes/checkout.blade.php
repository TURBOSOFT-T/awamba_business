
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

        <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <form action="{{ route('order.confirm') }}" method="post">
                    @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                         
                            <div class="axil-checkout-billing">
                                <h4 class="title mb--40">  {{ \App\Helpers\TranslationHelper::TranslateText("Détails facture") }}</h4>
                               
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>  {{ \App\Helpers\TranslationHelper::TranslateText("Nom") }} <span>*</span></label>
                                            <input type="text" name="nom"    @if (Auth::user()) value="{{ Auth::user()->nom }}" @endif required/>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>  {{ \App\Helpers\TranslationHelper::TranslateText("Prénom") }}<span>*</span></label>
                                            <input type="text" name="prenom"    @if (Auth::user()) value="{{ Auth::user()->prenom }}" @endif required/>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email <span>*</span></label>
                                            <input type="mail" name="email"    @if (Auth::user()) value="{{ Auth::user()->email }}" @endif required/>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>  {{ \App\Helpers\TranslationHelper::TranslateText("Téléphone") }}<span>*</span></label>
                                            <input type="number" name="phone"   required/>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>  {{ \App\Helpers\TranslationHelper::TranslateText("Adresse") }} <span>*</span></label>
                                   
                                    <input type="text" name="adresse"  class="mb--15" placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText("Votre adresse") }}" required />  
                                </div>
                               
                                <div class="form-group">
                                    <label>Gouvernorat <span>*</span></label>
                                    <select   name="gouvernorat" id="Region">
                                        <option value="">Gouvernorat</option>
                                        @foreach ($gouvernorats as $gouvernorat)
                                        <option value="{{ $gouvernorat }}">
                                            {{ $gouvernorat }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                              
                               
                                <div class="form-group">
                                    <label>   {{ \App\Helpers\TranslationHelper::TranslateText("Message(Optionnel)") }}</label>
                                    <textarea id="message" rows="2" placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText("Note sur votre commande(optionnel)") }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">  {{ \App\Helpers\TranslationHelper::TranslateText("Votre commande") }}</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table">
                                        <thead>
                                            <tr>
                                                <th>  {{ \App\Helpers\TranslationHelper::TranslateText("Article") }}</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paniers as $id => $details)
                                            <tr class="order-product">
                                                <td>{{ $details['nom'] }} <span class="quantity">x {{ $details['quantite'] }}</span></td>
                                                <td> {{ $details['total'] }} XCFA</td>

                                            </tr>
                                            @endforeach
                                           
                                            <tr class="order-subtotal">
                                                <td>Subtotal</td>
                                                <td>{{ $total }} XCFA</td>
                                            </tr>
                                            

                                            <tr class="order-shipping">

                                                <tbody>
                                                    <td colspan="2">
                                                    <tr>
                                                        <td class="tax">  {{ \App\Helpers\TranslationHelper::TranslateText("Frais d'expédition") }}</td>
                                                        <td>{{ $configs->frais ?? 0 }}
                                                            XCFA</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td class="tax">Coupon de réduction</td>
                                                        <td>-{{ session('coupon')['value'] ?? 0 }}
                                                            DT</td>
                                                    </tr> --}}
                                                    </td>
                                                   
                                                </tbody>
                                             
                                            </tr>
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">{{ $total + $configs->frais ?? 0 }} DT</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <button type="submit" class="axil-btn btn-bg-primary2 checkout-btn">Confirmation</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Checkout Area  -->
        <style>
            .btn-bg-primary2 {
                background-color: #5EA13C;
                color: #ffffff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
            }
    
            .btn-bg-secondary2 {
            background-color: #EFB121; /* Couleur de fond, bleu dans cet exemple */
            color: #ffffff; /* Couleur du texte, blanc dans cet exemple */
            border: none;
            padding: 10px 20px; /* Optionnel, ajuste la taille */
            border-radius: 5px; /* Optionnel, arrondit les coins */
            text-decoration: none; /* Supprime le soulignement */
        }
        </style>
    </main>

</main>

@endsection