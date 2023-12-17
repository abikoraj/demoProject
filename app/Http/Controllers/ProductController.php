<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->get();
        return view('front.product.list', ['products' => $product]);
    }
    public function add()
    {
        return view('front.product.add');
    }

    public function submit(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        // dd($product);
        $product->save();
        return redirect()->route('product.add')->with('message', 'Product Added Successfully!');
    }

    public function edit(Product $product)
    {
        return view('front.product.edit', ['product' => $product]);
    }

    public function update(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->supplier_id = $request->supplier_id;
        $product->category_id = $request->category_id;
        // dd($product);
        $product->save();
        return redirect()->route('product.add')->with('message', 'Product Added Successfully!');
    }
}
