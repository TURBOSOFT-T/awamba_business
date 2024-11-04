@extends('front.fixe')
@section('titre', "Contact")
@section('body')
<main>



    <!-- Start Breadcrumb Area  -->
    <div class="axil-breadcrumb-area">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-8">
                    <div class="inner">
                        <ul class="axil-breadcrumb">
                            <li class="axil-breadcrumb-item"><a href="{{ route('home') }}">
                                    {{ \App\Helpers\TranslationHelper::TranslateText("Accueil") }}</a></li>
                            <li class="separator"></li>
                            <li class="axil-breadcrumb-item1 active" aria-current="page">Contact</li>
                        </ul>

                        <h1 class="title">
                            {{-- {{ \App\Helpers\TranslationHelper::TranslateText("Contactez-nous") }} --}}
                        </h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">

                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area  -->

    <!-- Start Contact Area  -->
    <div class="axil-contact-page-area axil-section-gap">
        <div class="container">
            <div class="axil-contact-page">
                <div class="row row--30">

                    <div class="col-lg-4">
                        <div class="contact-location mb--40">
                            <h4 class="title mb--20 ">

                                <span style="color: red">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="rgba(240,15,15,1)">
                                        <path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path>
                                    </svg>

                                    {{ \App\Helpers\TranslationHelper::TranslateText("Contactez-nous") }}
                                </span>

                            </h4>
                            <span class="address mb--20"> {{ \App\Helpers\TranslationHelper::TranslateText("Nous sommes disponible 24/7") }}</span>
                            <span class="phone">{{ \App\Helpers\TranslationHelper::TranslateText("Téléphone") }}: {{ $configs->telephone ?? ' ' }}</span>

                        </div>

                        <div class="opening-hour">
                            <h4 class="title mb--20">
                                <span style="color: red">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="rgba(234,21,21,1)">
                                        <path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829Z"></path>
                                    </svg>

                                    {{ \App\Helpers\TranslationHelper::TranslateText("Ecrivez-nous") }} :
                                </span>
                            </h4>
                            <p>

                                {{ \App\Helpers\TranslationHelper::TranslateText("Remplissez le formulaire et nousvous contacterons en moins de 24 heures ") }}

                                <br>

                                <span class="email">Email: {{ $configs->email ?? ' ' }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-form">
                            {{-- <h3 class="title mb--10">
                                {{ \App\Helpers\TranslationHelper::TranslateText("Nous aimerions avoir de vos nouvelles") }}
                            </h3>
                            <p>
                                {{ \App\Helpers\TranslationHelper::TranslateText("Si vous avez d'excellents produits que vous fabriquez ou que vous souhaitez travailler avec nous, envoyez-nous un message") }}
                            </p> --}}
                            @livewire('Front.ContactForm')


                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- End Contact Area  -->


</main>
@endsection
