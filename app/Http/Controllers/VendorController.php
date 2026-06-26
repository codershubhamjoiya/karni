<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function dashboard()
    {
        return view('vendor.dashboard');
    }

    public function profile()
    {
        return view('vendor.profile');
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'shop_description' => 'nullable|string',
        ]);

        $user = Auth::user();

        if (! $user->vendorProfile) {
            $user->vendorProfile()->create([
                'shop_name' => $request->shop_name,
                'shop_description' => $request->shop_description,
                'status' => 'pending',
            ]);
        } else {
            $user->vendorProfile()->update([
                'shop_name' => $request->shop_name,
                'shop_description' => $request->shop_description,
            ]);
        }

        return redirect()->route('vendor.dashboard')->with('success', 'Vendor profile saved successfully.');
    }
}
