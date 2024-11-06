<main class="main-wrapper">
    @php

    $configs = DB::table('configs')->first();
	$total1 = 0;
    @endphp

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">Votre panier</h4>
                    <a href="#" class="cart-clear"></a>
                </div>
                <div class="table-responsive">
                    <table class="table axil-product-table axil-cart-table mb--40">
                        <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Produit</th>
                                <th scope="col" class="product-title"></th>
                                <th scope="col" class="product-price">Price</th>
                                <th scope="col" class="product-quantity">Quantity</th>
                                <th scope="col" class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($paniers ?? [] as $id => $details)
							@php
                                $subtotal = $details['prix'] * $details['quantite'];
                                $total1 += $subtotal;
                            @endphp
                            <tr data-id="{{ $details['id_produit'] }}">
                                <td class="product-remove">
                                    <div class="delete-icon">


                                        <button class=" remove-from-cart  .btn-danger" wire:click="delete({{ $details['id_produit'] }})">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" style=" fill:#f80a0a;" height="15" fill="currentColor">
                                                <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM13.4142 11L15.8891 8.52513L14.4749 7.11091L12 9.58579L9.52513 7.11091L8.11091 8.52513L10.5858 11L8.11091 13.4749L9.52513 14.8891L12 12.4142L14.4749 14.8891L15.8891 13.4749L13.4142 11Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    </td>
                                <td class="product-thumbnail"><a href="{{ route('details-produits', ['id' => $details['id_produit'], 'slug'=>Str::slug(Str::limit($details['nom'], 10))]) , }}"><img src="{{ Storage::url($details['photo']) }}" alt="Digital Product"></a></td>
                                <td class="product-title">
                                    
                <div class="product-content">
                    <h6><a href="#"> {{ $details['nom'] }}</a></h6>
                </div>
                </td>
                <td class="product-price" data-title="Price"><span class="currency-symbol"></span>
                    <p class="price">
                        {{ $details['prix'] }} DT
                    </p>
                </td>
				                        
                <td class="product-quantity" data-title="Qty">
				 <div class="quantity-wrapper pro-qty">
                                        <span class="quantity-control minus custom-minus" data-product-id="{{ $details['id_produit'] }}">-</span>
                                        <input type="number" value="{{ $details['quantite'] }}" min="1" class="quantity-input custom-quantity-input" data-product-id="{{ $details['id_produit'] }}" autocomplete="off">
                                        <span class="quantity-control plus" data-product-id="{{ $details['id_produit'] }}">+</span>
                                    </div>
                                </td>
                <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol"></span> {{ $details['prix'] * $details['quantite'] }}
                    DT</td>
                </tr>
				<style>
				/* Wrapper for the quantity control */
