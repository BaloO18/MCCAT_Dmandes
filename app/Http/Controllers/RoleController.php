<?php

namespace App\Http\Controllers;

use App\Models\Role; // N'oubliez pas d'importer le modèle Role
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomRole' => 'required|string|max:255|unique:roles',
        ]);

        Role::create([
            'nomRole' => $request->nomRole,
        ]);

        return redirect()->route('roles.index')->with('success', 'Rôle créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nomRole' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($role->id)],
        ]);

        $role->update([
            'nomRole' => $request->nomRole,
        ]);

        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Optionnel : Vérifier si des utilisateurs sont liés à ce rôle avant de le supprimer
        // if ($role->users()->count() > 0) {
        //     return redirect()->route('roles.index')->with('error', 'Impossible de supprimer le rôle car des utilisateurs y sont liés.');
        // }

        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rôle supprimé avec succès !');
    }
}