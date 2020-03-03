@extends('../layouts.masterpages', ["title" => 'Mon atelier'])

@section('page-name') MON ATELIER @endsection





@section('authentification')

	@if(Auth()->guest())
        <div class="div_connexion">
            <div class="div_connexion2">
                <a href="{{ route('page.connexion') }}" class="btn nbt">Connexion</a>
                <span class="0separator00"></span>
                <a href="{{ route('page.inscription') }}" class="btn nbt">Inscription</a>
            </div>
        </div>
    @else
        <div class="div_connexion">
            <div class="div_connexion2">
                <span class="0separator00"></span>
                <a href="{{ route('page.deconnexion.atelier') }}" class="btn nbt">Déconnexion</a>
            </div>
        </div>
    @endif

@stop