@extends("pages.auth.layouts.master", ["title" => 'Connexion'])

@section('stylecss')
    <link rel="stylesheet" href="{{ asset('css/connexion.css') }}">
@stop

@section("content")


    <div class="container00">
        <p class="connect">Connectez-vous</p>
        
        @if(Session::has('success'))
            <div class="alert alert-success" align="center">{{ Session::get('success') }}</div>
        @endif

        @if(Session::has('errors'))
            <div class="alert alert-danger" align="center">{{ Session::get('errors') }}</div>
        @endif
        
        <form method="POST" action="{{ route('connexion.atelier') }}">
            
            <input type="email" name="email" placeholder="Adresse e-mail">
            <input type="password" name="password" placeholder="Mot de passe">
            
            <label for="remember">
            <input type="checkbox" name="remember" id="remember">
                Se rappeler de moi
            </label>

            <a href="{{route('forgot.form') }}" class="oublier">Mot de passe oublié ?</a>

            <!-- <input type="hidden" name="page" value="{{ isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : route('page.atelier') }}"> -->

            {{ csrf_field() }}

            <input type="submit" value="Se connecter">
           
        </form>
        <p class="creer">
            Vous n'avez pas encore de compte? <br>
            <a href="{{ route('page.inscription.atelier') }}">Créez en un ici</a>
        </p>
    </div>

	
@stop 
{{--<!-- @push('sfooter')
<script type="text/javascript"></script>
@endpush -->--}}