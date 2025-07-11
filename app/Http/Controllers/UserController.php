<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // Pour la validation unique ignorer son propre ID

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche la liste de tous les utilisateurs.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * Affiche le formulaire de création d'un nouvel utilisateur.
     */
    public function create()
    {
        $roles = Role::all();
        $structures = Structure::all();
        return view('users.create', compact('roles', 'structures'));
    }

    /**
     * Store a newly created resource in storage.
     * Enregistre un nouvel utilisateur dans la base de données.
     */
    public function store(Request $request)
    {
        // 1. Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // L'email doit être unique dans la table 'users'
            'password' => 'required|string|min:8|confirmed', // 'confirmed' vérifie qu'il y a un champ password_confirmation qui correspond
            'role_id' => 'required|exists:roles,id', // Le rôle doit exister dans la table 'roles'
            'structure_id' => 'required|exists:structures,id', // La structure doit exister dans la table 'structures'
        ]);

        // 2. Création de l'utilisateur
        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hachez le mot de passe !
            'role_id' => $request->role_id,
            'structure_id' => $request->structure_id,
        ]);

        // 3. Redirection avec un message de succès
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès !');
    }

    /**
     * Display the specified resource.
     * Affiche les détails d'un utilisateur spécifique.
     */
    public function show(User $user)
    {
        // Laravel gère automatiquement la récupération de l'utilisateur par son ID via l'injection de dépendances (Route Model Binding)
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire de modification d'un utilisateur existant.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $structures = Structure::all();
        return view('users.edit', compact('user', 'roles', 'structures'));
    }

    /**
     * Update the specified resource in storage.
     * Met à jour un utilisateur spécifique dans la base de données.
     */
    public function update(Request $request, User $user)
    {
        // 1. Validation des données de mise à jour
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            // L'email doit être unique, SAUF pour l'utilisateur que nous sommes en train de modifier
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed', // 'nullable' car le mot de passe n'est pas obligatoire à chaque modification
            'role_id' => 'required|exists:roles,id',
            'structure_id' => 'required|exists:structures,id',
        ]);

        // 2. Mise à jour de l'utilisateur
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->structure_id = $request->structure_id;

        // Si un nouveau mot de passe est fourni, le hacher et le mettre à jour
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Sauvegarde les changements dans la base de données

        // 3. Redirection avec un message de succès
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     * Supprime un utilisateur de la base de données.
     */
    public function destroy(User $user)
    {
        $user->delete(); // Supprime l'utilisateur

        // Redirection avec un message de succès
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès !');
    }
}