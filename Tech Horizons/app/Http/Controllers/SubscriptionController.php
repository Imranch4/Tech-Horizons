<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function subscribe(Request $request)
{
    

    $userId = Auth::id(); 
    $themeId = $request->input('theme_id');

    if (!Subscription::where('user_id', $userId)->where('theme_id', $themeId)->exists()) {
        Subscription::create([
            'user_id' => $userId,
            'theme_id' => $themeId,
        ]);
        
    }
    return redirect()->back();

    
}

public function unsubscribe(Request $request)
{

    $themeId = $request->input('theme_id');
    $userId = Auth::id();

    Subscription::where('user_id', $userId)->where('theme_id', $themeId)->delete();

    return redirect()->back();
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
