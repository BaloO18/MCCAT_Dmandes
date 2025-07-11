@extends('layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
    <h1>Bienvenue sur votre Tableau de Bord !</h1>
    <p>Ceci est la page d'accueil après une connexion réussie.</p>
    {{-- Affichage des informations de l'utilisateur connecté --}}
    @auth
        <p>Vous êtes connecté en tant que : <strong>{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</strong></p>
        <p>Votre rôle : <strong>{{ Auth::user()->role->nom ?? 'Non défini' }}</strong></p>
    @else
        <p>Vous n'êtes pas connecté.</p>
    @endauth
@endsection