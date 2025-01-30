<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        :root {
            --primary-color: #4e54c8;
            --secondary-color: #1a1a2e;
            --text-color: #333;
            --bg-light: #f0f2f5;
            --white: #ffffff;
            --border-color: #ddd;
        }

        body {
            display: flex;
            background: var(--bg-light);
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: var(--secondary-color);
            padding: 20px;
            position: fixed;
        }

        .logo {
            color: var(--white);
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .nav-links {
            list-style: none;
        }

        .nav-links li {
            margin-bottom: 10px;
        }

        .nav-links a {
            color: var(--white);
            text-decoration: none;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: var(--text-color);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logout-btn {
            padding: 8px 20px;
            background: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .content {
            background: var(--white);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
    @yield('additional_styles')
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-newspaper"></i>
            Tech Horizons Panel
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('responsable.dashboard') }}" class="active"><i class="fas fa-home"></i> Tableau de bord</a></li>
            <li><a href="{{ route('responsable.subscriptions') }}"><i class="fas fa-book"></i> Gestion des abonnements</a></li>
            <li><a href="{{ route('responsable.articles.index') }}"><i class="fas fa-file-alt"></i> Articles</a></li>
            <li><a href="{{ route('responsable.moderation.index') }}"><i class="fas fa-users"></i> Modération</a></li>
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
    @yield('scripts')
</body>
</html>