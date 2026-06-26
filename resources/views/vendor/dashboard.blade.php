@include('layouts.header')

<h2>Vendor Dashboard</h2>

<p>Welcome to your vendor panel.</p>

<a href="{{ route('vendor.products.create') }}">Add Product</a>

<a href="{{ route('vendor.profile') }}">Manage Profile</a>

