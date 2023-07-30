<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    //
    public function index(User $user)
    {
        $articles = $user->articles()->get();
        return view('User.favarticles.index', [
            'articles' => $articles
        ]);
    }

    public function store(User $user, Article $article)
    {
        $user->articles()->attach($article->id);

        return back();
    }

    public function destroy(User $user, Article $article)
    {
        $user->articles()->detach($article->id);

        return back();
    }
}
