<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Customertype;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
    //  * @param  \App\Models\Customer  $customer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Customer $customer)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Customer  $customer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Customer $customer)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Customer  $customer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Customer $customer)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Customer  $customer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Customer $customer)
    // {
    //     //
    // }



    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $customers = Customer::with('customertypes')->orderBy('created_at', 'desc')->paginate(10);
        $customertype = Customertype::all();
        $customertypes = Customertype::all();




        return view('customers.index', compact('customers', 'customertype', 'customertypes'));

    }


    public function create()
    {
        return view('customers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);


        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->withSuccess('Customer created successfully.');
    }


    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }


    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }


    public function update(Request $request, Customer $customer)
    {
        $request->validate([

            'email' => 'required',

        ]);

        $customer->update($request->all());

        // dd($customer);

        return redirect()->route('customers.index')
            ->withSuccess('Customer updated successfully');
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully')->with('alert-type', 'danger');
    }







}
