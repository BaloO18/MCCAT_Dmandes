@extends('layouts.app')

@section('title', 'Liste du Matériel')

@section('content')
    <h1>Liste du Matériel</h1>

    <a href="{{ route('materiels.create') }}" class="add-button">Ajouter un nouveau Matériel</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Désignation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materiels as $materiel)
                <tr>
                    <td>{{ $materiel->id }}</td>
                    <td>{{ $materiel->designation }}</td>
                    <td class="action-links">
                        <a href="{{ route('materiels.show', $materiel->id) }}" class="view">Voir</a>
                        <a href="{{ route('materiels.edit', $materiel->id) }}" class="edit">Modifier</a>
                        <form action="{{ route('materiels.destroy', $materiel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce matériel ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection