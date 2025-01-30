@extends('layouts.admin')
@section('title', 'Page Abonnés')

@section('content')
<section id="abonnes" class="content-section active">
    <h2>Gestion des Abonnés</h2>
    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
        <a href="{{ route('admin.abonnes.create') }}" class="add-btn"> Nouvel Abonné</a>
        <input type="text" id="search-bar" placeholder="Rechercher un abonné..." style="padding: 8px; border-radius: 5px; border: 1px solid #ddd; margin:18px">
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Date d'inscription</th>
                <th>Date de Modification</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($abonnes as $abonne)
            <tr>
                <td>{{ $abonne->id }}</td>
                <td>{{ $abonne->name }}</td>
                <td>{{ $abonne->email }}</td>
                <td>{{ $abonne->created_at->format('d/m/Y') }}</td>
                <td>{{ $abonne->updated_at->format('d/m/Y') }}</td>
                <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.abonnes.edit', $abonne->id) }}" type="button" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.abonnes.destroy', $abonne->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete m-0">Delete</button>
                        </form>
                        @if($abonne->status == 'active')
                        <form action="{{ route('admin.abonnes.block', $abonne->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Block?')">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-danger m-0">Block</button>
                        </form>
                        @else
                        <form action="{{ route('admin.abonnes.unblock', $abonne->id) }}" method="POST" type="button" class="btn btn-success p-0" onsubmit="return confirm('Unblock?')">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success m-0">Unblock</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection