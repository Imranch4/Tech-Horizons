@extends('layouts.master')

@section('title', 'Tableau de Bord')

@section('additional_styles')
<style>
    :root {
        --primary-color: #4e54c8;
        --text-color: #333;
        --white: #ffffff;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
        padding: 20px;
    }

    .stat-card {
        background: var(--white);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .stat-card h3 {
        color: var(--text-color);
        margin-bottom: 15px;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .stat-card .value {
        font-size: 28px;
        font-weight: bold;
        color: var(--primary-color);
        margin-bottom: 10px;
    }

    .stat-card .description {
        font-size: 0.9rem;
        color: var(--text-color);
        opacity: 0.7;
    }

    .content-section {
        background: var(--white);
        padding: 25px 20px 2px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 1.25rem;
        color: var(--text-color);
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #E5E7EB;
    }

    .article-list {
        list-style: none;
    }

    .article-item {
        padding: 1rem;
        border-bottom: 1px solid #E5E7EB;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .article-item:last-child {
        border-bottom: none;
    }

    .article-status {
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.875rem;
    }

    .status-pending {
        background-color: #FEF3C7;
        color: #92400E;
    }

    .status-published {
        background-color: #D1FAE5;
        color: #065F46;
    }
</style>
@endsection

@section('content')
<section id="dashboard" class="content-section">
    <h1 class="section-title">{{$theme->name}}</h1>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total des abonnés</h3>
            <div class="value">{{$nombre_abonne}}</div>
        </div>
        <div class="stat-card">
            <h3>Articles publiés</h3>
            <div class="value">{{$nombre_articles_publie}}</div>
        </div>
        <div class="stat-card">
            <h3>Articles en attente</h3>
            <div class="value">{{$nombre_articles_en_cours}}</div>
        </div>
        <div class="stat-card">
            <h3>Commentaires à modérer</h3>
            <div class="value">{{$nombreCommentaires}}</div>
        </div>
    </div>

</section>
@endsection