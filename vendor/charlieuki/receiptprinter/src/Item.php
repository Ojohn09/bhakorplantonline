<?php

namespace charlieuki\ReceiptPrinter;

class Item
{
    private $name;
    private $customer;
    private $qty;
    private $price;
    private $unit;
    private $payment;
    private $currency = '#';

    function __construct($name, $customer, $qty, $price, $unit, $payment ) {
        $this->name = $name;
        $this->customer = $customer;
        $this->qty = $qty;
        $this->price = $price;
        $this->unit = $unit;
        $this->payment = $payment;


    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    public function getQty() {
        return $this->qty;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCustomer() {
        return $this->customer;
    }

    public function getPayment() {
        return $this->payment;
    }

    // public function setUnit($unit) {
    //     $this->unit = $unit;
    // }

    public function __toString()
    {
        $right_cols = 10;
        $left_cols = 22;

        $item_price = $this->currency . number_format($this->price, 0, ',', ',');
        $item_subtotal = $this->currency . number_format($this->price * $this->qty, 0, ',', ',');

        $print_name = str_pad($this->name, 16) ;
        $print_customer = str_pad($this->customer, 16) ;
        $print_payment = str_pad($this->payment, 16) ;
        $print_priceqty = str_pad($item_price . ' x ' . $this->qty . $this->unit, $left_cols);
        $print_subtotal = str_pad($item_subtotal, $right_cols, ' ', STR_PAD_LEFT);

        return "$print_name\n$print_customer\n$print_payment\n$print_priceqty$print_subtotal\n";
    }
}
