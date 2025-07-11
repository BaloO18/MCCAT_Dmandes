@extends('layouts.app')

@section('title', 'Détails de la Structure : ' . $structure->nom)

@section('content')
    <h1>Détails de la Structure</h1>

    <p><strong>ID :</strong> {{ $structure->id }}</p>
    <p><strong>Nom :</strong> {{ $structure->nom }}</p>
    <p><strong>Description :</strong> {{ $structure->description ?? 'Aucune' }}</p>
    <p><strong>Créée le :</strong> {{ $structure->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Dernière mise à jour :</strong> {{ $structure->updated_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('structures.index') }}" class="back-link">Retour à la liste des structures</a>
@endsection