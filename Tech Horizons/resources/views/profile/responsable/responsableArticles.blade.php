@extends('layouts.master')

@section('title', 'Page Responsable')

@section('additional_styles')
<style>
    :root {
        --primary-color: #4e54c8;
        --secondary-color: #1a1a2e;
        --text-color: #333;
        --bg-light: #f0f2f5;
        --white: #ffffff;
        --border-color: #ddd;
        --success-color: #4CAF50;
        --danger-color: #f44336;
        --info-color: #36bef4;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: var(--bg-light);
        color: var(--text-color);
    }

    .articles-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        color: var(--secondary-color);
        font-size: 2rem;
    }

    .article {
        background: var(--white);
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .article:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .article-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0px;
    }

    .article-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--secondary-color);
    }

    .article-meta {
        color: var(--text-color);
        font-size: 0.9rem;
        opacity: 0.7;
    }

    .article-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .article-description {
        color: var(--text-color);
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .article-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s, transform 0.1s;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .btn-accept {
        background-color: var(--success-color);
        color: var(--white);
    }

    .btn-reject {
        background-color: var(--danger-color);
        color: var(--white);
    }

    .btn-voir {
        background-color: var(--info-color);
        color: var(--white);
    }

    .btn-accept:hover {
        background-color: #45a049;
    }

    .btn-reject:hover {
        background-color: #da190b;
    }

    .btn-voir:hover {
        background-color: #2196F3;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        text-align: center;
    }
</style>
@endsection

@section('content')

@if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<div class="articles-container">
    <h1>Articles Proposés</h1>

    @forelse($articles as $article)
        <div class="article">
            <div class="article-header">
                <h2 class="article-title">{{ $article->title }}</h2>
                <span class="article-meta">Par {{ $article->user->name ?? 'Auteur inconnu' }} • {{ $article->created_at->format('d M Y') }}</span>
            </div>

            @if($article->image)
                <img src="{{ asset('img/' . $article->image) }}" alt="{{ $article->title }}" class="article-image">
            @else
                <img src="https://via.placeholder.com/800x400" alt="Image par défaut" class="article-image">
            @endif

            <p class="article-description">
                {{ Str::limit($article->content, 150, '...') }}
            </p>

            <div class="article-actions">
                <form action="{{ route('article.detaille', $article->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="id_article" value="{{ $article->id }}">
                    <button type="submit" class="btn btn-voir">Voir plus</button>
                </form>
                <form action="{{ route('articles.reject', $article->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-reject">Rejeter</button>
                </form>
                
                <form action="{{ route('articles.publish', $article->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-accept">Accepter</button>
                </form>
            </div>
        </div>
    @empty
        <p>Aucun article "en cours" trouvé.</p>
    @endforelse
</div>
@endsection

@section('scripts')
<script>
    function acceptArticle(id) {
        alert('Article ' + id + ' accepté');
    }

    function rejectArticle(id) {
        alert('Article ' + id + ' rejeté');
    }
</script>
@endsection