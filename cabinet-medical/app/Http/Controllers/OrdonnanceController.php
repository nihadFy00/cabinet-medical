<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Models\Consultation;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    public function index()
    {
        $ordonnances = Ordonnance::all();
        return view('ordonnances.index', compact('ordonnances'));
    }

    public function create()
    {
        $consultations = Consultation::all();
        return view('ordonnances.create', compact('consultations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consultation_id' => 'required',
            'medicaments'     => 'required',
            'instructions'    => 'nullable',
            'date_ordonnance' => 'required|date',
        ]);

        Ordonnance::create($request->all());

        return redirect()->route('ordonnances.index')
                         ->with('success', 'Ordonnance ajoutée avec succès!');
    }

    public function show($id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        return view('ordonnances.show', compact('ordonnance'));
    }

    public function edit($id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        $consultations = Consultation::all();
        return view('ordonnances.edit', compact('ordonnance', 'consultations'));
    }

    public function update(Request $request, $id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        $ordonnance->update($request->all());

        return redirect()->route('ordonnances.index')
                         ->with('success', 'Ordonnance mise à jour!');
    }

    public function destroy($id)
    {
        Ordonnance::findOrFail($id)->delete();
        return redirect()->route('ordonnances.index')
                         ->with('success', 'Ordonnance supprimée!');
    }
}