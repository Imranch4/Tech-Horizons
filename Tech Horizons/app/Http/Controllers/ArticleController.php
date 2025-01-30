<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Theme;
use App\Models\Theme as ThemeModel;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->get();
        $totalArticles = Article::count(); 
    
        return view('profile.admin.articles', ['articles' => $articles, 'totalArticles' => $totalArticles]); 
    }

    public function activate(Article $article)
    {
        $article->is_active = true; 
        $article->save();
    
        return redirect()->back()->with('success', 'Article activated successfully.');
    }
    
    public function deactivate(Article $article)
    {
        $article->is_active = false;
        $article->save();
    
        return redirect()->back()->with('success', 'Article deactivated successfully.');
    }
    
    public function respoindex(){
        $themeId = ThemeModel::where('user_id', Auth::id())->pluck('id')->first();
        $articles = Article::where('theme_id', $themeId)
                        ->where('state', 'en cours')
                        ->get();
        return view('profile.responsable.responsableArticles', compact('articles'));
        }
    
        public function publish($id)
    {
        $article = Article::findOrFail($id);
        $article->state = 'publié';
        $article->save();
    
        return redirect()->back()->with('success', 'Article publié avec succès');
    }
    public function reject($id)
    {
        $article = Article::findOrFail($id);
        $article->state = 'Refus';
        $article->save();
    
        return redirect()->back()->with('success', 'Article rejet avec succès');
    }
}

