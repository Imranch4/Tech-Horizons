<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Espace Abonné</title>
    <style>
        /* Reprendre le style existant */
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


        

        /* Header Style */
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

/* Adjust the auth buttons vertical alignment */
.auth-btns {
    display: flex;
    gap: 15px;
    align-items: center;  /* Ensure vertical centering */
    height: 40px;        /* Match logo height */
}
        .user-menu {
    position: absolute;
    top: 20px;
    right: 50px; /* Ajustez la valeur pour l'écart désiré */
    display: flex;
    align-items: center;
    gap: 15px;
    color: #fff;
    font-size: 16px;
    font-weight: 500;
}

.user-menu span {
    color: #4e54c8;
    font-weight: bold;
}

.logout-btn {
    background: linear-gradient(135deg, #4e54c8, #8f94fb);
    color: #fff;
    border: none;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.logout-btn:hover {
    background: linear-gradient(135deg, #8f94fb, #4e54c8);
    box-shadow: 0 4px 10px rgba(78, 84, 200, 0.3);
}


        


      





/* Content styles */
.content {
  margin-left: 250px; /* La largeur de la sidebar */
  padding: 20px;
  flex-grow: 1;
  background-color: #f4f4f9;
}

        /* Style spécifique à l'espace abonné */
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

        .section-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .dashboard-card {
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .dashboard-card h3 {
            color: #1a1a2e;
            margin-bottom: 15px;
            font-size: 20px;
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

/* Content styles */
.content {
  margin-left: 250px; /* La largeur de la sidebar */
  padding: 20px;
  flex-grow: 1;
  background-color: #f4f4f9;
}
        
.magazine-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
        }

        .magazine-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(78, 84, 200, 0.1);
            border-radius: 12px;
            padding: 24px;
            width: 300px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(78, 84, 200, 0.1);
        }

        .magazine-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(78, 84, 200, 0.15);
        }

        .magazine-card h2 {
            color: #1a1a2e;
            font-size: 20px;
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }

        .magazine-card .date {
            color: #4e54c8;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .magazine-card .btn {
            display: inline-block;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: white;
            padding: 10px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .magazine-card .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 84, 200, 0.3);
        }

        .magazine-card .btn::after {
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

        .magazine-card .btn:hover::after {
            animation: shine 1.5s infinite;
        }

        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
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

        <div class="user-menu">
            <span>{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
            </form>
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
            <h1>Bienvenue dans votre espace abonné</h1>
            <p>Gérez vos abonnements, consultez votre historique et proposez des articles</p>
        </section>


        





            

    
        
        <div class="magazine-list">
            @if($magazines->count() > 0)
            @foreach ($magazines as $magazine)
            <div class="magazine-card">
                <h2>Numéro {{ $magazine->number }}</h2>
                <p class="date">{{ $magazine->created_at->format('d/m/Y à H:i') }}</p>
                <a href="{{ route('articles.index', ['magazine_id' => $magazine->id]) }}" class="btn">Voir les articles</a>
            </div>
            @endforeach
            @else
        <p>Aucun magazine publié pour le moment.</p>
        @endif
        </div>
   


    

   








        
    </main>
</body>
</html>