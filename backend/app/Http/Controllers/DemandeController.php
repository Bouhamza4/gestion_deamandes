<?php
namespace App\Http\Controllers;

use App\Models\Demande;
use App\Notifications\DemandeSoumise;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $demandes = Demande::where('type', 'LIKE', "%{$search}%")->paginate(10);
        return view('demandes.index', compact('demandes'));
    }
    

    public function create()
    {
        return view('demandes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $user->notify(new DemandeSoumise());


        Demande::create($request->all());

        return redirect()->route('demandes.index')->with('success', 'Demande ajoutée avec succès !');
    }

    public function show($id)
    {
        $demande = Demande::findOrFail($id);
        return view('demandes.show', compact('demande'));
    }

    public function edit($id)
    {
        $demande = Demande::findOrFail($id);
        return view('demandes.edit', compact('demande'));
    }

    public function update(Request $request, $id)
    {
        $demande = Demande::findOrFail($id);
        $demande->update($request->all());

        return redirect()->route('demandes.index')->with('success', 'Demande mise à jour avec succès !');
    }

    public function destroy($id)
    {
        Demande::destroy($id);
        return redirect()->route('demandes.index')->with('success', 'Demande supprimée avec succès !');
    }
}
