<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Consultation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Nouvelle Consultation</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('consultations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Rendez-vous ID</label>
            <input type="number" name="rendezvous_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Compte Rendu</label>
            <textarea name="compte_rendu" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Diagnostic</label>
            <textarea name="diagnostic" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label>Traitement</label>
            <textarea name="traitement" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('consultations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>