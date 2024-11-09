<div class="w-75">
<form   wire:submit='connexion' id="multiStepForm">
<h3 class="d-flex flex-column">
<span>Connexion</span>
 <small class="mt-1 fs-5 fw-100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entrez Vos Données Personnelles</small>
</h3>

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

            <div class="form-group mb-3">
                <input type="email" class="custom-input" wire:model="email" placeholder="Email ou Numéro de Téléphone" required>
@error('email')
            <span class="text-danger small">
                {{ $message }}
            </span>
        @enderror
            </div>
  <div class="form-group mb-4">
                <input type="password" class="custom-input" wire:model="password" name="password" placeholder="Mot de Passe" required>
				 @error('password')
        <span class="text-danger small">
            {{ $message }}
        </span>
        @enderror
            </div>
       
   <div class="text-end mb-3">
<a href="{{ route('forgot_password') }}" class="forgot-btn">Mot de passe oublié?</a>
   </div>  
    
    
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var toggleIcon = document.getElementById('toggleIcon');
    
            if (passwordInput.type === 'password') {
                // Afficher le mot de passe
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ri-eye-line');
                toggleIcon.classList.add('ri-eye-off-line');
            } else {
                // Masquer le mot de passe
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ri-eye-off-line');
                toggleIcon.classList.add('ri-eye-line');
            }
        }
    </script>
    
    
  
        
    <div class="form-group d-flex flex-column flex-wrap align-items-center justify-content-center  gap-4">
	    <button type="submit" class="axil-btn btn-bg-primary2 submit-btn w-100">
            <span style="height:2px" wire:loading>
                <img src="https://i.gifer.com/ZKZg.gif" height="5" alt="" srcset="">
            </span>
            <i class="ri-git-repository-private-line"></i>
            Connexion</button>

    </div>
	<div class="">
        <span>Vous n'avez pas un Compte? </span><a href="/register" class="text-decoration-none">Inscrivez-vous</a>
    </div>

    <style>
	.forgot-btn{
		color:#DB4444;
	}
        .btn-bg-primary2 {
            background-color: #DB4444;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-bg-secondary2 {
        background-color: #EFB121; /* Couleur de fond, bleu dans cet exemple */
        color: #ffffff; /* Couleur du texte, blanc dans cet exemple */
        border: none;
        padding: 10px 20px; /* Optionnel, ajuste la taille */
        border-radius: 5px; /* Optionnel, arrondit les coins */
        text-decoration: none; /* Supprime le soulignement */
    }
    </style>
</form>

</div>