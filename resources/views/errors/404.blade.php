@extends('frontend.layouts.master')

@section('content')
<section class="notfound pt-0">
    <div class="container">
        <div class="top-headings text-center" style="padding-top: 95px;">
            <img src="{{asset('frontend/images/bg/error-404.jpg')}}" alt="Page 404">
            <h3 class="text-center">Page Non Trouvée!</h3>
            <p class="text-center">Oups! On dirait que quelque chose ne va pas Nous ne parvenons pas à trouver la page que vous recherchez, assurez-vous d'avoir tapé la bonne URL</p>
        </div>
        <div class="port-info">
            <a href="{{route('home')}}" class="btn btn-primary btn-lg">Aller à l'accueil</a>
        </div>
    </div>
</section>
@endsection
