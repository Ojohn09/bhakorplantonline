<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Incoming;
use App\Models\Supplier;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class IncomingController extends Controller
{






    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {


        $incomings = Incoming::with('products', 'suppliers')->get();
        // $incomings desciding based on time stamp
        $incomings = Incoming::orderBy('created_at', 'desc')->paginate(10);
        $product = Product::all();
        $supplier = Supplier::all();
        $products = Product::all();
        $suppliers = Supplier::all();



        return view('incomings.index', compact('incomings', 'product', 'supplier' , 'products', 'suppliers'    ));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incoming.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {






        $product = Product::where('product_id', $request->product_id)->first();



        $productname = DB::table('products')->where('product_id', $request->product_id)->value('name');

    $incominginvoice = substr($productname, 0, 3) . rand(10000000, 99999999);
    $posinvoice = 'BHA' . rand(10000000, 99999999);


    //get today's date
    $today = date("Y-m-d");
    // Dd($today);




        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',

            // 'incoming_invoice' => 'required',

        ]);
        $incoming = new Incoming([
            'product_id' => $request->get('product_id'),
            'quantity' => $request->get('quantity'),
            'supplier_id' => $request->get('supplier_id'),
            'incoming_invoice' => $incominginvoice,
              'date' => $today
        ]);

        // dd($incoming);
        $incoming->save();



        // add a record to the inventories table to reflect the sale using the product_id, incoming_or_sale is sale, quantity is the quantity sold, current quantity is current quantity of the current quantity - the quantity sold.
    // dd($product);



    $product->quantity = $product->quantity + $request->quantity;
    $product->save();


    $inventory = new Inventory;
    $inventory->product_id = $request->product_id;
    $inventory->incoming_or_sale = 'incoming';
    $inventory->quantity = $request->quantity;
    $inventory->current_quantity = $product->quantity;
    $inventory->save();





        return redirect('/incomings')->withSuccess('Product has been Supplied');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incoming = Incoming::find($id);
        return view('incomings.show', compact('incoming'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incoming = Incoming::find($id);
        return view('incomings.edit', compact('incoming'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $incoming = Incoming::find($id);
    //     // $incoming->product_id = $request->input('product_id');
    //     // $incoming->quantity = $request->input('quantity');
    //     $incoming->supplier_id = $request->input('supplier_id');
    //     $incoming->supplier_id = $request->input('comments');
    //     // $incoming->incoming_invoice = $request->input('incoming_invoice');
    //     // $incoming->date = $request->input('date');
    //     $incoming->save();
    //     return redirect()->route('incomings.index')->with('success', 'Incoming has been updated successfully');
    // }


    public function update(Request $request, Incoming $incoming)
    {
        $request->validate([


            // 'supplier_id'=> 'required',

        ]);

        $incoming->update($request->all());

        return redirect()->route('incomings.index')
            ->withSuccess('Incoming updated successfully');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $incoming = Incoming::find($id);
        $incoming->delete();

         $product = Product::where('product_id', $incoming->product_id)->first();
         $product->quantity = $product->quantity - $incoming->quantity;
            $product->save();


        return redirect()->route('incomings.index')->with('success', 'Supply has been deleted successfully')->with('alert-type', 'danger');
    }

}
