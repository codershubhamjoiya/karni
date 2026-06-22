<form action="{{route('category.update',$category->id)}}">
    @csrf
    @method('PUT')

    <input 
        type="text"
        name ='name'
        value = '{{$category->name }}'
    >

    <button type="submit">
        update category
    </button>
</form>