<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Supplier;
use App\Models\Inventory;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Pos  $pos
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Pos $pos)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Pos  $pos
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Pos $pos)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Pos  $pos
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Pos $pos)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Pos  $pos
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Pos $pos)
    // {
    //     //
    // }


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $pos = Pos::orderBy('created_at', 'desc')->paginate(10);

        $incomings = Pos::with('products', 'locations','users','customers')->get();
        // $product = Product::all()->keyBy('product_id');
        $product = Product::all();
        // $product = Product::pluck('price', 'id', 'product_id','name');

        $supplier = Supplier::all();
        $products = Product::all();
        $suppliers = Supplier::all();
        $location = Location::all();
        $locations = Location::all();
        $user = User::all();
        $users = User::all();
        $customer = Customer::all();
        $customers = Customer::all();

        // dd($product);


        return view('pos.index', compact('pos', 'product', 'supplier', 'products', 'suppliers', 'location', 'locations', 'user', 'users', 'customer', 'customers'));
    }




//     public function getProductPrice($id)
// {

//     $product = Product::find($id);
//     // return response()->json(['price' => $product->price]);
// //   $product = Product::find($id);

//   if (!$product) {
//     return response()->json('Product not found.', 404);
//   }


//   return response()->json($product->price, 200);
// }

public function getProductPrice($product_id, $customer_id)
{
    $product = Product::where('product_id', $product_id)->first();
     $customer = Customer::where('customer_id', $customer_id)->first();
    if ($product && $customer->customertype_id == 1) {

        return $product->price;
    }

    elseif(($product && $customer->customertype_id == 2)){
        return $product->bulk_price;

    }

    else {
        return null;
    }
}



// public function getProductPrice($product_id)
// {
//     $product = Product::find($product_id);

//     return $product->price;
// }

    public function create()
    {
        return view('pos.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required',
        'quantity' => 'required',
        'amount' => 'required',
    ]);


    $product = Product::where('product_id', $request->product_id)-> orderBy('created_at', 'desc')->first();
    if ($product->quantity < $request->quantity) {
        return redirect()->back()->withSuccess('Sale quantity is greater than the available stock');
    }

    $locationname = DB::table('locations')->where('location_id', $request->location_id)->value('name');

    // dd($request->location_id);
    // $locationname = $location->name;
    // dd($locationname);
    //pos name should be the first three letters of the location name plus 8 random digits
    $posname = substr($locationname, 0, 3) . rand(10000000, 99999999);
    $posinvoice = 'BHA' . rand(10000000, 99999999);


    $pos = new Pos;
    $pos->location_id = $request->location_id;
    $pos->user_id = $request->user_id;
    $pos->customer_id = $request->customer_id;
    $pos->pos_id = $posname;

    $pos->product_id = $request->product_id;
    $pos->quantity = $request->quantity;
    $pos->amount = $request->amount;
    $pos->price=($request->amount/$request->quantity);
    $pos->pos_invoice =$posinvoice;
    $pos->payment_type = $request->payment_type;
    // $pos->amount = $request->input('amount');
    // $product = Product::findOrFail($request->input('product_id'));
    // $pos->amount = $product->price * $request->input('quantity'); // update the amount field based on the product price and quantity

//    Dd($pos);
    $pos->save();



    $product = Product::where('product_id', $request->product_id)->first();
    $product->quantity = $product->quantity - $request->quantity;
    $product->save();

// add a record to the inventories table to reflect the sale using the product_id, incoming_or_sale is sale, quantity is the quantity sold, current quantity is current quantity of the current quantity - the quantity sold.

    $inventory = new Inventory;
    $inventory->product_id = $request->product_id;
    $inventory->incoming_or_sale = 'sale';
    $inventory->quantity = $request->quantity;
    $inventory->current_quantity = $product->quantity;
    $inventory->save();



    return redirect()->route('pos.index')
                     ->withSuccess('Sale Made successfully.');
}


    public function show(Pos $pos)
    {
        return view('pos.show', compact('pos'));
    }

    public function edit(Pos $pos)
    {
        return view('pos.edit', compact('pos'));
    }

    public function update(Request $request, Pos $pos)
    {
        $request->validate([

            'quantity' => 'required',
        ]);

        $pos->update($request->all());

        return redirect()->route('pos.index')
            ->withSuccess('Sale updated successfully');
    }

    public function destroy(Pos $pos)
    {
        $pos->delete();

        return redirect()->route('pos.index')
            ->with('success', 'Sale deleted successfully')->with('alert-type', 'danger');
    }






}
