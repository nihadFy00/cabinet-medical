# 🏥 Système de Gestion de Cabinet Médical

Projet académique réalisé dans le cadre du module **Programmation Backend PHP — S6**  
Faculté des Sciences Semlalia, Université Cadi Ayyad — Année 2025/2026

---

## 👥 Équipe

| Membre | Rôle |
|--------|------|
| Membre 1 | Chef de Projet + UML + Authentification |
| Membre 2 | Base de Données + Module Patients |
| Membre 3 | Module Rendez-vous + Emails |
| Membre 4 | Consultation + PDF + Dashboard + Déploiement |

---

## 🛠️ Technologies Utilisées

| Composant | Technologie |
|-----------|-------------|
| Backend | Laravel 12.x |
| Frontend | Bootstrap 5 |
| Base de données | MySQL |
| Authentification | Laravel Breeze + Spatie |
| PDF | DomPDF |
| Email | Laravel Mail + Mailtrap |
| Tests | PHPUnit |
| Versioning | Git + GitHub |
| Déploiement | Railway.app |

---

## ⚙️ Installation du Projet

### Prérequis
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

### Étapes

**1. Cloner le repository**
```bash
git clone https://github.com/[votre-username]/cabinet-medical.git
cd cabinet-medical
```

**2. Installer les dépendances PHP**
```bash
composer install
```

**3. Installer les dépendances JavaScript**
```bash
npm install && npm run build
```

**4. Configurer le fichier d'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

**5. Configurer la base de données**  
Ouvre le fichier `.env` et modifie ces lignes :