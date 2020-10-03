<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article.index', [
            'articles' => $this->getArticles()
        ]);
    }

    public function show($id)
    {
        $item = Article::where('id', $id)->first();
        return view('article.show', [
            'item' => $item,
            'articles' => $this->getRecentNews()
        ]);
    }

    public function getArticles()
    {
        return Article::orderBy('created_at', 'asc')
            ->paginate(4);
    }

    public function getRecentNews()
    {
        return Article::orderBy('id', 'desc')
            ->take(3)
            ->get();
    }
}