.quantity-wrapper {
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Button styles */
.quantity-control {
    width: 32px;
  display: block;
  float: left;
  line-height: 26px;
  cursor: pointer;
  text-align: center;
  font-size: 16px;
  font-weight: 300;
  color: #000;
  height: 32px;
  background: #f6f7fb;
  border-radius: 50%;
  transition: .3s;
  border: 2px solid rgba(0,0,0,0);
}



/* Input field styles */
.custom-quantity-input {
   width: 28px;
  float: left;
  border: none;
  height: 32px;
  line-height: 30px;
  padding: 0;
  text-align: center;
  background-color: rgba(0,0,0,0);
  font-size: 20px;
  font-weight: 500;
  margin: 0 12px;
  color: #27272e;
}

.custom-quantity-input:focus {
    border-color: #3498db;
    outline: none;
}

/* Media Query for Smaller Screens */
@media (max-width: 600px) {
    .quantity-wrapper {
        gap: 4px;
    }

    .custom-quantity-input {
        width: 50px;
        font-size: 14px;
    }

    .quantity-control {
        padding: 6px;
        font-size: 14px;
    }
}

				</style>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="text-center p-5">
                            <img width="64" height="64" src="https://img.icons8.com/pastel-glyph/64/578b07/shopping-cart--v2.png" alt="shopping-cart--v2" /><br>

                            <h6>
                                Vous n'avez pas de produits au panier.
                            </h6>
                            <br>

                        </div>
                    </td>
                </tr>
                @endforelse



                </tbody>
                </table>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="cart-update-btn-area">
{{-- 
                <form action="{{ route('apply.coupon') }}" method="POST">
                    @csrf

                    <div class="input-group product-cupon">

                        <input type="text" name="code" placeholder="Entrez le code du coupon">
                        <div class="product-cupon-btn">
                            <button type="submit" class="axil-btn1  btn-bg-primary btn-outline1">Appliquez</button>
                            <style>
                                .axil-btn1 {
                                    padding: 10px 20px;
                                    font-size: 16px;
                                    border-radius: 5px;
                                    cursor: pointer;
                                    transition: background-color 0.3s, color 0.3s;
                                }

                                .btn-bg-primary1 {
                                    background-color: #5EA13C;
                                    
                                    color: #fff;
                                    border: none;
                                }

                                .btn-outline1 {
                                    background-color: transparent;
                                    color: #5EA13C;
                                    border: 2px solid #5EA13C;
                                }

                                .axil-btn1.btn-bg-primary1.btn-outline1:hover {
                                    background-color: #5EA13C;
                                
                                    color: #fff;
                                }

                            </style>
                          


                        </div>
                    </div>
                </form> --}}
                <div class="update-btn">
                  
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                    <div class="axil-order-summery mt--80">
                        <h5 class="title mb--20">Résumé commande</h5>
                        <div class="summery-table-wrap">
                            @if ($total1 > 0)
                            <table class="table summery-table mb--30">
                                <tbody>
                                    <tr class="order-subtotal">
                                        <td>Subtotal</td>
                                        <td>{{ $total1 }} <x-devise></x-devise></td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <td>Frais De Livraison</td>
                                        <td>

                                            <div class="input-group">

                                                <label for="radio2">{{ $configs->frais ?? 0 }}
                                                    <x-devise></x-devise></label>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr class="order-total">
                                        <td>Total</td>
                                        <td class="order-total-amount">{{ $total1 + $configs->frais ?? 0 }} <x-devise></x-devise></td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                        @if ($total > 0)
                        <a class="axil-btn btn-bg-primary checkout-btn" href="{{ url('/commander') }}">Commander</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Cart Area  -->

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
            background-color: #EFB121;
            /* Couleur de fond, bleu dans cet exemple */
            color: #ffffff;
            /* Couleur du texte, blanc dans cet exemple */
            border: none;
            padding: 10px 20px;
            /* Optionnel, ajuste la taille */
            border-radius: 5px;
            /* Optionnel, arrondit les coins */
            text-decoration: none;
            /* Supprime le soulignement */
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>



        <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.quantity-control').forEach(button => {
                button.addEventListener('click', function() {
                    const isIncrement = this.classList.contains('plus');
                    const productId = this.getAttribute('data-product-id');
                    const quantityInput = document.querySelector(`input[data-product-id="${productId}"]`);
                    let currentQuantity = parseInt(quantityInput.value);

                    if (isIncrement) {
                        currentQuantity++;
                    } else if (currentQuantity > 1) {
                        currentQuantity--;
                    }

                    quantityInput.value = currentQuantity;
                    updateCartQuantity(productId, currentQuantity);
                });
            });

            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const productId = this.getAttribute('data-product-id');
                    let quantity = parseInt(this.value);

                    if (quantity < 1) {
                        quantity = 1;
                        this.value = quantity;
                    }

                    updateCartQuantity(productId, quantity);
                });
            });
        });

        function updateCartQuantity(productId, quantity) {
            fetch(`/update-quantity/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const productRow = document.querySelector(`tr[data-id="${productId}"]`);

                    if (!productRow) {
                        console.error(`No product row found for productId: ${productId}`);
                        return;
                    }

                    const price = parseFloat(productRow.querySelector('.product-price .price').textContent.replace(' DT', ''));
                    const subtotal = price * quantity;
                    productRow.querySelector('.product-subtotal').textContent = `${subtotal.toFixed(2)} DT`;

                  //  updateGrandTotal();
                } else {
                    console.error('Erreur lors de la mise à jour de la quantité');
                }
            })
            .catch(error => console.error('Erreur:', error));
        }

        function updateGrandTotal() {
            let grandTotal = 0;

            document.querySelectorAll('.product-subtotal').forEach(subtotalElement => {
                const subtotal = parseFloat(subtotalElement.textContent.replace(' DT', ''));
                grandTotal += subtotal;
            });

            document.getElementById('grand-total').textContent = `${grandTotal.toFixed(2)} DT`;
        }
    </script>
</main>
