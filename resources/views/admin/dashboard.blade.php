<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background: linear-gradient(135deg, #1F3864, #2E74B5); }
        .card-stat { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .card-stat:hover { transform: translateY(-5px); transition: 0.3s; }
        .welcome-card { background: linear-gradient(135deg, #1F3864, #2E74B5); border-radius: 15px; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-hospital"></i> Cabinet Médical
        </a>
        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="text-white">
                <i class="bi bi-person-circle"></i>
                {{ auth()->user()->name }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <!-- WELCOME CARD -->
    <div class="welcome-card text-white p-4 mb-4">
        <div class="d-flex align-items-center gap-3">
            <span style="font-size: 3rem;">👑</span>
            <div>
                <h2 class="mb-0 fw-bold">Bienvenue, {{ auth()->user()->name }} !</h2>
                <p class="mb-0 opacity-75">Tableau de bord Administrateur</p>
            </div>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card card-stat p-3 text-center">
                <div style="font-size: 2.5rem;">👥</div>
                <h5 class="mt-2 text-muted">Patients</h5>
                <h2 class="fw-bold text-primary">--</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 text-center">
                <div style="font-size: 2.5rem;">📅</div>
                <h5 class="mt-2 text-muted">Rendez-vous</h5>
                <h2 class="fw-bold text-success">--</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 text-center">
                <div style="font-size: 2.5rem;">⚕️</div>
                <h5 class="mt-2 text-muted">Médecins</h5>
                <h2 class="fw-bold text-info">--</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat p-3 text-center">
                <div style="font-size: 2.5rem;">📋</div>
                <h5 class="mt-2 text-muted">Consultations</h5>
                <h2 class="fw-bold text-warning">--</h2>
            </div>
        </div>
    </div>

    <!-- ACTIONS RAPIDES -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">
            <i class="bi bi-lightning-charge text-warning"></i> Actions Rapides
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-people"></i> Gérer Utilisateurs
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success w-100">
                        <i class="bi bi-person-plus"></i> Ajouter Médecin
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-info w-100 text-white">
                        <i class="bi bi-graph-up"></i> Statistiques
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-secondary w-100">
                        <i class="bi bi-gear"></i> Configuration
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>