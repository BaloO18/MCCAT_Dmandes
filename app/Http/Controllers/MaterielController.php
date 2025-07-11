<?php

namespace App\Http\Controllers;

use App\Models\Materiel; // N'oubliez pas d'importer le modèle Materiel
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiels = Materiel::all();
        return view('materiels.index', compact('materiels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materiels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:255|unique:materiels',
        ]);

        Materiel::create([
            'designation' => $request->designation,
        ]);

        return redirect()->route('materiels.index')->with('success', 'Matériel ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materiel $materiel)
    {
        return view('materiels.show', compact('materiel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materiel $materiel)
    {
        return view('materiels.edit', compact('materiel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materiel $materiel)
    {
        $request->validate([
            'designation' => ['required', 'string', 'max:255', Rule::unique('materiels')->ignore($materiel->id)],
        ]);

        $materiel->update([
            'designation' => $request->designation,
        ]);

        return redirect()->route('materiels.index')->with('success', 'Matériel mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materiel $materiel)
    {
        // Optionnel : Vérifier si des demandes sont liées à ce matériel avant de le supprimer
        if ($materiel->demandes()->count() > 0) {
            return redirect()->route('materiels.index')->with('error', 'Impossible de supprimer ce matériel car des demandes y sont liées.');
        }

        $materiel->delete();
        return redirect()->route('materiels.index')->with('success', 'Matériel supprimé avec succès !');
    }
}