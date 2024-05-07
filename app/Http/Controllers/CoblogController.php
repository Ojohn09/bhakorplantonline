<?php

namespace App\Http\Controllers;

use App\Models\Coblog;
use App\Models\Product;
use Illuminate\Http\Request;

class CoblogController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $coblogs = Coblog::orderBy('created_at', 'desc')->paginate(10);

        $closinglog = Coblog::with('products')-> orderBy('created_at', 'desc')->get();
        // $product = Product::all()->keyBy('product_id');
        $product = Product::all();
        // $product = Product::pluck('price', 'id', 'product_id','name');


        // dd($product);


        return view('coblogs.index', compact('coblogs', 'product', 'closinglog' ));
    }


    public function create()
    {
        return view('coblogs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'comment' => 'required',

        ]);

        // Coblog::create($request->all());





        $product = Product::where('product_id', $request->product_id)->first();


            //get today's date
             $today = date("Y-m-d");
            // Dd($today);


        $coblog = new Coblog();
        $coblog->product_id = $request->product_id;
        $coblog->quantity = $request->quantity;
        $coblog->expected_quantity = $product->quantity;
        $coblog->date = $today;
        $coblog->comment = $request->comment;


    //    Dd($pos);
        $coblog->save();






        return redirect()->route('coblogs.index')
            ->with('success', 'Coblog created successfully.');
    }



    public function show(Coblog $coblog)
    {
        return view('coblogs.show', compact('coblog'));
    }


    public function edit(Coblog $coblog)
    {
        return view('coblogs.edit', compact('coblog'));
    }


    public function update(Request $request, Coblog $coblog)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $coblog->update($request->all());

        return redirect()->route('coblogs.index')
            ->with('success', 'Coblog updated successfully');
    }


    public function destroy(Coblog $coblog)
    {
        $coblog->delete();

        return redirect()->route('coblogs.index')
            ->with('success', 'Coblog deleted successfully');
    }





}
