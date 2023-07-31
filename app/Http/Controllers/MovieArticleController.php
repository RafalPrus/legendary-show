<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MovieArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::filter(['type' => 'movie'])->paginate(7)->withQueryString();
        return view('index', ['articles' => $articles]);
    }
}
