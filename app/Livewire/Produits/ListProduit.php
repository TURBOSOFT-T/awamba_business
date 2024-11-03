<?php

namespace App\Livewire\Produits;

use App\Models\produits;
use App\Models\Taille;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\historiques_stock;
use App\Http\Traits\TailleProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListProduit extends Component
{

    
    use TailleProduit;
    protected $listeners = ['add-stock' => '$refresh'];
    use WithPagination;
    public $key , $sur_devis, $taille=[];



    public $showModal = false; // Propriété pour contrôler l'affichage du modal
    public $selectedProduit;
    public $stock = 1; // Valeur par défaut pour le stock à ajouter

    public $produit;
    public $tailles = [];
    public $stocks = [];
    public $isLoading = false;

 
    public $produit_id;
    public $taille_id;
  
    protected $rules = [
        'taille_id' => 'required|exists:tailles,id',
        'stock' => 'required|integer|min:1',
    ];
    public function mount()
    {
        $this->tailles = Taille::withCount('produits')->get(); // Récupère les tailles avec le compte des produits
    }

  /*   public function mount($produitId)
    {
        $this->produit = produits::with('tailles')->findOrFail($produitId);
        
      
        foreach ($this->produit->tailles as $taille) {
            $this->tailles[$taille->id] = $taille->name;
            $this->stocks[$taille->id] = $taille->pivot->stock;
        }
    }
 */

    public function openModal($produitId)
    {/* 
        $this->selectedProduit = $produitId; 
        $this->stock = 1;
        $this->tailles = produits::find($produitId)->tailles;
        $this->showModal = true;  */
        $produit = produits::with('tailles')->find($produitId);
        $this->tailles = $produit->tailles; // Récupère les tailles associées

        $this->produit_id = $produitId;
        $this->stock = 1;
        $this->selectedProduit = produits::find($produitId)->name; // Récupérer le nom du produit
        $this->tailles = produits::find($produitId)->tailles; // Récupérer les tailles disponibles pour le produit
        $this->showModal = true;

        $this->reset(['stock', 'taille_id']); // Réinitialiser stock et taille
    }






public function addStock()
{
    $this->validate([
        'taille_id' => 'required|exists:tailles,id',
        'stock' => 'required|integer|min:1',
    ]);

    // Use DB facade to update or insert into the pivot table
    $produit = DB::table('produit_taille')->updateOrInsert(
        [
            'produit_id' => $this->produit_id, // Ensure this matches your column
            'taille_id' => $this->taille_id,     // Ensure this matches your column
        ],
        [
            'stock' => DB::raw("stock + {$this->stock}"),
        ]
    );

    $produit = produits::find($this->produit_id);
    if ($produit) {
        $produit->stock += $this->stock; // Ajoutez la quantité au stock général
        $produit->save(); // Enregistrez les modifications
    }
   
    session()->flash('message', 'Stock ajouté avec succès.');
    // Reset the fields after adding stock
    $this->reset(['showModal', 'produit_id', 'taille_id', 'stock']);
}

    
    public function addStock1(Request $request )
    {
        $this->validate();

        $produit = produits::find($this->selectedProduit);
        if ($produit) {
           
    
           
            $produit->stock += $this->stock;
          
            $produit->save();
            
       $historique_stock = new historiques_stock();
       $historique_stock->quantite = $this->stock;
      $historique_stock->id_produit = $produit->id;
      $historique_stock->save();
            session()->flash('message', 'Stock ajouté avec succès.');
            $this->showModal = false; // Fermer le modal après l'ajout
        }
    }



    public function render()
    {
        $Query = produits::query();
        if(!is_null($this->key)){
            $Query->where('nom', 'like', '%'.$this->key.'%');
        }
     /*   if($this->sur_devis != ''){ */
            if ($this->sur_devis =="false" || $this->sur_devis==" ") {
                $Query->where('sur_devis', false);
            } 
            
            if ($this->sur_devis == "true"){
                $Query->where('sur_devis', true);
            }
       // }
        
        
        
        $produits = $Query->paginate(30);
        $total = produits::count();
        $total_supprimers = produits::onlyTrashed()->count();
     //   $tailles = $this->getListTailleProduit();
      //  $tailles =Taille::with('produits')->pluck('nom');
       // $tailles = $this->getTailleProduit();
        $tailles = Taille::all();

        return view('livewire.produits.list-produit',compact('produits','total','total_supprimers', 'tailles'));
    }




    public function delete($id)
    {
        $produit = produits::find($id);
        if ($produit) {
            $produit->delete();
            session()->flash('info', 'Produit supprimé avec succès');
        }
    }




    public function add_top($id)
    {
        $produit = produits::find($id);
        if ($produit) {
            if ($produit->top == 1) {
                $produit->top = 0;
            } else {
                $produit->top = 1;
            }
            $produit->save();
        }
    }





    public function filtrer()
    {
        //reset page
        $this->resetPage();
    }
}
