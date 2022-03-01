<?php

use App\Models\User;

it('has register user api', function () {
    $response = $this->postJson('/users/register');

    $response->assertStatus(422);
});

it('validate the fields must not be empty when register user', function() {
    $response = $this->postJson('/users/register');

    $response->assertInvalid(['first_name', 'last_name', 'phone_number', 'password']);
});

it('validate the phone number field must be valid when register user', function() {
    $user = User::factory()->make([
        'phone_number' => '000'
    ]);

    $response = $this->postJson('/users/register', $user->toArray());

    $response->assertInvalid('phone_number');
});

it('validate the phone number field must not be exists when register user', function() {
    $user = User::factory()->create();

    $response = $this->postJson('/users/register', $user->toArray());

    $response->assertInvalid('phone_number');
});

it('can register user', function() {
    $user = User::factory()->make();
    $user->password_confirmation = $user->password;

    $response = $this->postJson('/users/register', $user->makeVisible('password')->toArray());

    $response->assertStatus(201);
});