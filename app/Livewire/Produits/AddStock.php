<?php

namespace App\Livewire\Produits;

use App\Models\historiques_stock;
use App\Models\produits;
use App\Models\Taille;
use Livewire\Component;
use App\Http\Traits\TailleProduit;


class AddStock extends Component
{

    use TailleProduit;
    public $produit,$taille=[], $id, $quantite;
    public $selectedTailles = []; 


    public $selectedProduct;
    public $selectedSizes = [];
    public $stocks = []; // Tableau pour stocker le stock de chaque taille

    public $produits;
    public $selectedProductId;
    public $tailles = [];
    public $taille_id;
  




    public function mount()
    {
      
        $this->tailles = Taille::all();
   
     $this->produits = produits::take(5)->get();

    }


  

    public function selectProduct($id)
    {
        $this->selectedProductId = $id;
        $this->tailles = produits::find($id)->tailles;
    }
  

    public function save()
    {
        $product = produits::find($this->selectedProduct);
        
        // Synchronisation des tailles avec les stocks
        foreach ($this->selectedSizes as $sizeId) {
            $product->sizes()->syncWithoutDetaching([$sizeId => ['stock' => $this->stocks[$sizeId]]]);
        }

        session()->flash('message', 'Stock des tailles pour le produit mis à jour avec succès.');
    }

    public function updatedProduit($value)
    {
        $this->id = null;
        $this->quantite = null;
      
      
      
        $this->produits = produits::where('nom', 'like', '%' . $value . '%')
            ->Orwhere('reference', 'like', '%' . $value . '%')
            ->orWhere('taille', 'like', '%' . $value . '%')
            ->select('id', 'nom', 'photo')
            ->take(10)
            ->get();

            
    }


public function render()
{
    $tailles = Taille::all();
    $produit = produits::all();
    return view('livewire.produits.add-stock', [
        'tailles' => $tailles,
        'produits' => $this->produits, 
    ]);
}

    public function copier($id)
    {
        $pro = produits::find($id);
        if ($pro) {
            $this->id = $id;
        }
    }


    public function add()
    {
        if (!$this->id) {
            //flash message
            session()->flash('error', 'Veuillez sélectionner un produit');
            return;
        }

        $pro = produits::find($this->id);
        if (!$pro) {
            //flash message
            session()->flash('error', 'Veuillez sélectionner un produit .');
            return;
        }
        $pro->stock = $pro->stock + $this->quantite;
       
        $pro->save();

        //enregistrer lhistorique du stock 
        $historique_stock = new historiques_stock();
        $historique_stock->quantite = $this->quantite;
        $historique_stock->id_produit = $pro->id;
        $historique_stock->save();


        //reset input
        $this->produit = null;

        //flash message
        session()->flash('success', 'Stock ajouté avec succès');
        $this->id = null;
        $this->dispatch('add-stock');
    }



    public function addStock()
{
    $this->validate([
        'taille_id' => 'required',
        'quantite' => 'required|integer|min:1',
    ]);

    $produit = produits::find($this->selectedProductId); // Correction ici
    if ($produit) {
        $produit->tailles()->updateExistingPivot($this->taille_id, [
            'stock' => \DB::raw('stock + ' . $this->quantite)
        ]);
        
        // Met à jour le stock général
        $produit->update(['stock' => $produit->stock + $this->quantite]);
       

        $this->reset(['quantite', 'taille_id']);
        session()->flash('message', 'Stock ajouté avec succès.');
        $this->render();
        $this->dispatch('add-stock');
       
        $this->reset(['quantite', 'taille_id', 'selectedProductId']);
    } else {
        session()->flash('error', 'Produit non trouvé.');
    }
}

}
