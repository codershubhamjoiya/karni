<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->routeIs('vendor.products.*') && auth()->check() && auth()->user()->role === 'vendor') {
            $products = Product::with('category')
                ->where('vendor_id', auth()->id())
                ->get();
        } else {
            $products = Product::with('category')->get();
        }

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', true)->get();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:products,name',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imgName = time() . '_' . Str::random(5) . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/products'), $imgName);

        Product::create([
            'category_id' => $request->category_id,
            'vendor_id' => auth()->id(),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imgName,
            'status' => true,
        ]);

        $redirectRoute = request()->routeIs('vendor.products.*') ? 'vendor.products.create' : 'product.create';

        return redirect()->route($redirectRoute)->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
