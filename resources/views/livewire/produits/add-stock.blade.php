{{-- <div>

    @include('components.alert')


    <div class="mb-3">
        <label for="">
            Recherche du produit
        </label>
        <input type="text" class="form-control" wire:model.live="produit" placeholder="Nom,Description du produit">

    </div>


 
    @if ($produits && $produits->isNotEmpty() && !$id)
        <table class="table">
            @forelse ($produits as $item)
                <tr>
                    <td>
                        <img src="{{ Storage::url($item->photo) }}" width="30" height="30" class="rounded "
                            alt="">
                    </td>

                    <td>
                        {{ $item->nom }}
                    </td>
                    <td style="text-align: right;">
                        <button class="btn btn-sm " wire:click="copier({{ $item->id }})">
                            <i class="ri-file-copy-2-line small"></i>
                            Ajouter
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">
                        <div class="text-center">
                            Aucun produit trouvé !
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
    @else
        <div class="text-center">
            Aucun produit trouvé pour les tailles sélectionnées !
        </div>
    @endif

    @if ($id)
        <form wire:submit="add">
            <div class="input-group mb-3">
                <input type="number" required class="form-control" wire:model="quantite" placeholder="Quantité">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <span wire:loading>
                            <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                        </span>
                        Ajouter
                    </button>
                </div>
            </div>
        </form>
    @endif
</div>
<script>
    document.addEventListener('livewire:load', function () {
    Livewire.on('sizeUpdated', (selectedSizes) => {
        console.log('Selected sizes updated:', selectedSizes);
        
    });
});

</script> --}}


<div>
    @include('components.alert')

    <div class="mb-3">
        <label for="">
            Recherche du produit
        </label>
        <input type="text" class="form-control" wire:model.live="produit" placeholder="Nom,Description du produit">
    </div>

    @if ($produits && $produits->isNotEmpty() && !$selectedProductId)
        <table class="table">
            @forelse ($produits as $item)
                <tr>
                    <td>
                        <img src="{{ Storage::url($item->photo) }}" width="30" height="30" class="rounded" alt="">
                    </td>
                    <td>
                        {{ $item->nom }}
                    </td>
                   <td>
                     
                    @foreach($item->tailles as $taille)
                    <div>
                        <span> <b>{{ $taille->nom }}</b></span>
                        
                       
                      
                        @if ($taille->pivot->stock > 0)
                            <span class="text-success">
                                <i class="fas fa-check-circle"></i>
                                 {{ $taille->pivot->stock }} unités
                            </span>
                        @else
                            <span class="text-danger" title="Rupture de Stock">
                                <i class="fas fa-times-circle"></i>
                                <span class="badge badge-danger">Rupture</span>
                            </span>
                        @endif
                    </div>
                @endforeach
                   </td>
                    <td style="text-align: right;">
                        <button class="btn btn-sm" wire:click="selectProduct({{ $item->id }})">
                            <i class="ri-file-copy-2-line small"></i>
                            Ajouter
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <div class="text-center">
                            Aucun produit trouvé !
                        </div>
                    </td>
                </tr>
            @endforelse
        </table>
    
    @endif

    @if ($selectedProductId)
        <form wire:submit.prevent="addStock">
            <div class="mb-3">
                <label for="taille">Sélectionnez une taille</label>
                <select id="taille" wire:model="taille_id" class="form-select">
                    <option value="">Choisissez une taille</option>
                    @foreach ($tailles as $taille)
                        <option value="{{ $taille->id }}">{{ $taille->nom }}</option>
                    @endforeach
                </select>
                @error('taille_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="input-group mb-3">
                <input type="number" required class="form-control" wire:model="quantite" placeholder="Quantité">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <span wire:loading>
                            <img src="https://i.gifer.com/ZKZg.gif" height="15" alt="" srcset="">
                        </span>
                        Ajouter
                    </button>
                </div>
            </div>
        </form>
    @endif
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('sizeUpdated', (selectedSizes) => {
            console.log('Selected sizes updated:', selectedSizes);
          
        });
    });
</script>
