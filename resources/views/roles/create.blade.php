@extends('layouts.app')

@section('title', 'Détails du Rôle : ' . $role->nom)

@section('content')
    <h1>Détails du Rôle</h1>

    <p><strong>ID :</strong> {{ $role->id }}</p>
    <p><strong>Nom :</strong> {{ $role->nom }}</p>
    <p><strong>Description :</strong> {{ $role->description ?? 'Aucune' }}</p>
    <p><strong>Créé le :</strong> {{ $role->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Dernière mise à jour :</strong> {{ $role->updated_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('roles.index') }}" class="back-link">Retour à la liste des rôles</a>
@endsection