<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    //
    public function store(Article $article, Request $request)
    {
        $request->validate([
            'body' => 'required|min:2|max:1000'
        ]);

        $article->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->input('body')
        ]);

        return back();


    }
}
