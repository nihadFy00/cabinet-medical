<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function dashboard()
    {
        return view('patient.dashboard');
    }
}
=======
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    // Afficher le formulaire de création
    public function create()
    {
        return view('patients.create');
    }

    // Enregistrer le patient
    public function store(Request $request)
    {
        // 1. Validation des données 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'birth_date' => 'required|date',
            'medical_history' => 'nullable|string',
        ]);

        // 2. Création de l'utilisateur d'abord 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // Mot de passe par défaut
            'role' => 'patient',
        ]);

        // 3. Création de la fiche patient liée à l'user 
        Patient::create([
        'user_id' => $user->id,
        'code_patient' => 'P-' . strtoupper(substr(uniqid(), -5)), 
        'nom' => $request->name, 
        'prenom' => 'Patient', 
        'date_naissance' => $request->birth_date,
        'genre' => $request->genre,
        'telephone' => '0000000000',
        'antecedents_medicaux' => $request->medical_history ?? 'Aucun',
    ]);

        return redirect()->back()->with('success', 'Patient créé avec succès !');
    }
    public function index(Request $request)
{
    // On récupère la valeur du champ de recherche 'search'
    $search = $request->input('search');

    // Utilisation d'Eloquent pour la recherche (Règle d'or : pas de SQL brut) [cite: 22]
    $patients = Patient::with('user') 
        ->when($search, function ($query, $search) {
            return $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        })
        ->paginate(10); 

    return view('patients.index', compact('patients'));
}

public function show(Patient $patient)
{
    // On récupère le patient avec toutes ses consultations et les ordonnances liées
    $patient->load(['user', 'consultations.ordonnance', 'consultations.medecin.user']);

    return view('patients.show', compact('patient'));
}
}
>>>>>>> 477a3a31b7c466fdb92c6cf36f0537ff94bfa7f4
