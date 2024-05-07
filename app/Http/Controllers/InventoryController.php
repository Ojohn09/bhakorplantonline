<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    // index inventory controller


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $inventories = Inventory::with('products')-> orderBy('created_at', 'desc')->paginate(10);


        return view('inventories.index', compact('inventories'));
    }


    // // create inventory controller

    // public function create()
    // {
    //     return view('inventories.create');
    // }


    // // store inventory controller

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required',
    //         'location_id' => 'required',
    //         'quantity' => 'required',
    //     ]);

    //     Inventory::create($request->all());

    //     return redirect()->route('inventories.index')
    //         ->with('success', 'Inventory created successfully.');

    // }


    // show inventory controller

    public function show(Inventory $inventory)
    {
        return view('inventories.show', compact('inventory'));
    }


    // // edit inventory controller

    // public function edit(Inventory $inventory)
    // {
    //     return view('inventories.edit', compact('inventory'));
    // }


    // // update inventory controller

    // public function update(Request $request, Inventory $inventory)
    // {
    //     $request->validate([
    //         'product_id' => 'required',
    //         'location_id' => 'required',
    //         'quantity' => 'required',
    //     ]);

    //     $inventory->update($request->all());

    //     return redirect()->route('inventories.index')
    //         ->with('success', 'Inventory updated successfully');
    // }


    // // destroy inventory controller

    // public function destroy(Inventory $inventory)
    // {
    //     $inventory->delete();

    //     return redirect()->route('inventories.index')
    //         ->with('success', 'Inventory deleted successfully');
    // }









}
