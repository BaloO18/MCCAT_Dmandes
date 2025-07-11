@extends('layouts.app')

@section('title', 'Modifier le Matériel : ' . $materiel->designation)

@section('content')
    <h1>Modifier le Matériel : {{ $materiel->designation }}</h1>

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

    <form action="{{ route('materiels.update', $materiel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="designation">Désignation :</label>
            <input type="text" id="designation" name="designation" value="{{ old('designation', $materiel->designation) }}" required>
            @error('designation') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" style="background-color: #28a745;">Mettre à jour le matériel</button>
    </form>

    <p><a href="{{ route('materiels.index') }}" class="back-link">Retour à la liste du matériel</a></p>
@endsection