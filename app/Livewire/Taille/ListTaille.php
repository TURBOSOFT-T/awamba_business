<?php

namespace App\Livewire\Taille;

use Livewire\Component;
use App\Models\Taille;

class ListTaille extends Component
{



    public $nom;

    public function save()
    {
        $this->validate([
            'nom' => 'required|string|min:1|max:255',
           
        ]);

        $cat = new Taille();
        $cat->nom = $this->nom;
      
        $cat->save();

        $this->reset(['nom']);

        // flash success message
        session()->flash('success', 'La taille a été créée avec succès');
    }





    public function delete($id){
        $categorie = Taille::find($id);
        if($categorie){
            $categorie->delete();
            //flash message
            session()->flash('success', 'Taille supprimée avec succès!');
        }
    }

    public function render()
    {

        $tailles = Taille::withCount('produits')->get();
        $this->sizes = Taille::withCount('produits')->get();
        return view('livewire.taille.list-taille', compact('tailles')  );
    }
}
