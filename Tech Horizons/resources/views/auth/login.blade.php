<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Connection</title>
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

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 400px;
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

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            color: #a0a0a0;
            font-size: 14px;
        }

        .remember-forgot a {
            color: #4e54c8;
            text-decoration: none;
            transition: color 0.3s;
        }

        .remember-forgot a:hover {
            color: #8f94fb;
        }

        .login-btn {
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

        .login-btn:hover {
            transform: translateY(-2px);
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: #a0a0a0;
            font-size: 14px;
        }

        .signup-link a {
            color: #4e54c8;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .signup-link a:hover {
            color: #8f94fb;
        }
    </style>

    <!-- Session Status -->
    </head>
    <body>

    <div class="login-container">
        <div class="logo">
            Tech<span>Horizons</span>
        </div>
        @if (session('status') == 'blocked')
            <div class="alert alert-danger" style="color: red; text-align: center; margin-bottom: 20px;">
                Votre compte est bloqué. Veuillez contacter l'administrateur.
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="remember-forgot">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Mot de passe oublié?</a>
                @endif
            </div>

            <button type="submit" class="login-btn">Se connecter</button>

            <div class="signup-link">
                Pas encore membre? <a href="{{ route('register') }}">S'inscrire</a>
            </div>
        </form>
    </div>
    </body>
</html>
