<p>Store URL: {{ route('product.store') }}</p>
<h1>All Products</h1>

<a href="{{ route('product.create') }}">
    Add Product
</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Image</th>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            <img src="{{ asset('product/'.$product->image) }}" width="80">
        </td>
    </tr>
    @endforeach

</table>