<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Models\Patient;
use App\Models\Medecin;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{

public function index()
{
$rdvs = Rendezvous::with('patient','medecin')->get();

return view('rendezvous.index', compact('rdvs'));
}

public function create()
{
$patients = Patient::all();
$medecins = Medecin::all();

return view('rendezvous.create', compact('patients','medecins'));
}

public function store(Request $request)
{

Rendezvous::create([

'date_rdv' => $request->date_rdv,
'motif' => $request->motif,
'patient_id' => $request->patient_id,
'medecin_id' => $request->medecin_id,
'statut' => 'en_attente'

]);

return redirect()->route('rendezvous.index');

}

public function destroy($id)
{

Rendezvous::findOrFail($id)->delete();

return redirect()->route('rendezvous.index');

}

}