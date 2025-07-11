@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Salle: {{ $salle->nom_salle }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salles.update', $salle->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom_salle" class="form-label">Nom de la Salle</label>
            <input type="text" class="form-control" id="nom_salle" name="nom_salle" value="{{ old('nom_salle', $salle->nom_salle) }}" required>
        </div>
        <div class="mb-3">
            <label for="capacite" class="form-label">Capacité (nombre de personnes)</label>
            <input type="number" class="form-control" id="capacite" name="capacite" value="{{ old('capacite', $salle->capacite) }}" min="1">
        </div>
        <div class="mb-3">
            <label for="localisation" class="form-label">Localisation</label>
            <input type="text" class="form-control" id="localisation" name="localisation" value="{{ old('localisation', $salle->localisation) }}">
        </div>
        <div class="mb-3">
            <label for="description_equipements" class="form-label">Description des équipements (facultatif)</label>
            <textarea class="form-control" id="description_equipements" name="description_equipements" rows="3">{{ old('description_equipements', $salle->description_equipements) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('salles.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection