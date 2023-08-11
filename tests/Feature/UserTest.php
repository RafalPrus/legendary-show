<?php

use App\Models\Article;
use App\Models\Comment;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

beforeEach(function () {
    Type::factory(2)->create();
    $this->user = User::factory()->create();
    $this->article = Article::factory()->create();
});

it('It have user attributes', function () {
    expect($this->user)
        ->name->toBeString()
        ->id->toBeInt()
        ->email->toBeValidEmail() // own expectation from Pest.php
        ->password->toBeString();
});

it('It is logged in', function() {
    login($this->user);
    expect(Auth::check())->toBeTrue();
});

it('It can add a comment to article', function () {
    login($this->user)->post("articles/{$this->article->id}/comment", [
        Comment::factory()->create()
    ]);
});
