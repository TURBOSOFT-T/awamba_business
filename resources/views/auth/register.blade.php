@extends('front.fixe')
@section('titre', 'Accueil')
@section('body')
@include('sweetalert::alert')
		@php
            $config = DB::table('configs')->first();
            $service = DB::table('services')->get();
            $produit = DB::table('produits')->get();
        @endphp

 <main class="main-wrapper">
<style>
        .promo-section {
            background-color: #FAE7E7; /* Light pink */
            color: #d32f2f; /* Dark red */
            text-align: center;
           padding: 10rem;
        }
        #multiStepForm {
            padding: 2rem;
        }
        .btn-custom {
            
			height:4rem
        }
	
	 /* Custom styles to match colors and layout */
        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #000;
        }
        .radio-label {
            margin-bottom: 10px;
        }
        .upload-box {
            border: 2px solid #DB4444;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            color: #DB4444;
            cursor: pointer;
        }
        .btn-signup {
            background-color: #DB4444;
            color: #fff;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }

        
        .form-group .custom-input {
			border:none;
            border-bottom: 4px solid #f9f9f9; /* Red border */
            border-radius: 0;
            padding: 12px 15px;
            font-size: 1.5rem;
            color: #000;
            background-color: #fff; /* Light background */
            transition: border-color 0.3s ease;
        }
        .form-group .custom-input:focus {
            outline: none;
            border-color: #DB4444; /* Red border on focus */
            background-color: #fff; /* White background on focus */
            box-shadow: none;
        }
        .custom-input::placeholder {
            color: #aaa; /* Light grey placeholder */
            font-size: 1.5rem;
        }
        .btn-next {
            background-color: #DB4444;
            color: #fff;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }
        .link {
            color: #DB4444;
            text-decoration: underline;
        }
        .link:hover {
            text-decoration: none;
        }
		.btn-next, .btn-prev, .btn-submit {
            background-color: #DB4444;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }
        .step { display: none; } /* Hide all steps by default */
        .step.active { display: block; } /* Show only the active step */

.upload-container {
            border: 1px solid #DB4444;
            border-radius: 10px;
            text-align: center;
            color: #DB4444;
            cursor: pointer;
            position: relative;
            height: 180px;
            overflow: hidden;
        }
        .upload-container input[type="file"] {
            display: none;
        }
        .upload-container .plus-icon {
            background-color: #F9F9F9;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            color: #DB4444;
            margin: 0 auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .upload-container img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: 450px;
            object-fit: contain; /* Keeps the image fully visible */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 5px;
        }
        .upload-label {
            font-size: 14px;
            color: #555;
            margin-top: 120px; /* Moves label under the plus icon */
        }
        .is-invalid {
    border-color: #dc3545; /* Red border */
}
.invalid-feedback {
    display: none; /* Hide feedback by default */
}
.is-invalid + .invalid-feedback {
    display: block; /* Show feedback if invalid */
    color: #dc3545; /* Red color for feedback */
}

input[type="radio"] {
    display: none; /* Masque le bouton radio par défaut */
}

input[type="radio"] + label {
    position: relative;
    padding-left: 30px; /* Ajoute de l'espace pour le pseudo-élément */
    cursor: pointer;
}

/* Crée un pseudo-élément pour le bouton radio */
input[type="radio"] + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    border: 2px solid red; /* Couleur de la bordure */
    border-radius: 50%; /* Pour rendre le bouton rond */
    background: white; /* Couleur de fond */
}

/* Style lorsque le bouton radio est sélectionné */
input[type="radio"]:checked + label:before {
    background: red; /* Couleur de fond lorsque sélectionné */
    border: 2px solid darkred; /* Couleur de bordure lorsque sélectionné */
}


.carousel-controls {
    position: absolute; /* Positionner les contrôles par rapport au parent */
    top: 50%; /* Centrer verticalement */
    left: 50%; /* Centrer horizontalement */
    transform: translate(-50%, -50%); /* Ajuster le centrage */
    display: flex; /* Utiliser flexbox pour aligner les boutons */
    justify-content: space-between; /* Espacement entre les boutons */
    width: 100%; /* Largeur pleine pour le centrage */
    padding: 0 20px; /* Optionnel : espacement latéral */
}

.carousel-control-prev, .carousel-control-next {
    background-color: rgba(255, 255, 255, 0.8); /* Couleur de fond semi-transparente */
    border-radius: 50%; /* Arrondir les coins */
    width: 30px; /* Largeur personnalisée */
    height: 30px; /* Hauteur personnalisée */
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Ombre */
    transition: background-color 0.3s, transform 0.3s; /* Transition */
}

.carousel-control-prev:hover, .carousel-control-next:hover {
    background-color: rgba(255, 255, 255, 1); /* Couleur de fond lors du survol */
    transform: scale(1.1); /* Agrandir légèrement lors du survol */
}

.carousel-control-prev i, .carousel-control-next i {
    font-size: 20px; /* Taille de l'icône */
    color: #999; /* Couleur de l'icône */
}

.visually-hidden {
    display: none; /* Masquer le texte pour l'accessibilité */
}



		</style>

		
		<div class="bg-color-white mb--30">
            <div class="container-fluid">
                <div class="mb--30">
                    <div class="row row--30 vh-100">
        <!-- Left Section - Promo Section -->
       <div class="col-lg-6 d-md-none d-sm-none d-lg-block d-flex align-items-center justify-content-center promo-section">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Custom Slide with Text and Image -->
            <div class="carousel-item active">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="h2" style="color:#DB4444">
                            Vendez sans 
Aucun Frais de 
Commission avec
AWAMBA BUSINESS !
                        </h1>
                        <div class="mt-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWVoKNutNdQqwNDUp9VWX36p3j2SmX3jkXRw&s" 
                                 alt="Promo Image" class="img-fluid" style="max-width: 80%;">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Example Second Slide -->
            <div class="carousel-item">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="h2" style="color:#DB4444">
                            Achetez des Produits à l’international et revendez en Afrique avec 
                            <strong>AWAMBA BUSINESS</strong> Gratuitement !
                        </h1>
                        <div class="mt-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWVoKNutNdQqwNDUp9VWX36p3j2SmX3jkXRw&s" 
                                 alt="Promo Image" class="img-fluid" style="max-width: 80%;">
                        </div>
                    </div>
                </div>
            </div>
			<div class="carousel-item">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="h2" style="color:#DB4444">
                          Récompenses pour les Utilisateurs Réguliers
                        </h1>
                        <div class="mt-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWVoKNutNdQqwNDUp9VWX36p3j2SmX3jkXRw&s" 
                                 alt="Promo Image" class="img-fluid" style="max-width: 80%;">
                        </div>
                    </div>
                </div>
            </div>
			<div class="carousel-item">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1 class="h2" style="color:#DB4444">
                         Awamba Business aide les fabricants africains à vendre leurs produits locaux dans le monde entier ! Grâce à notre plateforme, 
						 accédez facilement aux marchés d'Europe, d'Asie et d'Amérique
                        </h1>
                        <div class="mt-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWVoKNutNdQqwNDUp9VWX36p3j2SmX3jkXRw&s" 
                                 alt="Promo Image" class="img-fluid" style="max-width: 80%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="carousel-controls">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i> <!-- Icône de flèche gauche -->
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i> <!-- Icône de flèche droite -->
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


        <!-- Right Section - Signup Form -->
        <div class="col-lg-6 col-md-12 d-flex align-items-center justify-content-center signup-form-section">
		@livewire('front.register') 
           
        </div>
    </div>
	
					</div>
				</div>
			</div>
		</div>
        
		
   
  </main>
  <script>
let currentStep = 0; // Initialize the current step

function showStep(stepIndex) {
    const steps = document.querySelectorAll('.step');
    steps.forEach((step, index) => {
        step.classList.toggle('active', index === stepIndex);
    });
}

function validateCurrentStep() {
    const activeStep = document.querySelector('.step.active');
    const inputs = activeStep.querySelectorAll('input[required]');
    let valid = true;

    inputs.forEach(input => {
        // Check for empty values in text and password fields
        if (input.type === 'text' || input.type === 'password') {
            if (!input.value) {
                valid = false; // Mark as invalid if required input is empty
                input.classList.add('is-invalid'); // Add is-invalid class for styling
                showFeedback(input, 'Ce champ est requis.');
            } else {
                input.classList.remove('is-invalid'); // Remove if input is valid
                hideFeedback(input);
            }
        } 
        // Check for valid email format
        else if (input.type === 'email' && !isValidEmail(input.value)) {
            valid = false;
            input.classList.add('is-invalid'); // Add is-invalid class for styling
            showFeedback(input, 'Veuillez entrer un email valide.');
        } 
        // Check for required radio buttons
        else if (input.type === 'radio') {
            const name = input.name;
            const radioGroup = activeStep.querySelectorAll(`input[name="${name}"]`);
            const checked = Array.from(radioGroup).some(radio => radio.checked);
            if (!checked) {
                valid = false;
                radioGroup[0].classList.add('is-invalid'); // Add is-invalid class to the first radio
                showFeedback(radioGroup[0], 'Veuillez sélectionner une option.');
            } else {
                radioGroup[0].classList.remove('is-invalid'); // Remove if at least one is checked
                hideFeedback(radioGroup[0]);
            }
        } 
        // Check for file input
        else if (input.type === 'file') {
            if (!input.value) {
                valid = false;
                input.classList.add('is-invalid'); // Add is-invalid class for styling
                showFeedback(input, 'Veuillez télécharger un fichier.');
            } else {
                input.classList.remove('is-invalid'); // Remove if a file is selected
                hideFeedback(input);
            }
        }
    });

    return valid; // Return whether the current step is valid
}

// Function to validate email format using regex
function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email pattern
    return emailPattern.test(email);
}

// Function to show feedback message
function showFeedback(input, message) {
    let feedback = input.nextElementSibling; // Assuming feedback is immediately after input
    if (feedback && feedback.classList.contains('invalid-feedback')) {
        feedback.textContent = message; // Set the feedback message
        feedback.style.display = 'block'; // Show feedback message
    }
}

// Function to hide feedback message
function hideFeedback(input) {
    let feedback = input.nextElementSibling;
    if (feedback && feedback.classList.contains('invalid-feedback')) {
        feedback.style.display = 'none'; // Hide feedback message
    }
}


	function nextStep(event) {
    if (!validateCurrentStep()) { // Validate the current step before moving to the next
        event.preventDefault(); // Prevent form submission if validation fails
        return; // Stop the function if not valid
    }
	
    const steps = document.querySelectorAll('.step');
    if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
    }
}

function prevStep() {
    if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
    }
}

document.getElementById("multiStepForm").addEventListener("submit", function(e) {
            e.preventDefault(); // Prevent default form submission
           
		   this.reset(); // Reset the form
            showStep(0); // Reset to the first step
            currentStep = 0; // Reset current step
        });
	
	function previewImage(event, previewId) {
        const imagePreview = document.getElementById(previewId);
        imagePreview.src = URL.createObjectURL(event.target.files[0]);
        imagePreview.style.display = 'block';
    }
</script>
  @endsection