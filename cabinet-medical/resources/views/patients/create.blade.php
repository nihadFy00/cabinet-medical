<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une Fiche Patient</title>
    <style>
        /* Design Global */
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f4f8; /* Gris-bleu très clair */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Carte du Formulaire */
        .card {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #1a365d; /* Bleu foncé médical */
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            border-bottom: 3px solid #3182ce;
            padding-bottom: 10px;
        }

        /* Groupes de champs */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
        }

        /* Inputs, Selects et Textarea */
        input[type="text"],
        input[type="email"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            box-sizing: border-box; /* Évite que l'input dépasse */
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.2);
        }

        /* Bouton */
        button {
            width: 100%;
            background-color: #3182ce;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #2b6cb0;
        }

        /* Alertes */
        .alert-success {
            background-color: #c6f6d5;
            color: #22543d;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .alert-error {
            background-color: #fed7d7;
            color: #822727;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            list-style: none;
        }

        hr {
            border: 0;
            border-top: 1px solid #edf2f7;
            margin: 25px 0;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>🏥 Nouvelle Fiche Patient</h1>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </div>
        @endif

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Nom complet :</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Ex: Fatima Hafid" required>
            </div>

            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="patient@exemple.com" required>
            </div>

            <hr>

            <div style="display: flex; gap: 15px;">
                <div class="form-group" style="flex: 1;">
                    <label>Date de naissance :</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" required>
                </div>

                <div class="form-group" style="flex: 1;">
                    <label>Genre :</label>
                    <select name="genre" required>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="0612345678">
            </div>

            <div class="form-group">
                <label>Groupe Sanguin :</label>
                <select name="blood_type" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>

            <div class="form-group">
                <label>Historique Médical :</label>
                <textarea name="medical_history" rows="3" placeholder="Antécédents, allergies...">{{ old('medical_history') }}</textarea>
            </div>

            <button type="submit">Enregistrer la Fiche Patient</button>
        </form>
    </div>

</body>
</html>