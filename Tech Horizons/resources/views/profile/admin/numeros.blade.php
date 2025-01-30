@extends('layouts.admin')
@section('title', 'Page Numéros')

@section('content')
<section id="numeros" class="content-section active">
    <h2>Gestion des Numéros</h2>
    <div>
    <a href="{{ route('admin.numeros.create') }}" class="add-btn">Créer un Nouveau Numéro</a>
    <input type="text" id="search-bar" placeholder="Rechercher un numeros..." style="padding: 8px; border-radius: 5px; border: 1px solid #ddd; margin:18px 10px 10px 10px">
    <table class="data-table">
    </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Number</th>
                <th>Date</th>
                <th>Date de Modification</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($magazines as $magazine)
            <tr>
                <td>{{ $magazine->id }}</td>
                <td>{{ (int) $magazine->number }}</td>
                <td>{{ $magazine->created_at->format('d/m/Y') }}</td>
                <td>{{ $magazine->updated_at->format('d/m/Y') }}</td>
                <td class="align-middle" style="display: flex; gap: 10px;" >
                <a href="{{ route('admin.numeros.recommendations', ['magazine_id' => $magazine->id]) }}" type="button" class="btn btn-warning">Insérer des articles</a>
                <form action="{{ route('admin.numeros.destroy', $magazine->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete m-0">Delete</button>
                </form>
                @if($magazine->is_public)
                    <form action="{{ route('admin.numeros.deactivate', $magazine->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning btn-sm">Désactiver</button>
                    </form>
                @else
                    <form action="{{ route('admin.numeros.activate', $magazine->id) }}" method="POST">
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