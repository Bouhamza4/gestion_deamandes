<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        return Etudiant::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:etudiants',
        ]);

        return Etudiant::create($validated);
    }

    public function show($id)
    {
        return Etudiant::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update($request->all());
        return $etudiant;
    }

    public function destroy($id)
    {
        return Etudiant::destroy($id);
    }
    public function getMoyenne($id)
{
    $etudiant = Etudiant::findOrFail($id);

    $notes = $etudiant->notes; // via relation

    if ($notes->isEmpty()) {
        return response()->json([
            'moyenne' => null,
            'message' => 'Aucune note trouvée pour cet étudiant.'
        ]);
    }

    $moyenne = round($notes->avg('note'), 2);

    return response()->json([
        'etudiant' => $etudiant->nom,
        'moyenne' => $moyenne
    ]);
}
public function exportBulletin($id)
{
    $etudiant = Etudiant::with(['notes.course'])->findOrFail($id);

    $moyenne = round($etudiant->notes->avg('note'), 2);

    $pdf = Pdf::loadView('pdf.bulletin', [
        'etudiant' => $etudiant,
        'notes' => $etudiant->notes,
        'moyenne' => $moyenne,
    ]);
    

    return $pdf->download("Bulletin_{$etudiant->nom}.pdf");
}


}
