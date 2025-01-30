<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Note;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Vérifier si l'utilisateur a déjà noté cet article
        $existingRating = Note::where('article_id', $article->id)
                                ->where('user_id', auth()->id())
                                ->first();

        if ($existingRating) {
            $existingRating->update(['rating' => $validated['rating']]);
        } else {
            Note::create([
                'article_id' => $article->id,
                'user_id' => auth()->id(),
                'rating' => $validated['rating'],
            ]);
        }

        // Retourner la moyenne des notes en JSON
        return response()->json([
            'success' => true,
            'averageRating' => number_format($article->averageRating(), 1),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
