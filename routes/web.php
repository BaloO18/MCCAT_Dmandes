<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\AuthController; 
use Illuminate\Support\Facades\Auth; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ici, vous pouvez enregistrer les routes web de votre application. Elles
| sont chargées par le RouteServiceProvider et contiennent le middleware
| groupe "web". Créez quelque chose de génial !
|
*/

// --- Routes d'Authentification ---
// Route pour afficher le formulaire d'inscription
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route pour traiter l'inscription
Route::post('/register', [AuthController::class, 'register']);

// Route pour afficher le formulaire de connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route pour traiter la connexion
Route::post('/login', [AuthController::class, 'login']);

// Route pour la déconnexion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Routes Principales de l'Application ---

// Route pour le tableau de bord (accessible après connexion)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route d'accueil : redirige vers le tableau de bord si connecté, sinon vers le login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('home');

// --- Vos Routes de Ressources Existanttes (Non Modifiées) ---
Route::resource('users', UserController::class);
Route::resource('structures', StructureController::class);
Route::resource('roles', RoleController::class);
Route::resource('materiels', MaterielController::class);
Route::resource('demandes', DemandeController::class);

// ... vos autres routes existantes ou futures ...