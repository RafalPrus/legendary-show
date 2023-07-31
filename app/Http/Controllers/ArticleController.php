<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::filter(request(['category', 'type']))->paginate(7)->withQueryString();
        return view('index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('show', ['article' => $article]);
    }
}
