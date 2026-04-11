@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Détail du Rendez-vous</h2>
        <a href="{{ route('rendezvous.index') }}" class="btn btn-secondary">← Retour</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Patient</div>
                <div class="col-md-8">{{ $rendezvous->patient->nom }} {{ $rendezvous->patient->prenom }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Médecin</div>
                <div class="col-md-8">Dr. {{ $rendezvous->medecin->nom }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Date</div>
                <div class="col-md-8">{{ \Carbon\Carbon::parse($rendezvous->date_rdv)->format('d/m/Y à H:i') }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Motif</div>
                <div class="col-md-8">{{ $rendezvous->motif }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Statut</div>
                <div class="col-md-8">
                    @php
                        $colors = ['pending'=>'warning','confirmed'=>'success','cancelled'=>'danger','completed'=>'secondary'];
                        $labels = ['pending'=>'En attente','confirmed'=>'Confirmé','cancelled'=>'Annulé','completed'=>'Terminé'];
                    @endphp
                    <span class="badge bg-{{ $colors[$rendezvous->statut] ?? 'secondary' }}">
                        {{ $labels[$rendezvous->statut] ?? $rendezvous->statut }}
                    </span>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('rendezvous.edit', $rendezvous) }}" class="btn btn-primary">Modifier</a>

            @if($rendezvous->statut === 'pending')
                <form action="{{ route('rendezvous.confirm', $rendezvous) }}" method="POST">
                    @csrf @method('PATCH')
                    <button class="btn btn-success">Confirmer</button>
                </form>
            @endif

            <form action="{{ route('rendezvous.reminder', $rendezvous) }}" method="POST">
                @csrf
                <button class="btn btn-info text-white">Envoyer rappel</button>
            </form>

            <form action="{{ route('rendezvous.destroy', $rendezvous) }}" method="POST"
                  onsubmit="return confirm('Annuler ce rendez-vous ?')">
                @csrf @method('DELETE')
                <button class="btn btn-danger">Annuler RDV</button>
            </form>
        </div>
    </div>
</div>
@endsection
