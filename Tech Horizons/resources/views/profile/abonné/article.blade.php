<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - Article</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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

        /* Sidebar styles */
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

        /* Main content styles */
        .main-content {
            margin-left: 20%;
            width: 80%;
            padding: 80px 40px 40px;
        }

        .article-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .article-header {
            margin-bottom: 30px;
        }

        .article-title {
            font-size: 32px;
            color: #1a1a2e;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .article-theme {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }

        .article-time {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        
    .article-image {
        height: auto;
        max-width: 100%;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 15px; /* Ajoutez cette ligne pour créer un petit espace */

    }

        .article-content {
            line-height: 1.8;
            color: #333;
            margin-bottom: 40px;
        }

        .rating-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .stars {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .star {
            font-size: 24px;
            cursor: pointer;
            color: #ddd;
        }

        .star.active {
            color: #ffd700;
        }

        .comments-section {
            margin-top: 40px;
        }

        .comments-title {
            font-size: 24px;
            color: #1a1a2e;
            margin-bottom: 20px;
        }

        .comment-form {
            margin-bottom: 30px;
        }

        .comment-input {
            width: 100%;
            height: 100px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            font-family: inherit;
            resize: vertical;
        }

        .submit-button {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(78, 84, 200, 0.2);
        }

        .comments-list {
            list-style: none;
            padding: 0;
        }

        .comment {
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .comment-author {
            font-weight: 600;
            color: #1a1a2e;
        }

        .comment-date {
            color: #666;
            font-size: 14px;
        }

        .comment-content {
            color: #444;
            line-height: 1.6;
        }

        /* Style général pour les boutons */
button {
    font-family: Arial, sans-serif;
    font-size: 14px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    padding: 8px 12px;
    transition: all 0.3s ease;
}

/* Style spécifique pour les boutons "Supprimer" */
.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.comment-user-info {
    display: flex;
    flex-direction: column;
}

.comment-actions {
    display: flex;
    align-items: center;
}

.btn-delete-comment {
    background: transparent;
    color: #dc3545;
    border: 1px solid #dc3545;
    padding: 5px 10px;
    border-radius: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 12px;
    transition: all 0.3s ease;
}

.btn-delete-comment:hover {
    background-color: #dc3545;
    color: white;
}

.btn-delete-comment i {
    font-size: 12px;
}

#rating-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #f8f9fa;
    padding: 20px;
    border-radius: 12px;
    gap: 15px;
}

.rating-wrapper h2 {
    color: #1a1a2e;
    margin-bottom: 15px;
    font-size: 20px;
}

.star-container {
    display: flex;
    gap: 10px;
}

.star {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease;
}

.star:hover,
.star.active {
    color: #4e54c8;
    transform: scale(1.1);
}

.rating-details {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

#average-rating {
    color: #4e54c8;
    font-weight: bold;
}

.rating-details h4 {
    color: #666;
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

    <div class="main-content">
        <article class="article-container">
            <div class="article-header">
                <h1 class="article-title">{{ $article->title }}</h1>
                <div class="article-meta">
                    <span class="article-theme">{{ $article->theme->name }}</span>
                    <span class="article-time">
                        <i class="far fa-clock"></i>
                        Publié le {{ $article->created_at->format('d/m/Y') }}
                    </span>
                </div>
            </div>
    
            <img src="images/{{$article->image}}" alt="{{ $article->title }} Article" class="article-image">
    
            <div class="article-content">
                <p>{!! $article->content !!}</p>
            </div>
    





            
            <div id="rating-container" data-article-id="{{ $article->id }}">
                @csrf
                <div class="rating-wrapper">
                    <h2>Noter cet article</h2>
                    <div class="star-container">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa fa-star star"
                               data-value="{{ $i }}"
                               style="font-size: 2rem; color: #ddd; cursor: pointer;"></i>
                        @endfor
                    </div>
                </div>
            
                <div class="rating-details">
                    <h3>Note moyenne : <span id="average-rating">
                        {{ $article->averageRating() ? number_format($article->averageRating(), 1) : 'Aucune note' }}
                    </span> ⭐</h3>
                    <h4>{{ $article->notes->count() }} avis</h4>
                </div>
            </div>





    
            <section class="comments-section">
                <h2 class="comments-title">Commentaires</h2>
                <form class="comment-form" action="{{ route('comments.store', $article->slug) }}" method="POST" >
                    @csrf
                    <textarea 
                        class="comment-input" 
                        placeholder="Laissez votre commentaire..." name="content"></textarea>
                    <button type="submit" class="submit-button">Publier</button>
                </form>
                @foreach($article->comments as $comment)
                <ul class="comments-list">
                    <li class="comment">
                        <div class="comment-header">
                            <div class="comment-user-info">
                                <span class="comment-author">{{ $comment->user->name }}</span>
                                <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            @if(auth()->id() === $comment->user_id)
                            <div class="comment-actions">
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="delete-comment-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete-comment">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                        <p class="comment-content">{{ $comment->content }}</p>
                    </li>
                    <!-- Autres commentaires -->
                </ul>
                @endforeach
            </section>
        </article>
    </div>
    
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star');
    const ratingContainer = document.getElementById('rating-container');
    const csrfToken = document.querySelector('input[name="_token"]').value;

    stars.forEach(star => {
        // Survol des étoiles
        star.addEventListener('mouseover', function () {
            const rating = this.getAttribute('data-value');
            highlightStars(rating);
        });

        // Réinitialiser les étoiles après le survol
        star.addEventListener('mouseout', function () {
            resetStars();
        });

        // Clic sur une étoile pour noter
        star.addEventListener('click', function () {
            const rating = this.getAttribute('data-value');
            const articleId = ratingContainer.getAttribute('data-article-id');

            // Envoyer la note au backend
            fetch(`/ratings/${articleId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ rating: rating }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('average-rating').innerText = data.averageRating;
                        alert('Merci pour votre avis !');
                    } else {
                        alert('Une erreur est survenue.');
                    }
                });
        });
    });

    function highlightStars(rating) {
        stars.forEach(star => {
            star.style.color = star.getAttribute('data-value') <= rating ? '#ffc107' : '#ddd';
        });
    }

    function resetStars() {
        stars.forEach(star => {
            star.style.color = '#ddd';
        });
    }
});

        </script>
    
</body>
</html>