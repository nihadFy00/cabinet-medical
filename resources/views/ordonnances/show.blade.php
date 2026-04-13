<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail Ordonnance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Détail de l'Ordonnance</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ordonnance #{{ $ordonnance->id }}</h5>

            <p><strong>Médicaments :</strong><br>
            {{ $ordonnance->medicaments }}</p>

            <p><strong>Instructions :</strong><br>
            {{ $ordonnance->instructions ?? 'Aucune' }}</p>

            <p><strong>Date :</strong>
            {{ $ordonnance->date_ordonnance }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('ordonnances.index') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('ordonnances.edit', $ordonnance->id) }}" class="btn btn-warning">Modifier</a>
        <a href="{{ route('ordonnances.pdf', $ordonnance->id) }}" class="btn btn-danger">
            Télécharger PDF
        </a>
    </div>
</div>
</body>
</html>