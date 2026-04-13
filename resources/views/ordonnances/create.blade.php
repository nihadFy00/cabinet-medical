<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle Ordonnance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Nouvelle Ordonnance</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('ordonnances.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Consultation</label>
            <select name="consultation_id" class="form-control" required>
                <option value="">-- Choisir une consultation --</option>
                @foreach($consultations as $consultation)
                    <option value="{{ $consultation->id }}">
                        Consultation #{{ $consultation->id }} - {{ $consultation->diagnostic }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Médicaments</label>
            <textarea name="medicaments" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Instructions</label>
            <textarea name="instructions" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date_ordonnance" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('ordonnances.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>