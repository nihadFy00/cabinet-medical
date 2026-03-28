<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Consultations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Liste des Consultations</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('consultations.create') }}" class="btn btn-primary mb-3">
        Nouvelle Consultation
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Compte Rendu</th>
                <th>Diagnostic</th>
                <th>Traitement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultations as $consultation)
            <tr>
                <td>{{ $consultation->id }}</td>
                <td>{{ $consultation->compte_rendu }}</td>
                <td>{{ $consultation->diagnostic }}</td>
                <td>{{ $consultation->traitement }}</td>
                <td>
                    <a href="{{ route('consultations.show', $consultation->id) }}" 
                       class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('consultations.edit', $consultation->id) }}" 
                       class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('consultations.destroy', $consultation->id) }}" 
                          method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>