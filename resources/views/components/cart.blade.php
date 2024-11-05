<div>
    @foreach ($produits as $produit)
    

        <li class="cart-item">
            <div class="item-img">
                <a href="single-product.html"><img src="{{  $produit['photo'] }}" alt="Commodo Blown Lamp"></a>
                <button onclick="DeleteToCart({{  $produit['id_produit']  }})" class="close-btn"><i class="fas fa-times"></i></button>
            </div>
            <div class="item-content">
                <div class="product-rating">
                    <span class="icon">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </span>
                    <span class="rating-number">(64)</span>
                </div>
                <h3 class="item-title"><a href="single-product-3.html"> {{  Str::limit($produit['nom'] , 15) }}</a></h3>
                <div class="item-price"><span class="currency-symbol"></span> {{  $produit['prix'] }} XCFA</div>
                <div class="pro-qty item-quantity">
                    <input type="number" class="quantity-input" value="{{ $produit['quantite'] }}">
                </div>
            </div>
        </li>
    @endforeach
</div>
