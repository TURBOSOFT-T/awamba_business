<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{Category,Service, config, Marque, produits, favoris};

class HomeComposer
{
 
    public function compose(View $view)
    {
        $view->with([
            'categories' => Category::has('produits')->take(4)->get(), 
        //  'marques' =>Marque::has('produits')->take(6)->get(), /// Pour le home page
           // 'brands' =>Marque::has('produits')->get(), // Pour le  sop page
         //  'categories'=>Category::all(),
         'searchproducts' => produits::select('*')->latest()->take(5)->get(),
            'configs' => config::first(),
          //  'services'=>Service::all(),
           // 'produits'=>produits::all(),
            'produits' => produits::select('*')->latest()->take(16)->get(),
            'favoris'=>Favoris::where('id_produit', '!=', null)
            ->where('id_user', auth()->id() )->get(),
            
        ]);
    }
}