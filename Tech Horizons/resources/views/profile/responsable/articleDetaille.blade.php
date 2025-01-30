@extends('layouts.master')
@section('title', 'Article Complet')
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
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: var(--bg-light);
        color: var(--text-color);
    }

    .article-container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
    }

    .article {
        background: var(--white);
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .article:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .article-header {
        margin-bottom: 20px;
    }

    .article-title {
        font-size: 2rem;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--secondary-color);
    }

    .article-meta {
        color: var(--text-color);
        font-size: 0.9rem;
        margin-bottom: 15px;
        opacity: 0.7;
    }

    .article-image {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .article-content {
        color: var(--text-color);
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s, transform 0.1s;
        text-decoration: none;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .btn-back {
        background-color: var(--primary-color);
        color: var(--white);
    }

    .btn-back:hover {
        background-color: #3f45c7;
    }

    .btn-proposer {
        background-color: var(--success-color);
        color: var(--white);
    }

    .btn-proposer:hover {
        background-color: #45a049;
    }

    .article-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
<div class="article-container">
    <div class="article">
        <div class="article-header">
            <h1 class="article-title">{{$article->title}}</h1>
            <div class="article-meta">
                Par {{ $article->user->name ?? 'Auteur inconnu' }} • {{ $article->created_at->format('d M Y') }}
            </div>
        </div>

        @if($article->image)
            <img src="{{ asset('img/' . $article->image) }}" alt="{{ $article->title }}" class="article-image">
        @else
            <img src="https://via.placeholder.com/800x400" alt="Image par défaut" class="article-image">
        @endif

        <div class="article-content">
            {{$article->content}}
        </div>
        <div class="article-actions">
            <a href="{{route('responsable.articles.index') }}" class="btn btn-back">Retour à la liste des articles</a>
            <form action="{{ route('article.proposer', $article->id) }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="id_article" value="{{ $article->id }}">
                <button type="submit" class="btn btn-proposer">Proposer</button>
            </form>
        </div>
    </div>
</div>
@endsection