<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($articleId)
    {
       
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
    public function store(Request $request, $slug)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $article = Article::where('slug', $slug)->firstOrFail();

        $article->comments()->create([
            'user_id' => auth()->id(), 
            'content' => $validated['content'],
        ]);

        return redirect()->route('article.show', $article->slug)
                         ->with('success', 'Commentaire publié avec succès.');
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
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id === auth()->id()) {
            $comment->delete();
            return redirect()->back()->with('success', 'Commentaire supprimé.');
        }

        return redirect()->back()->with('error', 'Action non autorisée.');
    }
}
