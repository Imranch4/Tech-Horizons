<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Theme;
use App\Models\Magazine;

use Illuminate\Support\Str;
class ProposerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $proposations = Article::where('user_id', auth()->id())
        ->select('title','content','image' ,'theme_id', 'state','magazine_id')
        ->get();

        $themes = Theme::all();
        $magazines = Magazine::where('is_public', 1)->get();

    return view('profile.abonné.articleProposé', ['proposations' => $proposations], compact('themes','magazines'));
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
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'magazine_id' => 'required|integer',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5048',
            'theme_id' => 'required|integer|exists:themes,id',
        ]);

        $title = mb_convert_encoding($request->title, 'UTF-8');
        $slug= Str::slug($request -> title , '-');


    
        $newImageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
    
        $request->file('image')->move(public_path('images'), $newImageName);
    
        Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('description'),
            'magazine_id' => $request->input('magazine_id'),
            'image' =>   $newImageName,
            'state' => 'En cours',
            'user_id' => auth()->id(),
            'slug' => $slug,
            'theme_id' => $request->input('theme_id'),
        ]);
    
        return redirect('/Article-Proposé')->with('success', 'Article recommandé ajouté avec succès !');
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
