<?php

namespace App\Http\Controllers;

use App\Models\Demande; // N'oubliez pas d'importer le modèle Demande
use App\Models\User;    // N'oubliez pas d'importer le modèle User
use App\Models\Materiel; // N'oubliez pas d'importer le modèle Materiel
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    // Types de demande fixes
    private $typesDemande = ['Materiel', 'Vehicule', 'Suivi', 'Salle'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Charge les demandes avec leurs relations 'user' et 'materiel' pour éviter les N+1 queries
        $demandes = Demande::with(['user', 'materiel'])->get();
        return view('demandes.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Pour choisir l'utilisateur qui fait la demande
        $materiels = Materiel::all(); // Pour choisir le matériel demandé
        return view('demandes.create', compact('users', 'materiels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'materiel_id' => 'required|exists:materiels,id',
            'dateDemande' => 'required|date',
            'statut' => 'required|string|max:50', // Ex: En attente, Approuvée, Rejetée, En cours, Terminée
            'description' => 'nullable|string|max:500',
        ]);

        Demande::create([
            'user_id' => $request->user_id,
            'materiel_id' => $request->materiel_id,
            'dateDemande' => $request->dateDemande,
            'statut' => $request->statut,
            'description' => $request->description,
        ]);

        return redirect()->route('demandes.index')->with('success', 'Demande créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        // Assurez-vous que les relations sont chargées pour l'affichage des détails
        $demande->load(['user', 'materiel']);
        return view('demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        $users = User::all();
        $materiels = Materiel::all();
        // Les statuts possibles peuvent être une liste fixe ou venir d'une énumération
        $statutsPossibles = ['En attente', 'Approuvée', 'Rejetée', 'En cours', 'Terminée'];
        return view('demandes.edit', compact('demande', 'users', 'materiels', 'statutsPossibles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'materiel_id' => 'required|exists:materiels,id',
            'dateDemande' => 'required|date',
            'statut' => 'required|string|max:50',
            'description' => 'nullable|string|max:500',
        ]);

        $demande->update([
            'user_id' => $request->user_id,
            'materiel_id' => $request->materiel_id,
            'dateDemande' => $request->dateDemande,
            'statut' => $request->statut,
            'description' => $request->description,
        ]);

        return redirect()->route('demandes.index')->with('success', 'Demande mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('demandes.index')->with('success', 'Demande supprimée avec succès !');
    }
}