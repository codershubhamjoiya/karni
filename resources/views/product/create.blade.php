<!DOCTYPE html>
<html>
    <head>
        <title>Add Product</title>
    </head>
    <body>
    @include('layouts.header')
    <h2>Add Product</h2>

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

    <form action="{{ route('vendor.products.store') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

        <label>Category</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Product Name</label>
        <input type="text" name="name">

        <br><br>

        <label>Description</label>
        <textarea name="description"></textarea>

        <br><br>

        <label>Price</label>
        <input type="number" name="price">

        <br><br>

        <label>Stock</label>
        <input type="number" name="stock">

        <br><br>

        <label>Image</label>
        <input type="file" name="image">

        <br><br>

        <button type="submit">Save Product</button>

    </form>

</body>
</html>
