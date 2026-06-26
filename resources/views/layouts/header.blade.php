@auth
<div style="margin-bottom: 20px">
    <span>Welcome, {{ auth()->user()->name }}</span>

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('user.index') }}">Users</a>
        <a href="{{ route('category.index') }}">Categories</a>
        <a href="{{ route('product.index') }}">Products</a>
    @elseif(in_array(auth()->user()->role, ['seller', 'vendor'], true))
        <a href="{{ route('vendor.dashboard') }}">Vendor Dashboard</a>
        <a href="{{ route('vendor.profile') }}">Profile</a>
    @else
        <a href="{{ route('customer.profile') }}">My Profile</a>
        <a href="{{ route('customer.products') }}">Shop Products</a>
    @endif

    <form action="{{ route('logout') }}" method="POST" style="display: inline">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@endauth