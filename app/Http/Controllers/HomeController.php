<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         // sum of all products
         $products = DB::table('products')->sum('quantity');

         // sum of all customers
         $customers = DB::table('customers')->count('customer_id');

         // sum of all suppliers
         $suppliers = DB::table('suppliers')->count('supplier_id');

         // sum of all sales
         $sales = DB::table('pos')->sum('amount');

         // sum of all sales today
         $sales_today = DB::table('pos')->whereDate('created_at', today())->sum('amount');
         $sales_today_count = DB::table('pos')->whereDate('created_at', today())->count('id');

         // sum of all sales this month
         $sales_this_month = DB::table('pos')->whereMonth('created_at', date('m'))->sum('amount');

         // sum of all sales this year
         $sales_this_year = DB::table('pos')->whereYear('created_at', date('Y'))->sum('amount');

         // current stock value
         $current_stock_value = DB::table('products')->sum(DB::raw('quantity * price'));

         // count of sales today
         $sales_today_count = DB::table('pos')->whereDate('created_at', today())->count('id');

         return view('dashboard.index', compact('products', 'customers', 'suppliers', 'sales', 'sales_today', 'sales_this_month', 'sales_this_year', 'current_stock_value', 'sales_today_count'));


    }
}
