<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Inscription</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
            font-size: 24px;
            font-weight: 700;
        }

        .logo span {
            color: #4e54c8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #fff;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: #fff;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4e54c8;
        }

        .terms {
            margin-bottom: 20px;
            color: #a0a0a0;
            font-size: 14px;
        }

        .terms a {
            color: #4e54c8;
            text-decoration: none;
            transition: color 0.3s;
        }

        .terms a:hover {
            color: #8f94fb;
        }

        .signup-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #4e54c8, #8f94fb);
            border: none;
            border-radius: 50px;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .signup-btn:hover {
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #a0a0a0;
            font-size: 14px;
        }

        .login-link a {
            color: #4e54c8;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .login-link a:hover {
            color: #8f94fb;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="logo">
            Tech<span>Horizons</span>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nom -->
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Adresse email -->
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required autocomplete="new-password">
                @error('password')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmer le mot de passe -->
            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Conditions -->
            <div class="terms">
                <label>
                    <input type="checkbox" required> J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>
                </label>
            </div>

            <!-- Bouton -->
            <button type="submit" class="signup-btn">Créer un compte</button>

            <div class="login-link">
                Déjà membre? <a href="{{ route('login') }}">Se connecter</a>
            </div>
        </form>
    </div>
</body>
</html>
