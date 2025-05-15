<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'phone' => '09688745698',
        'address' => 'Myanmar, Mandalay',
        'is_admin' => false,
    ]);

    // dd($response->getContent(), session()->all()); // This will show us what's happening

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
