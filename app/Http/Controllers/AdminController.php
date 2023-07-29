<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
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
        $authors = Author::all();
        $categories = Category::all();

        return view('admin.articles.edit', [
            'article' => $article,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $values = $request->validate([
            'name' => 'required',
            'excerpt' => 'required|min:15|max:255',
            'description' => 'required|min:100',
            'release_year' => 'required|numeric|min:1900|max:2023',
            'author_id' => 'required',
            'category_id' => 'required'
        ]);

        $article->update($values);



        return back()
            ->withErrors([
                'success' => 'Updated! Congrats!'
            ]);
    }

    public function destroy(Article $article)
    {
        Article::destroy([$article->id]);

        return back();
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.articles.create', [
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $atributes = $request->validate([
            'name' => 'required',
            'excerpt' => 'required|min:10|max:200',
            'description' => 'required|min:10|max:2000',
            'release_year' => 'required|numeric|min:1900|max:2023',
            'author_id' => 'required',
            'category_id' => 'required'
        ]);

        $atributes['user_id'] = auth()->id();

        Article::create($atributes);


    }
}
