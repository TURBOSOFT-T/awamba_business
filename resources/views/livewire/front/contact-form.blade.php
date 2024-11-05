<div>
    <div class="contact-form-wrapper">
        @livewireStyles
        @if (session()->has('error'))
            <div class="alert alert-danger p-3 small">
                {{ session('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success p-3 small">
                {{ session('success') }}
            </div>
        @endif
    
        <form wire:submit.prevent="save" class="axil-contact-form">
            <div class="form-row">
                <div class="form-group">
                    <input wire:model="nom" type="text" id="nom" placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText("Votre nom") }} *" class="form-control">
                    @error('nom')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input wire:model="email" type="email" id="email" placeholder=" Email *" class="form-control">
                    @error('email')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input wire:model="telephone" type="tel" id="telephone"  placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText("Votre téléphone") }} *" class="form-control">
                    @error('telephone')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <div class="form-group">
                <textarea wire:model="message" rows="5" type="text" id="message" style="background-color:#FAE7E7" placeholder="  {{ \App\Helpers\TranslationHelper::TranslateText("Entrez votre message") }}" class="form-control"></textarea>
                @error('message')
                    <span class="small text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <button class="btn-submit" type="submit">
                <span wire:loading>
                    <img src="/icons/kOnzy.gif" height="20" alt="Loading...">
                </span>
                
                {{ \App\Helpers\TranslationHelper::TranslateText("Envoyez votre message") }}
            </button>
        </form>
    </div>
    
    <style>
       .contact-info-container {
        background-color: #f8f8f8;
        padding: 10px;
        border-radius: 8px;
    }
    .contact-box {
        display: flex;
        align-items: center;
        gap: 10px; /* Espacement entre l'icône et le titre */
        margin-bottom: 20px;
    }
    .contact-box .icon {
        font-size: 24px;
        color: #E74C3C;
        background-color: #f8f8f8;
        padding: 10px;
        border-radius: 50%;
    }
    .contact-box h4 {
        color: #E74C3C;
        font-size: 18px;
        margin: 0; /* Enlever la marge par défaut pour un meilleur alignement */
    }
    
        .form-row {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        .form-group {
            flex: 1;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fbecec; /* Couleur de fond légèrement rose */
        }
        .btn-submit {
            background-color: #E74C3C;
            color: #fff;
            border: none;
            height: 60px;
            width: 30%;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            float: right; /* Placer le bouton sur le côté droit */
        }
        .btn-submit:hover {
            background-color: #d64545;
        }
    
        input[type="text"],
    input[type="email"],
    input[type="tel"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fbecec;
    }
    
    textarea {
        background-color: #fbecec;
        height: 200px;
    }
    </style>
    
    </div>
    
    
    