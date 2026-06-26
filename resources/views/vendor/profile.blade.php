@include('layouts.header')

<div style="padding: 20px; max-width: 800px;">
    <h2>Manage Profile</h2>
    <p>Complete and update your seller shop profile.</p>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <div style="margin: 20px 0; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9;">
        <strong>Profile Setup</strong>
        <p>Fill in your shop details, logo, and payout information.</p>
        <p><strong>Wallet Balance:</strong> {{ number_format(auth()->user()->wallet_balance ?? 0, 2) }}</p>
        <p><strong>Total Earnings:</strong> {{ number_format($profile->total_earnings ?? 0, 2) }}</p>
        <p><strong>Total Paid:</strong> {{ number_format($profile->total_paid ?? 0, 2) }}</p>
    </div>

    <form action="{{ route('vendor.profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Shop Name</label><br>
        <input type="text" name="shop_name" value="{{ old('shop_name', $profile->shop_name ?? '') }}" style="width: 100%; padding: 8px; margin-top: 5px;">
        <br><br>

        <label>Shop Description</label><br>
        <textarea name="shop_description" style="width: 100%; padding: 8px; min-height: 100px; margin-top: 5px;">{{ old('shop_description', $profile->shop_description ?? '') }}</textarea>
        <br><br>

        <label>Logo</label><br>
        <input type="file" name="logo" style="margin-top: 5px;">
        <br><br>

        <label>Bank Account</label><br>
        <input type="text" name="bank_account" value="{{ old('bank_account', $profile->bank_account ?? '') }}" style="width: 100%; padding: 8px; margin-top: 5px;">
        <br><br>

        <label>UPI ID</label><br>
        <input type="text" name="upi_id" value="{{ old('upi_id', $profile->upi_id ?? '') }}" style="width: 100%; padding: 8px; margin-top: 5px;">
        <br><br>

        <label>Commission Rate (%)</label><br>
        <input type="number" step="0.01" min="0" max="100" name="commission_rate" value="{{ old('commission_rate', $profile->commission_rate ?? '') }}" style="width: 100%; padding: 8px; margin-top: 5px;">
        <br><br>

        <button type="submit">Save Profile</button>
    </form>

    <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
