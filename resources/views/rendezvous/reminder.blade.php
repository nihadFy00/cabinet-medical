@component('mail::message')
# Rappel de rendez-vous

Bonjour **{{ $patientNom }}**,

Nous vous rappelons que vous avez un rendez-vous **demain**.

@component('mail::panel')
**Médecin :** Dr. {{ $medecinNom }}
**Date :** {{ \Carbon\Carbon::parse($dateRdv)->format('d/m/Y à H:i') }}
**Motif :** {{ $motif }}
@endcomponent

En cas d'empêchement, merci d'annuler au moins 2h à l'avance.

@component('mail::button', ['url' => config('app.url').'/rendezvous', 'color' => 'green'])
Gérer mes rendez-vous
@endcomponent

**{{ config('app.name') }}**
@endcomponent
