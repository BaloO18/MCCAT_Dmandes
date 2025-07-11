@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
    <h1 style="text-align: center;">S'inscrire</h1>

    <div class="form-container">
        @if ($errors->any())
            <div class="flash-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required autofocus>
                @error('nom') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                @error('prenom') <div class="error">{{ $message }}</div> @enderror
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
                <label for="password_confirmation">Confirmer le mot de passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit">S'inscrire</button>
        </form>

        <p style="text-align: center; margin-top: 20px;">
            Déjà un compte ? <a href="{{ route('login') }}" class="back-link">Se connecter</a>
        </p>
    </div>

    <style>
        .form-container {
            max-width: 500px;
            margin: 30px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }
        .form-container h1 {
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
        }
    </style>
@endsection