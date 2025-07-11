<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du Matériel - @yield('title', 'Dashboard')</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f0f2f5;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #ffffff;
            color: #333;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 1.5em;
            color: #2c3e50;
        }

        .dashboard-wrapper {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            flex-shrink: 0;
        }
        .sidebar-logo {
            text-align: center;
            padding: 10px 0 30px 0;
            font-size: 1.8em;
            font-weight: bold;
            color: #ecf0f1;
            text-decoration: none;
            display: block;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar ul li a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-left: 5px solid transparent;
        }
        .sidebar ul li a:hover {
            background-color: #34495e;
            border-left-color: #3498db;
        }
        .sidebar ul li a.active {
            background-color: #3498db;
            border-left-color: #ecf0f1;
            font-weight: bold;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f0f2f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 2em;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        /* Messages Flash */
        .flash-message { padding: 15px; margin-bottom: 25px; border-radius: 8px; font-size: 1.1em; }
        .flash-message.success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .flash-message.error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #2c3e50;
            color: white;
            font-size: 0.9em;
            margin-top: auto;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
        }

        /* Styles existants pour formulaires et tableaux (ajustés si nécessaire) */
        form div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; }
        input[type="text"], input[type="email"], input[type="password"], input[type="date"], textarea, select {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="date"]:focus, textarea:focus, select:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        button {
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        button:hover { background-color: #0056b3; transform: translateY(-1px); }
        button:active { background-color: #004085; transform: translateY(0); box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15); }
        .error { color: #e74c3c; font-size: 0.85em; margin-top: 5px; }
        a.back-link { display: inline-block; margin-top: 20px; color: #3498db; text-decoration: none; font-weight: bold; }
        a.back-link:hover { text-decoration: underline; }

        .action-links a, .action-links button {
            display: inline-block;
            padding: 8px 12px;
            margin-right: 5px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .action-links a.view { background-color: #28a745; color: white; }
        .action-links a.view:hover { background-color: #218838; }
        .action-links a.edit { background-color: #ffc107; color: #333; }
        .action-links a.edit:hover { background-color: #e0a800; }
        .action-links button.delete { background-color: #dc3545; color: white; border: none; cursor: pointer; }
        .action-links button.delete:hover { background-color: #c82333; }
        .add-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .add-button:hover { background-color: #0056b3; }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); border-radius: 8px; overflow: hidden; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #dee2e6; }
        th { background-color: #3498db; color: white; font-weight: bold; }
        tr:hover { background-color: #f1f1f1; }
        .read-only-field { background-color: #e9ecef; opacity: 1; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Demande de Matieres</h1>
        <div>
            @auth {{-- N'affiche cette section que si un utilisateur est connecté --}}
                <span style="color: #333; font-weight: bold; margin-right: 15px;">
                    Bonjour, {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
                </span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer;">Déconnexion</button>
                </form>
            @else {{-- Si aucun utilisateur n'est connecté, affiche des liens de connexion/inscription --}}
                <a href="{{ route('login') }}" style="color: #333; text-decoration: none; font-weight: bold; margin-right: 15px;">Se connecter</a>
                <a href="{{ route('register') }}" style="color: #333; text-decoration: none; font-weight: bold;">S'inscrire</a>
            @endauth
        </div>
    </div>

    <div class="dashboard-wrapper">
        <div class="sidebar">
            <a href="{{ Auth::check() ? route('dashboard') : route('login') }}" class="sidebar-logo">Dashboard MCCAT</a>
            <ul>
                {{-- Ces liens seront visibles si l'utilisateur est connecté --}}
                @auth
                    <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Utilisateurs</a></li>
                    <li><a href="{{ route('structures.index') }}" class="{{ request()->routeIs('structures.*') ? 'active' : '' }}">Structures</a></li>
                    <li><a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">Rôles</a></li>
                    <li><a href="{{ route('materiels.index') }}" class="{{ request()->routeIs('materiels.*') ? 'active' : '' }}">Matériel</a></li>
                    <li><a href="{{ route('demandes.index') }}" class="{{ request()->routeIs('demandes.*') ? 'active' : '' }}">Demandes</a></li>
                @else
                    {{-- Ces liens sont pour les utilisateurs non connectés, typiquement juste login/register --}}
                    <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Se connecter</a></li>
                    <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">S'inscrire</a></li>
                @endauth
            </ul>
        </div>

        <div class="main-content">
            <div class="container">
                @if (session('success'))
                    <div class="flash-message success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="flash-message error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} Gestion des demandes du MCCAT. Tous droits réservés.</p>
    </div>
</body>
</html>