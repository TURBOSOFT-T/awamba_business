<?php

namespace App\Http\Controllers;

use App\Models\favoris;
use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class favoris_client extends Controller
{
    public function add(Request $request)
    {
        $id_produit = $request->input('id_produit');
        $produit = produits::find($id_produit);
        if (!$produit) {
            return response()->json(
                [
                    "statut" => false,
                    "message" => __("messages.product_not_found"),
                ]
            );
        }

        $count = favoris::where('id_user', Auth::user()->id)->where("id_produit", $id_produit)->count();
        if ($count != 0) {
            return response()->json(
                [
                    "statut" => true,
                    "message" => __("messages.already_in_favorites"),
                ]
            );
        }

        $favoris = new favoris();
        $favoris->id_user = Auth::user()->id;
        $favoris->id_produit = $id_produit;
        $favoris->save();
        return response()->json([
            "statut" => true,
            "message" => __("messages.product_added_to_favorites"),
            "total" => $count
        ]);
    }


    public function deleteFavorite($id){
        $favoris = Favoris::find($id);
        if ($favoris) {
            $favoris->delete();  
            session()->flash('success', __('messages.favorite_deleted_success'));    
           return redirect()->back();
           
           
        }
    }

    
    public function remove_favoris(Request $request)
    {
        $id_favoris = $request->get("id_favoris");
        $favoris = favoris::where("id", $id_favoris)->where("id_user", Auth::user()->id)->first();
        if ($favoris) {
            $favoris->delete();
            $count = favoris::where("id_user", Auth::user()->id)->count();
            return response()->json(
                [
                    "status" => true,
                    "message" => __('messages.favorite_removed'),
                    "count" => $count,
                ]
            );
        }
    }
}
