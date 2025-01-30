<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        @yield('additional_styles')
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-newspaper"></i>
            Tech Horizons Panel
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('admin.dashboard') }}" class="active" data-section="dashboard"><i class="fas fa-home"></i> Accueil</a></li>
            <li><a href="{{ route('admin.numeros.index') }}" data-section="numeros"><i class="fas fa-book"></i> Numéros</a></li>
            <li><a href="{{ route('admin.abonnes.index') }}" data-section="abonnes"><i class="fas fa-users"></i> Abonnés</a></li>
            <li><a href="{{ route('admin.responsables.index') }}" data-section="responsables"><i class="fas fa-user-tie"></i> Responsables</a></li>
            <li><a href="{{ route('admin.articles.index') }}" data-section="articles"><i class="fas fa-file-alt"></i> Articles</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>@yield('title')</h1>
            <div class="user-menu">
                <span>{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                </form>
            </div>
        </div>

        <main class="content">
            @yield('content') 
        </main>

    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let searchBar = document.getElementById('search-bar');
        if (searchBar) {
            searchBar.addEventListener('input', function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll('.data-table tbody tr');

                rows.forEach(function(row) {
                    let name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                    if (name.includes(filter)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    });
    </script>
</body>
</html>
