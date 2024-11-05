<?php

namespace App\Livewire\Produits;

use App\Models\{produits, Category, Marque, Taille};
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Http\Traits\TailleProduit;
use App\Http\Traits\ListColor;
use App\Http\Traits\ListColors;

class AddProduit extends Component
{
    use WithFileUploads;
    use  ListColor;
    use  ListColors;
    use TailleProduit;


  

    public $nom,$tags,$stock,$taille=[],$couleur=[], $taille_id, $prix,$sur_devis, $category_id,$photo, $photos, $prix_achat, $photo2, $photos2, $produit, $reference, $description,$marque_id ;

    public $taille_ids = [], $produit_id;
    public $selectedSizes = [];

    public $originalSizes = []; 
    public $selectedColors = [];
    public $quantite;
  

    public $stocks = [];






    public function mount($produit)
    {
        if ($produit) {
            $this->produit = $produit;
            $this->nom = $produit->nom;
            $this->stock = $produit->stock;
            $this->tags = $produit->tags;
            $this->category_id = $produit->category_id;
        //    $this->marque_id = $produit->marque_id;
            $this->reference = $produit->reference;
            $this->prix = $produit->prix;
            $this->prix_achat = $produit->prix_achat;
            $this->photo2 = $produit->photo;
            $this->photos2 = $produit->photos;
            $this->description = $produit->description;
            $this->sur_devis = $produit->sur_devis ?? 0;
            // $this->couleur = $produit->couleur;
             $this->taille = $produit->taille;
             if (is_string($produit->couleur)) {
                $this->produit->couleur = json_decode($produit->couleur, true);
            }
            $this->produits = produits::with('tailles')->get();

          //  $tailles =Taille::all();

            $couleurs = $this->getListColor();
       
             if ($produit) {
                
                $this->produit = $produit->load('tailles');
        
         
                $this->selectedSizes = $this->produit->tailles ? $this->produit->tailles->pluck('id')->toArray() : [];
                $this->selectedColors = $this->produit->couleurs ? $this->produit->couleurs->pluck('code')->toArray() : [];
            }

            $this->produit = $produit;
        $this->tailles = Taille::all();
        $this->selectedSizes = $this->produit->tailles->pluck('id')->toArray(); // Récupérer les tailles actuelles
        $this->stocks = $this->produit->tailles->pluck('pivot.stock', 'id')->toArray(); // Récupérer les stocks actuels

 
    

        }
     
    }





    public function render()
    {
        $categories = Category::all();
      
        $couleurs = $this->getListColor();
        $colors = $this->getListColors();
 
         $tailles =Taille ::all();
  //   dd($couleurs);
     

        return view('livewire.produits.add-produit', compact('colors','categories', 'couleurs','tailles'));
    }






    //validation
    public function create()
    {
        $data =  $this->validate([
            'nom' => 'required|string',
            'description' => 'required|string|max:5000000',
        
            'reference' => 'required|string|unique:produits,reference',
            'prix' => 'nullable|numeric|gt:prix_achat',
            'prix_achat' => 'nullable|numeric',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'category_id' => 'required|integer|exists:categories,id',
           
           'selectedSizes'=> 'required|array',

       
            'sur_devis'=>'nullable',
        
            'couleur' => 'nullable|max:200',
           'taille' => 'nullable|max:200',
        ]);
        ;[
            'reference.required' => ' La reference',
            'nom.required' => 'Veuillez entrer votre nom',
           'prix.required' => 'Veuillez entrer  le prix',
           'selectedSizes.required' => 'Veuillez sélectionner la taille',
           
          
      
          ];


        $categories = Category::findOrFail($data[('category_id')]);


        $produit = new produits();
        $produit->nom = $this->nom;

        $produit->sur_devis = $this->sur_devis ?? false;
     
         $produit->description = $this->description;
        $produit->reference = $this->reference;
      

        $produit->category_id = $this->category_id;
   
        $produit->couleur = $this->couleur;
        $produit->taille = $this->taille;



        $produit->prix = $this->prix;
        $produit->prix_achat = $this->prix_achat;
        $produit->photo = $this->photo->store('produits', 'public');
        if ($this->photos) {
            $photosPaths = [];
            foreach ($this->photos as $photo) {
                $photosPaths[] = $photo->store('produits', 'public');
            }
            $produit->photos = json_encode($photosPaths);
        }
     

       

  /* $validSizes = array_filter($this->selectedSizes, 'is_numeric');

  if (empty($validSizes)) {
      session()->flash('error', 'Aucune taille valide sélectionnée.');
      return;
  } */ 

        $categories->produits()->save($produit);
      // $produit->tailles()->attach($validSizes);
       $produit->tailles()->sync($this->selectedSizes);
       
        
        

        $this->reset();

       
        session()->flash('success', 'Produit ajouté avec succès');
    }





    public function update_produit()
    {
        if ($this->produit) {
            $this->validate([
                'nom' => 'required|string',
                'prix' => 'nullable|numeric|gt:prix_achat',
                'selectedSizes'=> 'required|array',
              //  'stock' => 'required|array',
               
                'prix_achat' => 'nullable|numeric',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
                'photos.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
          
                'sur_devis'=>'nullable',
                'couleur' => 'nullable|max:2000',
                'taille' => 'nullable|max:2000',
            ]);

          



            $this->produit->nom = $this->nom;
            $this->produit->sur_devis = $this->sur_devis;
            $this->produit->description = $this->description;
            $this->produit->reference = $this->reference;
            $this->produit->couleur= $this->couleur;
            $this->produit->taille= $this->taille;
            
        
            $this->produit->prix = $this->prix;
            $this->produit->prix_achat = $this->prix_achat;
       

            if ($this->photo) {
                
                if ($this->produit->photo) {
                    Storage::disk('public')->delete($this->produit->photo);
                }
                $this->produit->photo = $this->photo->store('produits', 'public');
            }

            if ($this->photos) {
                $photosPaths = [];
                foreach ($this->photos as $photo) {
                    $photosPaths[] = $photo->store('produits', 'public');
                }
                $this->produit->photos = json_encode($photosPaths);
            }

         

         
            $this->produit->save();
            $this->produit->tailles()->sync($this->selectedSizes);
          

           
        

            $this->resetInput();

            return redirect()->route('produits')->with('success', "Produit modifié avec succès");
        }      
    }

    public function updatedSelectedSizes($value)
    {
        // Appel de la méthode pour gérer le stock
        $this->manageStock();
    }

    private function manageStock()
    {
        // Vérifiez les tailles décochées et mettez à jour le stock général
        $previousSizes = $this->produit->tailles->pluck('id')->toArray();
        
        // Diminuer le stock pour les tailles décochées
        foreach ($previousSizes as $sizeId) {
            if (!in_array($sizeId, $this->selectedSizes)) {
                // Diminuer le stock général
                $this->produit->decrement('stock', $this->stocks[$sizeId]);

                // Optionnel: Supprimer la taille si nécessaire
                 $this->produit->tailles()->detach($sizeId);
            }
        }
    }

    
    public function resetInput()
    {
        $this->nom = '';
        $this->tags = '';
        $this->prix = '';
        $this->photo = '';
        $this->photos = '';
    }
}
