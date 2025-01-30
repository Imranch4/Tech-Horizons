<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('profile.admin.dashboard');

    }

    public function statistiques()
    {
        return view('admin.statistiques');
    }

    public function statistiquesAbonnes()
    {
        return view('admin.statistiques.abonnes');
    }

    public function statistiquesResponsables()
    {
        return view('admin.statistiques.responsables');
    }

    public function statistiquesNumeros()
    {
        return view('admin.statistiques.numeros');
    }

    public function statistiquesThemes()
    {
        return view('admin.statistiques.themes');
    }

    public function statistiquesArticles()
    {
        return view('admin.statistiques.articles');
    }

    public function articles()
    {   
        return view('profile.admin.articles');
    }

    public function numeros()
    {
        return view('profile.admin.numeros');
    }

    public function responsables()
    {
        return view('profile.admin.responsables');
    }

    public function abonnes()
    {
        return view('profile.admin.abonnes');
    }

    public function logout()
    {
        return redirect('/login');
    }
}
