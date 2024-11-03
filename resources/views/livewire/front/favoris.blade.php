<div class="col-12 col-md-12 col-lg-8 col-xl-8 text-center">
    <!-- row -->
    <div class="row align-items-center">
    
        <!-- Single -->

        @foreach ( $favoris as $key => $favo )
            
      
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
            <div class="product_grid card b-0">
                {{-- <div class="badge bg-success text-white position-absolute ft-regular ab-left text-upper">Sale</div> --}}
               {{--  <button class="btn btn_love position-absolute ab-right theme-cl"><i class="fas fa-times"></i></button>  --}}
                
                <form method="GET" action="{{ url('favoris', $favo->id) }}">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn_love position-absolute ab-right theme-cl show_confirm" data-toggle="tooltip" title='Delete'>
                        <i class="fas fa-times"></i>
                    </button>
                </form>
                <div class="card-body p-0">
                    <div class="shop_thumb position-relative">
                        <a class="card-img-top d-block overflow-hidden" href="{{ route('details-produits', ['id' => $favo->produit->id, 'slug'=>Str::slug(Str::limit($favo->produit->nom, 10))]) , }}"><img class="card-img-top"   src="{{ Storage::url($favo->produit->photo) }}" alt="..."></a>
                        <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                            <div class="edlio"><a href="#" data-toggle="modal" data-target="#{{ $favo->produit->id }}" class="text-white fs-sm ft-medium"><i class="fas fa-eye mr-1"></i>{{ \App\Helpers\TranslationHelper::TranslateText("Voir plus") }}</a></div>
                        </div>
                    </div>
                </div>
                <div class="card-footers b-0 pt-3 px-2 bg-white d-flex align-items-start justify-content-center">
                    <div class="text-left">
                        <div class="text-center">
                            <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="{{ route('details-produits', ['id' => $favo->produit->id, 'slug'=>Str::slug(Str::limit($favo->produit->nom, 10))]) , }}">{{ $favo->produit->nom ?? ' ' }}</a></h5>
                            <div class="elis_rty"><span class="ft-bold fs-md text-dark"> @if ($favo->produit->inPromotion())
                                <span class=" small">
                                    - {{ $favo->produit->inPromotion()->pourcentage }} %
                                </span>
                                <b class="text-success">
                                    {{ $favo->produit->getPrice() }} DT
                                </b>
                                <br>
                                <strike>
                                    <span class="text-danger small">
                                        {{ $favo->produit->prix }} DT
                                    </span>
                                </strike>
                            @else
                                {{ $favo->produit->getPrice() }} DT
                            @endif</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach



        @foreach ( $favoris as $key => $favo )

