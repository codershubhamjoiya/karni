<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title>
    </head>
    <body>
    @include('layouts.header')
    <h2>Edit Product</h2>

    @if(session('success'))
        <p style="color:green">
            {{ session('success') }}
        </p>
    @endif

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('vendor.products.update', $product) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <label>Category</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Product Name</label>
        <input type="text" name="name" value="{{ $product->name }}">

        <br><br>

        <label>Description</label>
        <textarea name="description">{{ $product->description }}</textarea>

        <br><br>

        <label>Price</label>
        <input type="number" name="price" value="{{ $product->price }}">

        <br><br>

        <label>Stock</label>
        <input type="number" name="stock" value="{{ $product->stock }}">

        <br><br>

        <label>Current Image</label><br>
        <img src="{{ asset('uploads/products/'.$product->image) }}" width="80"><br><br>

        <label>Change Image</label>
        <input type="file" name="image">

        <br><br>

        <button type="submit">Update Product</button>

    </form>

    <form action="{{ route('vendor.products.destroy', $product) }}" method="POST" style="margin-top: 1rem;">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: red;">Delete Product</button>
    </form>

</body>
</html>