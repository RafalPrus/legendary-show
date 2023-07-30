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
        $this->authorize('article_access', $user->id);
        $articles = $user->articles()->get();
        return view('User.favarticles.index', [
            'articles' => $articles
        ]);
    }

    public function store(User $user, Article $article)
    {
        $this->authorize('article_access', $user->id);
        $user->articles()->attach($article->id);

        return back();
    }

    public function destroy(User $user, Article $article)
    {
        $this->authorize('article_access', $user->id);
        $user->articles()->detach($article->id);

        return back();
    }
}
