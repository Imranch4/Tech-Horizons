<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Horizons - L'avenir de la technologie</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <header>
        <div class="nav-container">
            <div class="logo">
                <a href="/">
                    <img src="/images/tech logo.png" alt="horezontech logo">
                </a>
            </div>
            <nav class="nav-links">
                <a href="#">Accueil</a>
                <a href="#features" class="scroll-link">Thèmes</a>
                <a href="#latest-articles" class="scroll-link">Articles</a>
                <a href="#about" class="scroll-link">À propos</a>
                <a href="/contact">Contact</a>
            </nav>
            <div class="auth-btns">
                <a href="/login" class="login-btn">Connexion</a>
                <a href="/register" class="signup-btn">Inscription</a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Découvrez le Futur de la Technologie</h1>
                <p>Explorez les dernières innovations et tendances technologiques avec notre communauté d'experts. Restez à la pointe de la révolution numérique.</p>
                <div class="cta-buttons">
                    <a href="/login" class="primary-btn">Commencer l'exploration</a>
                    <a href="/login" class="secondary-btn">En savoir plus</a>
                </div>
            </div>
            
        </div>
    </section>

    <section class="features" id="features">
        <div class="section-title">
            <h2>Nos Thématiques Principales</h2>
            <p>Explorez nos domaines d'expertise et plongez dans l'univers fascinant des nouvelles technologies</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🤖</div>
                <h3>Intelligence Artificielle</h3>
                <p>Découvrez les dernières avancées en IA et son impact sur notre future</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌐</div>
                <h3>Internet des Objets</h3>
                <p>Explorez la révolution de l'IoT et ses applications innovantes</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Cybersécurité</h3>
                <p>Apprenez à protéger vos données dans l'ère numérique</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎮</div>
                <h3>Réalité Virtuelle</h3>
                <p>Immergez-vous dans le futur de l'interaction numérique</p>
            </div>
        </div>
    </section>

    <section class="latest-articles" id="latest-articles">
        <div class="section-title">
            <h2>Articles Récents</h2>
            <p>Restez informé des dernières actualités et analyses technologiques</p>
        </div>
        <div class="articles-grid">
            <article class="article-card">
                <div class="article-image">
                    <img src="/images/AI.jpg" alt="IA Article">
                </div>
                <div class="article-content">
                    <span class="article-tag">Intelligence Artificielle</span>
                    <h3 class="article-title">L'IA Générative en 2024</h3>
                    <p class="article-preview">Découvrez comment l'IA générative transforme les industries créatives...</p>
                    <a href="/register" class="primary-btn">Lire plus</a>
                </div>
            </article>
            <article class="article-card">
                <div class="article-image">
                    <img src="/images/IT.jpg" alt="IoT Article">
                </div>
                <div class="article-content">
                    <span class="article-tag">IoT</span>
                    <h3 class="article-title">L'IoT et les Villes Intelligentes</h3>
                    <p class="article-preview">Comment l'Internet des Objets révolutionne nos villes...</p>
                    <a href="/register" class="primary-btn">Lire plus</a>
                </div>
            </article>
            <article class="article-card">
                <div class="article-image">
                    <img src="/images/securité.jpg" alt="Cybersecurity Article">
                </div>
                <div class="article-content">
                    <span class="article-tag">Cybersécurité</span>
                    <h3 class="article-title">Sécurité des Données</h3>
                    <p class="article-preview">Les meilleures pratiques pour protéger vos informations...</p>
                    <a href="/register" class="primary-btn">Lire plus</a>
                </div>
            </article>
        </div>
    </section>

    <footer id="about">
        <div class="footer-content">
            <div class="footer-section">
                <h3>À propos</h3>
                <ul>
                    <li><a href="#">Notre Mission</a></li>
                    <li><a href="#">L'équipe</a></li>
                    <li><a href="#">Carrières</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Ressources</h3>
                <ul>
                    <li><a href="#">Abonnements</a></li>
                    <li><a href="#">Contribuer</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.scroll-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);
                
                targetSection.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>