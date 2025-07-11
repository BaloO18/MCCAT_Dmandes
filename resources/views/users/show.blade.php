@extends('layouts.app')

@section('title', 'Détails de l\'utilisateur : ' . $user->prenom . ' ' . $user->nom)

@section('content')
    <h1>Détails de l'Utilisateur</h1>

    <p><strong>ID :</strong> {{ $user->id }}</p>
    <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
    <p><strong>Nom :</strong> {{ $user->nom }}</p>
    <p><strong>Email :</strong> {{ $user->email }}</p>
    <p><strong>Structure :</strong> {{ $user->structure->nom ?? 'N/A' }}</p>
    <p><strong>Rôle :</strong> {{ $user->role->nom ?? 'N/A' }}</p>
    <p><strong>Créé le :</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Dernière mise à jour :</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('users.index') }}" class="back-link">Retour à la liste des utilisateurs</a>
@endsection