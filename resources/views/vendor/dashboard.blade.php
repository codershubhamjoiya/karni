@include('layouts.header')

<h2>Vendor Dashboard</h2>

<p>Welcome to your vendor panel.</p>

<p><a href="{{ route('vendor.products.create') }}">Add Product</a></p>
<p><a href="{{ route('vendor.profile') }}">Manage Profile</a></p>
<p><a href="{{ route('vendor.profile') }}">Edit Profile</a></p>

