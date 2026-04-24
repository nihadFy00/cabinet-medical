@component('mail::message')
# Confirmation de rendez-vous

Bonjour **{{ $patientNom }}**,

Votre rendez-vous a bien été enregistré.

@component('mail::panel')
**Médecin :** Dr. {{ $medecinNom }}
**Date :** {{ \Carbon\Carbon::parse($dateRdv)->format('d/m/Y à H:i') }}
**Motif :** {{ $motif }}
@endcomponent

@component('mail::button', ['url' => config('app.url')])
Voir mon espace patient
@endcomponent

Merci de votre confiance,
**{{ config('app.name') }}**
@endcomponent
