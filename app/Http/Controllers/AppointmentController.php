<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\Patient;
use App\Models\Medecin;
use App\Mail\AppointmentConfirmation;
use App\Mail\AppointmentReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    // Liste des rendez-vous
    public function index()
    {
        $rendezvous = Rendezvous::with(['patient', 'medecin'])
            ->orderBy('date_rdv', 'desc')
            ->paginate(10);

        return view('rendezvous.index', compact('rendezvous'));
    }

    // Formulaire de création
    public function create()
    {
        $patients = Patient::orderBy('nom')->get();
        $medecins = Medecin::orderBy('nom')->get();

        return view('rendezvous.create', compact('patients', 'medecins'));
    }

    // Enregistrer un nouveau RDV
    public function store(Request $request)
    {
        $request->validate([
            'date_rdv'   => 'required|date|after:now',
            'motif'      => 'required|string|max:255',
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
        ]);

        $rdv = Rendezvous::create([
            'date_rdv'   => $request->date_rdv,
            'motif'      => $request->motif,
            'statut'     => 'pending',
            'patient_id' => $request->patient_id,
            'medecin_id' => $request->medecin_id,
        ]);

        // Envoyer email de confirmation
        $rdv->load(['patient', 'medecin']);
        Mail::to($rdv->patient->email)
            ->send(new AppointmentConfirmation($rdv));

        return redirect()->route('rendezvous.index')
            ->with('success', 'Rendez-vous créé avec succès !');
    }

    // Détail d'un RDV
    public function show(Rendezvous $rendezvous)
    {
        $rendezvous->load(['patient', 'medecin']);
        return view('rendezvous.show', compact('rendezvous'));
    }

    // Formulaire modification
    public function edit(Rendezvous $rendezvous)
    {
        $patients = Patient::orderBy('nom')->get();
        $medecins = Medecin::orderBy('nom')->get();

        return view('rendezvous.edit', compact('rendezvous', 'patients', 'medecins'));
    }

    // Mettre à jour un RDV
    public function update(Request $request, Rendezvous $rendezvous)
    {
        $request->validate([
            'date_rdv'   => 'required|date',
            'motif'      => 'required|string|max:255',
            'statut'     => 'required|in:pending,confirmed,cancelled,completed',
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
        ]);

        $rendezvous->update($request->all());

        return redirect()->route('rendezvous.index')
            ->with('success', 'Rendez-vous modifié avec succès !');
    }

    // Annuler un RDV
    public function destroy(Rendezvous $rendezvous)
    {
        $rendezvous->update(['statut' => 'cancelled']);

        return redirect()->route('rendezvous.index')
            ->with('success', 'Rendez-vous annulé.');
    }

    // Confirmer un RDV (action rapide)
    public function confirm(Rendezvous $rendezvous)
    {
        $rendezvous->update(['statut' => 'confirmed']);

        return redirect()->back()
            ->with('success', 'Rendez-vous confirmé !');
    }

    // Envoyer un rappel manuel
    public function sendReminder(Rendezvous $rendezvous)
    {
        $rendezvous->load(['patient', 'medecin']);
        Mail::to($rendezvous->patient->email)
            ->send(new AppointmentReminder($rendezvous));

        return redirect()->back()
            ->with('success', 'Rappel envoyé à ' . $rendezvous->patient->email);
    }
}
