<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Abonnements aux Thèmes</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f0f2f5;
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
    background: #1a1a2e;
    padding: 15px 50px;  /* Reduced padding */
    position: fixed;
    width: 100%;
    z-index: 1000;
    transition: background 0.3s;
}

.nav-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    color: #fff;
    font-size: 24px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
}

.logo img {
    max-height: 40px;  /* Control the logo height */
    width: auto;       /* Maintain aspect ratio */
    vertical-align: middle;
}

/* Adjust the nav links vertical alignment */
.nav-links {
    display: flex;
    gap: 30px;
    align-items: center;  /* Ensure vertical centering */
    height: 40px;        /* Match logo height */
}


        .sidebar {
            width: 20%;
            background-color: #1f1f2e;
            color: #fff;
            padding: 20px;
            height: 90vh;
            position: fixed;
            bottom: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #ffffff;
            font-size: 16px;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #4a4aa5;
        }

        .dashboard {
            padding: 100px 50px 50px;
            max-width: 1400px;
            margin: 0 auto;
            width: 80%;
            margin-right: 0%;
        }

        .welcome-section {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            color: #fff;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 30px;
        }
/* Conteneur de la liste des thèmes */
.themes-list {
    list-style: none;
    padding: 0;
    margin: 30px 0;
}

/* Style pour chaque élément de thème */
.themes-list li {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(78, 84, 200, 0.1);
    border-radius: 12px;
    padding: 16px 24px;
    margin-bottom: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
}

.themes-list li:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(78, 84, 200, 0.15);
}

/* Nom du thème */
.theme-name {
    font-size: 16px;
    color: #1a1a2e;
    font-weight: 500;
    letter-spacing: 0.3px;
}

/* Style commun pour les boutons */
.toggle-button {
    border: none;
    padding: 10px 24px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

/* Bouton S'abonner avec effet de brillance */
form[action*="subscribe"] .toggle-button {
    background: linear-gradient(135deg, #4e54c8, #8f94fb);
    color: white;
    box-shadow: 0 4px 15px rgba(78, 84, 200, 0.2);
}

form[action*="subscribe"] .toggle-button::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transform: rotate(45deg);
    transition: 0.5s;
}

form[action*="subscribe"] .toggle-button:hover::after {
    animation: shine 1.5s infinite;
}

form[action*="subscribe"] .toggle-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(78, 84, 200, 0.3);
}

/* Bouton Se désabonner */
form[action*="unsubscribe"] .toggle-button {
    background-color: transparent;
    color: #1a1a2e;
    border: 2px solid rgba(26, 26, 46, 0.1);
}

form[action*="unsubscribe"] .toggle-button:hover {
    background-color: rgba(26, 26, 46, 0.05);
    border-color: rgba(26, 26, 46, 0.2);
}

/* Animation de brillance */
@keyframes shine {
    0% {
        left: -100%;
    }
    100% {
        left: 100%;
    }
}

/* Style pour le titre de la section */
.themes-title {
    color: #1a1a2e;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 24px;
    position: relative;
    padding-left: 16px;
}

.themes-title::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 24px;
    background: linear-gradient(135deg, #4e54c8, #8f94fb);
    border-radius: 2px;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .themes-list li {
        padding: 14px 20px;
    }
    
    .toggle-button {
        padding: 8px 16px;
        font-size: 13px;
    }
}

        
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="/espace-abonné">
                <img src="/images/tech logo.png" alt="horezontech logo">
            </a>
        </div>
    </header>

    <div class="sidebar">
        <ul>
            <li><a href="{{ route('dashboard') }}">Accueil</a></li>
            <li><a href="/Mes-Abonnements">Mes Abonnements</a></li>
            <li><a href="/historique">Historique de Navigation</a></li>
            <li><a href="/Article-Proposé">Mes Articles Proposés</a></li>
        </ul>
    </div>

    <main class="dashboard">
        <section class="welcome-section">
            <h1>Abonnements aux Thèmes</h1>
            <p>Gérez vos thèmes préférés</p>
        </section>


        <h1>Thèmes disponibles</h1>
<ul class="themes-list">
    @foreach($themes as $theme)
        <li>
            <span class="theme-name">{{ $theme->name }}</span>
            @if(App\Models\Subscription::where('user_id', auth()->id())->where('theme_id', $theme->id)->exists())
                <form method="POST" action="/Mes-Abonnements/unsubscribe">
                    @csrf
                    <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                    <button type="submit" class="toggle-button">
                        Se désabonner
                    </button>
                </form>
            @else
                <form method="POST" action="/Mes-Abonnements/subscribe">
                    @csrf
                    <input type="hidden" name="theme_id" value="{{ $theme->id }}">
                    <button type="submit" class="toggle-button">
                        S'abonner
                    </button>
                </form>
            @endif
        </li>
    @endforeach
</ul>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.toggle-button');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const form = this.closest('form');
                    form.submit(); // Soumet le formulaire lors du clic
                });
            });
        });
    </script>

       

        
    </main>
</body>
</html>