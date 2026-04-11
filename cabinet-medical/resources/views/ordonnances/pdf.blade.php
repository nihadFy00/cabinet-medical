<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ordonnance</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { text-align: center; color: #333; }
        .header { text-align: center; margin-bottom: 30px; }
        .info { margin-bottom: 20px; }
        .info p { margin: 5px 0; }
        .medicaments { border: 1px solid #333; padding: 15px; margin-top: 20px; }
        .footer { margin-top: 50px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h1> Cabinet Médical</h1>
        <h2>Ordonnance Médicale</h2>
    </div>

    <div class="info">
        <p><strong>Ordonnance #:</strong> {{ $ordonnance->id }}</p>
        <p><strong>Date:</strong> {{ $ordonnance->date_ordonnance }}</p>
        <p><strong>Consultation #:</strong> {{ $ordonnance->consultation_id }}</p>
        <p><strong>Nom du Médecin:</strong> {{ $ordonnance->consultation->medecin->nom ?? '' }}</p>
        <p><strong>Prénom du Médecin:</strong> {{ $ordonnance->consultation->medecin->prenom ?? '' }}</p>
        <p><strong>Spécialité:</strong> {{ $ordonnance->consultation->medecin->specialite ?? '' }}</p>
    </div>

    <div class="medicaments">
        <h3>Médicaments:</h3>
        <p>{{ $ordonnance->medicaments }}</p>
        @if($ordonnance->instructions)
        <h3>Instructions:</h3>
        <p>{{ $ordonnance->instructions }}</p>
        @endif
    </div>

    <div class="footer">
        <p>Signature du Médecin: ___________________</p>
    </div>
</body>
</html>