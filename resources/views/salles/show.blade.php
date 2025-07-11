@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la Salle</h1>

    <div class="card">
        <div class="card-header">
            Salle #{{ $salle->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Nom: {{ $salle->nom_salle }}</h5>
            <p class="card-text">Capacité: {{ $salle->capacite ?? 'N/A' }} personnes</p>
            <p class="card-text">Localisation: {{ $salle->localisation ?? 'N/A' }}</p>
            <p class="card-text">Équipements: {{ $salle->description_equipements ?? 'N/A' }}</p>
            <p class="card-text">Créée le: {{ $salle->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text">Mise à jour le: {{ $salle->updated_at->format('d/m/Y H:i') }}</p>
            <hr>
            <a href="{{ route('salles.edit', $salle->id) }}" class="btn btn-warning">Modifier</a>
            <a href="{{ route('salles.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection