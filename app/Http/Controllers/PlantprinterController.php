<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Pos;
use App\Models\Product;
use Illuminate\Http\Request;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;
use RealRashid\SweetAlert\Facades\Alert;
use Termwind\Components\Dd;

class PlantprinterController extends Controller
{
    //

    public function Toprinter($request)
    {
        // Set params
$mid = '123123456';
$store_name = 'YOURMART';
$store_address = 'Mart Address';
$store_phone = '1234567890';
$store_email = 'yourmart@email.com';
$store_website = 'yourmart.com';
$tax_percentage = 10;
$transaction_id = 'TX123ABC456';
$currency = 'nir';
$request_amount = 200;
$image_path = 'logo.png';

// Init printer
$printer = new ReceiptPrinter;
$printer->init(
    config('receiptprinter.connector_type'),
    config('receiptprinter.connector_descriptor')
);

// Set store info
$printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

// Set currency
$printer->setCurrency($currency);

// Set request amount
$printer->setRequestAmount($request_amount);

// Set transaction ID
$printer->setTransactionID($transaction_id);

// Set logo
// Uncomment the line below if $image_path is defined
//$printer->setLogo($image_path);

// Set QR code
$printer->setQRcode([
    'tid' => $transaction_id,
    'amount' => $request_amount,
]);

// Print payment request
$printer->printRequest();
    }



    public function testprinter3()
    {
        // Set params
        $mid = '123123456';
        $store_name = 'BHAKOR ENERGY';
        $store_address = '488, Sulu Gambari Close Gwarimpa';
        $store_phone = '08101178915   ';
        $store_email = ' bhakorenergy@gmail.com';
        $store_website = 'bhakorenergy.com';
        $tax_percentage = 7.5;
        $transaction_id = 'TXBHA123ABC456';
        $currency = '#';
        // $unit = 'kg';

        // Set items
        $items = [
            [
                'name' => 'Liquid Metal ',
                'qty' => 2,
                'price' => 756,
                'unit' => 'kg',
            ],
            [
                'name' => 'Cooking Gas ',
                'qty' => 3,
                'price' => 821,
                'unit' => 'kg',
            ],

        ];

        // Init printer
        $printer = new ReceiptPrinter;
        $printer->init(
            config('receiptprinter.connector_type'),
            config('receiptprinter.connector_descriptor')
        );

        // Set store info
        $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

        // Add items
        foreach ($items as $item) {
            $printer->addItem(
                $item['name'],
                $item['qty'],
                $item['price'],
                $item['unit']

            );
        }
        // Set tax
        $printer->setTax($tax_percentage);

        // Calculate total
        $printer->calculateSubTotal();
        $printer->calculateGrandTotal();

        // Set transaction ID
        $printer->setTransactionID($transaction_id);

        // Set qr code
        // $printer->setQRcode([
        //     'tid' => $transaction_id,
        // ]);

        // Print receipt
        $printer->printReceipt();
    }



//     public function testprinter2($id)
// {
//     $pos = Pos::find($id);

//     // Set params
//     $mid = '123123456';
//     $store_name = 'BHAKOR ENERGY';
//     $store_address = '488, Sulu Gambari Close Gwarimpa';
//     $store_phone = '08101178915   ';
//     $store_email = 'bhakorenergy@gmail.com';
//     $store_website = 'bhakorenergy.com';
//     $tax_percentage = 7.5;
//     $transaction_id = $pos->pos_invoice;
//     $currency = '#';

//     // Set items
//     $items = [
//         [
//             'name' => $pos->products->name,
//             'qty' => $pos->quantity,
//             'price' => $pos->amount,
//             'unit' => 'kg',
//         ],
//     ];

//     // Init printer
//     $printer = new ReceiptPrinter;
//     $printer->init(
//         config('receiptprinter.connector_type'),
//         config('receiptprinter.connector_descriptor')
//     );

//     // Set store info
//     $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

//     // Add items
//     foreach ($items as $item) {
//         $printer->addItem(
//             $item['name'],
//             $item['qty'],
//             $item['price'],
//             $item['unit']
//         );
//     }

//     // Set tax
//     $printer->setTax($tax_percentage);

//     // Calculate total
//     $printer->calculateSubTotal();
//     $printer->calculateGrandTotal();

//     // Set transaction ID
//     $printer->setTransactionID($transaction_id);

//     // Print receipt
//     $printer->printReceipt();
// }



public function testprinter2($id)
{
    $pos = Pos::findOrFail($id);
    $product = Product::findOrFail($pos->product_id);

    // Set params
    $mid = '123123456';
    $store_name = 'BHAKOR ENERGY';
    $store_address = '488, Sulu Gambari Close Gwarimpa';
    $store_phone = '08101178915   ';
    $store_email = 'bhakorenergy@gmail.com';
    $store_website = 'bhakorenergy.com';
    $tax_percentage = 7.5;
    $transaction_id = $pos->pos_invoice;
    $currency = '#';

    // Set items
    $items = [
        [
            'name' => $product->name,
            'qty' => $pos->quantity,
            'price' => $pos->price,
            'unit' => 'kg',
        ],
    ];

    // Init printer
    $printer = new ReceiptPrinter;
    $printer->init(
        config('receiptprinter.connector_type'),
        config('receiptprinter.connector_descriptor')
    );

    // Set store info
    $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

    // Add items
    foreach ($items as $item) {
        $printer->addItem(
            $item['name'],
            $item['qty'],
            $item['price'],
            $item['unit']
        );
    }

    // Set tax
    $printer->setTax($tax_percentage);

    // Calculate total
    $printer->calculateSubTotal();
    $printer->calculateGrandTotal();

    // Set transaction ID
    $printer->setTransactionID($transaction_id);

    // Print receipt
    $printer->printReceipt();
}



public function printPos($id)
{
    // Get POS record
    $pos = Pos::find($id);
    $locationid = ($pos->location_id);
    //find location using location_id
    // Product::where('product_id', $request->product_id)->first();


    $location = Location::where('location_id', $locationid)->first();
    // dd($location);

    // Set params
    $mid = '123123456';
    $store_name = 'BHAKOR ENERGY'. $location->name;
    $store_address = $location->address;
    $store_phone = $location->phone;
    $store_email = $location->email;
    $store_website = $location->website;
    $tax_percentage = 0;
    $transaction_id = $pos->pos_invoice;
    $currency = '#';
    $unit = '';

    // Set items
    $items = [
        [
            $pri = $pos->amount / $pos->quantity,
            'name' => $pos->products->name,
            'customer' => $pos->customers->first_name. ' ' .$pos->customers->last_name,

            'qty' => $pos->quantity,
            'price' => $pos->price,
            'unit' => 'kg',
            'payment' => $pos->payment_type
        ],
    ];

    // Init printer
    $printer = new ReceiptPrinter;
    $printer->init(
        config('receiptprinter.connector_type'),
        config('receiptprinter.connector_descriptor')
    );

    // Set store info
    $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

    // Add items
    foreach ($items as $item) {
        $printer->addItem(
            $item['name'],
            $item['customer'],
            $item['qty'],
            $item['price'],
            $item['unit'],
            $item['payment']

        );
    }

    // Set tax
    $printer->setTax($tax_percentage);

    // Calculate total
    $printer->calculateSubTotal();
    $printer->calculateGrandTotal();

    // Set transaction ID
    $printer->setTransactionID($transaction_id);

    // Set qr code
    // $printer->setQRcode([
    //     'tid' => $transaction_id,
    // ]);

    // Print receipt
    //  dd($printer);
    $printer->printReceipt();
    $printer->printReceipt();
    $printer->printReceipt();

    // Route back with notification
    return redirect()->back()->withSuccess('Receipt printed successfully');

}



    // public function printpos(Request $request)
    // {
    //     // Get transaction ID from request
    //     $transaction_id = $request->input('transaction_id');

    //     // Get products from pos table
    //     $items = Pos::where('transaction_id', $transaction_id)->get();

    //     // Build receipt items array
    //     $receipt_items = [];
    //     foreach ($items as $item) {
    //         $product = Product::find($item->product_id);
    //         $receipt_items[] = [
    //             'name' => $product->name,
    //             'qty' => $item->quantity,
    //             'price' => $item->price,
    //             'unit' => $product->unit
    //         ];
    //     }

    //     // Set store info and tax percentage
    //     $mid = '123123456';
    //     $store_name = 'BHAKOR ENERGY';
    //     $store_address = '488, Sulu Gambari Close Gwarimpa';
    //     $store_phone = '08101178915';
    //     $store_email = 'bhakorenergy@gmail.com';
    //     $store_website = 'bhakorenergy.com';
    //     $tax_percentage = 7.5;

    //     // Init printer
    //     $printer = new ReceiptPrinter;
    //     $printer->init(
    //         config('receiptprinter.connector_type'),
    //         config('receiptprinter.connector_descriptor')
    //     );

    //     // Set store info
    //  $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

    //     // Add items
    //     foreach ($receipt_items as $item) {
    //         $printer->addItem(
    //             $item['name'],
    //             $item['qty'],
    //             $item['price'],
    //             $item['unit']
    //         );
    //     }

    //     // Set tax
    //     $printer->setTax($tax_percentage);

    //     // Calculate total
    //     $printer->calculateSubTotal();
    //     $printer->calculateGrandTotal();

    //     // Set transaction ID
    //     $printer->setTransactionID($transaction_id);

    //     // Print receipt
    //     $printer->printReceipt();

    //     // Redirect back to pos.index with success message
    //     return redirect()->route('pos.index')->with('success', 'Receipt printed successfully.');
    // }



    // Controller function to print the receipt
// public function printpos($pos_id)
// {
//     // Retrieve pos data
//     $pos = Pos::find($pos_id);

//     // Retrieve product data
//     $product = Product::find($pos->product_id);

//     // Set params
//     $mid = '123123456';
//     $store_name = 'BHAKOR ENERGY';
//     $store_address = '488, Sulu Gambari Close Gwarimpa';
//     $store_phone = '08101178915   ';
//     $store_email = 'bhakorenergy@gmail.com';
//     $store_website = 'bhakorenergy.com';
//     $tax_percentage = 7.5;
//     $transaction_id = $pos->invoice_no;
//     $currency = '#';

//     // Set items
//     $items = [
//         [
//             'name' => $product->name,
//             'qty' => $pos->quantity,
//             'price' => $pos->price,
//             'unit' => 'kg',
//         ]
//     ];

//     // Init printer
//     $printer = new ReceiptPrinter;
//     $printer->init(
//         config('receiptprinter.connector_type'),
//         config('receiptprinter.connector_descriptor')
//     );

//     // Set store info
//     $printer->setStore($mid, $store_name, $store_address, $store_phone, $store_email, $store_website);

//     // Add items
//     foreach ($items as $item) {
//         $printer->addItem(
//             $item['name'],
//             $item['qty'],
//             $item['price'],
//             $item['unit']

//         );
//     }

//     // Set tax
//     $printer->setTax($tax_percentage);

//     // Calculate total
//     $printer->calculateSubTotal();
//     $printer->calculateGrandTotal();

//     // Set transaction ID
//     $printer->setTransactionID($transaction_id);

//     // Print receipt
//     $printer->printReceipt();

//     // Redirect back to pos index page with success message
//     return redirect()->route('pos.index')->with('success', 'Receipt printed successfully.');
// }




}

