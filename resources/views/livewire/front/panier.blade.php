
      <!--cart start-->
      <section class="cart-area pt-120 pb-120">
        <div class="container container-small">
            <div class="row">
               <div class="col-12">
                  <div class="table-content">
                     <table class="table">
                        <thead style="background-color: #ff3d00;">
                           <tr>
                              <th class="product-remove"></th>
                              <th class="cart-product-name">Produit</th>
                              <th class="product-price"> Prix</th>
                              <th class="product-quantity">Quantité</th>
                              <th class="product-subtotal">Total</th>
                           </tr>
                        </thead>
                        <tbody>
                            @forelse ($paniers ?? [] as $id => $details)
                           <tr>
                            <td class="product-remove">
                            <form   wire:click="delete({{ $details['id_produit'] }})">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-xs btn-flat show_confirm" data-toggle="tooltip" title='Delete'><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    width="25" style="background-color: #b2e21522; fill:#f80a0a;"
                                    height="25" fill="currentColor">
                                    <path
                                        d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                                    </path>
                                </svg></button>
                            </form>
                            
                            </td>
                              <td class="product-thumbnail">
                                <a
                                                       
                                href="{{ route('details-produits', ['id' => $details['id_produit'], 'slug'=>Str::slug(Str::limit($details['nom'], 10))]) , }}">
                                 <img src="{{ Storage::url($details['photo']) }}" height="40"
                                     width="40" alt="Image du  produit">
                             </a>
                                    <div class="product-thumbnail__wrapper">
                                        <div class="product-name"> {{ $details['nom'] }}</div>
                                       
                                    </div>
                                </td>

                             <td class="product-price"><span class="amount amount-2"> {{ $details['prix'] }}</span></td>

                              
                              <td class="product-quantity text-center">
                                   <div class="d-flex justify-content-between btn-group-qte">
                                       <button class="btn minus" type="button"  wire:click="update({{ $details['id_produit'] }},{{ $details['quantite'] - 1 }})">
                                        -
                                        </button>
                                       <div class="qte my-auto  w-100">
                                       {{ $details['quantite'] }}
                                       </div>
                                       <button type="button" class="btn plus"   wire:click="update({{ $details['id_produit'] }},{{ $details['quantite'] + 1 }})">
                                        +
                                        </button>
                                   </div>
                              </td>
                              <td class="product-subtotal"><span class="amount"> {{ $details['prix'] * $details['quantite'] }}
                                DT</span></td>
                           </tr>
                           @empty
                           <tr>
                               <td colspan="6">
                                   <div class="text-center p-5">
                                       <br>
                                       <div class="text-center p-5"><img  style="  width: 100px;
                                        height: 100px;"
                                                                                        src="https://img.icons8.com/?size=100&id=15867&format=png&color=000000"
                                                                                        alt="shopping-cart--v1" />
                                                                                    <br>
                                                                                    <h5>
                                                                                        Vous n'avez aucun produit dans le panier pour le momment
                                                                                    </h5>
                                
                                                                                </div>
                                       <br>

                                   </div>
                               </td>
                           </tr>
                           @endforelse
                          
                        </tbody>
                     </table>
                  </div>
                  <div class="row">
                    <div class="col-xl-7 col-lg-6 col-md-6">
                        <div class="text mt-30">
                          
                          </div>
                    </div>
                    <div class="col-xl-5 col-lg-8 col-md-12">
                        <div class="box bax-cart">
                            <h4 class="title mb-20">Résummé  sur la commande</h4>
                            <div class="bottom-title d-flex justify-content-between mb-40 mt-20">
                                <span>Articles</span>
                                <h5>
                                {{ count($paniers) }} 
                                </h5>
                            </div>
                             <div class="bottom-title d-flex justify-content-between mb-40 mt-20">
                                <h5>Total</h5>
                                <h5>{{ $total }} DT</h5>
                            </div>
                        
                            <div class="bottom-btn d-flex ">
                                <a href="{{ url('shop') }}">Continuer les achats</a>
                               
                                @if ($total > 0)
                                <a class="btn -dark" href="{{ url('/commander') }}">Commander</a> 
                               @endif
                            </div>
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
     
         $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Le produit a été retiré du panier`,
                //  text: "Si vous supprimez ceci, il disparaîtra.",
                  icon: "warning",
                  buttons: false,
                  dangerMode: true,
                  timer: 2000,
                 
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
              setTimeout(() => {
        swal.close();
    }, 2000);
          });
      
    </script>
