<div class="w-75">

    <form wire:submit.prevent="save" id="multiStepForm">
	    <h3>Créer un Compte</h3>
        <!-- Step 1 -->
        <div class="step active">
            <h5 class="mt-4">Remplissez les Champs Suivants</h5>
            <div class="form-group mb-3">
                <input type="text" class="custom-input is-invalid" wire:model="nom" name="nom" placeholder="Noms" required>
				<div class="invalid-feedback"></div>
            </div>
            <div class="form-group mb-3">
                <input type="email" class="custom-input is-invalid" wire:model="email" name="email" placeholder="Email" required>
				<div class="invalid-feedback"></div>
            </div>
            <div class="form-group mb-4">
                <input type="password" class="custom-input" wire:model="password" name="password" placeholder="Mot de Passe" required>
				<div class="invalid-feedback"></div>
            </div>
            <button type="button" class="btn-next" onclick="nextStep(event)">Suivant</button>
        </div>

        <!-- Step 2 -->
        <div class="step">
            <h5 class="mt-4">Choisissez le type de Profil</h5>
			
            <div class="form-check radio-label mb-3">
                <input class="form-check-input text-danger" type="radio" wire:model="profileType" name="profileType" id="buyer" value="buyer" required>
                <label class="form-check-label" for="buyer">Profil Acheteur</label>
            </div>
            <div class="form-check radio-label mb-4">
                <input class="form-check-input" type="radio" wire:model="profileType" name="profileType" id="seller" value="seller" required>
                <label class="form-check-label" for="seller">Profil Vendeur</label>
            </div>
			<div class="invalid-feedback mb-4">Veuillez choisi une type de profile</div>
            <div class="d-flex gap-2">
                <button type="button" class="btn-prev" onclick="prevStep()">Précédent</button>
                <button type="button" class="btn-next" onclick="nextStep(event)">Suivant</button>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="step">
            <h5 class="mt-4">Choisissez le type de Vendeur</h5>
			<div class="invalid-feedback">Veuillez choisi une type de profile</div>
            <div class="form-check radio-label mb-3">
                <input class="form-check-input" type="radio" wire:model="profileType" name="profileType" id="individual" value="individual" required>
                <label class="form-check-label" for="individual">Vendeur Particulier</label>
            </div>
            <div class="form-check radio-label mb-3">
                <input class="form-check-input" type="radio" wire:model="profileType" name="profileType" id="merchant" value="merchant" required>
                <label class="form-check-label" for="merchant">Vendeur Commerçant</label>
            </div>
            <div class="form-check radio-label mb-3">
                <input class="form-check-input" type="radio" wire:model="profileType" name="profileType" id="company" value="company" required>
                <label class="form-check-label" for="company">Entreprise</label>
            </div>
            <p class="mt-4">Téléchargez votre Photo de Profil</p>

            <!-- Image upload fields -->
            <div class="upload-container mb-4" onclick="document.getElementById('rectoInput').click()">
                <input type="file" wire:model="rectoInput" name="rectoInput" id="rectoInput" accept="image/*" onchange="previewImage(event, 'rectoPreview')">
                <div class="plus-icon" id="rectoPlusIcon">+</div>
                <p class="upload-label" id="rectoLabel">Télécharger le Recto</p>
                <img id="rectoPreview" src="#" alt="Recto Preview" style="display: none;">
				<div class="invalid-feedback">Veuillez télécharger un fichier.</div>
            </div>

            <div class="upload-container mb-4" onclick="document.getElementById('versoInput').click()">
                <input type="file" wire:model="versoInput" name="versoInput" id="versoInput" accept="image/*" onchange="previewImage(event, 'versoPreview')">
                <div class="plus-icon" id="versoPlusIcon">+</div>
                <p class="upload-label" id="versoLabel">Télécharger le Verso</p>
                <img id="versoPreview" src="#" alt="Verso Preview" style="display: none;">
				<div class="invalid-feedback">Veuillez télécharger un fichier.</div>
            </div>

            <div class="d-flex gap-2">
                <button type="button" class="btn-prev" onclick="prevStep()">Précédent</button>
               <button type="button" class="btn-next" onclick="nextStep(event)">Suivant</button>
            </div>
        </div>
		<!-- Step 4 - Final Confirmation -->
            <div class="step">
                <h5 class="mt-4">Confirmation</h5>
                <p>Vérifiez vos informations et cliquez sur "S'inscrire" pour finaliser votre inscription.</p>
				<div class="d-flex gap-2 mt-3">
                <button type="button" class="btn-prev" onclick="prevStep()">Précédent</button>
                <button type="submit" class="btn-next" onclick="nextStep(event)">S'inscrire</button>
            </div>
            </div>

			<div class="step">
            Votre compte a été bien validé !
        </div>
    </form>
	
    <div class="mt-3">
        <span>Vous Avez Déjà un Compte? </span><a href="/login" class="text-decoration-none">Se Connecter</a>
    </div>
</div>
