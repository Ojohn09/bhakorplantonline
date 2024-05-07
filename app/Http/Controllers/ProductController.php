<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{




    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }



    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $products = Product:: orderBy('created_at', 'desc')->paginate(10);
        return view('products.index', compact('products'));

        // if and stock is less than 10, show red

        // if and stock is more than 10, show green



    }

    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'price' => 'required',

        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->withSuccess('Product created successfully.');

    }

    public function show(Product $product)
    {
        return view('products.index', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.index', compact('product'));

    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'bulk_price' => 'required',
        ]);

        // dd($request->all());

        $product->update($request->all());



        return redirect()->route('products.index')
            ->withSuccess('Product updated successfully');

    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully')->with('alert-type', 'danger');
    }




    }
