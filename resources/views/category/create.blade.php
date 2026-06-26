@include('layouts.header')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
<form action="{{Route('category.store')}}" method='POST'>
    @csrf
    <input type="text" name="name" placeholder="Category name ">
    <br><br>
    <button type="submit" name="Category name" onclick="return confirm('Are you sure to save this category?')">
        Save Category
    </button>
</form>