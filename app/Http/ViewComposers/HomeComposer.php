<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\{Category,Service, config, produits};

class HomeComposer
{
 
    public function compose(View $view)
    {
        $view->with([
            'categories' => Category::has('produits')->get(), 
          //  'marques' =>Marque::has('produits')->take(6)->get(), /// Pour le home page
       //     'brands' =>Marque::has('produits')->get(), // Pour le  sop page
         //  'categories'=>Category::all(),
            'configs' => config::first(),
          //  'services'=>Service::all(),
            'produit'=>produits::all(),
        ]);
    }
}