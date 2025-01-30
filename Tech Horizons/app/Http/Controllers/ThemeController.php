<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::with('user')->get();
        $totalThemes = Theme::count(); 
        return view('themes.index', ['themes' => $themes, 'totalThemes' => $totalThemes]);
    }

    public function edit(Theme $theme)
    {
        return view('themes.edit', ['theme' => $theme]);
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('themes.index')->with('success', 'Theme deleted successfully');
    }

}
