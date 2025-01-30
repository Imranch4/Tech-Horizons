<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NumeroController;
use App\Http\Controllers\AbonneController;
use App\Http\Controllers\ThemeController;

use App\Http\Controllers\RespoController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ResponsableController;
use Illuminate\Support\Facades\Route;
use App\Models\Theme;
use App\Models\Subscription;
use App\Models\Comment;
use App\Models\Recommendation;

use App\Http\Controllers\ProposerController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ThemeAbonneController; 
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ArticleExterieurController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\MagazineController;

use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\User;
use App\Models\Magazine;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/espace-abonné', function () {
        if (Auth::user()->status == 'blocked') {
            Auth::logout();
            return redirect('/login')->with('status', 'blocked');
        }

        if (Auth::user()->role == 'customer') {
            return view('profile.abonné.dashboard');
        }

        return (new MagazineController)->index();
    })->name('dashboard');

Route::get('/admin/dashboard', function () {
        if (Auth::user()->status == 'blocked') {
            Auth::logout();
            return redirect('/login')->with('status', 'blocked');
        }
        $articles = Article::with('user')->get();
        $totalArticles = Article::count();
        $totalMagazines = Magazine::count();
        $totalAbonnes = User::where('role', '2')->count();
        $totalResponsables = User::where('role', '1')->count();
        $totalThemes = Theme::count();
        $recommendations = Recommendation::all();
        return view('profile/admin/dashboard', ['articles' => $articles, 'totalArticles' => $totalArticles, 'totalMagazines' => $totalMagazines, 'totalAbonnes' => $totalAbonnes, 'totalResponsables' => $totalResponsables, 'totalThemes' => $totalThemes, 'recommendations' => $recommendations]); // Ensure this view file exists
    })->middleware(['rolemanager:admin'])->name('admin');

Route::get('/responsable/dashboard', function () {
        if (Auth::user()->status == 'blocked') {
            Auth::logout();
            return redirect('/login')->with('status', 'blocked');
        }
        $user_id = Auth::user()->id;
        $theme = Theme::where('user_id',$user_id)->first();
        $theme_id = $theme->id ?? null;
        $nombre_abonne = Subscription::where('theme_id',$theme_id)->count();
        $nombre_articles_publie = Article::where([['state','=','publié'],['theme_id','=',$theme_id]])->count();
        $nombre_articles_en_cours = Article::where([['state','=','en cours'],['theme_id','=',$theme_id]])->count();
        $nombreCommentaires = Comment::whereHas('article', function ($query) use ($theme_id) {
            $query->where('theme_id', $theme_id);
            })->count();

        return view('profile/responsable/responsable', [
            'theme' => $theme,
            'nombre_abonne' => $nombre_abonne,
            'nombre_articles_publie' => $nombre_articles_publie,
            'nombre_articles_en_cours' => $nombre_articles_en_cours,
            'nombreCommentaires' => $nombreCommentaires,
        ]);
    })->middleware(['rolemanager:responsable'])->name('responsable');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin

Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard principal
    Route::get('admin/dashboard', function () {
        $articles = Article::with('user')->get();
        $totalArticles = Article::count();
        $totalMagazines = Magazine::count();
        $totalAbonnes = User::where('role', '2')->count();
        $totalResponsables = User::where('role', '1')->count();
        $totalThemes = Theme::count();
        $recommendations = Recommendation::all();
        return view('profile.admin.dashboard', ['articles' => $articles, 'totalArticles' => $totalArticles, 'totalMagazines' => $totalMagazines, 'totalAbonnes' => $totalAbonnes, 'totalResponsables' => $totalResponsables, 'totalThemes' => $totalThemes, 'recommendations' => $recommendations]);
    })->name('dashboard');

    Route::prefix('articles')->name('articles.')->group(function () {
        Route::get('/', [AdminController::class, 'articles'])->name('index');
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::put('/{article}/activate', [ArticleController::class, 'activate'])->name('activate');
        Route::put('/{article}/deactivate', [ArticleController::class, 'deactivate'])->name('deactivate');
    });

    Route::prefix('numeros')->name('numeros.')->group(function () {
        Route::get('/', [NumeroController::class, 'index'])->name('index');
        Route::delete('destroy/{id}', [NumeroController::class, 'destroy'])->name('destroy');
        Route::put('/{numero}/activate', [NumeroController::class, 'activate'])->name('activate');
        Route::put('/{numero}/deactivate', [NumeroController::class, 'deactivate'])->name('deactivate');
        Route::get('recommendations', [RecommendationController::class, 'index'])->name('recommendations');
        Route::get('create', [NumeroController::class, 'create'])->name('create');
        Route::post('store', [NumeroController::class, 'store'])->name('store');
        Route::post('/admin/numeros/{magazine_id}/articles/{article_id}/add', [NumeroController::class, 'addArticleToMagazine'])->name('admin.articles.add');
        Route::put('/articles/{article_id}/updateMagazine', [NumeroController::class, 'updateMagazine'])->name('articles.updateMagazine');
    });

    Route::prefix('responsables')->name('responsables.')->group(function () {
        Route::get('/', [RespoController::class, 'index'])->name('index'); 
        Route::get('create', [RespoController::class, 'create'])->name('create');
        Route::post('store', [RespoController::class, 'store'])->name('store');
        Route::get('edit/{id}', [RespoController::class, 'edit'])->name('edit');
        Route::put('edit/{id}', [RespoController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [RespoController::class, 'destroy'])->name('destroy');
        Route::put('block/{id}', [RespoController::class, 'block'])->name('block');
        Route::put('unblock/{id}', [RespoController::class, 'unblock'])->name('unblock'); 
    });

    Route::prefix('abonnes')->name('abonnes.')->group(function () {
        Route::get('/', [AbonneController::class, 'index'])->name('index'); 
        Route::get('create', [AbonneController::class, 'create'])->name('create');
        Route::post('store', [AbonneController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AbonneController::class, 'edit'])->name('edit');
        Route::put('edit/{id}', [AbonneController::class, 'update'])->name('update');
        Route::delete('destroy/{id}', [AbonneController::class, 'destroy'])->name('destroy');
        Route::put('block/{id}', [AbonneController::class, 'block'])->name('block');
        Route::put('unblock/{id}', [AbonneController::class, 'unblock'])->name('unblock');
    });
});

