<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MedecinController extends Controller
{
    // Afficher la liste des médecins
    public function index()
    {
        $medecins = Medecin::all();
        return view('medecins.index', compact('medecins'));
    }

    // Afficher le formulaire d'ajout
    public function create()
    {
        return view('medecins.create');
    }

    // Enregistrer le médecin dans la base
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'specialite' => 'required|string',
        ]);

        // 1. Créer l'utilisateur pour l'authentification
        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make('password123'),
            'role' => 'doctor',
        ]);

        // 2. Créer le médecin avec tes colonnes réelles
        Medecin::create([
            'user_id' => $user->id,
            'nom' => $request->nom,
            'specialite' => $request->specialite,
            'telephone' => $request->telephone ?? 'Non renseigné',
        ]);

        return redirect()->back()->with('success', 'Médecin ajouté avec succès !');
    }
}