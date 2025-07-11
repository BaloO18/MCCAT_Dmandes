@extends('layouts.app')

@section('title', 'Détails du Matériel : ' . $materiel->designation)

@section('content')
    <h1>Détails du Matériel</h1>

    <p><strong>ID :</strong> {{ $materiel->id }}</p>
    <p><strong>Désignation :</strong> {{ $materiel->designation }}</p>
    <p><strong>Créé le :</strong> {{ $materiel->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Dernière mise à jour :</strong> {{ $materiel->updated_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('materiels.index') }}" class="back-link">Retour à la liste du matériel</a>
@endsection