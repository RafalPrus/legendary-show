<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $types = Type::all();

        return view('admin.articles.edit', [
            'article' => $article,
            'authors' => $authors,
            'categories' => $categories,
            'types' => $types
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $values = $request->validate([
            'cover' => 'image|max:2048',
            'name' => 'required',
            'excerpt' => 'required|min:15|max:255',
            'description' => 'required|min:100',
            'release_year' => 'required|numeric|min:1900|max:2023',
            'author_id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required'
        ]);

        $article->update(Arr::except($values, ['cover']));

        if($request->file('cover') !== null) {
            $article->addMediaFromRequest('cover')->toMediaCollection('covers');
        }

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
        $types = Type::all();
        return view('admin.articles.create', [
            'authors' => $authors,
            'categories' => $categories,
            'types' => $types
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
            'type_id' => 'required',
            'category_id' => 'required'
        ]);

        $atributes['user_id'] = auth()->id();

        $article = Article::create($atributes);

        if($request->file('cover') !== null) {
            $article->addMediaFromRequest('cover')->toMediaCollection('covers');
        }


    }
}
