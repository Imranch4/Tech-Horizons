@extends('layouts.admin')
@section('title', 'Gérer un Abonné')

@section('additional_styles')
<style>
/* Styles spécifiques à la section abonnés */
#edit-abonne.content-section {
    max-width: 800px;
    margin: 2rem auto;
    margin-top: 150px;
    padding: 2rem;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#edit-abonne h2 {
    color: #333333;
    font-size: 24px;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #f0f0f0;
}

#edit-abonne .form-group {
    margin-bottom: 1.5rem;
    position: relative;
}

#edit-abonne .form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #555555;
    font-weight: 500;
}

#edit-abonne .form-control {
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border: 1px solid #dddddd;
    border-radius: 4px;
    background-color: #ffffff;
    transition: border-color 0.2s ease;
}

#edit-abonne .form-control:focus {
    outline: none;
    border-color: #4a90e2;
    box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.1);
}

#edit-abonne .form-control:hover {
    border-color: #bbbbbb;
}

#edit-abonne .btn {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: background-color 0.2s ease;
}

#edit-abonne .btn-primary {
    background-color: #4a90e2;
    color: white;
}

#edit-abonne .btn-primary:hover {
    background-color: #357abd;
}

#edit-abonne .btn-primary:active {
    background-color: #2a6496;
}

#edit-abonne .form-control.is-invalid {
    border-color: #dc3545;
}

#edit-abonne .invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

/* Responsive spécifique à la section abonnés */
@media screen and (max-width: 768px) {
    #edit-abonne.content-section {
        margin: 1rem;
        padding: 1rem;
    }
    
    #edit-abonne .btn {
        width: 100%;
    }
}

/* Reset des styles qui pourraient être hérités */
#edit-abonne * {
    box-sizing: border-box;
}

#edit-abonne input,
#edit-abonne button {
    margin: 0;
    font-family: inherit;
}
</style>
@endsection

@section('content')
<section id="edit-abonne" class="content-section active">
    <h2>{{ isset($abonnes) ? 'Editer Abonné' : 'Créer Nouvel Abonné' }}</h2>
    <form action="{{ isset($abonnes) ? route('admin.abonnes.update', $abonnes->id) : route('admin.abonnes.store') }}" method="POST">
        @csrf
        @if(isset($abonnes))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ isset($abonnes) ? $abonnes->name : '' }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ isset($abonnes) ? $abonnes->email : '' }}" required>
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>
        @if(!isset($abonnes))
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="text" name="password" id="password" class="form-control" required>
        </div>
        @endif
        <button type="submit" class="btn btn-primary">{{ isset($abonnes) ? 'Mettre à jour' : 'Créer' }}</button>
    </form>
</section>
@endsection
