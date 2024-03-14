<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        $tags = $this->service->showTags($product);
        $colors = $this->service->showColors($product);
        return view('product.show', compact('product', 'tags','colors'));
    }

    public function create()
    {
        $colors = Color::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('product.create', compact('colors', 'tags', 'categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        $colors = Color::all();
        $tags = Tag::all();
        $categories = Category::all();
        return view('product.edit', compact('product','colors', 'tags', 'categories'));
    }

    public function update(Product $product, ProductUpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->update($data,$product);
        $tags = $this->service->showTags($product);
        $colors = $this->service->showColors($product);

        return view('product.show', compact('product','colors', 'tags'));
    }

    public function delete(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
