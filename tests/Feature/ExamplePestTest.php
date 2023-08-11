<?php

use App\Models\User;
use Illuminate\Support\Str;
use function Pest\Faker\fake;

beforeEach(function () {
    $this->user = User::factory()->create([
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ]);
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


