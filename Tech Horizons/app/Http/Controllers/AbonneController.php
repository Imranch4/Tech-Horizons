<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AbonneController extends Controller
{
    public function index()
    {
        $abonnes = User::where('role', 2)->get();
        $totalAbonnes = User::where('role', '2')->count();
    
        return view('profile.admin.abonnes', ['abonnes' => $abonnes, 'totalAbonnes' => $totalAbonnes]);
    }
    public function create()
    {
        return view('profile.admin.editabonnes');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        User::create($request->all());
 
        return redirect()->route('admin.abonnes.index')->with('success', 'Abonnes added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $abonnes = User::findOrFail($id);
  
        return view('profile.admin.editabonnes', compact('abonnes'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $abonnes = User::findOrFail($id);
  
        $abonnes->update($request->all());
  
        return redirect()->route('admin.abonnes.index')->with('success', 'Abonnes updated successfully');
    }
  
    /**
     * Block the specified resource in storage.
     */
    public function block(string $id)
    {
        $abonnes = User::findOrFail($id);
        $abonnes->update(['status' => 'blocked']);
  
        return redirect()->route('admin.abonnes.index')->with('success', 'Abonné bloqué avec succès');
    }

    public function unblock(string $id)
    {
        $abonnes = User::findOrFail($id);
        $abonnes->update(['status' => 'active']);

        return redirect()->route('admin.abonnes.index')->with('success', 'Abonné débloqué avec succès');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abonnes = User::findOrFail($id);
  
        $abonnes->delete();
  
        return redirect()->route('admin.abonnes.index')->with('success', 'Abonnes deleted successfully');
    }

}

