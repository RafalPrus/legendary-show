<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $values = $request->validate([
            'name' => 'required',
            'excerpt' => 'required|min:15|max:255',
            'description' => 'required|min:100',
            'release_year' => 'required|numeric|min:1900|max:2023'
        ]);

        $article->update($values);



        return back()
            ->withErrors([
                'success' => 'Updated! Congrats!'
            ]);
    }
}
