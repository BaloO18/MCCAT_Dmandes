@extends('layouts.app')

@section('title', 'Créer un nouvel Utilisateur')

@section('content')
    <h1>Créer un nouvel Utilisateur</h1>

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

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
            @error('prenom') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
            @error('nom') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirmer le Mot de passe :</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div>
            <label for="structure_id">Structure :</label>
            <select id="structure_id" name="structure_id" required>
                <option value="">Sélectionnez une structure</option>
                @foreach ($structures as $structure)
                    <option value="{{ $structure->id }}" {{ old('structure_id') == $structure->id ? 'selected' : '' }}>
                        {{ $structure->nom }}
                    </option>
                @endforeach
            </select>
            @error('structure_id') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div>
            <label for="role_id">Rôle :</label>
            <select id="role_id" name="role_id" required>
                <option value="">Sélectionnez un rôle</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->nom }}
                    </option>
                @endforeach
            </select>
            @error('role_id') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Créer l'utilisateur</button>
    </form>

    <p><a href="{{ route('users.index') }}" class="back-link">Retour à la liste des utilisateurs</a></p>
@endsection