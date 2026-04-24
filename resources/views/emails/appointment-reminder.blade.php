<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { background: #0C447C; padding: 32px; text-align: center; }
        .header h1 { color: white; margin: 0; font-size: 22px; }
        .header p { color: rgba(255,255,255,0.7); margin: 8px 0 0; font-size: 14px; }
        .body { padding: 32px; }
        .greeting { font-size: 16px; color: #333; margin-bottom: 16px; }
        .reminder-box { background: #FFF8E1; border-left: 4px solid #F59E0B; border-radius: 8px; padding: 16px 20px; margin: 20px 0; }
        .reminder-box p { margin: 0; font-size: 14px; color: #92400E; font-weight: 600; }
        .info-card { background: #F0F7FF; border-radius: 10px; padding: 20px; margin: 20px 0; }
        .info-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #DBEAFE; font-size: 14px; }
        .info-row:last-child { border-bottom: none; }
        .info-label { color: #6B7280; }
        .info-value { color: #1E3A5F; font-weight: 600; }
        .badge { display: inline-block; background: #DBEAFE; color: #1E40AF; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-bottom: 20px; }
        .tip { background: #F0FDF4; border-radius: 8px; padding: 14px 18px; margin: 20px 0; font-size: 13px; color: #166534; }
        .tip strong { display: block; margin-bottom: 4px; }
        .btn { display: block; width: fit-content; margin: 24px auto; background: #0C447C; color: white; text-decoration: none; padding: 12px 32px; border-radius: 8px; font-size: 14px; font-weight: 600; }
        .footer { background: #F9FAFB; padding: 20px 32px; text-align: center; border-top: 1px solid #E5E7EB; }
        .footer p { color: #9CA3AF; font-size: 12px; margin: 4px 0; }
    </style>
</head>
<body>
    <div class="container">

        {{-- Header --}}
        <div class="header">
            <h1>⏰ Rappel de Rendez-vous</h1>
            <p>Votre rendez-vous est demain — MédiCab</p>
        </div>

        {{-- Body --}}
        <div class="body">

            <span class="badge">Rappel automatique — 24h avant</span>

            <p class="greeting">
                Bonjour <strong>{{ $rendezvous->patient->user->name }}</strong>,
            </p>

            <p style="color: #555; font-size: 14px; line-height: 1.6;">
                Nous vous rappelons que vous avez un rendez-vous médical prévu <strong>demain</strong>.
                Voici les détails de votre consultation :
            </p>

            {{-- Reminder Banner --}}
            <div class="reminder-box">
                <p>⚠️ Votre rendez-vous est dans moins de 24 heures</p>
            </div>

            {{-- Infos RDV --}}
            <div class="info-card">
                <div class="info-row">
                    <span class="info-label">👨‍⚕️ Médecin</span>
                    <span class="info-value">Dr. {{ $rendezvous->medecin->user->name }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">🏥 Spécialité</span>
                    <span class="info-value">{{ $rendezvous->medecin->specialite }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">📅 Date</span>
                    <span class="info-value">{{ $rendezvous->date_heure->format('l d F Y') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">🕐 Heure</span>
                    <span class="info-value">{{ $rendezvous->date_heure->format('H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">📍 Adresse</span>
                    <span class="info-value">Cabinet MédiCab, Marrakech</span>
                </div>
            </div>

            {{-- Conseils --}}
            <div class="tip">
                <strong>💡 Conseils pour votre visite :</strong>
                • Arrivez 10 minutes avant l'heure prévue<br>
                • Apportez votre carte d'identité et votre carnet de santé<br>
                • Si vous ne pouvez pas venir, annulez dès que possible
            </div>

            {{-- Bouton annulation --}}
            <a href="{{ url('/rendezvous/' . $rendezvous->id . '/annuler') }}" class="btn">
                Annuler le rendez-vous
            </a>

        </div>

        {{-- Footer --}}
        <div class="footer">
            <p>Cet email a été envoyé automatiquement par <strong>MédiCab</strong></p>
            <p>Cabinet Médical — Marrakech, Maroc</p>
            <p style="margin-top: 8px;">
                <a href="{{ url('/') }}" style="color: #0C447C; text-decoration: none;">Accéder à mon espace</a>
            </p>
        </div>

    </div>
</body>
</html>