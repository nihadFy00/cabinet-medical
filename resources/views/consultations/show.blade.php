<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail Consultation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Détail de la Consultation</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Consultation #{{ $consultation->id }}</h5>
            
            <p><strong>Compte Rendu :</strong><br>
            {{ $consultation->compte_rendu }}</p>
            
            <p><strong>Diagnostic :</strong><br>
            {{ $consultation->diagnostic }}</p>
            
            <p><strong>Traitement :</strong><br>
            {{ $consultation->traitement ?? 'Aucun' }}</p>
            
            <p><strong>Date :</strong>
            {{ $consultation->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('consultations.index') }}" class="btn btn-secondary">Retour</a>
        <a href="{{ route('consultations.edit', $consultation->id) }}" class="btn btn-warning">Modifier</a>
        <a href="{{ route('ordonnances.create', ['consultation_id' => $consultation->id]) }}" 
           class="btn btn-primary">Créer Ordonnance</a>
    </div>
</div>
</body>
</html>