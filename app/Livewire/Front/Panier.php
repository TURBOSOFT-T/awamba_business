<?php

namespace App\Livewire\Front;

use App\Models\produits;
use Livewire\Component;

class Panier extends Component
{
    public $total =0;

    public function render()
    {
        $paniers_session = session('cart');
        $paniers = [];
        
        foreach ($paniers_session as $session){
            $produit = produits::find($session['id_produit']);
            if($produit){
                $paniers[]=[
                    'nom' => $produit->nom,
                    'id_produit' => $produit->id,
                    'photo' => $produit->photo,
                    'quantite' => $session['quantite'],
                    'prix' => $produit->prix,
                    'total' => $session['quantite'] * $produit->prix,
                ];
                $this->total += $session['quantite'] * $produit->prix;
              // $total  += $paniers['quantite'] * $produit->prix;
              //  dd($paniers);
              
            }else{
                $this->delete($session['id_produit']);
            }
        }

        return view('livewire.front.panier', compact("paniers"));
    }



    public function update($id_produit,$quantite){
        //verifier que la qte nest pas inferieur a 1
        if($quantite < 1){
            $this->delete($id_produit);
            return false;
        }
        //find produit in session car and update quantity
        $panier = session('cart', []);
        $produit_existe = false;

        foreach ($panier as &$item) {
            if ($item['id_produit'] == $id_produit) {
                $item['quantite'] = $quantite;
                $produit_existe = true;
                break;
            }
        }

        if (!$produit_existe) {
            $panier[] = [
                'id_produit' => $id_produit,
                'quantite' => $quantite,
            ];
        }

        session(['cart' => $panier]);

        $this->total =0 ;
    }





    public function delete($id_produit){
        //delete produit from cart
        $panier = session('cart', []);
        $produit_existe = false;

        foreach ($panier as $key => &$item) {
            if ($item['id_produit'] == $id_produit) {
                unset($panier[$key]);
                $produit_existe = true;
                break;
            }
        }

        if (!$produit_existe) {
            $panier[] = [
                'id_produit' => $id_produit,
                'quantite' => 1,
            ];
        }

        session(['cart' => $panier]);

        $this->total =0 ;
    }




}

