<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\Theme;
use App\Models\Subscription;
use App\Models\article;
use App\Models\Comment;
use App\Models\Recommendation;

class ResponsableController extends Controller
{
    public function dashboard()
    {   
        $user_id = Auth::user()->id;
        $theme = Theme::where('user_id',$user_id)->first();
        $theme_id = Theme::where('user_id',$user_id)->first()->id;
        $nombre_abonne = Subscription::where('theme_id',$theme_id)->count();
        $nombre_articles_publie = Article::where([['state','=','publié'],['theme_id','=',$theme_id]])->count();
        $nombre_articles_en_cours = Article::where([['state','=','en cours'],['theme_id','=',$theme_id]])->count();
        $nombreCommentaires = Comment::whereHas('article', function ($query) use ($theme_id) {
            $query->where('theme_id', $theme_id);
            })->count();
        

        return view('profile/responsable/responsable',[
            'theme' => $theme,
            'nombre_abonne' => $nombre_abonne,
            'nombre_articles_publie' => $nombre_articles_publie,
            'nombre_articles_en_cours' => $nombre_articles_en_cours,
            'nombreCommentaires' => $nombreCommentaires,
        ]);
    }

    public function subscriptions()
    {
        {
            $user_id = Auth::user()->id;
            $theme_id = Theme::where('user_id',$user_id)->first()->id;
            $subscriptions = Subscription::where('theme_id',$theme_id)->get();
    
    
            return view('profile/responsable/responsableAbonne',[
                'subscriptions' => $subscriptions,
            ]);
        }
    }

    public function delete_subscription(Request $request)
    {
        $subscription_id = $request->subscription_id;
        Subscription::where('id',$subscription_id)->first()->delete();
        return Redirect::route('responsable.subscriptions');
    }

    public function articles()
    {
        return view('profile/responsable/responsableArticles');
    }

    public function createArticle()
    {
        return view('responsable.articles.create');
    }

    public function storeArticle(Request $request)
    {
        // Logique pour sauvegarder un article
    }

    public function editArticle($article)
    {
        return view('responsable.articles.edit', compact('article'));
    }

    public function updateArticle(Request $request, $article)
    {
        // Logique pour mettre à jour un article
    }

    public function moderation()
{
    $theme_id = Theme::where('user_id', Auth::id())->pluck('id')->first();
    
    $article_ids = Article::where('state','publié')->where('theme_id', $theme_id)->pluck('id');
    
    $comments = Comment::whereIn('article_id', $article_ids)->get();
    
    return view('profile.responsable.responsableModeration', compact('comments'));
}

    public function approveArticle($article)
    {
        // Logique pour approuver un article
    }

    public function SupprimerCommentaire(Request $request)
    {
        $id_comment = $request->input('id_comment');
        $comment = Comment::findOrFail($id_comment);
        $comment->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès.');
    }

    public function statistics()
    {
        return view('profile/responsable/responsableStatistique');
    }
    
    public function articleDetaille(Request $request){
        $id_article = $request->input('id_article');
        $article = Article::findOrFail($id_article);
        return view('profile/responsable/articleDetaille',compact('article'));
    }

    public function proposer(Request $request){
        $id_article = $request->input('id_article');
        $article = Article::findOrFail($id_article);

        $existingRecommendation = Recommendation::where('article_id', $article->id)
        ->first();

    if ($existingRecommendation) {
        return view('profile/responsable/articleDetaille',compact('article'));
    }else{
        $recommendation = new Recommendation();
        
        $recommendation->article_id = $article->id;
        
        $recommendation->user_id = Auth::id();
        
        // Ajouter une raison optionnelle (si fournie dans le formulaire)
        // $recommendation->reason = $validatedData['reason'] ?? null;
        
        $recommendation->save();

        return Redirect::route('responsable.articles.index');
    }
    }
}