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

        .theme-list {
            list-style: none;
        }

        .theme-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .theme-toggle {
            background: #4e54c8;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

       

        .article-image {
    width: 100%;
    height: 100%; /* Assurez-vous que l'image occupe toute la hauteur du conteneur */
    object-fit: contain; /* Maintient l'image entière visible sans zoom */
    background-color: #eee;
    display: block; /* Garantit que l'image est bien traitée comme un bloc */
    margin: 0; /* Élimine tout espacement */
    padding: 0; /* Élimine tout padding indésirable */
}

.article-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Ajuste la distribution de l'espace */
}

.article-image img {
    width: 100%;
    height: auto; /* Cela garantit que l'image conserve son ratio */
    max-height: 200px; /* Vous pouvez ajuster cette hauteur selon le besoin */
    object-fit: contain; /* Pour empêcher le zoom */
}




        .article-content {
            padding: 15px;
        }

        .rating {
            display: flex;
            gap: 5px;
            margin: 10px 0;
        }

        .star {
            color: #ffd700;
            cursor: pointer;
        }

        .chat-container {
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .filter-btn {
            padding: 8px 15px;
            border: 1px solid #4e54c8;
            border-radius: 20px;
            background: none;
            color: #4e54c8;
            cursor: pointer;
        }

        .filter-btn.active {
            background: #4e54c8;
            color: #fff;
        }

        .submit-article {
            margin-top: 20px;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            margin-top: 10px;
        }

        .status-pending {
            background: #ffd700;
            color: #000;
        }

        .status-published {
            background: #4CAF50;
            color: #fff;
        }

        .categories-menu {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .categories-list {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            padding: 10px 0;
        }

        .category-item {
            background: #f0f2f5;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.3s ease;
        }

        .category-item:hover {
            background: #4e54c8;
            color: #fff;
        }

        .category-item.active {
            background: #4e54c8;
            color: #fff;
        }

        .primary-btn {
    padding: 15px 40px;
    background: linear-gradient(45deg, #4e54c8, #8f94fb);
    color: #fff;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 500;
    transition: transform 0.3s;
}





        .articles {
    padding: 100px 50px;
    background: #f0f2f5;
}

       


        .articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
    max-width: 1400px;
    margin: 0 auto;
}

.article-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.article-card:hover {
    transform: translateY(-10px);
}

.article-image {
    height: 200px;
    overflow: hidden;
    background-size: cover;
}

.article-content {
    padding: 30px;
}

.article-tag {
    background: #4e54c8;
    color: #fff;
    padding: 5px 15px;
    border-radius: 50px;
    font-size: 14px;
    display: inline-block;
    margin-bottom: 15px;
}

.article-title {
    font-size: 24px;
    margin-bottom: 15px;
    color: #1a1a2e;
}

.article-preview {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
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
            <h1>Bienvenue dans votre espace abonné</h1>
            <p>Gérez vos abonnements, consultez votre historique et proposez des articles</p>
        </section>


        





            


       
   

        @if(request()->has('magazine_id'))
        <h1>Articles du Magazine : {{ App\Models\Magazine::find(request()->input('magazine_id'))->title }}</h1>
    @endif
    
   
    <section class="articles" id="articles">
        @if($articles->count() > 0)
        <div class="articles-grid">
            @if($articles->isEmpty())
              <p>Vous n'êtes abonné à aucun thème ou aucun article n'est disponible pour vos abonnements.</p>
            @else
        @foreach($articles as $article)
            <article class="article-card">
                <div class="article-image">
                    <img src="images/{{$article->image}}" alt="{{ $article->title }} Article">
                </div>
                <div class="article-content">
                    <span class="article-tag">{{ $article->theme->name }}</span>
                    <h3 class="article-title">{{ $article->title }}</h3>
                    <p class="article-preview">{{ Str::words($article->content, 10, '...') }}</p>
                    <a href="/{{ $article->slug }}" class="primary-btn">Lire plus</a>
                </div>
            </article>
            @endforeach
        @endif
        </div>
        @else
           <p>Aucun article trouvé.</p>
        @endif
       
        </section>








        
    </main>
</body>
</html>