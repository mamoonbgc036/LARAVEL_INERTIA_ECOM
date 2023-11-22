<?php

namespace App\Http\Controllers\Product;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $get_all_products = Product::with('images:product_id,name','category:id,name')->latest()->paginate(3);
        return Inertia::render('Product/ProductIndex', [
            'all_proudct_with_images' => $get_all_products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Product/AddProduct', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productsInfo = json_decode($request->create_product_info);
        $product              = new Product();
        $product->title       = $productsInfo->title;
        $product->description = $productsInfo->description;
        $product->price       = $productsInfo->price;
        $product->old_price   = $productsInfo->old_price;
        $product->category_id = $productsInfo->category_id;
        $product->unit        = $productsInfo->unit;
        $product->created_by        = Auth::user()->id;
        $product->save();

         if ($request->hasFile('images')) {
            foreach($request->file('images') as $image){
                $filename    = Storage::put('upload/product/', $image);
                $product->images()->create([
                    'name' => $filename
                ]);
            }
        }

        return to_route('product.index');
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
        $categories = Category::all();
        return Inertia::render('Product/EditProduct', compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $productsInfo = json_decode($request->create_product_info);
        $product->title       = $productsInfo->title;
        $product->description = $productsInfo->description;
        $product->price       = $productsInfo->price;
        $product->old_price   = $productsInfo->old_price;
        $product->category_id = $productsInfo->category_id;
        $product->unit        = $productsInfo->unit;
        $product->created_by        = Auth::user()->id;
        $product->save();

         if ($request->hasFile('images')) {
            $product->images()->delete();
            foreach($request->file('images') as $image){
                $filename    = Storage::put('upload/product/', $image);
                $product->images()->create([
                    'name' => $filename
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       $product->delete();
       return redirect()->back();
    }
}
