<form action="{{route('product.store')}}" enctype='multipart/form-data'>
    @csrf

    <label for="">
        Category
    </label>
    <select name="category_id" id="">
        @foreach($categories as category )
        <option value="{{$category->id}}">
            {{$category->name}}
        </option>

        @endforeach
    </select>
    <br><br>

    <label for="">Product Name</label>
    <input type="text" name="name">
    <br><br>

    <label for="">Description</label>
    <textarea name="description" id=""></textarea>
    <br><br>

    <label for="">Price</label>
    <input type="number" name="price">
    <br><br>

    <label for="">Stock</label>
    <input type="number" name='image'>
    <br><br>

    <label for="">image</label>
    <input type="file" name="image">
    <br><br>

    <button type="submit" >Save Product</button>

</form>