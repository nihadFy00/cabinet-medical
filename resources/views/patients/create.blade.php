<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une Fiche Patient</title>
</head>
<body>
    <h1>Ajouter un Nouveau Patient</h1>

    @if(session('success'))
        <div style="color: green; font-weight: bold;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Nom complet :</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>Email :</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <hr>

        <div>
            <label>Date de naissance :</label><br>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}" required>
        </div>

        <div>
            <label>Genre :</label><br>
            <select name="genre" required>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
        </div>

        <div>
            <label>Téléphone :</label><br>
            <input type="text" name="telephone" value="{{ old('telephone') }}" placeholder="Ex: 0612345678">
        </div>

        <div>
            <label>Groupe Sanguin :</label><br>
            <select name="blood_type" required>
                <option value="">--Sélectionner--</option>
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

        <div>
            <label>Historique Médical :</label><br>
            <textarea name="medical_history" rows="4">{{ old('medical_history') }}</textarea>
        </div>

        <br>
        <button type="submit">Enregistrer la Fiche Patient</button>
    </form> </body>
</html>