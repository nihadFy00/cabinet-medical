<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Secrétaire</title>
</head>
<body>
    <h1>📋 Dashboard Secrétaire</h1>
    <p>Bienvenue, {{ auth()->user()->name }} !</p>
    <p>Rôle : <strong>Secrétaire</strong></p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>