@extends('layouts.app')

@section('title', 'Faire une nouvelle Demande de Matériel')

@section('content')
    <h1>Faire une nouvelle Demande de Matériel</h1>

    @if ($errors->any())
        <div style="background-color: #fce4e4; border: 1px solid #e74c3c; color: #e74c3c; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <p><strong>Erreurs de validation :</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('demandes.store') }}" method="POST">
        @csrf

        {{-- Le demandeur est l'utilisateur connecté, pas de champ de sélection --}}
        {{-- La date de demande est automatiquement la date actuelle --}}
        {{-- Le statut est automatiquement 'En attente' --}}

        <div>
            <label for="materiel_id">Matériel Demandé :</label>
            <select id="materiel_id" name="materiel_id" required>
                <option value="">Sélectionnez un matériel</option>
                @foreach ($materiels as $materiel)
                    <option value="{{ $materiel->id }}" {{ old('materiel_id') == $materiel->id ? 'selected' : '' }}>
                        {{ $materiel->designation }}
                    </option>
                @endforeach
            </select>
            @error('materiel_id') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="typeDemande">Type de Demande :</label>
            <select id="typeDemande" name="typeDemande" required>
                <option value="">Sélectionnez un type</option>
                @foreach ($typesDemande as $type)
                    <option value="{{ $type }}" {{ old('typeDemande') == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
            @error('typeDemande') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="description">Description (facultatif) :</label>
            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Soumettre la Demande</button>
    </form>

    <p><a href="{{ route('demandes.index') }}" class="back-link">Retour à la liste des demandes</a></p>
@endsection