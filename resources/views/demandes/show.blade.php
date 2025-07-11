@extends('layouts.app')

@section('title', 'Détails de la Demande #' . $demande->id)

@section('content')
    <h1>Détails de la Demande #{{ $demande->id }}</h1>

    <p><strong>Demandeur :</strong> {{ $demande->user->prenom ?? 'N/A' }} {{ $demande->user->nom ?? '' }}</p>
    <p><strong>Matériel Demandé :</strong> {{ $demande->materiel->designation ?? 'N/A' }}</p>
    <p><strong>Type de Demande :</strong> {{ $demande->typeDemande }}</p>
    <p><strong>Date de la Demande :</strong> {{ $demande->dateDemande->format('d/m/Y') }}</p>
    <p><strong>Statut :</strong> {{ $demande->statut }}</p>
    <p><strong>Description :</strong> {{ $demande->description ?? 'Aucune' }}</p>
    <p><strong>Créée le :</strong> {{ $demande->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Dernière mise à jour :</strong> {{ $demande->updated_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('demandes.index') }}" class="back-link">Retour à la liste des demandes</a>
@endsection