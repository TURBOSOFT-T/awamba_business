<?php

namespace App\Http\Controllers;

use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class panier_client extends Controller
{
    

    public function count_panier()
    {
        // Vérifier si la session 'panier' existe, sinon initialiser une session vide
        if (!session()->has('cart')) {
            session(['cart' => []]);
        }

        // Récupérer le panier de la session
        $panier_temporaire = session('cart');
        $total = count($panier_temporaire);
        $montant_total = 0;
        $Html = "";
        $produits = [];

        foreach ($panier_temporaire as $data) {
            $produit = produits::select('id','photo','prix','nom','taille')->find($data['id_produit']);
            if ($produit) {
                $produits[] = [
                    'id_produit' => $produit->id,
                    'nom' => $produit->nom,
                    'photo' => Storage::url($produit->photo),
                    'quantite' => $data['quantite'],
                    'taille' => $data['taille'],
                    'prix' => $produit->prix,
                    'total' => $data["quantite"] * $produit->prix,
                ];
                $montant_total += $data["quantite"] * $produit->prix;
            }
            $Html = view('components.cart',['produits' => $produits])->render();
        }
       

        return response()->json(
            [
                "total" => $total,
                "html" => $Html,
                "montant_total" => $montant_total
            ]
        );
    }
/* public function get_panier() {
    $data = $this->count_panier();
    $total = $data['total'];
    $list = $data['list'];
    $montant_total = $data['montant_total'];
    $html =  view('front.cart.cart', compact('total', 'list','montant_total'))->render();

    return response()->json([
        'html' => $html,
        'total' => $total,
        'list' => $list,
       'montant_total' => $montant_total
    ]);
} */



    public function contenu_mon_panier()
    {
        return view('front.cart');
    }


    public function cart()
    {
        return view('front.cart.cart');
    }



    public function add(Request $request)
    {
        $id_produit = $request->input('id_produit');
        $type = $request->input('type', 'produit');
        $quantite = $request->input('quantite', 1);
        $taille = $request->input('taille');

        $user = Auth::user();

       
        $produit = produits::where('id', $id_produit)
            ->first();

   // Vérifier si la taille a été sélectionnée
 /*   if (empty($taille)) {
    return response()->json([
        'statut' => false,
        'message' => __('messages.size_not_selected'),
    ]);
} */

        
        if (!$produit) {
            return response()->json([
                'statut' => false,
                'message' => __('messages.product_not_found'),
            ]);
        }


        if ($produit->statut == "disponible") {
            return response()->json([
                'statut' => false,
                'message' => __('messages.product_unavailable'), 
            ]);
        }



      
        if ($produit->stock < $quantite) {
            return response()->json([
                'statut' => false,
               'message' => __('messages.insufficient_stock'),
            ]);
        }

       


        $panier = session('cart', []);
        $produit_existe = false;

      /*   foreach ($panier as &$item) {
            if ($item['id_produit'] == $id_produit) {
                $item['quantite'] += $quantite;
                $produit_existe = true;
                break;
            }
        } */



        foreach ($panier as &$item) {
            if ($item['id_produit'] == $id_produit && $item['taille'] == $taille) {
                $item['quantite'] += $quantite;
                $produit_existe = true;
                break;
            }
        }


        if (!$produit_existe) {
            $panier[] = [
                'id_produit' => $id_produit,
                'quantite' => $quantite,
                'taille' => $taille,
            ];
        }

        session(['cart' => $panier]);

         return response()->json([
            'statut' => true,
         
           'message' => __('messages.product_added_to_cart'),
        ]); 
      
    }


    public function delete_produit(Request $request)
    {
        //delete d'un produit du panier session panier 
        $id_produit = $request->input('id_produit');
        $panier = session('cart', []);
        foreach ($panier as $key => $item) {
            if ($item['id_produit'] == $id_produit) {
                unset($panier[$key]);
                break;
            }
        }
        session(['cart' => $panier]);
         return response()->json([
            "statut" => true,
            'message' => __('messages.product_removed'),

        ]); 
      
    }


public function updateQuantity(Request $request, $id)
{
    $quantity = $request->input('quantity');
    $cart = session('cart', []);

    foreach ($cart as &$item) {
        if ($item['id_produit'] == $id) {
            $produit = produits::find($id);

            if (!$produit) {
                return response()->json(['success' => false, 'message' => __('messages.product_not_found')]);
            }

            // Check stock limit
            if ($produit->stock >= $quantity) {
                $item['quantite'] = $quantity;
                session(['cart' => $cart]); // Save updated cart to session
                return response()->json(['success' => true, 'message' => __('messages.quantity_updated')]);
            } else {
                return response()->json(['success' => false, 'message' => __('messages.insufficient_stock')]);
            }
        }
    }

    return response()->json(['success' => false, 'message' => __('messages.product_not_in_cart')]);
}



    public function deleteProduit($id_produit){
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

      //  return redirect()->back()->with('success', 'Produit retiré du panier avec succès');
      return response()->json([
        "statut" => true,
        "message" => __('messages.product_deleted'),
      ]);
    }




}
