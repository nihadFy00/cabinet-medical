<h2>Prendre un rendez-vous</h2>

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('rendezvous.store') }}">
@csrf
<label>Patient</label>
<select name="patient_id">
@foreach($patients as $patient)
<option value="{{ $patient->id }}">{{ $patient->nom }} {{ $patient->prenom }}</option>
@endforeach
</select>
<br><br>
<label>Médecin</label>
<select name="medecin_id">
@foreach($medecins as $medecin)
<option value="{{ $medecin->id }}">{{ $medecin->nom }}</option>
@endforeach
</select>
<br><br>
<label>Date</label>
<input type="datetime-local" name="date_rdv">
<br><br>
<label>Motif</label>
<textarea name="motif"></textarea>
<br><br>
<button>Enregistrer</button>
</form>