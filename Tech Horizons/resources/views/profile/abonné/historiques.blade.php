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
        /* Styles pour le conteneur */
.container {
    padding: 30px;
    width: 100%;
}

/* Styles pour le titre de la section */
.container h1 {
    color: #1a1a2e;
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 24px;
    position: relative;
    padding-left: 16px;
}

.container h1::before {
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

/* Styles pour l'état vide */
.container p {
    color: #666;
    text-align: center;
    padding: 30px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 12px;
}

/* Styles pour la liste des visites */
.list-group {
    list-style: none;
    padding: 0;
}

.list-group-item {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(78, 84, 200, 0.1);
    border-radius: 12px;
    padding: 16px 24px;
    margin-bottom: 16px;
    transition: all 0.3s ease;
}

.list-group-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(78, 84, 200, 0.15);
}

.list-group-item a {
    color: #1a1a2e;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.list-group-item a:hover {
    color: #4e54c8;
}

.text-muted {
    color: #666;
    font-size: 0.9em;
    margin-left: 10px;
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
        <h1>Votre Historique de Navigation</h1>
        <p>Retrouvez les articles que vous avez consultés récemment</p>
    </section>



<div class="container">
    <h1>Historique de Navigation</h1>
    @if($visits->isEmpty())
        <p>Vous n'avez encore visité aucun article.</p>
    @else
        <ul class="list-group">
            @foreach($visits as $visit)
                <li class="list-group-item">
                    <a href="{{ route('article.show', $visit->article->slug) }}">
                        {{ $visit->article->title }}
                    </a>
                    <span class="text-muted">- Visité le {{ $visit->created_at->format('d/m/Y à H:i') }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
</main>
</body>
</html>