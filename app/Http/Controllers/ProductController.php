<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\TranslateRequest;
use App\Models\Product;
use App\Models\Search;
use App\Models\Translation;
use Database\Seeders\productSeeder;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy('name')->paginate(5);
        return view('product.catalog', compact('products'));
    }

    public function search(SearchRequest $request)
    {
        $products = Product::query()->orderBy('name');
        $filters = $request->validated();
        if (!empty($filters['name'])) {
            $products->where('name', 'like', '%' . $filters['name'] . '%');
        }
        if (!empty($filters['material'])) {
            $products->where('material', 'like', '%' . $filters['material'] . '%');
        }
        if (!empty($filters['brand'])) {
            $products->where('brand', 'like', '%' . $filters['brand'] . '%');
        }
        if (isset($filters['mincost'])) {
            $products->where('cost', '>=', $filters['mincost']);
        }
        if (isset($filters['maxcost'])) {
           $products->where('cost', '<=', $filters['maxcost']);
        }
        Search::create(
            [...$filters, 'visited_at' => now()]
        );

        $products = $products->paginate(5)->withQueryString();
        return view('product.catalog', [...compact('products'),...$filters]);
    }


    public function create()
    {
        return view('product.create');
    }


    public function store(ProductRequest $request)
    {
        $product = $request->validated();
        if($request->hasFile('photo_path')){
            $photo = $request->file('photo_path');
            $product['photo_path'] = "-";
            $entry = Product::create(
                $product
            );
            $filename = $entry->id .'.'. $photo->extension();
            $photo->move(public_path('images/product'), $filename);
            $path = 'images/product/'.$filename;
            $entry->update(['photo_path' => $path]);
        }else {
            $product['photo_path'] = "-";
            $entry = Product::create(
                $product
            );
        }
        return redirect()->route('product.index');
    }
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function translate(TranslateRequest $request,Product $product)
    {
        Translation::create(
            ['product_id' => $product->id, ...$request->validated()]
        );
        return view('product.edit', compact('product'));
    }

    public function update(
        ProductRequest $request,
        Product $product
    ) {
        $request->validated();
        if($request->hasFile('photo_path')){
            File::delete(public_path($product->photo_path));
            $photo = $request->file('photo_path');
            File::delete(public_path($product->photo_path));
            $product->photo_path = "-";
            $filename = $product->id .'.'. $photo->extension();
            $photo->move(public_path('images/product'), $filename);
            $path = 'images/product/'.$filename;
            unset($request->validated()['photo_path']);
            $product->update([...$request->validated(),'photo_path' => $path]);
        }else {
            unset($request->validated()['photo_path']);
            $product->update([...$request->validated(), 'photo_path' => $product->photo_path]);
        }
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        File::delete(public_path($product->photo_path));
        $product->delete();
        return redirect()->route('product.index');
    }
}
