<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Médecin</title>
</head>
<body>
    <h1>⚕️ Dashboard Médecin</h1>
    <p>Bienvenue, {{ auth()->user()->name }} !</p>
    <p>Rôle : <strong>Médecin</strong></p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>