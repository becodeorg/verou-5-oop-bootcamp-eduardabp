<?php

class Basket
{
    public $quantity;
    public $price;
    public $tax;
    public $type;

    public function __construct (int $quantity, float $price, float $tax, string $type) {
        $this->quantity = $quantity;
        $this->price = $price;
        $this->tax = $tax;
        $this->type = $type;
    }

    public function getTotal () {
        if ($this->type === "fruit") {
            return ($this->quantity * $this->price) / 2;
        } else {
            return $this->quantity * $this->price;
        }
    }

    public function getTaxTotal () {
        return ($this->getTotal() / 100) * $this->tax;
    }
}

$bananas = new Basket(6, 1, 6, "fruit");
$apples = new Basket(3, 1.5, 6, "fruit");
$wine = new Basket(2, 10, 21, "drink");

echo $totalPrice = $bananas->getTotal() + $apples->getTotal() + $wine->getTotal() . "<br>";

echo $totalTax = $bananas->getTaxTotal() + $apples->getTaxTotal() + $wine->getTaxTotal() . "<br>";