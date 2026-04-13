<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Médecin</title>
    <style>
        /* Design Global (Identique aux patients pour la cohérence) */
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            color: #2c5282; /* Bleu médical */
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            border-bottom: 3px solid #4299e1;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
        }

        button {
            width: 100%;
            background-color: #4299e1;
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
            background-color: #3182ce;
        }

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
    </style>
</head>
<body>

    <div class="card">
        <h1>👨‍⚕️ Ajouter un Médecin</h1>

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

        <form action="{{ route('medecins.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label>Nom du Docteur :</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Ex: Dr. Ahmed Alami" required>
            </div>

            <div class="form-group">
                <label>Email professionnel :</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="docteur@cabinet.com" required>
            </div>

            <div class="form-group">
                <label>Spécialité :</label>
                <select name="specialite" required>
                    <option value="">-- Choisir une spécialité --</option>
                    <option value="Généraliste">Généraliste</option>
                    <option value="Cardiologue">Cardiologue</option>
                    <option value="Pédiatre">Pédiatre</option>
                    <option value="Dentiste">Dentiste</option>
                    <option value="Ophtalmologue">Ophtalmologue</option>
                </select>
            </div>

            <div class="form-group">
                <label>Numéro de Téléphone :</label>
                <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="06XXXXXXXX">
            </div>

            <button type="submit">Enregistrer le Médecin</button>
        </form>
    </div>

</body>
</html>