@if($favo)
<div class="modal fade lg-modal" id="{{ $favo->produit->id }}" tabindex="-1" role="dialog" aria-labelledby="quickviewmodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content" id="quickviewmodal">
            <div class="modal-headers">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="ti-close"></span>
                </button>
              </div>
        
              <div class="modal-body">
                <div class="quick_view_wrap">

                    <div class="quick_view_thmb">
                        <div class="quick_view_slide">
                            @foreach (json_decode($favo->produit->photos) ?? [] as $photo)
                            <div class="single_view_slide"><img  src="{{ Storage::url($photo) }}"
                                    class="img-fluid" alt="" /></div>
                                    @endforeach
                            
                        </div>
                    </div>

                    <div class="quick_view_capt">
                        <div class="prd_details">

                            <div class="prt_01 mb-1"> <span
                                    class="text-light bg-info rounded px-2 py-1">{{ \App\Helpers\TranslationHelper::TranslateText("Categorie") }}: {{ $favo->produit->nom }}</span> </div>
                            <div class="prt_02 mb-2">
                                 <h2 class="ft-bold mb-1">
                                    
                                    {{ \App\Helpers\TranslationHelper::TranslateText($favo->produit->description ?? ' ') }}
                                </h2> 
                                <div class="text-left">
                                    <div
                                        class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                   
                                    </div>
                                    <div class="elis_rty">
                                     
                                        @if ($favo->produit->inPromotion())
                                        <span class=" small">
                                            - {{ $favo->produit->inPromotion()->pourcentage }} %
                                        </span>
                                        <b class="text-success">
                                            {{ $favo->produit->getPrice() }} DT
                                        </b>
                                        <br>
                                        <strike>
                                            <span class="text-danger small">
                                                {{ $favo->produit->prix }} DT
                                            </span>
                                        </strike>
                                    @else
                                        {{ $favo->produit->getPrice() }} DT
                                    @endif

                                       
                                        
                                             @if ($favo->produit->stock > 0)
                                            <label class="badge bg-success"> {{__('stock_disponible')}}</label>
                                        @else
                                            <label  class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm"> {{__('non_disponible')}}</label>
                                        @endif
                                         
                                        </div>
                                </div>
                            </div>

                            <div class="prt_03 mb-3">
                                 <p>{{ \App\Helpers\TranslationHelper::TranslateText($favo->produit->description) }}</p> 
                            </div>

                            <div class="prt_04 mb-2">
                                <p class="d-flex align-items-center mb-0 text-dark ft-medium">{{ \App\Helpers\TranslationHelper::TranslateText("Couleur") }}(s):</p>
                                <div class="text-left">
                                    @foreach ($favo->produit->couleur ?? []  as $key=> $value )
                                    <div class="form-check form-option form-check-inline mb-1">
                                        <input class="form-check-input" type="radio" name="color8"
                                            id="white8">
                                        <label class="form-option-label rounded-circle" for="white8"><span
                                                class="form-option-color rounded-circle blc7"   style="background-color: {{ $value }} ;color:{{ $value }};"></span></label>
                                    </div>
                                    @endforeach
                                  
                                </div>
                            </div>

                            <div class="prt_04 mb-4">
                                 <p class="d-flex align-items-center mb-0 text-dark ft-medium">{{ \App\Helpers\TranslationHelper::TranslateText("Taille") }}(s):</p>
                                <div class="text-left pb-0 pt-2">
                                    
                                    @foreach ($favo->produit->tailles  as $index => $taille)
                              

                                    
                                    <div class="form-check size-option form-option form-check-inline mb-2">
                                        <input type="radio" class="form-check-input" name="taille" value="{{ $taille }}"
                                               id="taille-{{ $taille->id }}-{{ $index }}">
                                        <label class="form-option-label" for="taille-{{ $taille->id }}-{{ $index }}">{{ $taille->nom }}</label>
                                    </div>
                                    @endforeach
                                 
                                </div> 
                            </div>

                            <div class="prt_05 mb-4">
                                <div class="form-row mb-7">
                                    <div class="col-12 col-lg-auto">
                                        
                                        <div class="quantity">
                                            <div class="quantity__group">
                                                <span class="quantity-control minus"><i class="far fa-minus"></i></span>
                                                <input type="number" class="input-text qty text" name="quantite"
                                                    value="1" id="qte-{{ $favo->produit->id }}" autocomplete="off">
                                                <span class="quantity-control plus"><i class="far fa-plus"></i></span>
                                            </div>
                                        </div>
                                        <style>
                                            .quantity {
                                                display: flex;
                                                align-items: center;
                                            }
    
                                            .quantity__group {
                                                display: flex;
                                                align-items: center;
                                            }
    
                                            .quantity-control {
                                                cursor: pointer;
                                                padding: 5px;
                                                font-size: 1.2em;
                                            }
    
                                            .quantity-control.minus {
                                                color: red;
                                                /* Change color as needed */
                                            }
    
                                            .quantity-control.plus {
                                                color: green;
                                                /* Change color as needed */
                                            }
    
                                            .input-text.qty {
                                                width: 100px;
                                                text-align: center;
                                                border: 1px solid #ccc;
                                                margin: 0 5px;
                                                font-size: 2.5em;
                                            }
                                        </style>

                                    </div>
                                    <div class="col-12 col-lg">
                                        <!-- Submit -->
                                        <button type="submit" onclick="AddToCart( {{ $favo->produit->id }} )"
                                            class="btn btn-block custom-height bg-dark mb-2">
                                            <i class="lni lni-shopping-basket mr-2"></i>{{ \App\Helpers\TranslationHelper::TranslateText("Ajouter au panier") }}
                                        </button> 
                                    </div>
                                    <div class="col-12 col-lg-auto">
                                        <!-- Wishlist -->
                                      

                                        @if (Auth()->user())
                                        <button type="button"
                                          class="btn custom-height btn-default btn-block mb-2 text-dark"
                                           
                                            onclick="AddFavoris({{ $favo->produit->id }})">

                                            <i class="lni lni-heart mr-2"></i>{{ \App\Helpers\TranslationHelper::TranslateText("Favori") }}

                                        </button>
                                    @endif 
                                    </div>
                                </div>
                            </div>

                            <div class="prt_06">
                       
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach


        
     
   
        
    </div>
    <!-- row -->
</div>






