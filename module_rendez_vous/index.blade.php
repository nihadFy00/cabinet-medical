<h2>Liste des Rendez-vous</h2>

<a href="{{ route('rendezvous.create') }}">Ajouter Rendez-vous</a>

<table border="1">

<tr>
<th>Patient</th>
<th>Médecin</th>
<th>Date</th>
<th>Statut</th>
<th>Action</th>
</tr>

@foreach($rdvs as $rdv)

<tr>

<td>{{ $rdv->patient->nom }}</td>

<td>{{ $rdv->medecin->nom }}</td>

<td>{{ $rdv->date_rdv }}</td>

<td>{{ $rdv->statut }}</td>

<td>

<form action="{{ route('rendezvous.destroy',$rdv->id) }}" method="POST">

@csrf
@method('DELETE')

<button>Supprimer</button>

</form>

</td>

</tr>

@endforeach

</table>