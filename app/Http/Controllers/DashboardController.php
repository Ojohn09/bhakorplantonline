<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }


    public function index()
    {
        // sum of all products
        $producto = DB::table('products')->sum('quantity');
        $products = round($producto, 2);

        // sum of all customers
        $customero = DB::table('customers')->count('customer_id');
        $customers = round($customero, 2);

        // sum of all suppliers
        $suppliers = DB::table('suppliers')->count('supplier_id');

        // sum of all sales
        $saleo = DB::table('pos')->sum('amount');
        $sales = round($saleo, 2);

        // sum of all sales today
        $sales_today0 = DB::table('pos')->whereDate('created_at', today())->sum('amount');
        $sales_today = round($sales_today0, 2);
        $sales_today_kgo = DB::table('pos')->whereDate('created_at', today())->sum('quantity');
        $sales_today_kg = round($sales_today_kgo, 2);
        $sales_today_counto = DB::table('pos')->whereDate('created_at', today())->count('id');
        $sales_today_count = round($sales_today_counto, 2);

        // sum of all sales this month
        $sales_this_montho = DB::table('pos')->whereMonth('created_at', date('m'))->sum('amount');
        $sales_this_month = round($sales_this_montho, 2);

        $sales_this_monthkgo = DB::table('pos')->whereMonth('created_at', date('m'))->sum('quantity');
        $sales_this_month_kg = round($sales_this_monthkgo, 2);

        $sales_this_monthcounto = DB::table('pos')->whereMonth('created_at', date('m'))->count('id');
        $sales_this_month_count = round($sales_this_monthcounto, 2);

        // sum of all sales this year
        $sales_this_yearo = DB::table('pos')->whereYear('created_at', date('Y'))->sum('amount');
        $sales_this_year = round($sales_this_yearo, 2);

        $sales_this_year_kgo = DB::table('pos')->whereYear('created_at', date('Y'))->sum('quantity');
        $sales_this_year_kg = round($sales_this_year_kgo, 2);

        $sales_this_year_counto = DB::table('pos')->whereYear('created_at', date('Y'))->count('id');
        $sales_this_year_count = round($sales_this_year_counto, 2);

        // current stock value
        $current_stock_valueo = DB::table('products')->sum(DB::raw('quantity * price'));
        $current_stock_value = round($current_stock_valueo, 2);

        // count of sales today
        $sales_today_counto = DB::table('pos')->whereDate('created_at', today())->count('id');
        $sales_today_count = round($sales_today_counto, 2);

        return view('dashboard.index', compact('products', 'customers', 'suppliers', 'sales', 'sales_today', 'sales_today_kg', 'sales_this_month', 'sales_this_month_kg', 'sales_this_month_count' , 'sales_this_year', 'sales_this_year_kg', 'sales_this_year_count' , 'current_stock_value', 'sales_today_count'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
