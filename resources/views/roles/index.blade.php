@extends('layouts.app')

@section('title', 'Liste des Rôles')

@section('content')
    <h1>Liste des Rôles</h1>

    <a href="{{ route('roles.create') }}" class="add-button">Créer un nouveau Rôle</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->nom }}</td>
                    <td>{{ Str::limit($role->description, 50, '...') }}</td>
                    <td class="action-links">
                        <a href="{{ route('roles.show', $role->id) }}" class="view">Voir</a>
                        <a href="{{ route('roles.edit', $role->id) }}" class="edit">Modifier</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection