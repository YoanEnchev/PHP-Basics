<?php
include "Person.php";
include "Product.php";

$clients = [];
$products = [];

$personAndMoney = trim(fgets(STDIN));
$productAndPrice = trim(fgets(STDIN));

$personAndMoney_tokens = explode(';', $personAndMoney);
$productAndPrice_tokens = explode(';', $productAndPrice);

array_pop($personAndMoney_tokens);
array_pop($productAndPrice_tokens);

foreach ($personAndMoney_tokens as $personData) {
    $nameAndMoney = explode('=', $personData);
    $name = $nameAndMoney[0];
    $money = floatval($nameAndMoney[1]);

    $person = new Person($name, $money);
    array_push($clients, $person);
}

foreach ($productAndPrice_tokens as $productsData) {
    $nameAndMoney = explode('=', $productsData);
    $name = $nameAndMoney[0];
    $money = floatval($nameAndMoney[1]);

    $product = new Product($name, $money);
    array_push($products, $product);
}

$personAndProductNames = trim(fgets(STDIN));

while ($personAndProductNames != "END") {
    list($personName, $productName) = explode(' ', $personAndProductNames);

    $buyer = findPersonByName($clients, $personName);
    $product = findProductByName($products, $productName);

    if ($buyer->getMoney() >= $product->getCost()) {
        $moneyBefore = $buyer->getMoney();
        $moneyAfter = $buyer->getMoney() - $product->getCost();
        $buyer->setMoney($moneyAfter);
        $buyer->addToBag($productName);

        echo "{$personName} bought {$productName}\n";
    } else {
        echo "{$personName} can't afford {$productName}\n";
    }

    $personAndProductNames = trim(fgets(STDIN));
}

printClientsPurchases($clients);

function printClientsPurchases($clients)
{
    foreach ($clients as $client) {
        $purchases = $client->getBagOfProducts();

        if($purchases != []) {
            $display_purchases = join(', ', $purchases);
            echo "{$client->getName()} - {$display_purchases}";
        }

        else {
            echo "{$client->getName()} - Nothing bought\n";
        }
    }
}

function findPersonByName($clients, $personName): Person
{
    foreach ($clients as $person) {
        if ($person->getName() == $personName) {
            return $person;
        }
    }

    throw new Exception("Client with such name does not exits.");
}

function findProductByName($products, $productName): Product
{
    foreach ($products as $product) {
        if ($product->getName() == $productName) {
            return $product;
        }
    }

    throw new Exception("Product with such name does not exits.");
}