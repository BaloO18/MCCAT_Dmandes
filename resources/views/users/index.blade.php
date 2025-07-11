@extends('layouts.app')

@section('title', 'Liste des Utilisateurs')

@section('content')
    <h1>Liste des Utilisateurs</h1>

    <a href="{{ route('users.create') }}" class="add-button">Créer un nouvel Utilisateur</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Structure</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->structure->nom ?? 'N/A' }}</td>
                    <td>{{ $user->role->nom ?? 'N/A' }}</td>
                    <td class="action-links">
                        <a href="{{ route('users.show', $user->id) }}" class="view">Voir</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="edit">Modifier</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection