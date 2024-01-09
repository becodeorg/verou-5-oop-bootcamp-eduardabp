<?php

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
echo $totalTax;