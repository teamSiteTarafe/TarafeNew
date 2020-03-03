@component('mail::message')
# Introduction

Veilliez vous connecter avec ses identifiants

<p> Email : <span style="color: blue;font-weight: bold;">{{ $user->email }}</span> </p> </br>
<p> Mot de passe : <span style="color: blue;font-weight: bold;">{{ $code }}</span> </p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
