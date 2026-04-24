<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prendre un Rendez-vous — Cabinet Médical</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    * { font-family: 'DM Sans', sans-serif; }
    body { background: #f0f4f8; }

    .sidebar {
      width: 220px; min-height: 100vh;
      background: #fff;
      border-right: 1px solid #e2e8f0;
      position: fixed; top: 0; left: 0;
      display: flex; flex-direction: column;
      padding-top: 70px;
    }
    .sidebar a {
      display: block; padding: 10px 20px;
      font-size: 13px; color: #64748b;
      text-decoration: none; border-left: 3px solid transparent;
      transition: all 0.15s;
    }
    .sidebar a:hover { background: #f8fafc; color: #1e293b; }
    .sidebar a.active { background: #eff6ff; color: #2563eb; border-left-color: #2563eb; font-weight: 500; }
    .sidebar a.danger { color: #ef4444; }
    .sidebar-label { padding: 8px 20px 4px; font-size: 11px; font-weight: 600; color: #94a3b8; letter-spacing: 0.06em; }

    .topbar {
      position: fixed; top: 0; left: 220px; right: 0; height: 60px;
      background: #fff; border-bottom: 1px solid #e2e8f0;
      display: flex; align-items: center; padding: 0 1.5rem; z-index: 100;
    }
    .avatar {
      width: 36px; height: 36px; border-radius: 50%;
      background: #ede9fe; display: flex; align-items: center; justify-content: center;
      font-size: 13px; font-weight: 600; color: #4c1d95;
    }

    .main { margin-left: 220px; margin-top: 60px; padding: 2rem; }

    .step-card {
      background: #fff; border: 1px solid #e2e8f0;
      border-radius: 12px; padding: 1.25rem;
    }
    .step-title {
      font-size: 13px; font-weight: 600; color: #0f172a;
      margin-bottom: 0.875rem;
      display: flex; align-items: center; gap: 8px;
    }
    .step-num {
      width: 22px; height: 22px; border-radius: 50%;
      background: #2563eb; color: #fff;
      font-size: 11px; font-weight: 600;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }

    /* Specialty options */
    .specialty-opt {
      padding: 9px 12px;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      font-size: 13px; color: #64748b;
      cursor: pointer; transition: all 0.15s;
      margin-bottom: 6px;
    }
    .specialty-opt:hover { border-color: #93c5fd; background: #f0f9ff; }
    .specialty-opt.selected {
      border-color: #2563eb; background: #eff6ff;
      color: #1e40af; font-weight: 500;
    }

    /* Doctor options */
    .doctor-opt {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 12px; border: 1px solid #e2e8f0;
      border-radius: 10px; cursor: pointer;
      transition: all 0.15s; margin-bottom: 8px;
    }
    .doctor-opt:hover { border-color: #93c5fd; background: #f0f9ff; }
    .doctor-opt.selected { border-color: #2563eb; background: #eff6ff; }
    .doc-avatar {
      width: 36px; height: 36px; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 12px; font-weight: 600;
    }

    /* Calendar */
    .cal-header {
      display: flex; justify-content: space-between; align-items: center;
      margin-bottom: 0.75rem;
    }
    .cal-grid {
      display: grid; grid-template-columns: repeat(7, 1fr);
      gap: 3px; text-align: center;
    }
    .cal-day-label { font-size: 11px; color: #94a3b8; padding: 4px 0; font-weight: 500; }
    .cal-day {
      font-size: 12px; padding: 6px 2px;
      border-radius: 8px; cursor: pointer;
      color: #0f172a; transition: all 0.15s;
    }
    .cal-day:hover { background: #eff6ff; color: #2563eb; }
    .cal-day.disabled { color: #cbd5e1; cursor: default; }
    .cal-day.disabled:hover { background: none; }
    .cal-day.selected { background: #2563eb; color: #fff; font-weight: 500; }
    .cal-day.today { border: 1px solid #2563eb; color: #2563eb; }

    /* Time slots */
    .time-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px; }
    .time-slot {
      padding: 7px 4px; text-align: center;
      border: 1px solid #e2e8f0; border-radius: 8px;
      font-size: 12px; cursor: pointer;
      transition: all 0.15s; color: #0f172a;
    }
    .time-slot:hover { border-color: #93c5fd; background: #eff6ff; }
    .time-slot.disabled { background: #f8fafc; color: #cbd5e1; cursor: default; }
    .time-slot.disabled:hover { border-color: #e2e8f0; background: #f8fafc; }
    .time-slot.selected { border-color: #2563eb; background: #eff6ff; color: #1e40af; font-weight: 500; }

    /* Summary */
    .summary-box {
      background: #f0fdf4; border: 1px solid #bbf7d0;
      border-radius: 10px; padding: 0.875rem 1rem;
    }

    .btn-confirm {
      background: #2563eb; color: #fff; border: none;
      border-radius: 10px; padding: 11px;
      font-size: 14px; font-weight: 500; width: 100%;
      transition: background 0.2s;
    }
    .btn-confirm:hover { background: #1d4ed8; }
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
    <a href="#">Tableau de bord</a>
    <a href="#" class="active">Mes rendez-vous</a>
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
    <p class="mb-0 flex-grow-1" style="font-size:14px;font-weight:500;color:#0f172a;">Prendre un rendez-vous</p>
    <div class="d-flex align-items-center gap-3">
      <span style="font-size:13px;color:#64748b;">Ahmed Benkirane</span>
      <div class="avatar">AB</div>
    </div>
  </div>

  <!-- Main -->
  <div class="main">
    <form action="{{ route('appointments.store') }}" method="POST">
      @csrf

      <div class="row g-3">

        <!-- Left column -->
        <div class="col-md-6">

          <!-- Step 1: Specialty -->
          <div class="step-card mb-3">
            <div class="step-title">
              <div class="step-num">1</div>
              Choisir la spécialité
            </div>
            <div>
              <div class="specialty-opt selected" onclick="selectSpecialty(this, 'cardiologie')">
                ❤️ Cardiologie
              </div>
              <div class="specialty-opt" onclick="selectSpecialty(this, 'generaliste')">
                🩺 Médecine générale
              </div>
              <div class="specialty-opt" onclick="selectSpecialty(this, 'dermatologie')">
                🔬 Dermatologie
              </div>
              <div class="specialty-opt" onclick="selectSpecialty(this, 'pediatrie')">
                👶 Pédiatrie
              </div>
            </div>
            <input type="hidden" name="specialty" id="specialty-input" value="cardiologie">
          </div>

          <!-- Step 2: Doctor -->
          <div class="step-card">
            <div class="step-title">
              <div class="step-num">2</div>
              Choisir le médecin
            </div>
            <div class="doctor-opt selected" onclick="selectDoctor(this, 1, 'Dr. Mohammed Alami')">
              <div class="doc-avatar" style="background:#dbeafe;color:#1e40af;">MA</div>
              <div>
                <p class="mb-0" style="font-size:13px;font-weight:500;color:#0f172a;">Dr. Mohammed Alami</p>
                <p class="mb-0" style="font-size:11px;color:#64748b;">Cardiologue — Disponible</p>
              </div>
            </div>
            <div class="doctor-opt" onclick="selectDoctor(this, 2, 'Dr. Sara Benali')">
              <div class="doc-avatar" style="background:#f3f4f6;color:#6b7280;">SB</div>
              <div>
                <p class="mb-0" style="font-size:13px;font-weight:500;color:#0f172a;">Dr. Sara Benali</p>
                <p class="mb-0" style="font-size:11px;color:#64748b;">Cardiologue — Disponible</p>
              </div>
            </div>
            <input type="hidden" name="doctor_id" id="doctor-input" value="1">
          </div>

        </div>

        <!-- Right column -->
        <div class="col-md-6">

          <!-- Step 3: Date -->
          <div class="step-card mb-3">
            <div class="step-title">
              <div class="step-num">3</div>
              Choisir la date
            </div>
            <div class="cal-header">
              <button type="button" class="btn btn-sm" style="border:1px solid #e2e8f0;border-radius:8px;padding:2px 10px;font-size:13px;">‹</button>
              <span style="font-size:13px;font-weight:500;color:#0f172a;">Avril 2026</span>
              <button type="button" class="btn btn-sm" style="border:1px solid #e2e8f0;border-radius:8px;padding:2px 10px;font-size:13px;">›</button>
            </div>
            <div class="cal-grid mb-1">
              <div class="cal-day-label">Lun</div>
              <div class="cal-day-label">Mar</div>
              <div class="cal-day-label">Mer</div>
              <div class="cal-day-label">Jeu</div>
              <div class="cal-day-label">Ven</div>
              <div class="cal-day-label">Sam</div>
              <div class="cal-day-label">Dim</div>
            </div>
            <div class="cal-grid">
              <div class="cal-day disabled">31</div>
              <div class="cal-day disabled">1</div>
              <div class="cal-day disabled">2</div>
              <div class="cal-day disabled">3</div>
              <div class="cal-day disabled">4</div>
              <div class="cal-day disabled">5</div>
              <div class="cal-day disabled">6</div>

              <div class="cal-day disabled">7</div>
              <div class="cal-day disabled">8</div>
              <div class="cal-day disabled">9</div>
              <div class="cal-day disabled">10</div>
              <div class="cal-day disabled">11</div>
              <div class="cal-day disabled">12</div>
              <div class="cal-day disabled">13</div>

              <div class="cal-day" onclick="selectDate(this, '2026-04-14', '14')">14</div>
              <div class="cal-day selected" onclick="selectDate(this, '2026-04-15', '15')">15</div>
              <div class="cal-day" onclick="selectDate(this, '2026-04-16', '16')">16</div>
              <div class="cal-day" onclick="selectDate(this, '2026-04-17', '17')">17</div>
              <div class="cal-day" onclick="selectDate(this, '2026-04-18', '18')">18</div>
              <div class="cal-day disabled">19</div>
              <div class="cal-day disabled">20</div>

              <div class="cal-day" onclick="selectDate(this, '2026-04-21', '21')">21</div>
              <div class="cal-day" onclick="selectDate(this, '2026-04-22', '22')">22</div>
              <div class="cal-day" onclick="selectDate(this, '2026-04-23', '23')">23</div>
              <div class="cal-day" onclick="selectDate(this, '2026-04-24', '24')">24</div>
              <div class="cal-day" onclick="selectDate(this, '2026-04-25', '25')">25</div>
              <div class="cal-day disabled">26</div>
              <div class="cal-day disabled">27</div>
            </div>
            <input type="hidden" name="date" id="date-input" value="2026-04-15">
          </div>

          <!-- Step 4: Time -->
          <div class="step-card mb-3">
            <div class="step-title">
              <div class="step-num">4</div>
              Choisir l'heure
            </div>
            <div class="time-grid">
              <div class="time-slot disabled">08h00</div>
              <div class="time-slot disabled">09h00</div>
              <div class="time-slot selected" onclick="selectTime(this, '10:00', '10h00')">10h00</div>
              <div class="time-slot" onclick="selectTime(this, '11:00', '11h00')">11h00</div>
              <div class="time-slot disabled">14h00</div>
              <div class="time-slot" onclick="selectTime(this, '15:00', '15h00')">15h00</div>
              <div class="time-slot" onclick="selectTime(this, '16:00', '16h00')">16h00</div>
              <div class="time-slot disabled">17h00</div>
              <div class="time-slot" onclick="selectTime(this, '17:30', '17h30')">17h30</div>
            </div>
            <p class="mt-2 mb-0" style="font-size:11px;color:#94a3b8;">Gris = créneau indisponible</p>
            <input type="hidden" name="time" id="time-input" value="10:00">
          </div>

          <!-- Summary -->
          <div class="summary-box mb-3">
            <p style="font-size:12px;font-weight:600;color:#166534;margin-bottom:4px;">Récapitulatif</p>
            <p style="font-size:13px;color:#15803d;margin:0;" id="summary-doctor">Dr. Mohammed Alami — Cardiologie</p>
            <p style="font-size:13px;color:#15803d;margin:0;" id="summary-datetime">Mercredi 15 avril 2026 à 10h00</p>
          </div>

          <!-- Note -->
          <div class="mb-3">
            <label style="font-size:13px;color:#64748b;font-weight:500;display:block;margin-bottom:6px;">
              Motif de consultation <span style="color:#94a3b8;">(optionnel)</span>
            </label>
            <textarea name="notes" rows="2" class="form-control"
                      style="border:1px solid #e2e8f0;border-radius:10px;font-size:13px;background:#f8fafc;"
                      placeholder="Décrivez brièvement le motif..."></textarea>
          </div>

          <button type="submit" class="btn-confirm">Confirmer le rendez-vous</button>
        </div>

      </div>
    </form>
  </div>

  <script>
    function selectSpecialty(el, val) {
      document.querySelectorAll('.specialty-opt').forEach(e => e.classList.remove('selected'));
      el.classList.add('selected');
      document.getElementById('specialty-input').value = val;
    }

    function selectDoctor(el, id, name) {
      document.querySelectorAll('.doctor-opt').forEach(e => e.classList.remove('selected'));
      el.classList.add('selected');
      document.getElementById('doctor-input').value = id;
      updateSummary();
    }

    function selectDate(el, val, day) {
      document.querySelectorAll('.cal-day:not(.disabled)').forEach(e => e.classList.remove('selected'));
      el.classList.add('selected');
      document.getElementById('date-input').value = val;
      updateSummary();
    }

    function selectTime(el, val, label) {
      document.querySelectorAll('.time-slot:not(.disabled)').forEach(e => e.classList.remove('selected'));
      el.classList.add('selected');
      document.getElementById('time-input').value = val;
      updateSummary();
    }

    function updateSummary() {
      const date = document.getElementById('date-input').value;
      const time = document.getElementById('time-input').value;
      if (date && time) {
        const d = new Date(date);
        const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        const dateStr = d.toLocaleDateString('fr-FR', options);
        document.getElementById('summary-datetime').textContent =
          dateStr.charAt(0).toUpperCase() + dateStr.slice(1) + ' à ' + time.replace(':', 'h');
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>