//responsable

// Routes Responsable
Route::prefix('responsable')->name('responsable.')->group(function () {
    // Dashboard principal
    Route::get('responsable/dashboard', [ResponsableController::class, 'dashboard'])
        ->name('dashboard');

    // Gestion des abonnements
    Route::get('/subscriptions', [ResponsableController::class, 'subscriptions'])
        ->name('subscriptions');
    Route::delete('/abonne', [ResponsableController::class, 'delete_subscription'])->name('delete_subscription');
    // Gestion des articles
    Route::prefix('articles')->name('articles.')->group(function () {
        Route::get('/', [ResponsableController::class, 'articles'])
            ->name('index');
        Route::get('/create', [ResponsableController::class, 'createArticle'])
            ->name('create');
        Route::post('/store', [ResponsableController::class, 'storeArticle'])
            ->name('store');
        Route::get('/{article}/edit', [ResponsableController::class, 'editArticle'])
            ->name('edit');
        Route::put('/{article}/update', [ResponsableController::class, 'updateArticle'])
            ->name('update');
        
    });

    // Modération
    Route::prefix('moderation')->name('moderation.')->group(function () {
        Route::get('/', [ResponsableController::class, 'moderation'])
            ->name('index');
        // Route::put('/{article}/approve', [ResponsableController::class, 'approveArticle'])
        //  ->name('approve');
        Route::post('/supprimer', [ResponsableController::class, 'SupprimerCommentaire'])
            ->name('supprimer');
    });

    // Statistiques
    Route::get('/statistics', [ResponsableController::class, 'statistics'])
        ->name('statistique');
});

Route::get('/responsable/articles', [ArticleController::class, 'respoindex'])
    ->middleware(['auth', 'verified', 'rolemanager:responsable']) 
    ->name('responsable.articles.index');

    Route::put('/responsable/articles/{article}/publish', [ResponsableController::class, 'publishArticle'])
    ->name('responsable.articles.publish');
 
    Route::put('/articles/{id}/publish', [ArticleController::class, 'publish'])->name('articles.publish');
    Route::put('/articles/{id}/reject', [ArticleController::class, 'reject'])->name('articles.reject');

// Route::get('/responsable/subscriptions',[AbonneController::class, 'afficherAbonne'])->name('responsable.subscriptions');

    Route::post('/responsable/articles/detaille',[ResponsableController::class, 'articleDetaille'])->name('article.detaille');

    Route::post('/responsable/articles/proposer',[ResponsableController::class , 'proposer'])->name('article.proposer');


    Route::get('/Mes-Abonnements', function () {
        return view('profile.abonné.mesAbonnement');
    });
    
    
    
    
    Route::get('/articles', function () {
        return view('profile.abonné.articles');
    });
    
    Route::resource('/Article-Proposé', ProposerController::class);
    
    
    Route::post('/comments/{slug}', [CommentsController::class, 'store'])->middleware('auth')->name('comments.store');
    Route::delete('/comments/{id}', [CommentsController::class, 'destroy'])->middleware('auth')->name('comments.destroy');
    
    
    
    
    Route::middleware('auth')->group(function () {
        Route::post('/Mes-Abonnements/unsubscribe', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');
        Route::post('/Mes-Abonnements/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    });
    
    
    Route::get('/historique', [VisitController::class, 'index'])->name('historique.index')->middleware('auth');
    
    
    
        Route::get('/Mes-Abonnements', [ThemeAbonneController::class, 'index'])->name('mesAbonnement');
    
    
        
        Route::post('/ratings/{article}', [RatingController::class, 'store'])->name('ratings.store');

        Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
            Route::get('/articles', [ArticleExterieurController::class, 'index'])->name('articles.index');
            Route::get('/{slug}', [ArticleExterieurController::class, 'show'])->name('article.show');
    
        });

require __DIR__.'/auth.php';
