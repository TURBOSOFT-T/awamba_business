<div>
    @include('components.alert')

    <form wire:submit="update_user">
        <div class="card-body">

            <div class="row gutters">

                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="nom">{{ __('nom') }}</label>
                        <input wire:model="nom" type="text" {{ Auth::user()->nom }} class= "form-control"
                            style="font-size: 18px; color:black">
                        @error('nom')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12 ">
                    <div class="signup-item">
                        <label class="small mb-1" for="prenom">{{ __('Prenom') }}</label>
                        <input wire:model="prenom" type="text" {{ Auth::user()->prenom }} class= "form-control">
                        @error('prenom')
                            <span class="small text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="email">Email</label>
                        <input type="text" value=" {{ Auth::user()->email }}" wire:model="email"
                            class= "form-control">
                        @error('email')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror

                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="telephone">{{ __('telephone') }}</label>
                        <input value=" {{ Auth::user()->phone }}" wire:model="phone" id="inputLocation" type="text"
                            class= "form-control">
                        @error('phone')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="signup-item">
                        <label class="small mb-1" for="adresse">{{ __('adresse') }}</label>
                        <input type="text" value=" {{ Auth::user()->adresse }}" wire:model="adresse"
                            class= "form-control">
                        @error('adresse')
                            <span class="text-danger small"> {{ $message }} </span>
                        @enderror

                    </div>
                </div>

            </div>

            <style>
                .custom-button {
                    background-color: #3015e222;
                    font-size: 18px;
                   
                }
            </style>
            <br>
            <br>

            <div class="row gutters  " style="font-size: 24%">
            

                
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group">
											<button type="submit" class="btn btn-dark">
                                                {{ \App\Helpers\TranslationHelper::TranslateText("Enregistrer les changements") }}
                                            </button>
										</div>
									</div>
            </div>
        </div>

    </form>


</div>
