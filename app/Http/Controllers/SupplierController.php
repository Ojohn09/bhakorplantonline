<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    // index controller for supplier

    // function __construct()
    // {
    //      $this->middleware('permission:sullpier-list|supplier-create|supplier-edit|supplier-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:supplier-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:supplier-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:supplier-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $suppliers = Supplier::orderBy('created_at', 'desc')->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    // create controller for supplier

    public function create()
    {
        return view('suppliers.create');
    }

    // store controller for supplier

    public function store(Request $request)
    {
        $request->validate([

            'supplier_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email'=> 'required',
            'password'=> 'required',

        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')
            ->withSuccess('Supplier created successfully.');

    }

    // show controller for supplier

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    // edit controller for supplier

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    // update controller for supplier

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([

            'supplier_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email'=> 'required',

        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')
            ->withSuccess('Supplier updated successfully');
    }

    // destroy controller for supplier

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier deleted successfully')->with('alert-type', 'danger');
    }




    //


}
