<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Mes Articles Proposés</title>
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
            padding: 20px ;
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

        .article-form-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1a1a2e;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        

        .submit-btn {
            background: #4e54c8;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background: #3a3f9e;
        }

        .articles-list {
            margin-top: 30px;
        }

        .article-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            
        }

        .article-info {
            flex-grow: 1;
        }

        .article-title {
            font-size: 18px;
            color: #1a1a2e;
            margin-bottom: 8px;
        }

        .article-meta {
            display: flex;
            gap: 20px;
            color: #666;
            font-size: 14px;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .status-published {
            background: #4CAF50;
            color: white;
        }

        .status-pending {
            background: #FFC107;
            color: #000;
        }

        .article-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .edit-btn {
            background: #4e54c8;
            color: white;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
        
        }

        .custom-file-upload {
            border: 2px dashed #4e54c8;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            background: #f8f9fa;
}

.status-published {
    background: #4CAF50; /* Vert */
    color: white;
}

.status-rejected {
    background: #F44336; /* Rouge */
    color: white;
}

.status-pending {
    background: #FFC107; /* Jaune */
    color: black;
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
            <h1>Mes Articles Proposés</h1>
            <p>Proposez de nouveaux articles et suivez leur statut de publication</p>
        </section>

        <div class="article-form-container">
            <h2>Proposer un nouvel article</h2>
            <form class="article-form" method = "POST" action= 'Article-Proposé'" enctype= "multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Titre de l'article</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Entrez le titre de votre article">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Décrivez votre article"></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select id="category" class="form-control" name="theme_id" required>
                        <option value="" disabled selected>Sélectionnez une catégorie</option>
                        @foreach($themes as $theme)
                            <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="Numéro">Numéro</label>
                    <select id="Numéro" class="form-control" name="magazine_id" required>
                        <option value="" disabled selected>Sélectionnez une Numéro</option>
                        @foreach($magazines as $magazine)
                            <option value="{{ $magazine->id }}">{{ $magazine->number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="photo" class = "custom-file-upload">Cliquez ou glissez une image ici</label>
                    <div class="file-upload">
                        <input type="file" name="image" id="photo" accept="image/*" style="display: none">
                        <p></p>
                    </div>
                </div>

                <button type="submit" name="submit" class="submit-btn">Soumettre l'article</button>
            </form>
        </div>

        <div class="articles-list">
            <h2>Mes articles</h2>
                  
            </div>
            @foreach($proposations as $article)
            <div class="article-card">
                <div class="article-info">
                    <h3 class="article-title">{{ $article->title }}</h3>
                    <div class="article-meta">
                        <span>{{ $article->theme ? $article->theme->name : 'No theme' }}</span>
                        <span>{{ date('d-m-y',$article->updated_at) }}</span>
                    </div>
                </div>
                <span class="status-badge
                             {{ strtolower($article->state) === 'publié' ? 'status-published' : (strtolower($article->state) === 'refusé' ? 'status-rejected' : 'status-pending') }}">         
                    {{ ucfirst($article->state) }}    
                </span>     
                
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>