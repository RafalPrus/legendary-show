<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SeriesArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::filter(['type' => 'series'])->paginate(7)->withQueryString();
        return view('index', ['articles' => $articles]);
    }
}
