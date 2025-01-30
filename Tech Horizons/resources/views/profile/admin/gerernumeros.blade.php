@extends('layouts.admin')
@section('title', 'Page des articles recommender')

@section('content')
<section id="recommendations" class="content-section active">
    <input type="text" id="search-bar" placeholder="Rechercher une recommendation..." style="padding: 8px; border-radius: 5px; border: 1px solid #ddd; margin:18px 10px 10px 10px"> 
    <a href="{{ route('admin.numeros.index') }}" class="btn btn-primary" style="margin: 10px;">Retourner à la page des numéros</a>
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Article ID</th>
                <th>Date</th>
                <th>Date de Modification</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recommendations as $recommendation)
            <tr>
                <td>{{ $recommendation->id }}</td>
                <td>{{ $recommendation->article_id }}</td>
                <td>{{ $recommendation->created_at->format('d/m/Y') }}</td>
                <td>{{ $recommendation->updated_at->format('d/m/Y') }}</td>
                <td class="align-middle" style="display: flex; gap: 10px;">
                    <form action="{{ route('admin.numeros.articles.updateMagazine', ['article_id' => $recommendation->article_id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="magazine_id" placeholder="Magazine ID" required>
                        <button type="submit" class="btn btn-warning">Ajouter au numéro</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
