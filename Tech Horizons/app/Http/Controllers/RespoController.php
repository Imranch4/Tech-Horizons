<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RespoController extends Controller
{
    public function index()
    {
        $responsables = User::where('role', '1')->get();
        $totalResponsables = User::where('role', '1')->count();
    
        return view('profile.admin.responsables', ['responsables' => $responsables, 'totalResponsables' => $totalResponsables]);
    }
    public function create()
    {
        return view('profile.admin.editrespo');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $responsable = User::create($request->all());
        $responsable->role = 1;
        $responsable->save();
 
        return redirect()->route('admin.responsables.index')->with('success', 'Responsables added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $responsables = User::findOrFail($id);
  
        return view('profile.admin.editrespo', compact('responsables'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $responsables = User::findOrFail($id);
  
        $responsables->update($request->all());
  
        return redirect()->route('admin.responsables.index')->with('success', 'Responsables updated successfully');
    }
  
    /**
     * Block the specified resource in storage.
     */
    public function block(string $id)
    {
        $responsables = User::findOrFail($id);
        $responsables->update(['status' => 'blocked']);
  
        return redirect()->route('admin.responsables.index')->with('success', 'Responsable bloqué avec succès');
    }

    public function unblock(string $id)
    {
        $responsables = User::findOrFail($id);
        $responsables->update(['status' => 'active']);

        return redirect()->route('admin.responsables.index')->with('success', 'Responsable débloqué avec succès');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $responsables = User::findOrFail($id);
  
        $responsables->delete();
  
        return redirect()->route('admin.responsables.index')->with('success', 'Responsables deleted successfully');
    }

}


