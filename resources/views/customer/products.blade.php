@include('layouts.header')

<h2>Available Products</h2>

@if($products->isEmpty())
    <p>No products available for sale right now.</p>
@else
    <div style="display:flex; flex-wrap:wrap; gap:20px;">
        @foreach($products as $product)
            <div style="border:1px solid #ccc; padding:15px; width:250px;">
                @if($product->image)
                    <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" style="width:100%; height:180px; object-fit:cover;">
                @else
                    <div style="width:100%; height:180px; background:#f2f2f2; display:flex; align-items:center; justify-content:center;">No Image</div>
                @endif

                <h3>{{ $product->name }}</h3>
                <p><strong>Category:</strong> {{ $product->category->name ?? 'Uncategorized' }}</p>
                <p><strong>Price:</strong> {{ $product->price }}</p>
                <p><strong>Stock:</strong> {{ $product->stock }}</p>
            </div>
        @endforeach
    </div>
@endif
