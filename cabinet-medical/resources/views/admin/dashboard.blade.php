<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>👑 Dashboard Administrateur</h1>
    <p>Bienvenue, {{ auth()->user()->name }} !</p>
    <p>Rôle : <strong>Admin</strong></p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>