@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Structure: {{ $structure->designation }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('structures.update', $structure->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Important pour la méthode PUT/PATCH --}}
        <div class="mb-3">
            <label for="designation" class="form-label">Désignation</label>
            <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation', $structure->designation) }}" required>
        </div>
        {{-- Ajoutez d'autres champs ici si nécessaire --}}
        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('structures.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection