@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
    <h1 style="text-align: center;">Se connecter</h1>

    <div class="form-container">
        @if (session('status'))
            <div class="flash-message success">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="flash-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember" style="display: inline; margin-left: 5px;">Se souvenir de moi</label>
            </div>

            <button type="submit">Se connecter</button>
        </form>

        <p style="text-align: center; margin-top: 20px;">
            Pas encore de compte ? <a href="{{ route('register') }}" class="back-link">S'inscrire</a>
        </p>
        {{-- Le lien de réinitialisation de mot de passe est commenté car la route n'est pas implémentée dans votre actuel web.php --}}
        {{-- <p style="text-align: center; margin-top: 10px;">
            <a href="{{ route('password.request') }}" class="back-link">Mot de passe oublié ?</a>
        </p> --}}
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