<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion — Cabinet Médical</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    * { font-family: 'DM Sans', sans-serif; }
    body {
      background: #f0f4f8;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-card {
      background: #fff;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    }
    .logo-circle {
      width: 56px; height: 56px;
      border-radius: 50%;
      background: #dbeafe;
      display: flex; align-items: center; justify-content: center;
      font-size: 24px;
      margin: 0 auto 1rem;
    }
    .form-label { font-size: 13px; color: #64748b; font-weight: 500; }
    .form-control {
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 10px 14px;
      font-size: 14px;
      background: #f8fafc;
    }
    .form-control:focus {
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
      background: #fff;
    }
    .btn-login {
      background: #2563eb;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 11px;
      font-size: 14px;
      font-weight: 500;
      width: 100%;
      transition: background 0.2s;
    }
    .btn-login:hover { background: #1d4ed8; color: #fff; }
    .role-badge {
      font-size: 11px;
      padding: 3px 10px;
      border-radius: 20px;
      font-weight: 500;
    }
    .link-blue { color: #2563eb; text-decoration: none; font-size: 13px; }
    .link-blue:hover { text-decoration: underline; }
    .divider { border-top: 1px solid #f1f5f9; margin: 1.25rem 0; }
  </style>
</head>
<body>
  <div class="login-card">

    <div class="text-center mb-4">
      <div class="logo-circle">🏥</div>
      <h5 class="mb-1 fw-600" style="font-weight:600;">Cabinet Médical</h5>
      <p class="text-muted" style="font-size:13px;">Connectez-vous à votre espace personnel</p>
    </div>

    <form action="{{ route('login') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Adresse email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               placeholder="vous@example.com" value="{{ old('email') }}" required autofocus>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <div class="position-relative">
          <input type="password" name="password" id="password"
                 class="form-control @error('password') is-invalid @enderror"
                 placeholder="••••••••" required>
          <span onclick="togglePassword()"
                style="position:absolute;right:12px;top:50%;transform:translateY(-50%);cursor:pointer;font-size:12px;color:#94a3b8;">
            Afficher
          </span>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check" style="font-size:13px;">
          <input class="form-check-input" type="checkbox" name="remember" id="remember">
          <label class="form-check-label text-muted" for="remember">Se souvenir de moi</label>
        </div>
        <a href="{{ route('password.request') }}" class="link-blue">Mot de passe oublié ?</a>
      </div>

      <button type="submit" class="btn btn-login">Se connecter</button>
    </form>

    <div class="divider"></div>

    <div class="text-center mb-3">
      <p class="text-muted mb-0" style="font-size:13px;">
        Pas encore inscrit ? <a href="{{ route('register') }}" class="link-blue">Créer un compte</a>
      </p>
    </div>

    <div class="p-3 rounded-3" style="background:#f8fafc;border:1px solid #e2e8f0;">
      <p class="mb-2" style="font-size:12px;font-weight:500;color:#475569;">Rôles disponibles :</p>
      <div class="d-flex flex-wrap gap-2">
        <span class="role-badge" style="background:#dbeafe;color:#1e40af;">Admin</span>
        <span class="role-badge" style="background:#dcfce7;color:#166534;">Médecin</span>
        <span class="role-badge" style="background:#fef9c3;color:#854d0e;">Secrétaire</span>
        <span class="role-badge" style="background:#ede9fe;color:#4c1d95;">Patient</span>
      </div>
    </div>

  </div>

  <script>
    function togglePassword() {
      const p = document.getElementById('password');
      p.type = p.type === 'password' ? 'text' : 'password';
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
