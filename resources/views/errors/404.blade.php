@extends('front.fixe')

@section('body')
   <div class="axil-breadcrumb-area bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="inner">
                    <ul class="axil-breadcrumb">
                        <li class="axil-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="separator"></li>
                        <li class="axil-breadcrumb-item1 active" aria-current="page">404 Error</li>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->
       
            <div class="container my-5">
             <div class="error-container">

        <h1>404 Non Trouvé</h1>

        <p>Page non trouvée. Vous pouvez aller à la page d'accueil.</p>

        <a href="/" class="btns">Retour à L'accueil</a>

    </div>
               
                
            </div>
       
    <style>
        .img {
            max-width: 100%;
            width: 500px;
        }
		        .error-container {
            text-align: center;
        }


        h1 {
            font-size: 6rem;
            margin-bottom: 1rem;
            color: #333;
        }


        p {
            font-size: 1.2rem;
            color: #555;
        }


        .btns {
             background-color: #DB4444;
            color: #fff;
            border: none;
            width: 100%;
            padding: 15px;
            border-radius: 5px;
			text-decoration:none;
			font-size:1.5rem
        }
		.btns:hover{
						text-decoration:none;
						color:#fff;
		}
    </style>
@endsection
