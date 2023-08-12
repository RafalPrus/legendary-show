<?php

use App\Models\Article;
use App\Models\Comment;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

beforeEach(function () {
    Type::factory(2)->create();
    $this->user = User::factory()->create([
        'password' => 'secret'
    ]);
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
            'article_id' => $this->article->id,
            'user_id' => $this->user->id,
            'body' => 'A test comment'
        ])->assertStatus(302);

    expect($this->article->comments)->not->toBeEmpty();
});

it('It can add article to favourites', function() {
    login($this->user)
        ->post("users/articles/{$this->user->id}/store/{$this->article->id}")
        ->assertStatus(302);

    expect(count($this->user->articles))->toBe(1);
});

it('It can delete article from favourites', function() {
    login($this->user)
        ->post("users/articles/{$this->user->id}/store/{$this->article->id}")
        ->assertStatus(302);

    login($this->user)
        ->delete("users/articles/{$this->user->id}/delete/{$this->article->id}")
        ->assertStatus(302);

    expect(count($this->user->articles))->toBe(0);
});

it('Can log in', function () {
    Auth::attempt(['email' => $this->user->email, 'password' => 'secret']);
    expect(Auth::check())->toBeTrue();
});

it('Can log in via endpoint', function () {
    $this->post('login', [
        'email' => $this->user->email,
        'password' => 'secret'
    ])->assertStatus(302);

    expect(Auth::check())->toBeTrue();
});

it('Cannot log in via endpoint with incorrect email', function () {
    $response = $this->post('login', [
        'email' => $this->user->email . 'bad',
        'password' => 'secret'
    ]);

    $response->assertSessionHasErrors([
        'password' => 'Email or password incorrect'
    ]);

    expect(Auth::check())->toBeFalse();
});
