@extends('layouts.app')

@section('title', 'Modifier le Rôle : ' . $role->nom)

@section('content')
    <h1>Modifier le Rôle : {{ $role->nom }}</h1>

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

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom du rôle :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $role->nom) }}" required>
            @error('nom') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4">{{ old('description', $role->description) }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" style="background-color: #28a745;">Mettre à jour le rôle</button>
    </form>

    <p><a href="{{ route('roles.index') }}" class="back-link">Retour à la liste des rôles</a></p>
@endsection