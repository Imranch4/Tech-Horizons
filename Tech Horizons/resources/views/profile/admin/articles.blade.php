@extends('layouts.admin')
@section('title', 'Page Articles')

@section('content')
<section id="articles" class="content-section active">
    <h2>Gestion des Articles</h2>
    <div>
        <input type="text" id="search-bar"  placeholder="Rechercher un article..." style="padding: 8px; border-radius: 5px; border: 1px solid #ddd; margin:18px 10px 10px 10px">
    </div>
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Thème</th>
                <th>Date</th>
                <th>Date de Modification</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->user ? $article->user->name : 'N/A' }}</td>
            <td>{{ $article->theme ? $article->theme->name : 'N/A'  }}</td>
            <td>{{ $article->created_at->format('d/m/Y') }}</td>
            <td>{{ $article->updated_at->format('d/m/Y') }}</td>
            <td>{{ $article->state }}</td>
            <td>
                @if($article->is_active)
                    <form action="{{ route('admin.articles.deactivate', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning btn-sm">Désactiver</button>
                    </form>
                @else
                    <form action="{{ route('admin.articles.activate', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success btn-sm">Activer</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection