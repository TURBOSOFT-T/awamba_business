<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',     // Par exemple, "S", "M", "L", etc.
        'stock',   // Stock disponible pour cette taille
       // 'produit_id', // ID du produit auquel cette taille appartient
    ];

    /**
     * Relation avec le produit (belongsTo)
     * Une taille appartient à un produit
     */
    public function produits()
    {
        return $this->belongsToMany(produits::class ,'produit_taille', 'produit_id', 'taille_id')->withPivot('stock');
        
    }

    // app/Models/Size.php
public function produitCount()
{
    return $this->produits()->count();
}



}
