<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Patient — Cabinet Médical</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    * { font-family: 'DM Sans', sans-serif; }
    body { background: #f0f4f8; }

    /* Sidebar */
    .sidebar {
      width: 220px; min-height: 100vh;
      background: #fff;
      border-right: 1px solid #e2e8f0;
      position: fixed; top: 0; left: 0;
      display: flex; flex-direction: column;
      padding-top: 70px;
    }
    .sidebar a {
      display: block;
      padding: 10px 20px;
      font-size: 13px;
      color: #64748b;
      text-decoration: none;
      border-left: 3px solid transparent;
      transition: all 0.15s;
    }
    .sidebar a:hover { background: #f8fafc; color: #1e293b; }
    .sidebar a.active {
      background: #eff6ff;
      color: #2563eb;
      border-left-color: #2563eb;
      font-weight: 500;
    }
    .sidebar a.danger { color: #ef4444; }
    .sidebar a.danger:hover { background: #fef2f2; }
    .sidebar-label {
      padding: 8px 20px 4px;
      font-size: 11px;
      font-weight: 600;
      color: #94a3b8;
      letter-spacing: 0.06em;
    }

    /* Navbar */
    .topbar {
      position: fixed; top: 0; left: 220px; right: 0; height: 60px;
      background: #fff;
      border-bottom: 1px solid #e2e8f0;
      display: flex; align-items: center;
      padding: 0 1.5rem;
      z-index: 100;
    }
    .avatar {
      width: 36px; height: 36px;
      border-radius: 50%;
      background: #ede9fe;
      display: flex; align-items: center; justify-content: center;
      font-size: 13px; font-weight: 600; color: #4c1d95;
    }

    /* Main content */
    .main { margin-left: 220px; margin-top: 60px; padding: 2rem; }

    /* Stat cards */
    .stat-card {
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 1.25rem;
    }
    .stat-card .label { font-size: 12px; color: #94a3b8; margin-bottom: 4px; }
    .stat-card .value { font-size: 26px; font-weight: 600; color: #0f172a; line-height: 1; }
    .stat-card .sub { font-size: 11px; margin-top: 6px; }

    /* Section cards */
    .section-card {
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 1.25rem;
    }
    .section-title { font-size: 14px; font-weight: 600; color: #0f172a; margin-bottom: 1rem; }

    /* Appointment row */
    .rdv-date {
      width: 40px; height: 40px;
      border-radius: 10px;
      display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      font-size: 15px; font-weight: 600;
      flex-shrink: 0;
    }
    .badge-status {
      font-size: 11px; font-weight: 500;
      padding: 3px 10px; border-radius: 20px;
    }

    /* Blood type badge */
    .blood-badge {
      display: inline-block;
      padding: 2px 10px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
      background: #fee2e2;
      color: #991b1b;
    }

    .btn-primary-custom {
      background: #2563eb; color: #fff;
      border: none; border-radius: 10px;
      padding: 9px 16px; font-size: 13px;
      font-weight: 500; width: 100%;
      transition: background 0.2s;
    }
    .btn-primary-custom:hover { background: #1d4ed8; color: #fff; }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <div style="padding: 0 20px 1rem; border-bottom: 1px solid #f1f5f9;">
      <p style="font-size:15px;font-weight:600;margin:0;color:#0f172a;">🏥 Cabinet Médical</p>
      <span style="font-size:11px;background:#ede9fe;color:#4c1d95;padding:2px 8px;border-radius:20px;">Patient</span>
    </div>
    <div class="sidebar-label mt-3">NAVIGATION</div>
    <a href="#" class="active">Tableau de bord</a>
    <a href="#">Mes rendez-vous</a>
    <a href="#">Mon dossier médical</a>
    <a href="#">Mes ordonnances</a>
    <a href="#">Mon profil</a>
    <div style="border-top:1px solid #f1f5f9;margin-top:auto;padding-top:1rem;">
      <a href="{{ route('logout') }}" class="danger"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Déconnexion
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>
  </div>

  <!-- Topbar -->
  <div class="topbar">
    <p class="mb-0 flex-grow-1" style="font-size:14px;font-weight:500;color:#0f172a;">Tableau de bord</p>
    <div class="d-flex align-items-center gap-3">
      <span style="font-size:13px;color:#64748b;">Bonjour, {{ Auth::user()->name ?? 'Ahmed' }}</span>
      <div class="avatar">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 2)) }}</div>
    </div>
  </div>

  <!-- Main content -->
  <div class="main">

    <!-- Stat cards -->
    <div class="row g-3 mb-4">
      <div class="col-md-4">
        <div class="stat-card">
          <div class="label">Prochain rendez-vous</div>
          <div class="value">15 Avr</div>
          <div class="sub" style="color:#2563eb;">Dr. Alami — 10h00</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="label">Total consultations</div>
          <div class="value">8</div>
          <div class="sub" style="color:#94a3b8;">Depuis inscription</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="label">Ordonnances actives</div>
          <div class="value">2</div>
          <div class="sub" style="color:#16a34a;">En cours</div>
        </div>
      </div>
    </div>

    <!-- Lower section -->
    <div class="row g-3">

      <!-- Appointments -->
      <div class="col-md-7">
        <div class="section-card">
          <div class="section-title">Prochains rendez-vous</div>

          <div class="d-flex align-items-center gap-3 pb-3" style="border-bottom:1px solid #f1f5f9;">
            <div class="rdv-date" style="background:#dbeafe;color:#1e40af;">
              <span>15</span>
              <span style="font-size:10px;font-weight:400;">avr</span>
            </div>
            <div class="flex-grow-1">
              <p class="mb-0" style="font-size:13px;font-weight:500;color:#0f172a;">Dr. Mohammed Alami</p>
              <p class="mb-0" style="font-size:12px;color:#64748b;">Cardiologie — 10h00</p>
            </div>
            <span class="badge-status" style="background:#dcfce7;color:#166534;">Confirmé</span>
          </div>

          <div class="d-flex align-items-center gap-3 pt-3 pb-3" style="border-bottom:1px solid #f1f5f9;">
            <div class="rdv-date" style="background:#fef9c3;color:#854d0e;">
              <span>22</span>
              <span style="font-size:10px;font-weight:400;">avr</span>
            </div>
            <div class="flex-grow-1">
              <p class="mb-0" style="font-size:13px;font-weight:500;color:#0f172a;">Dr. Sara Benali</p>
              <p class="mb-0" style="font-size:12px;color:#64748b;">Médecine générale — 14h30</p>
            </div>
            <span class="badge-status" style="background:#fef9c3;color:#854d0e;">En attente</span>
          </div>

          <div class="d-flex align-items-center gap-3 pt-3">
            <div class="rdv-date" style="background:#fee2e2;color:#991b1b;">
              <span>28</span>
              <span style="font-size:10px;font-weight:400;">avr</span>
            </div>
            <div class="flex-grow-1">
              <p class="mb-0" style="font-size:13px;font-weight:500;color:#0f172a;">Dr. Youssef Idrissi</p>
              <p class="mb-0" style="font-size:12px;color:#64748b;">Dermatologie — 09h00</p>
            </div>
            <span class="badge-status" style="background:#fee2e2;color:#991b1b;">Annulé</span>
          </div>
        </div>
      </div>

      <!-- Patient info -->
      <div class="col-md-5">
        <div class="section-card">
          <div class="section-title">Informations personnelles</div>
          <table class="w-100" style="font-size:13px;">
            <tr>
              <td style="color:#94a3b8;padding:5px 0;width:130px;">Nom complet</td>
              <td style="color:#0f172a;font-weight:500;">Ahmed Benkirane</td>
            </tr>
            <tr>
              <td style="color:#94a3b8;padding:5px 0;">Date de naissance</td>
              <td style="color:#0f172a;">12 / 05 / 1990</td>
            </tr>
            <tr>
              <td style="color:#94a3b8;padding:5px 0;">Groupe sanguin</td>
              <td><span class="blood-badge">A+</span></td>
            </tr>
            <tr>
              <td style="color:#94a3b8;padding:5px 0;">Téléphone</td>
              <td style="color:#0f172a;">06 12 34 56 78</td>
            </tr>
            <tr>
              <td style="color:#94a3b8;padding:5px 0;">Email</td>
              <td style="color:#2563eb;font-size:12px;">ahmed@example.com</td>
            </tr>
          </table>
          <div class="mt-3 pt-3" style="border-top:1px solid #f1f5f9;">
            <a href="#" class="btn btn-primary-custom text-decoration-none text-center d-block">
              Prendre un rendez-vous
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
