<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container mt-4">
    <h1> Tableau de Bord</h1>

    <!-- Statistiques -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Consultations</h5>
                    <h2>{{ $totalConsultations }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Ordonnances</h5>
                    <h2>{{ $totalOrdonnances }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphique -->
    <div class="card mt-4">
        <div class="card-body">
            <h5>Consultations par mois</h5>
            <canvas id="consultationsChart"></canvas>
        </div>
    </div>

    <!-- Liens -->
    <div class="mt-4">
        <a href="{{ route('consultations.index') }}" class="btn btn-primary">Consultations</a>
        <a href="{{ route('ordonnances.index') }}" class="btn btn-success">Ordonnances</a>
    </div>
</div>

<script>
    const labels = @json($consultationsParMois->pluck('mois'));
    const data = @json($consultationsParMois->pluck('total'));

    new Chart(document.getElementById('consultationsChart'), {
        type: 'bar',
        data: {
            labels: labels.map(m => 'Mois ' + m),
            datasets: [{
                label: 'Consultations',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
</body>
</html>