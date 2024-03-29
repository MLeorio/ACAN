<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $formations = Formation::all();
        $categories = Categorie::limit(4)->get();

        return view("public.index", [
            'data' => $formations,
            'categories' => $categories
        ]);
    }

    public function cours()
    {
        $formations = Formation::all();
        $categories = Categorie::limit(4)->get();

        return view('public.cours', [
            'data' => $formations,
            'categories' => $categories
        ]);
    }

    public function contact()
    {
        return view('public.contact');
    }
}
