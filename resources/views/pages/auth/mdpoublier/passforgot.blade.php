@extends("pages.auth.layouts.master", ["title" => 'Connexion'])

@section('stylecss')
    <link rel="stylesheet" href="{{ asset('css/connexion.css') }}">
@stop

@section("content")


    <div class="container00">
        <p class="connect">Mot de passe oublié</p>
        
        @if(Session::has('success'))
            <div class="alert alert-success" align="center">{{ Session::get('success') }}</div>
        @endif

        @if(Session::has('errors_inf'))
            <div class="alert alert-danger" align="center">{{ Session::get('errors_inf') }}</div>
        @endif
        
        @if($errors->first('email'))
            <p style="color:#CD3F3F;" align="center">{{ $errors->first('email') }}</p>
        @endif

        <form method="POST" action="{{ route('forgot.action') }}">

            
            <input type="email" name="email" placeholder="Saisissez votre adresse email">
            
            {{ csrf_field() }}



            <input type="submit" value="Valider">
           
        </form>
        <!-- <p class="creer">
            <a href="{{ route('page.inscription.admin') }}">Se connecter</a>
        </p> -->
    </div>

	
@stop 
{{--<!-- @push('sfooter')
<script type="text/javascript"></script>
@endpush -->--}}