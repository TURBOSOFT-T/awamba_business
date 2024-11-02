<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandes extends Model
{
    use HasFactory;
    protected $table = 'commandes';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'adresse',
        'note',
        'message',
        'livraison',
        'attente',
        'statut',
        'image',
        'photo',
     'tax',
            "phone",
           
            "pays",
            "gouvernorat",
            "frais", 
        'password',
        'user_id',

        
    ];



    public function contenus()
    {
        return $this->hasMany(contenu_commande::class, 'id_commande');
    }

    public function client(){
        return $this->belongsTo(clients::class, 'phone','phone');
    }

    public function modifiable(){
        if ($this->statut === 'retournée' || $this->statut === 'payée' || $this->statut === 'livrée' || $this->statut === 'li') {
            return false;
        } else {
            return true;
        }
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
///////calcul avec les frais de de transport

    public function montant(){
        $config = config::first();
        $total = $this->frais ;
        
        foreach ($this->contenus as $contenu){
            $total += $contenu->prix_unitaire * $contenu->quantite  ;  
        }

   
    return $total ?? 0;
  
    }

    ///// calcul  du pric hors tax 
    public function montantHT(){
        $config = config::first();
        $totalTTC = 0 ;
        $totalHT = 0; 
        foreach ($this->contenus as $contenu){
            $totalTTC += $contenu->prix_unitaire * $contenu->quantite  ;
            
            
        }
 
     $totalHT = $totalTTC/(1 + ($config->tax)/100 ) ; 
    return  $totalHT ?? 0;
    }



//////le montant du TVA 
public function getTVA()
{
    $config = config::first();
    $total =0;
    foreach ($this->contenus as $contenu){
        $total += $contenu->prix_unitaire * $contenu->quantite;
    }
    $totalHT = $total/(1 + ($config->tax)/100 ) ; 
    $vatAmount =   ($totalHT) * ($config->tax)/100;
    return  $vatAmount;
}

public function getPrix() {
    $config = config::first();
    $totalTTC = 0 ;
    $totalHT = 0; 
    foreach ($this->contenus as $contenu){
        $totalTTC += $contenu->prix_unitaire * $contenu->quantite  ;
            
           $prixHT = $contenu->prix_unitaire/(1 + ($config->tax)/100);
        }

        return $prixHT;
}



}
