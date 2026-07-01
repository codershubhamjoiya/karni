@include('layouts.header')
<h1>All Products</h1>

@if(auth()->check() && auth()->user()->role === 'vendor')
<a href="{{ route('vendor.products.create') }}">
    Add Product
</a>
@endif

<table border="1">
   <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Vendor</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Image</th>
</tr>

@foreach($products as $product)
<tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->vendor->name ?? 'Unknown Vendor' }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            <img src="{{ asset('uploads/products/'.$product->image) }}" width="80">
        </td>
</tr>
@endforeach

</table>