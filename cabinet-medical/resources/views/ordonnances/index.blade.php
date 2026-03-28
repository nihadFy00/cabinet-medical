<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ordonnances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Liste des Ordonnances</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('ordonnances.create') }}" class="btn btn-primary mb-3">
        Nouvelle Ordonnance
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Médicaments</th>
                <th>Instructions</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordonnances as $ordonnance)
            <tr>
                <td>{{ $ordonnance->id }}</td>
                <td>{{ $ordonnance->medicaments }}</td>
                <td>{{ $ordonnance->instructions }}</td>
                <td>{{ $ordonnance->date_ordonnance }}</td>
                <td>
                    <a href="{{ route('ordonnances.show', $ordonnance->id) }}" 
                       class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('ordonnances.edit', $ordonnance->id) }}" 
                       class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('ordonnances.destroy', $ordonnance->id) }}" 
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