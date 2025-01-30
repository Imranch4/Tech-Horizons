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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-color);
        }

        .moderation-container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .title {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .moderation-header {
            margin-bottom: 30px;
        }

        .moderation-title {
            font-size: 2rem;
            color: var(--secondary-color);
            margin-bottom: 10px;
        }

        .moderation-description {
            color: var(--text-color);
            font-size: 1rem;
            opacity: 0.7;
        }

        .moderation-card {
            background-color: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .moderation-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .comment-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .moderation-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }

        .btn-approve {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-reject {
            background-color: #DC2626;
            color: var(--white);
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
@endsection

@section('content')
    <div class="title">
        <div class="moderation-header">
            <h1 class="moderation-title">Modération des commentaires</h1>
            <p class="moderation-description">
                Gestion des conversations liées aux articles de thème.
            </p>
        </div>
    </div>
    <div class="moderation-container">
    @foreach ($comments as $comment)
        <div class="moderation-card">
            <div class="comment-info">
                <div>
                    <strong>Article: </strong>
                    <span>{{$comment->article->title}}</span>
                </div>
                <div class="moderation-actions">
                    <form action="{{ route('responsable.moderation.supprimer',$comment->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_comment" value="{{ $comment->id }}">
                        <button class="btn btn-reject">Rejeter</button>
                    </form>
                </div>
            </div>
            <p>
                {{$comment->content}}
            </p>
        </div>
    @endforeach
    </div>
@endsection

