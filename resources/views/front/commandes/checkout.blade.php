@extends('front.fixe')
@section('titre', 'Paiement')
@section('body')
    <main>

        <div class="gray py-3">
            <div class="container">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('accueil') }}</a></li>
                             
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ \App\Helpers\TranslationHelper::TranslateText("Confirmation de commande") }}
                                </li>
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
            
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="text-center d-block mb-5">
                            <h2>  {{ \App\Helpers\TranslationHelper::TranslateText("Confirmation de commande") }}</h2>
                        </div>
                    </div>
                </div>
                <form action="{{ route('order.confirm') }}" method="post">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    @endif
                    @csrf
                <div class="row justify-content-between">
                    <div class="col-12 col-lg-7 col-md-12">
                       {{--  <form action="{{ route('order.confirm') }}" method="post">
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif
                            @csrf --}}
                            <h5 class="mb-4 ft-medium">  {{ \App\Helpers\TranslationHelper::TranslateText("Détails facture") }}</h5>
                            <div class="row mb-2">
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Nom *</label>
                                        <input type="text" name="nom" class="form-control"  @if (Auth::user()) value="{{ Auth::user()->nom }}" @endif
                                        required  placeholder="Votre nom" />
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __('Prenom') }} *</label>
                                        <input type="text" name="prenom" class="form-control" placeholder="{{ __('Prenom') }}" name="prenom"
                                        @if (Auth::user()) value="{{ Auth::user()->prenom }}" @endif
                                        required />
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Email *</label>
                                        <input type="email" class="form-control" placeholder="Email"name="email"
                                        @if (Auth::user()) value="{{ Auth::user()->email }}" @endif
                                        required  />
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __('telephone') }}</label>
                                        <input type="number" name="phone"  class="form-control" placeholder="{{ __('telephone') }}" required/>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __('adresse') }}</label>
                                        <input type="text" class="form-control" name="adresse"  placeholder="{{ __('adresse') }}" required/>
                                    </div>
                                </div>
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __('gouvernorat') }}</label>
                                        <select name="gouvernorat" class="custom-select">
                                            <option value="">{{ __('gouvernorat') }}</option>
                                            @foreach ($gouvernorats as $gouvernorat)
                                                <option value="{{ $gouvernorat }}">
                                                    {{ $gouvernorat }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                               
                                
                               
                                
                            </div>
                            
                         
                            
                            <div class="row mb-4">
                                <div class="col-12 col-lg-12 col-xl-12 col-md-12">
                                    <div class="panel-group pay_opy980" id="payaccordion">
                                
                                    
                                    </div>
                                </div>
                            </div>
                            
                       {{--  </form> --}}
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-12 col-lg-4 col-md-12">
                        <div class="d-block mb-3">
                            <h5 class="mb-4">  {{ \App\Helpers\TranslationHelper::TranslateText("Asticles") }} (  {{ count($paniers) }} )</h5>
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                                
                                @foreach ($paniers as $id => $details)
                                
                                <li class="list-group-item">
                                  
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <!-- Image -->
                                            <a href="{{ route('details-produits', ['id' => $details['id_produit'], 'slug'=>Str::slug(Str::limit($details['nom'], 10))]) , }}"><img src="{{ Storage::url($details['photo']) }}" alt="..." class="img-fluid"></a>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <div class="cart_single_caption pl-2">
                                                <h4 class="product_title fs-md ft-medium mb-1 lh-1">{{ $details['nom'] }}</h4>
                                                <p class="mb-1 lh-1"><span class="text-dark">Qté:  {{ $details['quantite'] }}</span></p>
                                                {{-- <p class="mb-1 lh-1"><span class="text-dark">Taille:  {{ $details['taille'] }}</span></p>  --}}
                                                
                                                
                                                <h4 class="fs-md ft-medium mb-3 lh-1">{{ $details['total'] }} DT</h4>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        
                        <div class="card mb-4 gray">
                          <div class="card-body">
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                              <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Subtotal</span> <span class="ml-auto text-dark ft-medium">{{ $total }} DT</span>
                              </li>
                              <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>
                                    {{ \App\Helpers\TranslationHelper::TranslateText("Frais de transport") }}    
                                </span> <span class="ml-auto text-dark ft-medium">{{ $configs->frais ?? 0 }} DT</span>
                              </li>
                              <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                <span>Total</span> <span class="ml-auto text-dark ft-medium">{{ $total  + $configs->frais ?? 0 }} DT</span>
                              </li>
                              <li class="list-group-item fs-sm text-center">
                                
                                {{ \App\Helpers\TranslationHelper::TranslateText("Frais d'expédition calculés à la caisse") }} *
                              </li>
                            </ul>
                          </div>
                        </div>
                        
                       {{--  <a class="btn btn-block btn-dark mb-3" href="checkout.html">Place Your Order</a> --}}
                        <button class="btn btn-block btn-dark mb-3">Confirmation
                        </button>

                        <div id="paypal-button-container"></div>
                       
                      
                            
                    </div>
                    
                </div>
                </form>
                
            </div>
        </section>
        <!-- ======================= Product Detail End ======================== -->
        </section>

<!-- ============================= Customer Features =============================== -->

 <!-- Include the PayPal JavaScript SDK -->
 
    </main>
    <style>
        .nice-select {
            display: none !important;
        }
    </style>
@endsection
<body>
    <!-- Set up a container element for the button -->
   

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AaTmEaKOFp1pLIY8_NFZImd8kdYTrMVa-w7f3AM7emOkB00ZwdImJ-bq9GM_zQeIpUnptsYafMl0APta"></script>


    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Call your server to set up the transaction
            createOrder: function(data, actions) {
                return fetch('/api/paypal/order/create', {
                    method: 'POST',
                    body:JSON.stringify({
                        'Total': "{{ $total  + $configs->frais ?? 0 }} DT",
                        
                    })
                }).then(function(res) {
                    //res.json();
                    return res.json();
                }).then(function(orderData) {
                    //console.log(orderData);
                    return orderData.id;
                });
            },

            // Call your server to finalize the transaction
            onApprove: function(data, actions) {
                return fetch('/demo/checkout/api/paypal/order/' + data.orderID + '/capture/', {
                    method: 'post'
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    
                    var errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        return actions.restart(); 
                    }

                    if (errorDetail) {
                        var msg = 'Sorry, your transaction could not be processed.';
                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                        if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                        return alert(msg); 
                    }

                   
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                  
                });
            }

        }).render('#paypal-button-container');
    </script>
</body>
