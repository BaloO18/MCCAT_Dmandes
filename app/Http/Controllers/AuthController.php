<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Traite l'inscription d'un nouvel utilisateur
    public function register(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Trouver le rôle par défaut (ex: 'Demandeur')
        // Assurez-vous que ce rôle existe bien dans votre base de données via le seeder
        $defaultRole = Role::where('nom', 'Demandeur')->first();

        if (!$defaultRole) {
            // Gérer le cas où le rôle par défaut n'existe pas
            // Cela ne devrait pas arriver si le seeder a été exécuté correctement
            return back()->withErrors(['role' => 'Le rôle par défaut "Demandeur" n\'existe pas. Veuillez contacter l\'administrateur.']);
        }

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $defaultRole->id, // Assigner le rôle par défaut
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Inscription réussie ! Bienvenue.');
    }

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Traite la tentative de connexion
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))->with('success', 'Connexion réussie !');
        }

        throw ValidationException::withMessages([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ]);
    }

    // Déconnecte l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Vous avez été déconnecté.');
    }
}