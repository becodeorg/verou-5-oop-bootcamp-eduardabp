<?php

//without classes

$basket = [
    "bananas" => ["quantity" => 6, "price" => 1, "tax" => 6],
    "apples" => ["quantity" => 3, "price" => 1.5, "tax" => 6],
    "wine" => ["quantity" => 2, "price" => 10 , "tax" => 21]
];

$totalPrice = 0;
$totalTax = 0;

function calculateTotalPrice (array $array) {
    global $totalPrice;
    global $totalTax;
    foreach ($array as $item) {
        $total = $item["quantity"] * $item["price"];
        $totalPrice += $total;
        $taxPartial = $total / 100 * $item["tax"];
        $totalTax += $taxPartial;
    }
}

calculateTotalPrice($basket);

echo $totalPrice . "<br>";
echo $totalTax . "<br>";

// using classes

class Basket
{
    public $item;
    public $quantity;
    public $price;
    public $tax;

    public function __construct (int $quantity, float $price, float $tax) {
        $this->quantity = $quantity;
        $this->price = $price;
        $this->tax = $tax;
    }

    public function getTotal () {
        return $this->quantity * $this->price;
    }

    public function getTaxTotal () {
        return ($this->getTotal() / 100) * $this->tax;
    }
}

$bananas = new Basket(6, 1, 6);
$apples = new Basket(3, 1.5, 6);
$wine = new Basket(2, 10, 21);

echo $totalPrice = $bananas->getTotal() + $apples->getTotal() + $wine->getTotal() . "<br>";

echo $totalTax = $bananas->getTaxTotal() + $apples->getTaxTotal() + $wine->getTaxTotal() . "<br>";