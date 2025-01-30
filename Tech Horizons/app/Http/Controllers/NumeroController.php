<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Models\Article;

class NumeroController extends Controller
{
    public function index()
    {
        $magazines = Magazine::with('articles')->get();
        $totalMagazines = Magazine::count();
        return view('profile.admin.numeros', ['magazines' => $magazines, 'totalMagazines' => $totalMagazines]);
    }
    
    public function destroy(string $id)
    {
        $magazines = Magazine::findOrFail($id);
  
        $magazines->delete();
  
        return redirect()->route('admin.numeros.index')->with('success', 'Magazine deleted successfully');
    }

    public function activate($id)
    {
        $magazine = Magazine::findOrFail($id);
        $magazine->is_public = true;
        $magazine->save();

        Article::where('magazine_id', $id)->update(['is_active' => true]);

        return redirect()->route('admin.numeros.index')->with('success', 'Magazine and its articles activated successfully');
    }

    public function deactivate($id)
    {
        $magazine = Magazine::findOrFail($id);
        $magazine->is_public = false;
        $magazine->save();

        Article::where('magazine_id', $id)->update(['is_active' => false]);

        return redirect()->route('admin.numeros.index')->with('success', 'Magazine and its articles deactivated successfully');
    }

    public function create()
    {
        return view('profile.admin.creenumeros');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|integer',
        ]);

        Magazine::create([
            'number' => $request->number,
        ]);

        return redirect()->route('admin.numeros.recommendations')->with('success', 'Magazine added successfully');
    }

    public function recommendations()
    {
        $recommendations = Article::all();
        return view('profile.admin.gerernumeros', ['recommendations' => $recommendations]);
    }

    public function updateMagazine(Request $request, $article_id)
    {
        $request->validate([
            'magazine_id' => 'required|integer|exists:magazines,id',
        ]);

        $article = Article::findOrFail($article_id);
        $article->magazine_id = $request->magazine_id;
        $article->save();

        return redirect()->route('admin.numeros.recommendations')->with('success', 'Article updated successfully');
    }
}
