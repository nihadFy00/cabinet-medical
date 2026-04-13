<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Ordonnance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Modifier l'Ordonnance</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('ordonnances.update', $ordonnance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Consultation</label>
            <select name="consultation_id" class="form-control" required>
                @foreach($consultations as $consultation)
                    <option value="{{ $consultation->id }}"
                        {{ $ordonnance->consultation_id == $consultation->id ? 'selected' : '' }}>
                        Consultation #{{ $consultation->id }} - {{ $consultation->diagnostic }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Médicaments</label>
            <textarea name="medicaments" class="form-control" rows="4" required>{{ $ordonnance->medicaments }}</textarea>
        </div>

        <div class="mb-3">
            <label>Instructions</label>
            <textarea name="instructions" class="form-control" rows="3">{{ $ordonnance->instructions }}</textarea>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date_ordonnance" class="form-control" 
                   value="{{ $ordonnance->date_ordonnance }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('ordonnances.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>