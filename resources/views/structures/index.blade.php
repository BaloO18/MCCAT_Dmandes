@extends('layouts.app')

@section('title', 'Liste des Structures')

@section('content')
    <h1>Liste des Structures</h1>

    <a href="{{ route('structures.create') }}" class="add-button">Ajouter une nouvelle Structure</a>

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
            @foreach ($structures as $structure)
                <tr>
                    <td>{{ $structure->id }}</td>
                    <td>{{ $structure->nom }}</td>
                    <td>{{ Str::limit($structure->description, 50, '...') }}</td>
                    <td class="action-links">
                        <a href="{{ route('structures.show', $structure->id) }}" class="view">Voir</a>
                        <a href="{{ route('structures.edit', $structure->id) }}" class="edit">Modifier</a>
                        <form action="{{ route('structures.destroy', $structure->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette structure ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection