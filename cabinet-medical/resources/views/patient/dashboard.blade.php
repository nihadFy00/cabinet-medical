<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Patient</title>
</head>
<body>
    <h1>👤 Dashboard Patient</h1>
    <p>Bienvenue, {{ auth()->user()->name }} !</p>
    <p>Rôle : <strong>Patient</strong></p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Se déconnecter</button>
    </form>
</body>
</html>