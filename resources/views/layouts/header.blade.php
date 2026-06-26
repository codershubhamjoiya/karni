@auth
<div style="margin-bottom: 20px">
    <span>Welcome,{{auth()->user()->name}}</span>
    <a href="{{route('user.index')}}">Users</a>
    <a href="{{route('category.index')}}">Categories</a>
    <a href="{{route('product.index')}}">Products</a>
    <form action="{{route('logout')}}" method="POST" style="display: inline">
        @csrf
        <button type="submit">
            Logout
        </button>
    </form>
</div>
@endauth