<h1>Ajouter un Médecin</h1>

<form action="{{ route('medecins.store') }}" method="POST">
    @csrf
    <div>
        <label>Nom du Docteur :</label>
        <input type="text" name="nom" required>
    </div>
    <div>
        <label>Email :</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Spécialité :</label>
        <input type="text" name="specialite" required>
    </div>
    <div>
        <label>Téléphone :</label>
        <input type="text" name="telephone">
    </div>
    <button type="submit">Enregistrer le Médecin</button>
</form>