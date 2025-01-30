<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Visit;

class ArticleExterieurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $user = Auth::user();

    $themeIds = $user->subscriptions->pluck('theme_id');

    $query = Article::whereIn('theme_id', $themeIds)
        ->where('state', 'publié'); 

    if ($request->has('magazine_id')) {
        $query->where('magazine_id', $request->input('magazine_id'));
    }

    $articles = $query->get();

    

    return view('profile.abonné.articles', compact('articles'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('state', 'publié')
            ->first();

        if (!$article) {
            abort(404, 'Article introuvable');
        }


        $user = Auth::user();
        $isSubscribed = $user->subscriptions->pluck('theme_id')->contains($article->theme_id);

        if (!$isSubscribed) {
            abort(403, 'Accès refusé');
        }

        if (auth()->check()) {
            Visit::updateOrCreate(
                ['user_id' => auth()->id(), 'article_id' => $article->id],
                ['created_at' => now()] 
            );
        }

        $comments = $article->comments()->with('user')->get();

        return view('profile.abonné.article', compact('article' , 'comments'));
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
