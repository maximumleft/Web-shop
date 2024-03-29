<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\IndexRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class ProductController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class,['queryParams'=> array_filter($data)]);
        $products = Product::filter($filter)->paginate(12,['*'],'page',$data['page']);
        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
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
        return view('product.edit', compact('product', 'colors', 'tags', 'categories'));
    }

    public function update(Product $product, ProductUpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->update($data, $product);
        $tags = $this->service->showTags($product);
        $colors = $this->service->showColors($product);

        return view('product.show', compact('product', 'colors', 'tags'));
    }

    public function delete(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }

    public function filterList()
    {
        $colors = Color::all();
        $tags = Tag::all();
        $categories = Category::all();
        $maxPrice = Product::orderBy('price','DESC')->first()->price;
        $minPrice = Product::orderBy('price','ASC')->first()->price;

        $result = [
            'colors' => $colors,
            'tags' => $tags,
            'categories' => $categories,
            'price' => [
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
            ],
        ];

        return response()->json($result);
    }
}
