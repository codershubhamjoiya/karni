@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
<form action="{{Route('category.store')}}" method='POST'>
    @csrf
    <input type="text" name="name" placeholder="Category name ">
    <br><br>
    <button type="submit" name="Category name"  onclick="return confirm='Are you Sure To Save  The Caregory'">Save Category</button>
</form>