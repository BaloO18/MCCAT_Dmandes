@extends('layouts.app')

@section('title', 'Modifier la Demande #' . $demande->id)

@section('content')
    <h1>Modifier la Demande #{{ $demande->id }}</h1>

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

    <form action="{{ route('demandes.update', $demande->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="user_id_display">Demandeur :</label>
            {{-- Le demandeur est le créateur de la demande, non modifiable ici par le demandeur lui-même --}}
            <input type="text" id="user_id_display" value="{{ $demande->user->prenom ?? 'N/A' }} {{ $demande->user->nom ?? '' }}" readonly class="read-only-field">
            {{-- Champ caché pour envoyer l'ID de l'utilisateur au contrôleur si un admin le modifie --}}
            <input type="hidden" name="user_id" value="{{ $demande->user_id }}">
        </div>

        <div>
            <label for="materiel_id">Matériel Demandé :</label>
            <select id="materiel_id" name="materiel_id" required>
                <option value="">Sélectionnez un matériel</option>
                @foreach ($materiels as $materiel)
                    <option value="{{ $materiel->id }}" {{ old('materiel_id', $demande->materiel_id) == $materiel->id ? 'selected' : '' }}>
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
                    <option value="{{ $type }}" {{ old('typeDemande', $demande->typeDemande) == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                @endforeach
            </select>
            @error('typeDemande') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="dateDemande_display">Date de la Demande :</label>
            {{-- La date n'est pas modifiable par le demandeur --}}
            <input type="date" id="dateDemande_display" value="{{ old('dateDemande', $demande->dateDemande->format('Y-m-d')) }}" readonly class="read-only-field">
            <input type="hidden" name="dateDemande" value="{{ $demande->dateDemande->format('Y-m-d') }}">
            @error('dateDemande') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="statut">Statut :</label>
            {{-- Le statut n'est pas modifiable par le demandeur, mais par un admin --}}
            <select id="statut" name="statut" required>
                @foreach ($statutsPossibles as $statut)
                    <option value="{{ $statut }}" {{ old('statut', $demande->statut) == $statut ? 'selected' : '' }}>{{ $statut }}</option>
                @endforeach
            </select>
            @error('statut') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="description">Description (facultatif) :</label>
            <textarea id="description" name="description" rows="4">{{ old('description', $demande->description) }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" style="background-color: #28a745;">Mettre à jour la Demande</button>
    </form>

    <p><a href="{{ route('demandes.index') }}" class="back-link">Retour à la liste des demandes</a></p>
@endsection