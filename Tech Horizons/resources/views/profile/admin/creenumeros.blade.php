@extends('layouts.admin')
@section('title', 'Créer un Nouveau Numéro')

@section('additional_styles')
<style>
/* Reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

/* Content Section */
#create-numero {
    max-width: 500px;
    margin: 15rem auto;
    background-color: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#create-numero h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    color: #2c3e50;
    font-size: 1.8rem;
}

/* Form Styles */
.form-group {
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: #34495e;
}

.form-group input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #bdc3c7;
    border-radius: 4px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-group input:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
}

/* Button Styles */
.btn {
    display: block;
    width: 100%;
    padding: 0.75rem;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #2980b9;
}

/* Responsive Design */
@media screen and (max-width: 600px) {
    #create-numero {
        width: 90%;
        margin: 1rem auto;
        padding: 1rem;
    }
}

/* Optional: Form Validation Styles */
.form-group input:invalid {
    border-color: #e74c3c;
}
</style>
@endsection

@section('content')
<section id="create-numero" class="content-section active">
    <h2>Créer un Nouveau Numéro</h2>
    <form action="{{ route('admin.numeros.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="number">Numéro</label>
            <input type="text" name="number" id="number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
    <a href="{{ route('admin.numeros.index') }}" class="btn btn-secondary" style="margin-top: 10px;">Retour à la page des Numéros</a>
</section>
@endsection
