@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Modifier le Rendez-vous</h2>
        <a href="{{ route('rendezvous.index') }}" class="btn btn-secondary">← Retour</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('rendezvous.update', $rendezvous) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Patient</label>
                    <select name="patient_id" class="form-select @error('patient_id') is-invalid @enderror">
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}"
                                {{ $rendezvous->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->nom }} {{ $patient->prenom }}
                            </option>
                        @endforeach
                    </select>
                    @error('patient_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Médecin</label>
                    <select name="medecin_id" class="form-select @error('medecin_id') is-invalid @enderror">
                        @foreach($medecins as $medecin)
                            <option value="{{ $medecin->id }}"
                                {{ $rendezvous->medecin_id == $medecin->id ? 'selected' : '' }}>
                                Dr. {{ $medecin->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('medecin_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Date et heure</label>
                    <input type="datetime-local" name="date_rdv"
                           value="{{ \Carbon\Carbon::parse($rendezvous->date_rdv)->format('Y-m-d\TH:i') }}"
                           class="form-control @error('date_rdv') is-invalid @enderror">
                    @error('date_rdv') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Motif</label>
                    <textarea name="motif" rows="3"
                              class="form-control @error('motif') is-invalid @enderror">{{ old('motif', $rendezvous->motif) }}</textarea>
                    @error('motif') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Statut</label>
                    <select name="statut" class="form-select">
                        <option value="pending"    {{ $rendezvous->statut == 'pending'    ? 'selected' : '' }}>En attente</option>
                        <option value="confirmed"  {{ $rendezvous->statut == 'confirmed'  ? 'selected' : '' }}>Confirmé</option>
                        <option value="cancelled"  {{ $rendezvous->statut == 'cancelled'  ? 'selected' : '' }}>Annulé</option>
                        <option value="completed"  {{ $rendezvous->statut == 'completed'  ? 'selected' : '' }}>Terminé</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
</div>
@endsection
