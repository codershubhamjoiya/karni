@include('layouts.header')

<h2>Vendor Profile</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('vendor.profile.store') }}" method="POST">
    @csrf

    <label>Shop Name</label>
    <input type="text" name="shop_name" value="{{ old('shop_name') }}">
    <br><br>

    <label>Shop Description</label>
    <textarea name="shop_description">{{ old('shop_description') }}</textarea>
    <br><br>

    <button type="submit">Save Profile</button>
</form>
