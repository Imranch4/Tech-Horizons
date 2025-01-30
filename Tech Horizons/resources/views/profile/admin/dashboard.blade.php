@extends('layouts.admin')
@section('title', 'Dashboard Admin')

@section('content')
    <section id="dashboard" class="content-section active">
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Abonnés</h3>
                <div class="value">{{ $totalAbonnes }}</div>
            </div>
            <div class="stat-card">
                <h3>Numéros Publiés</h3>
                <div class="value">{{ $totalMagazines }}</div> <!-- Correct variable name -->
            </div>
            <div class="stat-card">
                <h3>Total Articles</h3>
                <div class="value">{{ $totalArticles }}</div>
            </div>
            <div class="stat-card">
                <h3>Responsables</h3>
                <div class="value">{{ $totalResponsables }}</div>
            </div>
            <div class="stat-card">
                <h3>Thèmes disponibles</h3>
                <div class="value">{{ $totalThemes }}</div>
            </div>
        </div>
    </section>
@endsection