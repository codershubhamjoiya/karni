@include('layouts.header')
<h2>All Categories</h2>

<a href="{{ route('category.create') }}">
    Add Category
</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Status</th>
        <th>Action</th>

    </tr>

    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>

        <td>
            <a href="{{ route('category.edit', $category->id) }}">
                Edit
            </a>
        </td>
        <td>
            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>