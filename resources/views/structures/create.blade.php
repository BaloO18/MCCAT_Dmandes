@extends('layouts.app')

@section('title', 'Créer une nouvelle Structure')

@section('content')
    <h1>Créer une nouvelle Structure</h1>

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

    <form action="{{ route('structures.store') }}" method="POST">
        @csrf

        <div>
            <label for="nom">Nom de la structure :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
            @error('nom') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Créer la structure</button>
    </form>

    <p><a href="{{ route('structures.index') }}" class="back-link">Retour à la liste des structures</a></p>
@endsection