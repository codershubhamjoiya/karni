<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('allows a customer to log in and is redirected to the customer products page', function () {
    User::factory()->create([
        'name' => 'Customer',
        'email' => 'customer@example.com',
        'phone' => '9999999999',
        'role' => 'customer',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->post('/login', [
        'email' => 'customer@example.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/customer/products');
    $this->assertAuthenticatedAs(User::first());
});

it('allows a vendor to log in and is redirected to the vendor dashboard', function () {
    User::factory()->create([
        'name' => 'Vendor',
        'email' => 'vendor@example.com',
        'phone' => '8888888888',
        'role' => 'vendor',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->post('/login', [
        'email' => 'vendor@example.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/vendor/dashboard');
    $this->assertAuthenticatedAs(User::first());
});
