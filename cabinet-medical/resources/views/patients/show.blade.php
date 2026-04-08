<h1>Fiche Patient : {{ $patient->user->name }}</h1>

<div style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
    <h3>Informations Générales</h3>
    <p><strong>Date de naissance :</strong> {{ $patient->birth_date }}</p>
    <p><strong>Groupe Sanguin :</strong> {{ $patient->blood_type }}</p>
    <p><strong>Historique de base :</strong> {{ $patient->medical_history }}</p>
</div>

<h3>Historique des Consultations</h3>
@if($patient->consultations->isEmpty())
    <p>Aucune consultation enregistrée pour ce patient.</p>
@else
    <table border="1" style="width:100%;">
        <thead>
            <tr>
                <th>Date</th>
                <th>Médecin</th>
                <th>Notes / Diagnostic</th>
                <th>Ordonnance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patient->consultations as $consultation)
            <tr>
                <td>{{ $consultation->created_at->format('d/m/Y') }}</td>
                <td>Dr. {{ $consultation->medecin->user->name }}</td>
                <td>{{ $consultation->notes_medecin }}</td>
                <td>
                    @if($consultation->ordonnance)
                        Lien Ordonnance #{{ $consultation->ordonnance->id }}
                    @else
                        Aucune
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<br>
<a href="{{ route('patients.index') }}">Retour à la liste</a>