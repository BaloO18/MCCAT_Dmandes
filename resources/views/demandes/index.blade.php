@extends('layouts.app')

@section('title', 'Liste des Demandes de Matériel')

@section('content')
    <h1>Liste des Demandes de Matériel</h1>

    <a href="{{ route('demandes.create') }}" class="add-button">Faire une nouvelle Demande</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Demandeur</th>
                <th>Matériel</th>
                <th>Type de Demande</th>
                <th>Date Demande</th>
                <th>Statut</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes as $demande)
                <tr>
                    <td>{{ $demande->id }}</td>
                    <td>{{ $demande->user->prenom ?? 'N/A' }} {{ $demande->user->nom ?? '' }}</td>
                    <td>{{ $demande->materiel->designation ?? 'N/A' }}</td>
                    <td>{{ $demande->typeDemande }}</td>
                    <td>{{ $demande->dateDemande->format('d/m/Y') }}</td>
                    <td>{{ $demande->statut }}</td>
                    <td>{{ Str::limit($demande->description, 50, '...') }}</td>
                    <td class="action-links">
                        <a href="{{ route('demandes.show', $demande->id) }}" class="view">Voir</a>
                        <a href="{{ route('demandes.edit', $demande->id) }}" class="edit">Modifier</a>
                        <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection