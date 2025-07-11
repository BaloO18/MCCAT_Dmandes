@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Salles</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('salles.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle salle</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom de la Salle</th>
                <th>Capacité</th>
                <th>Localisation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($salles as $salle)
                <tr>
                    <td>{{ $salle->id }}</td>
                    <td>{{ $salle->nom_salle }}</td>
                    <td>{{ $salle->capacite ?? 'N/A' }}</td>
                    <td>{{ $salle->localisation ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('salles.show', $salle->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('salles.edit', $salle->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('salles.destroy', $salle->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette salle ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Aucune salle trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection