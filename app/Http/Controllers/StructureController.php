<?php

namespace App\Http\Controllers;

use App\Models\Structure; // N'oubliez pas d'importer le modèle Structure
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structures = Structure::all();
        return view('structures.index', compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('structures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:255|unique:structures',
        ]);

        Structure::create([
            'designation' => $request->designation,
        ]);

        return redirect()->route('structures.index')->with('success', 'Structure créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Structure $structure)
    {
        return view('structures.show', compact('structure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Structure $structure)
    {
        return view('structures.edit', compact('structure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Structure $structure)
    {
        $request->validate([
            'designation' => ['required', 'string', 'max:255', Rule::unique('structures')->ignore($structure->id)],
        ]);

        $structure->update([
            'designation' => $request->designation,
        ]);

        return redirect()->route('structures.index')->with('success', 'Structure mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Structure $structure)
    {
        // Optionnel : Vérifier si des utilisateurs sont liés à cette structure avant de la supprimer
        // if ($structure->users()->count() > 0) {
        //     return redirect()->route('structures.index')->with('error', 'Impossible de supprimer la structure car des utilisateurs y sont liés.');
        // }

        $structure->delete();
        return redirect()->route('structures.index')->with('success', 'Structure supprimée avec succès !');
    }
}