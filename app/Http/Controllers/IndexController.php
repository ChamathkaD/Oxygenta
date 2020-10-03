<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
           'articles' => $this->getArticles(),
        ]);
    }

    public function getArticles()
    {
        return Article::orderBy('created_at', 'desc')
            ->take(6)
            ->get();
    }
}
