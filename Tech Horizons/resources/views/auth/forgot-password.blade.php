<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Réinitialisation du mot de passe</title>
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

        .reset-container {
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

        .reset-header {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .reset-description {
            color: #a0a0a0;
            text-align: center;
            margin-bottom: 30px;
            font-size: 14px;
            line-height: 1.5;
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

        .password-requirements {
            color: #a0a0a0;
            font-size: 12px;
            margin-top: 8px;
            padding-left: 15px;
        }

        .password-requirements li {
            margin-bottom: 4px;
        }

        .password-requirements li.valid {
            color: #4CAF50;
        }

        .reset-btn {
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

        .reset-btn:hover {
            transform: translateY(-2px);
        }

        .reset-btn:disabled {
            background: #666;
            cursor: not-allowed;
            transform: none;
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

        .alert {
            padding: 10px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        .alert-success {
            background: rgba(76, 175, 80, 0.1);
            color: #4CAF50;
            border: 1px solid rgba(76, 175, 80, 0.2);
        }

        .alert-error {
            background: rgba(244, 67, 54, 0.1);
            color: #f44336;
            border: 1px solid rgba(244, 67, 54, 0.2);
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="logo">
            Tech<span>Horizons</span>
        </div>
        <div class="reset-header">Réinitialisation du mot de passe</div>
        <div class="reset-description">
            Veuillez créer un nouveau mot de passe fort qui protégera votre compte.
        </div>
        <div class="alert alert-success" id="successAlert">
            Votre mot de passe a été réinitialisé avec succès!
        </div>
        <div class="alert alert-error" id="errorAlert">
            Une erreur s'est produite. Veuillez réessayer.
        </div>
        <form id="resetForm">
            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" required>
                <ul class="password-requirements" id="requirements">
                    <li id="length">8 caractères minimum</li>
                    <li id="uppercase">Une lettre majuscule</li>
                    <li id="lowercase">Une lettre minuscule</li>
                    <li id="number">Un chiffre</li>
                    <li id="special">Un caractère spécial</li>
                </ul>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirmer le mot de passe</label>
                <input type="password" id="confirmPassword" required>
            </div>
            <button type="submit" class="reset-btn" id="resetBtn" disabled>
                Réinitialiser le mot de passe
            </button>
            <div class="login-link">
                <a href="/login">Retour à la connexion</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resetForm');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');
            const resetBtn = document.getElementById('resetBtn');
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');

            // Password requirements
            const requirements = {
                length: /.{8,}/,
                uppercase: /[A-Z]/,
                lowercase: /[a-z]/,
                number: /[0-9]/,
                special: /[!@#$%^&*(),.?":{}|<>]/
            };

            function validatePassword() {
                const pwd = password.value;
                let valid = true;

                // Check each requirement
                for (const [key, regex] of Object.entries(requirements)) {
                    const element = document.getElementById(key);
                    const isValid = regex.test(pwd);
                    element.classList.toggle('valid', isValid);
                    valid = valid && isValid;
                }

                // Check if passwords match
                const passwordsMatch = password.value === confirmPassword.value;
                valid = valid && passwordsMatch && password.value.length > 0;

                // Enable/disable submit button
                resetBtn.disabled = !valid;
            }

            password.addEventListener('input', validatePassword);
            confirmPassword.addEventListener('input', validatePassword);

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Hide any existing alerts
                successAlert.style.display = 'none';
                errorAlert.style.display = 'none';

                // Simulate API call
                setTimeout(() => {
                    // Show success message (in real implementation, this would depend on API response)
                    successAlert.style.display = 'block';
                    
                    // Reset form
                    form.reset();
                    resetBtn.disabled = true;
                    
                    // Reset requirement indicators
                    document.querySelectorAll('.password-requirements li').forEach(li => {
                        li.classList.remove('valid');
                    });

                    // Redirect to login page after 3 seconds
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 3000);
                }, 1000);
            });
        });
    </script>
</body>
</html>