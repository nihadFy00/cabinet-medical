<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Ordonnance;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::all();
        return view('consultations.index', compact('consultations'));
    }

    public function create()
    {
        return view('consultations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rendezvous_id' => 'required',
            'compte_rendu'  => 'required',
            'diagnostic'    => 'required',
            'traitement'    => 'nullable',
        ]);

        Consultation::create($request->all());

        return redirect()->route('consultations.index')
                         ->with('success', 'Consultation ajoutée avec succès!');
    }

    public function show($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('consultations.show', compact('consultation'));
    }

    public function edit($id)
    {
        $consultation = Consultation::findOrFail($id);
        return view('consultations.edit', compact('consultation'));
    }

    public function update(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->update($request->all());

        return redirect()->route('consultations.index')
                         ->with('success', 'Consultation mise à jour!');
    }

    public function destroy($id)
    {
        Consultation::findOrFail($id)->delete();
        return redirect()->route('consultations.index')
                         ->with('success', 'Consultation supprimée!');
    }
}