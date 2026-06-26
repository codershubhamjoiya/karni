<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VendorController extends Controller
{
    public function dashboard()
    {
        return view('vendor.dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        $profile = $user->vendorProfile;

        return view('vendor.profile', compact('profile'));
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'shop_description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'bank_account' => 'nullable|string|max:255',
            'upi_id' => 'nullable|string|max:255',
            'commission_rate' => 'nullable|numeric|min:0|max:100',
        ]);

        $user = Auth::user();
        $data = [
            'shop_name' => $request->shop_name,
            'shop_description' => $request->shop_description,
            'bank_account' => $request->bank_account,
            'upi_id' => $request->upi_id,
            'commission_rate' => $request->commission_rate,
            'status' => 'pending',
        ];

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('vendor/logos', 'public');
            $data['logo'] = $path;
        }

        if (! $user->vendorProfile) {
            $user->vendorProfile()->create($data);
        } else {
            $user->vendorProfile()->update($data);
        }

        return redirect()->route('vendor.profile')->with('success', 'Vendor profile saved successfully.');
    }

    public function settleCommission(User $vendor, float $orderAmount): array
    {
        $profile = $vendor->vendorProfile;
        $commissionRate = $profile?->commission_rate ?? 0;
        $commissionAmount = round($orderAmount * ($commissionRate / 100), 2);
        $vendorPayout = round($orderAmount - $commissionAmount, 2);

        $admin = User::where('role', 'admin')->first();

        if ($admin) {
            $admin->wallet_balance = round((float) $admin->wallet_balance + $commissionAmount, 2);
            $admin->save();
        }

        if ($vendor) {
            $vendor->wallet_balance = round((float) $vendor->wallet_balance + $vendorPayout, 2);
            $vendor->save();
        }

        if ($profile) {
            $profile->total_earnings = round((float) ($profile->total_earnings ?? 0) + $orderAmount, 2);
            $profile->total_paid = round((float) ($profile->total_paid ?? 0) + $vendorPayout, 2);
            $profile->save();
        }

        return [
            'commission_amount' => $commissionAmount,
            'vendor_payout' => $vendorPayout,
            'admin_wallet' => $admin?->wallet_balance ?? 0,
            'vendor_wallet' => $vendor?->wallet_balance ?? 0,
        ];
    }
}
