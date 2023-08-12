<?php

use App\Models\User;
use Illuminate\Support\Str;
use function Pest\Faker\fake;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('name', function () {
    $name = 'Rafa';
    expect($name)->toBe('Rafa');
});


it('can generate a name', function () {
    $name = fake()->name();
    expect($name)->toBeString()->toBe(ucfirst($name));
});

it('user have name', function () {
    expect($this->user->name)->toBeString();
});

it('test succesfull response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


