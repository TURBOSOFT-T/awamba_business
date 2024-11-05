<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produits extends Model
{
    use HasFactory,SoftDeletes;
  
    protected $fillable = [
    
    'nom',
    'description',
   'reference',
'prix', 
   'prix_achat',
    'photo',
   'id_promotion',
  'category_id',
    'stock',
    'statut',
    'sur_devis',
    'photos',
    'top',
    'stock_alert',
    'taille',
    'couleur',
    ];
    protected $casts = [
        'photos' => 'json',
        'taille'=>'array',
        'couleur'=>'array',
    ];
    

   public function vendus()
    {
        return $this->hasMany(contenu_commande::class, 'id_produit');
    }

    public function getPrice()
    {
        if ($this->id_promotion) {
            $promotion = promotions::find($this->id_promotion);
            if ($promotion) {
                $price = $this->prix - ($this->prix * ($promotion->pourcentage / 100));
                return $price;
            } else {
                return $this->prix;
            }
        } else {
            return $this->prix;
        }

    }

    public function inPromotion()
    {
        if ($this->id_promotion) {
            $promotion = promotions::find($this->id_promotion);
            if ($promotion) {
                return $promotion;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function diminuer_stock(int $quantite): void
    {
        
        if ($this->stock >= $quantite) {
            $this->stock -= $quantite;
            $this->save();
        }
    }

    public function diminuer_stock2(int $quantite): void
    {
        $taille = $this->tailles()->first();
        if ($taille && $taille->stock >= $quantite) {
            // Diminue le stock dans la table pivot
            $this->tailles()->updateExistingPivot( [
               'stock' => $taille->pivot->stock - $quantite
            ]);
        } else {
            // Gérer le cas où le stock est insuffisant
            throw new \Exception("Quantité demandée non disponible.");
        }
    }

    public function diminuerStockParTaille(int $tailleId, int $quantite): void
    {
        $taille = $this->tailles()->where('id', $tailleId)->first();

        if ($taille && $taille->pivot->stock >= $quantite) {
            // Met à jour le stock dans la table pivot
            $this->tailles()->updateExistingPivot($tailleId, [
                'stock' => $taille->pivot->stock - $quantite
            ]);
        } else {
            throw new \Exception("Stock insuffisant pour cette taille.");
        }
    }

   

    public function retourner_stock(int $quantite): void
    {
        $this->stock += $quantite;
        $this->save();
    }
    

    public function historique_stock(){
        return $this->hasMany(historiques_stock::class, 'id_produit');
    }


    public function vues()
    {
        return $this->hasMany(views::class, 'id_produit');
    }


   

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
  

     public function tailles()
    {
        return $this->belongsToMany(Taille::class, 'produit_taille', 'produit_id', 'taille_id')->withPivot('stock');

        
    }
   
}
