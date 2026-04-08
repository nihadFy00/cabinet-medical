<h1>Liste des Patients</h1>

<form action="{{ route('patients.index') }}" method="GET">
    <input type="text" name="search" placeholder="Rechercher par nom..." value="{{ request('search') }}">
    <button type="submit">Rechercher</button>
</form>

<table border="1" style="width:100%; margin-top:20px;">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Date de Naissance</th>
            <th>Groupe Sanguin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->user->name }}</td>
            <td>{{ $patient->birth_date }}</td>
            <td>{{ $patient->blood_type }}</td>
            <td>
                <a href="#">Modifier</a> | 
                <a href="{{ route('patients.show', $patient->id) }}">Historique</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $patients->links() }}