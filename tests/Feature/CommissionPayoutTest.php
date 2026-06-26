<?php

use App\Http\Controllers\VendorController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('credits the admin wallet first and pays the vendor the remaining amount', function () {
    $admin = User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin-pay@example.com',
        'phone' => '1111111111',
        'role' => 'admin',
        'wallet_balance' => 0,
        'password' => Hash::make('password123'),
    ]);

    $vendor = User::factory()->create([
        'name' => 'Vendor',
        'email' => 'vendor-pay@example.com',
        'phone' => '2222222222',
        'role' => 'vendor',
        'wallet_balance' => 0,
        'password' => Hash::make('password123'),
    ]);

    $vendor->vendorProfile()->create([
        'shop_name' => 'Demo Shop',
        'commission_rate' => 10,
        'status' => 'approved',
    ]);

    $controller = new VendorController();
    $result = $controller->settleCommission($vendor, 100);

    expect($result['commission_amount'])->toBe(10.0)
        ->and($result['vendor_payout'])->toBe(90.0)
        ->and($admin->fresh()->wallet_balance)->toBe(10.0)
        ->and($vendor->fresh()->wallet_balance)->toBe(90.0);
});
